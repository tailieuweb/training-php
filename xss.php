<?php
function  custom_htmlspecialchars($string) {
   
    $string = str_replace("&", "&amp", $string);
    $string = str_replace("<", "&l", $string);
    $string = str_replace(">", "&g", $string);
    $string = str_replace('"', "&qu", $string);
    $string = str_replace("'", "&#", $string);
    return $string;
}

$string = '<script>alert("Hello, XSS!");</script>';
echo custom_htmlspecialchars($string);