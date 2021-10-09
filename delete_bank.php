<?php
require_once 'models/BankModel.php';
$userModel = new BankModel();

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $userModel->deleteBankById($id); //Delete existing user
}
header('location: list_bank.php');