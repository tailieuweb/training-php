<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$uuid = NULL;

if (!empty($_GET['uuid'])) {
    $uuid = $_GET['uuid'];
    $userModel->deleteUserUUById($uuid);//Delete existing user
}
header('location: list_users.php');
?>