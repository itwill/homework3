<?php

require_once "connection.php";
require_once "valid.php";

session_start();


$STH = $DBH->prepare("SELECT name, age, about FROM users WHERE username=?");
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
    }
    $about = validText($_POST['about']);
    if ($about === "") {
        $age = $row["about"];
    }
}


