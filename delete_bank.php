<?php
require_once 'models/BankModel.php';
$BankModel = new BankModel();

$id = NULL; //Add new user
$user_id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $BankModel->deleteBankById($id);//Delete existing user
}
header('location: list_banks.php');
?>