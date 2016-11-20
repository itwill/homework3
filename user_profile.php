<?php
require_once "update.php";
session_start();

$user = null;
if(isset($_SESSION['username'])){
    $user = $_SESSION['username'];
    echo "<p style='background: #ececec;padding:5px;'>Добро пожаловать, $user <br></p><p> На этой странице Вы можете изменить информацию о себе</p>";
} else {
    echo "<a href='index.php'>Для просмотра этой страницы следует авторизоваться</a>";
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Профиль пользователя</title>
</head>
<body>
<p><a href='index.php'>На главную</a> ||||||| <a href='logout.php'>Выйти из аккаунта</a></p>

<p><strong>Информация о пользователе:</strong></p>
<form method="post" action="update.php" enctype="multipart/form-data">
    <label for="name">Имя</label><br>
    <input id="name" type="text" name="name"><br>
    <label for="age">Возраст</label><br>
    <input id="age" type="text" name="age"><br>
    <label for="info">О себе</label><br>
    <textarea name="info" id="" cols="30" rows="10"></textarea><br>
    <label for="user_photo">Фотография пользователя</label><br>
    <input type="file" name="user_photo"><br><br>
    <button type="submit">Сохранить информацию</button>
</form>

</body>
</html>