<?php
require_once 'models/BankModel.php';
$bankModel = new BankModel();

$bank = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    // $id_start = substr($id,3);
    // $id_end=substr($id_start,0,-3);
    $bankModel->deleteBankById($id);//Delete existing user
}
header('location: list_banks.php');
?>