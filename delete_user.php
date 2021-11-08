<?php
session_start();
require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();

$userModel = $factory->make('user');

$user = NULL; //Add new user
$id = NULL;
$token = NULL;


if (!empty($_GET['id']) && !isset($_SESSION['error'])) {
    $id = $_GET['id'];
    $token = $_GET['token'];
    if ($token == $_SESSION['_token']) {
        $userModel->deleteUserById($id); //Delete existing user
    }
}

header('location: list_users.php');
