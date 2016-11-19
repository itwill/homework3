<?php
//print_r(PDO::getAvailableDrivers());

try {
    $DBH = new PDO("mysql:host=localhost; dbname=hw_bd", "root", "");
} catch (PDOException $e) {
    echo $e -> getMessage();
}
