<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();


//23-4

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = base64_decode($_GET['id']);
    $newid = substr($id,23);
    $userModel->deleteUserById($newid);//Delete existing user
}
header('location: list_users.php');
?>