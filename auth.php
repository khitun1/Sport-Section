<?php

    if (isset($_POST["login"]) and $_POST["login"]!='')
    {
        try {
            $sql = 'SELECT * FROM user WHERE login=(:login)';
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':login', $_POST['login']);
            $stmt->execute();

        } catch (PDOexception $error) {
            $msg = "Ошибка аутентификации: " . $error->getMessage();
        }

        if ($row=$stmt->fetch(PDO::FETCH_LAZY))
        {
            if (($_POST["password"])!= $row['md5password']) $msg = "Неправильный пароль!";
            else {
                $_SESSION['login'] = $_POST["login"];
                $_SESSION['firstname'] = $row['first_name'];
                $_SESSION['lastname'] = $row['last_name'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['admin'] = $row['is_admin'];
                $msg =  "Вы успешно вошли в систему";
            }
        }
        else $msg =  "Неправильное имя пользователя!";

    }

    if (isset($_GET["logout"]))
    {
        session_unset();
        $_SESSION['msg'] =  "Вы успешно вышли из системы";
        header('Location: http://sport-section.herokuapp.com');
        exit( );
    }