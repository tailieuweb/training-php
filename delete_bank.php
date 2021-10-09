<?php
<<<<<<< HEAD

=======
>>>>>>> origin/1-php-202109/2-groups/9-I/master
require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();

$bankModel = $factory->make('bank');

$bank = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $bankModel->deleteBankById($id); //Delete existing user
}
header('location: list_banks.php');