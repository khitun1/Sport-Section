<h>Журнал посещений</h>
<form method="get" action="visit_show.php">
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
    <select name = "date_show">
        <option disabled selected>Выберите дату</option>
        <?php
        $result_date = $conn->query("SELECT DISTINCT date FROM visit");
        while ($row_date = $result_date->fetch())
        {
            $date = $row_date['date'];
            echo '<option value=' . $row_date['date']. '>'. $date. '</option>>';
        }
        ?>
    </select>
    <input type="submit" value="Показать">
</form>