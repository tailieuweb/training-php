<?php
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = $_GET['id'] ? $_GET['id'] : null;

if (!empty($id) && !empty($_COOKIE['_token'])) {
    $userModel->deleteUserById(base64_decode($_GET['id'])); //Delete existing user
}
else{
    $_SESSION['message'] = 'Methods are not allowed!';
}

header('location: list_users.php');
