<?php
require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();
$bankModel = $factory->make('bank');
$userModel = $factory->make('user');


//23-4

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    try{
        $userModel->deleteUserById($id, $bankModel);//Delete existing user
    }
    catch(Throwable $e){

    }
}
header('location: list_bank.php');
?>