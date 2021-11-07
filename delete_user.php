
<?php
session_start();
require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();

$userRepository = $factory->make('repository');


//23-4

$user = NULL; //Add new user
$id = NULL;
if (!empty($_GET['id'])) {
   
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];   
        $userRepository->deleteUserById($id);//Delete existing user
    }
    
  
}
header('location: list_users.php');
?>