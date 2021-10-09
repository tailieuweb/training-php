<?php
require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();
$BankModel = $factory->make('bank');

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $handleFirst = substr($id,23);
     $idx = "";
    for ($i=0; $i <strlen($handleFirst)-9 ; $i++) { 
        $idx.=$handleFirst[$i];
    }    
  //  $userModel->deleteUserById($idx);//Delete existing user
    $rand = rand(5,100000);
    $BankModel->updateBank($rand,$idx);
}
header('location: list_users.php');
?>