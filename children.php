<h1>Список детей:</h1>
<table border='1'>
    <?php
    $result_groups = $conn->query("SELECT *, children.id AS id_child FROM class, children WHERE children.id_class = class.id");
    echo '<tr><td>ID</td><td>Имя ребёнка</td><td>Дата Рождения</td><td>Группа </td><td>Фотография</td><td></td></tr>';
    while ($row = $result_groups->fetch()) {
        echo '<tr>';
        echo '<td>'.$row['id_child'].'</td>
              <td>'.$row['first_name_child']." ".$row['last_name_child'].'</td>
              <td>'.$row['birthday'].'</td>
              <td>'. $row['class'].'</td>
              <td> <img app="'. $row['picture_url'].'" height="60px" </td>';
        echo '<td><a href=delete_children.php?id='.$row['id_child'].'>Удалить</a></td>';
        echo '</tr>';
    }
    ?>
</table>
<h2>Добавление ребёнка</h2>
<form method="post" action="add_children.php" enctype="multipart/form-data">
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
    <p><label>
            Изображение: <input type="file" name="filename">
        </label></p>
    <input type="submit" value="Создать">
</form>
