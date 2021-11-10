<?php
require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();
$bankModel = $factory->make('bank');


//23-4

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $bankModel->deleteBankById($id);//Delete existing user
}
header('location: list_bank.php');
?>