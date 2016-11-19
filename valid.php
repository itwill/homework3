<?php

function validText($text){
    $text = htmlspecialchars(stripcslashes(trim($text)));
    return $text;
}