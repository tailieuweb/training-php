<?php 
session_start();

// -----------Factory------------------
require "../../models/FactoryPattentTwoAdmin.php";
$factory = new FactoryPattentTwoAdmin();
$OrderModel = $factory->make('order');

$protype = NULL; 
$id = NULL;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $OrderModel->DeleteCheckouts($id);
}
header('location: ./index.php');