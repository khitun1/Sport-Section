<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Сведения о пользователе:</h1>
<ul>
    <?php foreach ($data['users'] as $user): ?>
        <li>
            <?=$user->first_name?>
            <?=$user->last_name?>
            <?=$user->login?>
        </li>
    <?php endforeach; ?>

</ul>
</body>
</html>