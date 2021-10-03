<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;

if (!empty($_POST['id'])) {
    $id = $_POST['id'];
    $userModel->deleteUserById($id);//Delete existing user
}
header('location: list_users.php');
?>