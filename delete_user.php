<?php
session_start();
require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();

$userModel = $factory->make('user');

$user = NULL; //Add new user
$id = NULL;
$token = NULL;

if (isset($_POST['secret'])) {

    $token = $_POST['secret'];
    $id = $_POST['id'];
    if ($token == $_SESSION['_token']) {
        $userModel->deleteUserById($id); //Delete existing user
    }
}

// if (!empty($_GET['id'])) {
//     $id = $_GET['id'];
//     $userModel->deleteUserById($id); //Delete existing user
// }

header('location: list_users.php');
