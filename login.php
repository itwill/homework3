<?php
require_once "connection.php";
require_once "valid.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === POST) {
    // проверка существования данных в форме
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = validText($_POST['username']);
        $password = validText($_POST['password']);
        $STH = $DBH->prepare("SELECT username, password FROM users WHERE username=? AND  password=?");
        // назначаем переменные каждому placeholder'у
        $STH->bindParam(1, $username);
        $STH->bindParam(2, $password);
        $STH->execute();
        // режим выборки- указывает вид возвращаемого массива с названиями столбцов в виде ключей
        $STH -> setFetchMode(PDO::FETCH_ASSOC);
        $row = $STH -> fetch();

        if (!empty($row)) {
//            print_r($row);
            // если в БД присутствует запись, то присваиваем это значение сессии
            $_SESSION['username'] = $username;
            header('Location: user_profile.php'); // перенаправление на профиль пользователя
        } else {
            return $login_err = "<label style='color:red;'>Ошибка авторизации. Неправильный логин или пароль</label><br>";
        }
    } else {
        return $empty_input = "<label style='color:red;'>Заполнены не все поля</label><br>";
    }
}
