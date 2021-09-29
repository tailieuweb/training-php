<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;

if (!empty(strip_tags($_GET['id']))) {
    $id = strip_tags($_GET['id']);
    $userModel->deleteUserById($id);//Delete existing user
}
header('location: list_users.php');
?>