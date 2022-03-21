<?php
    require "dbconnect.php";
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<h1>Таблица оплаты:</h1>
<table border='1'>
    <?php

    if ($_GET['class_show'] == NULL and $_GET['child_show'] == NULL and $_GET['month_show'] == NULL
        and $_GET['year_show'] == NULL) // all NULL
    {
        $result_visit = $conn->query("SELECT *, payment.id AS id_payment FROM plan, class, children, payment WHERE class.id_user=".
        $_SESSION['id']." AND children.id_class = class.id AND payment.id_children = children.id AND
        plan.month = payment.month AND plan.year = payment.year AND plan.id_class = class.id");
    }

    elseif ($_GET['class_show'] != NULL and $_GET['child_show'] == NULL and $_GET['month_show'] == NULL
        and $_GET['year_show'] == NULL)//first not NULL
    {
        $result_visit = $conn->query("SELECT *, payment.id AS id_payment FROM plan, class, children, payment WHERE class.id=".
            $_GET['class_show']." AND children.id_class = class.id AND payment.id_children = children.id
            AND plan.month = payment.month AND plan.year = payment.year AND plan.id_class = class.id");
    }

    elseif ($_GET['class_show'] != NULL and $_GET['child_show'] != NULL and $_GET['month_show'] == NULL and
        $_GET['year_show'] == NULL)//3 and 4 NULL
    {
        $result_visit = $conn->query("SELECT *, payment.id AS id_payment FROM plan, class, children, payment WHERE class.id=".
            $_GET['class_show']." AND children.id_class = class.id AND children.id=".$_GET['child_show'].
            " AND payment.id_children = children.id
            AND plan.month = payment.month AND plan.year = payment.year AND plan.id_class = class.id");
    }

    elseif ($_GET['class_show'] != NULL and $_GET['child_show'] != NULL and $_GET['month_show'] != NULL and
        $_GET['year_show'] == NULL)//last NULL
    {
        $result_visit = $conn->query("SELECT *, payment.id AS id_payment FROM plan, class, children, payment WHERE class.id=".
            $_GET['class_show']." AND children.id_class = class.id AND children.id=".$_GET['child_show'].
            " AND payment.id_children = children.id AND payment.month='". $_GET['month_show']."'
            AND plan.month = payment.month AND plan.year = payment.year AND plan.id_class = class.id");
    }

    else
    {
        $result_visit = $conn->query("SELECT *, payment.id AS id_payment FROM plan, class, children, payment WHERE class.id=".
            $_GET['class_show']. " AND children.id=". $_GET['child_show']. " AND payment.id_children = children.id 
            AND payment.month='". $_GET['month_show']. "' AND payment.year='". $_GET['year_show'].
            "' AND plan.month = payment.month AND plan.year = payment.year AND plan.id_class = class.id");
    }

    echo '<tr><td>Номер группы</td><td>Имя</td><td>Месяц и год</td><td>Оплата</td><td>Плановая оплата</td><td>Добавить оплату</td></tr>';
    while ($row = $result_visit->fetch()) {
        echo '<tr>';
        echo '<td>' . $row['class'] . '</td><td>' . $row['first_name_child'] .
            " ". $row['last_name_child']. '</td><td>'.
            $row['month'] . " ". $row['year'] . '</td><td>'.
            $row['payment'] . '</td><td>'. $row['plan'] .'</td><td> <form method="get" action="payment_mark.php"><input type="text" 
            name="payment"><input type="submit" value="Оплатить"><input type="hidden" name="id" value="'.
            $row['id_payment'].'"><input type="hidden" name="class" value="'.
            $_GET['class_show'].'"><input type="hidden" name="child" value="'.
            $_GET['child_show'].'"><input type="hidden" name="month" value="'.
            $_GET['month_show'].'"><input type="hidden" name="year" value="'.
            $_GET['year_show'].'"></form></td>';
        echo '</tr>';
    }
    ?>
</table>
<button ><a href="index.php?page=payment"/>Назад</button>