<h1>Список детей:</h1>
<table border='1'>
    <?php
    $result_groups = $conn->query("SELECT *, children.id AS id_child FROM class, children WHERE children.id_class = class.id");
    echo '<tr><td>ID</td><td>Имя ребёнка</td><td>Дата Рождения</td><td>Группа</td></tr>';
    while ($row = $result_groups->fetch()) {
        echo '<tr>';
        echo '<td>'.$row['id_child'].'</td><td>'.$row['first_name_child']." ".$row['last_name_child'].'</td>
            <td>'.$row['birthday'].'</td><td>'. $row['class'].'</td>';
        echo '<td><a href=delete_children.php?id='.$row['id_child'].'>Удалить</a></td>';
        echo '</tr>';
    }
    ?>
</table>
<h2>Добавление ребёнка</h2>
<form method="get" action="add_children.php">
    <p>Имя:</p>
    <input type="text" name="first_name">
    <p>Фамилия:</p>
    <input type="text" name="last_name">
    <p>Дата рождения:</p>
    <input type="date" name="birthday">
    <select name = "group">
        <option disabled selected>Выберите группу</option>
        <?php
        $result_group = $conn->query("SELECT * FROM class");
        while ($row_group = $result_group->fetch())
        {
            $group = $row_group['class'];
            echo '<option value=' . $row_group['id']. '>'. $group. '</option>>';
        }
        ?>
    </select>
    <input type="submit" value="Создать">
</form>
