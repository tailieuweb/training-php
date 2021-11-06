<?php
require_once("models/BankModel.php");
require_once("models/UserModel.php");
// require_once("models/UserModelDecorator.php");
$result = [];
$banks = new BankModel();
echo "Information bank: ";
$result = $banks->selectData("test1");
$banks->deleteData(4);
var_dump($result);
// foreach ($result as $value) {
//     echo $value['id'] . $value['cost'];
// }
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