<?php
    require "dbconnect.php";
    try {
        $sql = 'DELETE FROM class WHERE id=:id';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        //echo ("Категория успешно удалена");
    } catch (PDOexception $error) {
        echo ("Ошибка удаления группы: " . $error->getMessage());
    }
    header('Location: http://sport-section.ru');
    exit( );

