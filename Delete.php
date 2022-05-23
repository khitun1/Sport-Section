<?php
    require "dbconnect.php";
    try {
        $sql = 'DELETE FROM class WHERE id=:id';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        $_SESSION['msg'] = "Группа успешно удалена";
    } catch (PDOexception $error) {
        $_SESSION['msg'] =  "Ошибка удаления группы: " . $error->getMessage();
    }
    header('Location: /index.php?page=class');
    exit( );

