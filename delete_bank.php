<?php
session_start();
require_once 'models/FactoryPattern.php';

$factory = new FactoryPattern();

$bankModel = $factory->make('bank');

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $bankModel->deleteBankById($id);//Delete existing user
}
header('location: list_bank.php');
?>