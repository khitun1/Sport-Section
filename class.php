<h1>Список групп:</h1>
<table border='1'>
    <?php
    $result_groups = $conn->query("SELECT * FROM class");
    echo '<tr><td>ID</td><td>Номер группы</td><td>Тренер</td></tr>';
    while ($row = $result_groups->fetch()) {
        $num = $row['id_user'];
        $result_coach = $conn->query("SELECT * FROM user WHERE id = $num");
        $row_coach = $result_coach->fetch();
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td><td>' . $row['class'] . '</td><td>'.
            $row_coach['first_name'] . " ". $row_coach['last_name']. '</td>' ;
        echo '<td><a href=delete.php?id='.$row['id'].'>Удалить</a></td>';
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
            $result_coach = $conn->query("SELECT * FROM user");
            while ($row_coach = $result_coach->fetch())
            {
                $coach = $row_coach['first_name'] . " " .$row_coach['last_name'];
                echo '<option value=' . $row_coach['id']. '>'. $coach. '</option>>';
            }
        ?>
    </select>
    <input type="submit" value="Создать">
</form>