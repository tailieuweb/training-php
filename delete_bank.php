<?php
require_once 'models/BankModel.php';
$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    BankModel::getInstance()->deleteBankById($id);
}
header('location: list_bank.php');
