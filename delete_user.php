<?php
require_once 'models/FactoryPattern.php';

$factory = new FactoryPattern();

$userModel = $factory->make('user');

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $userRepository->deleteUserById($id);//Delete existing user
}
header('location: list_users.php');
