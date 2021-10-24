<?php
require_once("Banks100.php");
require_once("UserModel.php");
require_once("BankDecorator.php");
require_once("Sale.php");

$name = "Thai";
$password = "sahuynh1";
$fullname = "Ngo Thanh Thai";
$email = "ngothai123@gmail.com";
$type = "admin";


// $data = [
//     "name" => $name,
//     "password" =>$password,
//     "fullname" => $fullname,
//     "email" => $email,
//     "type" => $type
// ];
$bank = new UserModel();
echo "Bank100 of red border: ";
$bank->option();

echo "<br>";
echo "<br>";


// echo "Bank200 of red border: ";
// $redCircle = new Sale(new Banks200());
// $redCircle->option();
// echo "<br>";
// echo "<br>";

?>