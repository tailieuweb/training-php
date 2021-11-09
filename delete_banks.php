<?php
require_once 'models/BankModel.php';
$bankModel = new BankModel();
//Require model Repository và tạo mới
require_once 'design-pattern/repository/UseRepository.php';
$repository = $bankModel;

$bank = NULL; //Add new bank
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $bankModel = $repository ->deleteBankById($id);//Delete existing banks
}
header('location: list_banks.php');
?>