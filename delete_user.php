<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = base64_decode($_GET['id']);
    $newid = substr($id,11);
    $userModel->deleteUserById($newid);//Delete existing user
}
header('location: list_users.php');
?>