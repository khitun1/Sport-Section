<?php
    require "dbconnect.php";
    try {
        $sql = 'UPDATE visit SET visit = 1 WHERE id = :id ';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
    } catch (PDOexception $error) {
        $_SESSION['msg'] =  "Ошибка отметки посещения: " . $error->getMessage();
    }
    header('Location: /visit_show.php?class_show='.$_GET['class'].'&child_show='.
    $_GET['child']. '&date_show='.$_GET['date']);
    exit( );
