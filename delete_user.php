<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$uid = NULL;

if (!empty($_GET['uid'])) {
    $uid = $_GET['uid'];
    $userModel->deleteUserByuId($uid); //Delete existing user
}
header('location: list_users.php');
