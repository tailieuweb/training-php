<?php
// require_once 'models/BankModel.php';
require_once 'models/FactoryPattern.php';
require_once 'models/UsageModelDecorator.php';
// $bankModel = new BankModel();
$factory = new FactoryPattern();
$bankModel = new UsageModelDecorator($factory->make('bank'));
$bank = NULL; //Add new bank
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $bankModel->deleteData($id);//Delete existing banks
}
header('location: list_banks.php');
?>