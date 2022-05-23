<?php
    require "dbconnect.php";
    try {
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
