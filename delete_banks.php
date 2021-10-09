<?php
require_once 'models/BankModel.php';
$BankModel = new BankModel();

$banks = NULL; //Add new Bank
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $bankModel->deleteBankById($id);//Delete existing bank
}
header('location: list_bank.php');
?>