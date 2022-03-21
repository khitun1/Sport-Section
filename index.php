<?php
    require "dbconnect.php";
    require "auth.php";
    require "menu.php";
    switch ($_GET['page']){
        case 'children':
            require "children.php";
            break;
        case 'class':
            require "class.php";
            break;
        case 'plan':
            require "plan.php";
            break;
        case 'visit':
            require "visit.php";
            break;
        case 'payment':
            require "payment.php";
            break;
    }
    require "message.php";
    $_SESSION['msg'] = '';