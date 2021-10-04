<?php
// Start the session
session_start();

require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$uuid = NULL;

if (isset($_GET['btcsrf']) && $_SESSION["csrf_token"]) {
    if (!empty($_GET['uuid'])) {
        $uuid = $_GET['uuid'];
        $userModel->deleteUserUUById($uuid); //Delete existing user
    } else {
        echo "Unique user id doesn't match!";
        die;
    }
} else {
    echo "Token doesn't match!";
    die;
}

header('location: list_users.php');
