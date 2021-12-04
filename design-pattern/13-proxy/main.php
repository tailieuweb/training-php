<?php
require_once "Image.php";
require_once "RealImage.php";
require_once "ProxyImage.php";
$image = new ProxyImage("hinhne.jpg");
$image->display();
echo "<br>";
$image->display();
?>
