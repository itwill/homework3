<?php
require_once "signup.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Регистрация нового пользователя</title>
</head>
<body>
<p>Введите логин и пароль для регистрации нового пользователя</p>
<form method="post" action="">
    <?php echo $empty_input; ?>
    <label for="username">Логин</label>
    <input id="username" type="text" name="username">
    <label for="password">Пароль</label>
    <input id="password" type="password" name="password">
    <button type="submit">Создать аккаунт</button>
</form>

</body>
</html>