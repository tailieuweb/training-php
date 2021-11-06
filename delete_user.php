<?php
require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();
$bankModel = $factory->make('bank');
$userModel = $factory->make('user');

//23-4

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = base64_decode($_GET['id']);
    $newid = substr($id,23);
    try{
        $userModel->deleteUserById($newid, $bankModel);//Delete existing user
    }
    catch(Throwable $e){

    }
    
}
header('location: list_users.php');
?>