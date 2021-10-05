<?php
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();


$user = NULL; //Add new user
$id = $_GET['id'] ? $_GET['id'] : null;
$token = $_GET['token'] ? base64_decode($_GET['token']) : null;

if (!empty($id) && $token == $_SESSION['_token']) {
    $userModel->deleteUserById(base64_decode($_GET['id'])); //Delete existing user
}
header('location: list_users.php');
