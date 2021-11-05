<?php
require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();
$repository = $factory->make('Repository');

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $user = $repository->deleteUserById($id);//Delete existing user
}
header('location: list_users.php');
?>