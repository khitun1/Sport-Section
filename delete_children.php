<?php

use Aws\S3\Exception\S3Exception;

require "dbconnect.php";
    try {
        $result = $conn->query("SELECT * FROM children WHERE id=".$_GET['id']);
        $row = $result->fetch();
        try {
            $s3 = new S3();
            $s3fileUploader = new S3FileUploader($s3->getS3Client());
            $uploadService = new UploadService($s3fileUploader);
            $resource = $uploadService->delete($row['picture_url']);
        } catch (S3Exception $e) {
            $_SESSION['msg'] = $e->getMessage();
        }
        $sql = 'DELETE FROM children WHERE id=:id';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        $_SESSION['msg'] = "Запись успешно удалена";
    } catch (PDOexception $error) {
        $_SESSION['msg'] =  "Ошибка удаления записи: " . $error->getMessage();
    }
    header('Location: /index.php?page=children');
    exit( );
