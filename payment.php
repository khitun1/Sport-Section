<h>Журнал оплаты занятий</h>
<form method="get" action="payment_show.php">
    <select name = "class_show">
        <option disabled selected>Выберите группу</option>
        <?php
        $result_group = $conn->query("SELECT * FROM class WHERE class.id_user =".$_SESSION['id']);
        while ($row_group = $result_group->fetch())
        {
            $group = $row_group['class'];
            echo '<option value=' . $row_group['id']. '>'. $group. '</option>>';
        }
        ?>
    </select>
    <select name = "child_show">
        <option disabled selected>Выберите ребёнка</option>
        <?php
        $result_child = $conn->query("SELECT * FROM children");
        while ($row_child = $result_child->fetch())
        {
            $child = $row_child['first_name_child']. " ". $row_child['last_name_child'];
            echo '<option value=' . $row_child['id']. '>'. $child. '</option>>';
        }
        ?>
    </select>
    <select name = "month_show">
        <option disabled selected>Выберите месяц</option>
        <?php
        $result_month = $conn->query("SELECT DISTINCT month FROM payment");
        while ($row_month = $result_month->fetch())
        {
            $month = $row_month['month'];
            echo '<option value=' . $row_month['month']. '>'. $month. '</option>>';
        }
        ?>
    </select>
    <select name = "year_show">
        <option disabled selected>Выберите год</option>
        <?php
        $result_year = $conn->query("SELECT DISTINCT year FROM payment");
        while ($row_year = $result_year->fetch())
        {
            $year = $row_year['year'];
            echo '<option value=' . $row_year['year']. '>'. $year. '</option>>';
        }
        ?>
    </select>
    <input type="submit" value="Показать">
</form>
