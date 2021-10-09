<?php
<<<<<<< HEAD
require_once 'models/BankModel.php';
$bankModel = new BankModel();

=======
require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();

$bankModel = $factory->make('bank');

>>>>>>> 1-php-202109/2-groups/9-I/1-25-Le
$bank = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
<<<<<<< HEAD
    $bankModel->deleteBankById($id); //Delete existing user
=======
    $bankModel->deleteBanksById($id); //Delete existing user
>>>>>>> 1-php-202109/2-groups/9-I/1-25-Le
}
header('location: list_banks.php');