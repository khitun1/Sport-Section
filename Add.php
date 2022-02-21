<?php
    require "dbconnect.php";
    try {
        $sql = 'INSERT INTO class(class,id_user) VALUES(:class, :coach)';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':class', $_GET['class']);
        $stmt->bindValue(':coach', $_GET['coach']);
        $stmt->execute();
        //echo("Категория успешно добавлена");
    } catch (PDOexception $error) {
        echo ("Ошибка добавления группы: " . $error->getMessage());
    }
    header('Location: http://sport-section.ru');
    exit( );


