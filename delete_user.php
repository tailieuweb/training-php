<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = base64_decode($_GET['id']);
    $id = substr($id,0,-5);//cat 5 ki tu chuoi 
    $userModel->deleteUserById($id);//Delete existing user
}
header('location: list_users.php');
?>