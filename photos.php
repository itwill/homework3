<?php

session_start();

$user = null;
if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
    echo "<p style='background: #ececec;padding:5px;'>Добро пожаловать, $user <br><br><a href='index.php'>На главную</a> ||||||| <a href='user_profile.php'>Изменить профиль</a> ||||||| <a href='logout.php'>Выйти из аккаунта</a></p><p> На этой странице Вы можете удалить или переименовать свои фотографии</p>";
} else {
    echo "<a href='index.php'>Для просмотра этой страницы следует авторизоваться</a>";
    exit();
}

$photo_files = scandir('photos/');
//var_dump($photo_files);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Фотографии пользователя</title>
</head>
<body>
<p>Список фотографий:</p>
<?php
if (!empty($photo_files[2])) {
    for ($i = 2; $i < count($photo_files); $i++) {
        echo "<p>$photo_files[$i]</p><a href='photo_rename.php?rename=" . iconv("cp1251", "UTF-8", $photo_files[$i]) . "'>Переименовать</a>&nbsp;&nbsp;&nbsp;<a href='photo_delete.php?deletephoto="
            . iconv("cp1251", "UTF-8", $photo_files[$i]) . "'>Удалить</a>";
    }
} else {
    echo "<p style='color: red;'>В папке photos нет фотографий</p> <a href='user_profile.php'>Добавить фото</a>";
}
?>

</body>
</html>