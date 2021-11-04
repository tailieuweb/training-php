<?php
//require_once 'models/BankModel.php';
require_once 'models/FactoryPattern.php';
//$bankModel = new BankModel();
$factory = new FactoryPattern();
//factory make bank
$bankModel  = $factory->make('bank');

$bank = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $bankModel->deleteBankById($id);//Delete existing user
}
header('location: list_bank.php');
?>