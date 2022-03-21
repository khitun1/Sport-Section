<?php
    if (!isset($_SESSION['login']) )
    {
        echo "<form method='post'>";
        echo "Имя пользователя:<input type=text name='login'/><br><br>";
        echo "Пароль:<input type=password name='password'/><br><br>";
        echo "<input type='submit' value='Войти'/>";
        echo "</form>";
    }
    else {
        echo "Добро пожаловать, " . $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] . "<br>";
        echo "<a href='?logout=1'>Выйти из системы</a>";

    }

    if(isset($_SESSION['login']))
    {
        if($_SESSION['admin'] == 1)
        {?>
            <ul >
                <li style="display: inline"><a href="index.php?page=class">Группы</a></li>
                <li style="display: inline"><a href="index.php?page=children">Дети</a></li>
                <li style="display: inline"><a href="index.php?page=plan">Плановые оплаты</a></li>
            </ul>
        <?php   }
        else
        {?>
            <ul >
                <li style="display: inline"><a href="index.php?page=visit">Посещение</a></li>
                <li style="display: inline"><a href="index.php?page=payment">Оплата</a></li>
            </ul>
        <?php }
    }

?>





