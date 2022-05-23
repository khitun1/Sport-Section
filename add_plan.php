<?php
require "dbconnect.php";
try {
    $sql = 'INSERT INTO plan(plan,month,year, id_class) VALUES(:plan, :month, :year, :class)';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':plan', $_GET['plan']);
    $stmt->bindValue(':month', $_GET['month']);
    $stmt->bindValue(':year', $_GET['year']);
    $stmt->bindValue(':class', $_GET['class']);
    $stmt->execute();
    $_SESSION['msg'] = "Группа успешно добавлена";
} catch (PDOexception $error) {
    $_SESSION['msg'] = "Ошибка добавления группы: " . $error->getMessage();
}
header('Location: http://sport-section.herokuapp.com/index.php?page=plan');
exit( );
