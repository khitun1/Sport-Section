<?php
    require "dbconnect.php";

    $file = fopen($_FILES['filename']['tmp_name'], 'r+');
    $ext = explode('.', $_FILES["filename"]["name"]);
    $ext = $ext[count($ext)-1];
    $filename = 'file' . rand(100000, 999999) . '.' . $ext;

    $s3 = new S3();
    $s3fileUploader = new S3FileUploader($s3->getS3Client());
    $uploadService = new UploadService($s3fileUploader);
    $resource = $uploadService->upload($file,$filename);

    try {
        $sql = 'INSERT INTO children(first_name_child,last_name_child,birthday,id_class, picture_url) VALUES(:first_name, 
            :last_name,:birthday, :group, :picture_url)';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':first_name', $_POST['first_name']);
        $stmt->bindValue(':last_name', $_POST['last_name']);
        $stmt->bindValue(':birthday', $_POST['birthday']);
        $stmt->bindValue(':group', $_POST['group']);
        $stmt->bindValue(':picture_url', $resource['ObjectURL']);
        $stmt->execute();
        $_SESSION['msg'] = "Запись успешно добавлена";
    } catch (PDOexception $error) {
        $_SESSION['msg'] = "Ошибка добавления записи: " . $error->getMessage();
    }
    header('Location: /index.php?page=children');
    exit( );