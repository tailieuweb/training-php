<?php
require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();
$userModel = $factory->make('user');
$bankModel = $factory->make('bank');
$user = NULL; //Add new user
$id = NULL;

if (!empty(strip_tags($_GET['id']))) {
    $id = strip_tags($_GET['id']);
    $userModel->deleteUserById($id);//Delete existing user
}
header('location: list_users.php');
?>