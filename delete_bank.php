<?php
require_once 'models/FactoryPattern.php';

$factory = new FactoryPattern();

$bankModel = $factory->make('bank');
$bank = NULL; //Add new user
$id = NULL;
$token = NULL;
if (!empty($_GET['id']) && !empty($_GET['token'])) {
    $id = $_GET['id'];
    $token = $_GET['token'];
    $bankModel->deleteBankById($id, $token);//Delete existing user
}
header('location: list_bank.php');
?>