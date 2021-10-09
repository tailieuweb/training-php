<?php
require_once 'models/BankModel.php';
$bankModel = new BankModel();

$bank = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $bankModel->deleteBanksById($id); //Delete existing user
}
header('location: list_banks.php');