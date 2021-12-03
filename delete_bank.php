<?php
require_once 'models/FactoryModel.php';
$factory = new FactoryPattern();

$bankModel = $factory->make('bank');
$bank = NULL; //Add new bank

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    // $id_start = substr($id,3);
    // $id_end=substr($id_start,0,-3);
    $bankModel->deleteBankById($id);//Delete existing user
    // $id = $_GET['id_bank'];
    // $id_start = substr($id,3);
    // $id_end=substr($id_start,0,-3);
    // $bankModel->deleteBankById($id_end);//Delete existing user
    // $bankModel->deleteBankById($id);
}
header('location: list_banks.php');
