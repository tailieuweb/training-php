<?php
require_once 'models/FactoryPattern.php';
$userModel = new UserModel();
$factory = new FactoryPattern();

$userModel = $factory->make('user');

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $userModel->deleteUserById($id);//Delete existing user
}
header('location: list_users.php');
?>