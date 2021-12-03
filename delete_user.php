<?php
require_once 'models/FactoryModel.php';

$user = NULL; //Add new user
$id = NULL;
$token = NULL;
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $token = $_GET['token'];
    $userModel->deleteUserById($id); //Delete existing user
}
header('location: list_users.php');
