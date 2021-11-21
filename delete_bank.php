<?php
require_once 'models/BankModel.php';
require_once 'models/FactoryPattern.php';

$factory = new FactoryPattern();
$bankModel = $factory->make('bank');

$bank = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $id_start = substr($id,3);
    $id_end=substr($id_start,0,-3);
    $bankModel->deleteBankById($id_end);//Delete existing user
}
header('location: list_banks.php');
?>