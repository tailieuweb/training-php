<?php
require_once("Circle.php");
require_once("Rectangle.php");
require_once("RedShapeDecorator.php");

$circle = new Circle();
echo "Circle with normal border: ";
$circle->draw();
echo "<br>";
echo "<br>";


$redRectangle = new RedShapeDecorator(new Rectangle());
echo "Rectangle of red border: ";
$redRectangle->draw();
echo "<br>";
echo "<br>";


echo "Circle of red border: ";
$redCircle = new RedShapeDecorator(new Circle());
$redCircle->draw();
echo "<br>";
echo "<br>";

?>