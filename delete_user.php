<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$key_code_f = "uea872dJDFD9HFYyytrt909";
$key_code_l = "dsaj93nlds";

//23-4

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $userModel->deleteUserById('id');//Delete existing user
}
header('location: list_users.php');
?>