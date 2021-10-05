<?php
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();


$user = NULL; //Add new user
$id = $_GET['id'] ? $_GET['id'] : null;
$token = $_GET['token'] ? $_GET['token'] : null;

if (!empty($id) && $id == $_SESSION['_token'][0] && $token == $_SESSION['_token'][1]) {
    $userModel->deleteUserById(base64_decode($_GET['id'])); //Delete existing user
}
header('location: list_users.php');
