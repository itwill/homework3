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

$dir = "photos/";
$file = validText($_GET['rename']);
var_dump($file);

//    echo $_POST['new_file_name'];
$new_file_name = validText($_POST['new_file_name']); // новое имя файла из формы
$ext = pathinfo($file, PATHINFO_EXTENSION);
$new_name_updated = $new_file_name . "." . $ext;

if (isset($_POST['new_file_name'])) {
    rename($dir . $file, $dir . iconv('UTF-8', 'cp1251', $new_name_updated)); // переименываем
    // обновляем значения в БД
    $STH = $DBH->prepare("UPDATE users SET photo=? WHERE photo=?");
    $STH->bindParam(1, $new_name_updated);
    $STH->bindParam(2, $file);
    $STH->execute();
    $STH -> setFetchMode(PDO::FETCH_ASSOC);
    $STH -> fetch();
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Переименование фотографии пользователя</title>
</head>
<body>
<p><a href="photos.php">Вернуться к списку фотографий</a></p>
<p>Переименовать файл: <?php (isset($_POST["new_file_name"])) ? print $_POST["new_file_name"] : print $file; ?></p>
<img src="photos/<?php print $file; ?>" height="50"><br><br>

<form action="" method="post">
    <label for="new_file_name">Введите новое имя файла</label><br>
    <input type="text" name="new_file_name">
    <button type="submit">Изменить</button>
</form>
</body>
</html>
