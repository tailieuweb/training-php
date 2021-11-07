
<?php
session_start();
require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();

$bankRepository = $factory->make('repository');

$user = NULL; //Add new user
$id = NULL;
if (!empty($_GET['id'])) {
   
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];   
        $bankRepository->deleteBankById($id);//Delete existing user
    }
    
  
}
header('location: list_banks.php');
?>