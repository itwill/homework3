<?php
// Принято
require_once("login.php");
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Главная страница</title>
</head>
<body>
<p>Чтобы получить доступ к функционалу, пожалуйста авторизуйтесь!</p>
<form method="post" action="">
    <?php echo $empty_input; ?>
    <?php echo $login_err; ?>
    <?php echo $new_account; ?>
    <label for="username">Логин</label>
    <input id="username" type="text" name="username">
    <label for="password">Пароль</label>
    <input id="password" type="password" name="password">
    <button type="submit">Войти</button>
    <p>Нет аккаунта - <a href="registration.php">Зарегистрируйся</a></p>
</form>

</body>
</html>