<?php
require "dbconnect.php";
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<h1>Таблица посещений:</h1>
<table border='1'>
    <?php
    if ($_GET['class_show'] == NULL and $_GET['child_show'] == NULL and $_GET['date_show'] == NULL) // all NULL
    {
        $result_visit = $conn->query("SELECT *, visit.id AS id_visit FROM class, children, visit WHERE class.id_user=". $_SESSION['id'].
        " AND children.id_class= class.id AND visit.id_children = children.id");
    }

    elseif ($_GET['class_show'] != NULL and $_GET['child_show'] == NULL and $_GET['date_show'] == NULL) // second and third NULL
    {
        $result_visit = $conn->query("SELECT *, visit.id AS id_visit FROM class, children, visit WHERE class.id =".$_GET['class_show'].
            " AND children.id_class= class.id AND visit.id_children = children.id");
    }

    elseif ($_GET['class_show'] != NULL and $_GET['child_show'] != NULL and $_GET['date_show'] == NULL) // third NULL
    {
        $result_visit = $conn->query("SELECT *, visit.id AS id_visit FROM class, children, visit WHERE class.id =".$_GET['class_show'].
            " AND children.id_class = class.id AND children.id =". $_GET['child_show']. " AND visit.id_children = children.id");
    }

    else
    {
        $result_visit = $conn->query("SELECT *, visit.id AS id_visit FROM class, children, visit WHERE class.id =".$_GET['class_show'].
            " AND children.id_class=class.id AND children.id =". $_GET['child_show']. " AND visit.id_children = children.id AND visit.date ='".$_GET['date_show']. "'");
    }

    echo '<tr><td>Номер группы</td><td>Имя</td><td>Дата</td><td>Посещение</td></tr>';
    while ($row = $result_visit->fetch()) {
        echo '<tr>';
        echo '<td>' . $row['class'] . '</td><td>' . $row['first_name_child'] .
            " ". $row['last_name_child']. '</td><td>'.
            $row['date'] .'</td><td>'. $row['visit'] .'</td>' ;
        echo '<td><a href=mark.php?id='.$row['id_visit'].'&class='.$_GET['class_show'].
                '&child='.$_GET['child_show']. '&date='. $_GET['date_show']. '>Отметить</a></td>';
        echo '</tr>';
    }
    ?>
</table>
<button ><a href="index.php?page=visit"/>Назад</button>