<?php
require_once "connection.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === POST) {
    // проверка существования данных в форме
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $STH = $DBH->prepare("SELECT username, password FROM users WHERE username=? AND  password=?");
        // назначаем переменные каждому placeholder'у
        $STH->bindParam(1, $username);
        $STH->bindParam(2, $password);
        $STH->execute();
        // режим выборки- указывает вид возвращаемого массива с названиями столбцов в виде ключей
        $STH -> setFetchMode(PDO::FETCH_ASSOC);
        $row = $STH -> fetch(); // получили данные из БД (0 или 1), осталось сравнить
        if (!empty($row)) {
            header('Location: user_profile.php'); // перенаправление на профиль пользователя
        } else {
            return $login_err = "<label style='color:red;'>Ошибка авторизации. Неправильный логин или пароль</label><br>";
        }
    } else {
        return $empty_input = "<label style='color:red;'>Заполнены не все поля</label><br>";
    }
}
