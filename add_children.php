<?php
    require "dbconnect.php";
    try {
        $sql = 'INSERT INTO children(first_name_child,last_name_child,birthday,id_class) VALUES(:first_name, 
        :last_name,:birthday, :group)';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':first_name', $_GET['first_name']);
        $stmt->bindValue(':last_name', $_GET['last_name']);
        $stmt->bindValue(':birthday', $_GET['birthday']);
        $stmt->bindValue(':group', $_GET['group']);
        $stmt->execute();
        $_SESSION['msg'] = "Запись успешно добавлена";
    } catch (PDOexception $error) {
        $_SESSION['msg'] = "Ошибка добавления записи: " . $error->getMessage();
    }
    header('Location: http://sport-section.ru/index.php?page=children');
    exit( );
