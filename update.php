<?php

require_once "connection.php";
require_once "valid.php";
session_start();

$STH = $DBH->prepare("SELECT name, age, info FROM users WHERE username=?");
$STH->bindParam(1, $_POST['username']);
$STH->execute();
$STH->setFetchMode(PDO::FETCH_ASSOC);
$STH->fetch();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = validText($_POST['name']);
    if ($name === "") {
        $name = null;
    }
    $age = validText($_POST['age']);
    if ($age === "") {
        $age = $row["age"];
    } elseif (filter_var($age, FILTER_VALIDATE_INT) === false) {
        echo "Укажите Возраст числом";
        $age = $row["age"];
    }

    $info = validText($_POST['info']);
    if ($info === "") {
        $info = $row["info"];
    }

    //$photo = $_FILES['photo'];
    // проверка файла изображения

    $STH = $DBH->prepare("UPDATE users SET name=?,age=?,info=? WHERE username=?");
    $STH->bindParam(1, $name);
    $STH->bindParam(2, $age);
    $STH->bindParam(3, $info);
    $STH->bindParam(4, $_SESSION['username']);
    $STH->execute();
    $STH->setFetchMode(PDO::FETCH_ASSOC);
    $STH->fetch();
}




