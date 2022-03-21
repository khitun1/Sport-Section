<?php
require "dbconnect.php";
?>

<h1>Таблица плановых оплат:</h1>
<table border='1'>
    <?php
    $result_plan = $conn->query("SELECT *, plan.id AS id_plan FROM class, plan WHERE plan.id_class = class.id");
    echo '<tr><td>Номер группы</td><td>Месяц</td><td>Год</td><td>Плановая оплата</td></tr>';
    while ($row = $result_plan->fetch()) {
        echo '<tr>';
        echo '<td>' . $row['class'] . '</td><td>' . $row['month'] .'</td><td>'.
            $row['year']. '</td><td>'.
            $row['plan'] .'</td>' ;
        echo '<td><a href=delete_plan.php?id='.$row['id_plan'].'>Удалить</a></td>';
        echo '</tr>';
    }
    ?>
</table>

<h2>Добавление оплаты</h2>
<form method="get" action="add_plan.php">
    <p>Введите сумму: </p><input type="text" name="plan">
    <select name = "class">
        <option disabled selected>Выберите группу</option>
        <?php
        $result_group = $conn->query("SELECT * FROM class");
        while ($row_group = $result_group->fetch())
        {
            echo '<option value=' . $row_group['id']. '>'. $row_group['class']. '</option>>';
        }
        ?>
    </select>
    <p>Введите месяц: </p><input type="text" name="month">
    <p>Введите год: </p><input type="text" name="year">
    <input type="submit" value="Добавить">
</form>

