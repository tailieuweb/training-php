<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();
$user = NULL; //Add new user
$id = NULL;
$token = NULL;
if (!empty($_GET['id']) && !empty($_GET['token'])) {
    $id = $_GET['id'];
    $token = $_GET['token'];
    $userModel->deleteUserById($id, $token);//Delete existing user
}
header('location: list_users.php');
?>