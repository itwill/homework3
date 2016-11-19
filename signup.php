<?php
require_once "connection.php";
require_once  "valid.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === POST) {
    // проверка существования данных в форме
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = validText($_POST['username']);
        $password = validText($_POST['password']);
        $STH = $DBH->prepare("INSERT INTO users(username, password) VALUES (?,?)");
        $STH->bindParam(1, $username);
        $STH->bindParam(2, $password);
        $STH->execute();
        $new_account = "<label style='color:red;'>Регистрация прошла успешно, теперь Вы можете авторизоваться</label><br>";
        header('Location: index.php'); // перенаправление на главную страницу
    } else {
        return $empty_input = "<label style='color:red;'>Заполнены не все поля. Укажите логин и пароль</label><br>";
    }
}

