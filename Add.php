<?php
    require "dbconnect.php";
    try {
        $sql = 'INSERT INTO class(class,id_user) VALUES(:class, :coach)';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':class', $_GET['class']);
        $stmt->bindValue(':coach', $_GET['coach']);
        $stmt->execute();
        $_SESSION['msg'] = "Группа успешно добавлена";
    } catch (PDOexception $error) {
        $_SESSION['msg'] = "Ошибка добавления группы: " . $error->getMessage();
    }
    header('Location: /index.php?page=class');
    exit( );



