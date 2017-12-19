<?php

// will hold most, if not all of the functions that will be used throughout the game

# Simple functions/multi-user library file

function u($string) {

    $string = trim(htmlentities($string,ENT_QUOTES,"UTF-8"));
    return $string;
}


function n($string) {

    $string = trim(filter_var($string,FILTER_VALIDATE_INT));
    return $string;
}


function e($string) {

    $string = trim($string);
    $string = strip_tags($string);
    $string = filter_var($string,FILTER_VALIDATE_EMAIL);


 //   $string = trim(strip_tags(filter_var($string,FILTER_VALIDATE_EMAIL)));
    return $string;
}

function ve($email) {
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return 1;
} else {
    return 0;
}
}




?>
