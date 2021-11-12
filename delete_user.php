<?php
require_once 'models/UserModel.php';
require_once 'models/FactoryPattent.php';

$factory = new FactoryPattent();
$userModel = $factory->make('user');

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $id_start = substr($id,3);
    $id_end=substr($id_start,0,-3);
    $userModel->deleteUserById($id_end);//Delete existing user
}
header('location: list_users.php');