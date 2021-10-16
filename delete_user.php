<?php
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;
$token = filter_input(INPUT_GET, 'token', FILTER_SANITIZE_STRING);
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    if (!$token || $token !== $_SESSION['token']) {
        header('location: list_users.php');
    } else {      
        $userModel->deleteUserById($id);
    }
}
header('location: list_users.php');
?>