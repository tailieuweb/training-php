<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();
$token = $userModel->createToken();
$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $userModel->deleteUserById($id, $token);//Delete existing user
}
header('location: list_users.php');
?>