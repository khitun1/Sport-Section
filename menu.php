<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<header>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <p class="navbar-brand">Sport-section</p>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <?php
                    if (!isset($_SESSION['login']) )
                    {
                    }

                    elseif($_SESSION['admin'] == 1)
                    {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php?page=class">Группы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=children">Дети</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=plan" >Плановые оплаты</a>
                        </li>
                    <?php
                    }
                    else
                    {?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php?page=visit">Посещение</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=payment">Оплата</a>
                        </li>
                    <?php
                    }
                    ?>
                    ?>
                </ul>
                <form class="d-flex" method="post">
                    <?php
                    if (!isset($_SESSION['login']) )
                    {?>
                    <input class="form-control me-2" type="text" name='login' placeholder="Login">
                    <input class="form-control me-2" type="text" name='password' placeholder="Password">
                    <button class="btn btn-outline-success" type="submit">Sign in</button>
                    <?php
                    }
                    else
                    {?>
                        <p class="form-control me-2">Добро пожаловать,<?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']?></p>
                        <button class="btn btn-outline-success" type="submit"><a href='?logout=1'>Sign out</a></button>;
                    <?php
                    }
                    ?>
                </form>
            </div>
        </div>
    </nav>
    <br><br><br><br>
</header>