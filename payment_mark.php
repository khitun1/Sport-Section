<?php
    require "dbconnect.php";
    try {
        $sql = 'UPDATE payment SET payment =:payment WHERE id=:id';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->bindValue(':payment', $_GET['payment']);
        $stmt->execute();
    } catch (PDOexception $error) {
        $_SESSION['msg'] = "Ошибка оплаты: " . $error->getMessage();
    }
    header('Location: http://sport-section.herokuapp.com/payment_show.php?class_show='.$_GET['class'].'&child_show='.
        $_GET['child'].'&month_show='.$_GET['month'].'&year_show='.$_GET['year']);
    exit();