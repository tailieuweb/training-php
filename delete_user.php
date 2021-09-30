<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    //Update SQL Injection - convert id -> int -> string
    $id = isset($_GET['id'])?(string)(int)$_GET['id']:null;
    $userModel->deleteUserById($id);//Delete existing user
}
header('location: list_users.php');
?>