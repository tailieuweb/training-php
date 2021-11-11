<?php
require_once("models/BankModel.php");
require_once("models/UserModel.php");
require_once("models/UsageModelDecorator.php");
$result = [];
// $banks = new BankModel();
$banks = new UsageModelDecorator(new BankModel());
$users = new UsageModelDecorator(new UserModel());
echo "Information bank: ";
$result1 = $banks->selectData("test1");
$result2 = $users->selectData("test1");
var_dump($result1);
echo "<br>";
echo "<br>";
var_dump($result2);
foreach ($result as $value) {
    // var_dump($value); 
    echo "<br>" . $value['id'] . "<br>" .$value['name'] . "<br>" . $value['cost'];
    echo "<br>";
}
// echo "\n";
// $users = new UserModel();
// echo "Information user: ";
// $result = $users->selectData("test1");
// var_dump($result);



// $redRectangle = new RedShapeDecorator(new Rectangle());
// echo "Rectangle of red border: ";
// $redRectangle->draw();
// echo "<br>";
// $redRectangle->width();
// echo "<br>";
// echo "<br>";


// echo "Circle of red border: ";
// $redCircle = new RedShapeDecorator(new Circle());
// $redCircle->draw();
// echo "<br>";
// $redCircle->width();
// echo "<br>";
// echo "<br>";

?>