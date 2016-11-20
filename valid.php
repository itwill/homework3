<?php

function validText($text)
{
    $text = htmlspecialchars(stripcslashes(trim($text)));
    return $text;
}

function validPhoto($file)
{
    if (isset($file)) {
        $dir = 'photos';
        // проверяем загружаемую фотографию
        $photo_ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        $extention = ['png','gif','jpg','jpeg'];
        // проверка соответствия нужным расширениям
        if ($file === ""){
            return false;
        }

        if (!in_array($photo_ext, $extention)) {
            echo "Неправильный файл. Загрузите картинку";
            return false;
        }
        return $file;
    }
}