<?php
require_once 'models/BankModel.php';
$bankModel = new BankModel();


//23-4

$bank = NULL; //Add new bank
$id = NULL;

if (!empty($_GET['id'])) {

    $bankModel->deleteBankById($_GET['id']);//Delete existing bank
}
header('location: list_bank.php');
?>