<?php
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();


//23-4

$user = NULL; //Add new user
$id = NULL;
if (!empty($_GET['id']) && !empty($_GET['token'])) {
    
     //var_dump( $_SESSION['token']);  var_dump($_GET['token']);die();
    if($_GET['token'] == $_SESSION['token']){
        $id = base64_decode($_GET['id']);
    $newid = substr($id,3,-2);
    $userModel->deleteUserById($newid);//Delete existing user
    }
    
  
}
header('location: list_users.php');
?>