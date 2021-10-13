<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$_id = NULL;

if (!empty($_GET['id'])) {
    $_id = $_GET['id'];
    $userModel->deleteUserById($_id);//Delete existing user
}
header('location: list_users.php');
?>