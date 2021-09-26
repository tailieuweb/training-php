<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;
$uid = NULL;
if (!empty($_GET['uid'])) {
    $uid = $_GET['uid'];
    $userModel->deleteUserByUId($uid); //Delete existing user
}
header('location: list_users.php');
?>