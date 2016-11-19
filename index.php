<?php
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Главная страница</title>
</head>
<body>
<p>Чтобы получить доступ к функционалу, пожалуйста авторизуйтесь!</p>
<form action="post">
    <label for="username">Логин</label>
    <input id="username" type="text" name="username">
    <label for="password">Пароль</label>
    <input id="password" type="password" name="password">
    <button type="submit">Вход</button>
</form>
<p>Нет данных для входа? <a href="signup.php">Зарегистрируйтесь</a></p>
</body>
</html>





<?php

//
//require_once 'login.php';
//$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
//if ($connection > connect_error) die($connection->connect_error);
//
//$query = "SELECT * FROM users";
//$result = $connection > query($query);
//if (!$result) die($connection > error);
//
//for ($i = 0, $length = $result > num_rows; $i < $length;
//     $i++) {
//// получаем $iй элемент результирующего набора $result->data_seek($i);
//// получаем данные строки в виде ассоциативного массива
//    $row = $result > fetch_assoc();
//    echo $row['name'] . '<br />';
//}
//// закрываем соединение с БД $result>close();

?>