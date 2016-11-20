<?php
require_once "connection.php";
require_once "valid.php";
session_start();

$user = null;
if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
    echo "<p style='background: #ececec;padding:5px;'>Добро пожаловать, $user <br><br><a href='index.php'>На главную</a> ||||||| <a href='user_profile.php'>Изменить профиль</a> ||||||| <a href='logout.php'>Выйти из аккаунта</a></p>";
} else {
    echo "<a href='index.php'>Для просмотра этой страницы следует авторизоваться</a>";
    exit();
}

echo "<p><a href='photos.php'>Вернуться к списку фотографий</a></p>";

$dir = "photos/";
$file = validText($_GET['deletephoto']);
$photo_path = $dir . $file;
//var_dump($file);
if (!unlink($photo_path)) {
    echo "<p>Не удалось удалить файл</p>";
} else {
    echo "Файл удален из БД";
    $STH = $DBH ->prepare("UPDATE users SET photo=null WHERE photo=?");
    $STH -> bindParam(1, $file);
    $STH -> execute();
//    header("Location: photos.php");
}

?>