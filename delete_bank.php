<?php
require_once 'models/BankModel.php';
$bankModel = new BankModel();
$id_bank = NULL;
if (!empty($_GET['bank_id'])) {
    $id_bank = $_GET['bank_id'];
    var_dump($id_bank);
    $bank = $bankModel->deletebankById($id_bank);//Delete existing bank
    
}
header('location: list_banks.php');
?>