<?php
session_start();
require 'models/FactoryPattent.php';
require 'models/Cart.php';
$factory = new FactoryPattent();
$HomModel = $factory->make('home');

if (isset($_SESSION["mycart"]) && isset($_GET["id"])) {
    $id=$_GET["id"];
    $product = $HomModel->firstProductDetail($id);
    Cart::DeleteCart($product[0]['id']);
    header("Location: cart.php");
    exit; // dừng các mã chạy phía dưới;
}

?>