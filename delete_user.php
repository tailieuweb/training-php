<?php
session_start();
require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();
$bankModel = $factory->make('bank');
$userDecorator = $factory->make('user-decorator');

$user = NULL; //Add new user
$id = NULL;
$token = NULL;


if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $token = $_GET['token'];
    if ($token == $_SESSION['_token']) {
        $userDecorator->deleteUser($id, $bankModel); //Delete existing user
    }
}

header('location: list_users.php');