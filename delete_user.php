<?php
require_once 'models/UserModel.php';
$userModel = UserModel::getInstance();


//23-4

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $userModel->deleteUserById($id);//Delete existing user
}
header('location: list_users.php');
?>