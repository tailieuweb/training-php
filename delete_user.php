<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $id_main = substr($id,3,1);
    $userModel->deleteUserById($id_main);//Delete existing user
}
header('location: list_users.php');
?>