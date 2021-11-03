<?php
require_once 'models/UserModel.php';
$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    UserModel::getInstance()->deleteUserById($id);//Delete existing user
}
header('location: list_users.php');
?>