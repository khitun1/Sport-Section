<h1>Список групп:</h1>
<table border='1'>
    <?php
    $result_groups = $conn->query("SELECT *,class.id AS id_class, user.id AS id_coach FROM class, user WHERE class.id_user = user.id");
    echo '<tr><td>ID</td><td>Номер группы</td><td>Тренер</td></tr>';
    while ($row = $result_groups->fetch()) {
        echo '<tr>';
        echo '<td>' . $row['id_class'] . '</td><td>' . $row['class'] . '</td><td>'.
            $row['first_name'] . " ". $row['last_name']. '</td>' ;
        echo '<td><a href=delete.php?id='.$row['id_class'].'>Удалить</a></td>';
        echo '</tr>';
    }
    ?>
</table>
<h2>Создание группы</h2>
<form method="get" action="add.php">
    <input type="text" name="class">
    <select name = "coach">
        <option disabled selected>Выберите тренера</option>
        <?php
            $result_coach = $conn->query("SELECT * FROM user WHERE user.is_admin != 1");
            while ($row_coach = $result_coach->fetch())
            {
                $coach = $row_coach['first_name'] . " " .$row_coach['last_name'];
                echo '<option value=' . $row_coach['id']. '>'. $coach. '</option>>';
            }
        ?>
    </select>
    <input type="submit" value="Создать">
</form>