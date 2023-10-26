<?php
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;

// if (!empty($_GET['id'])) {
//     $id = $_GET['id'];
//     $userModel->deleteUserById($id); //Delete existing user
// }

if (!empty($_POST['id']) && !empty($_POST['token'])) {
    $id = $_POST['id'];
    $token = $_POST['token'];
    var_dump($token);
    if ($token == $_SESSION['token']) {
        $userModel->deleteUserById($id); //Delete existing user
        header('location: list_users.php');
    }
}
header('location: list_users.php');
