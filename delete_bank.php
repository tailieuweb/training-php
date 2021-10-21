<?php
require_once 'models/FactoryPattern.php';
require_once 'models/SingletonPattern.php';

$factory = new FactoryPattern();
$singleton = new SingletonPattern();


$bankModel = $singleton->make('bank');

$bank = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $bankModel->deleteBankById($id); //Delete existing user
}
header('location: list_banks.php');