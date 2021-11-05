<?php
require_once 'models/FactoryPattent.php';
$factory = new FactoryPattent();
$bankModel = $factory->make('bank');


$user = NULL; //Add new user
$id = NULL;
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $userModel->deleteUserById($id);//Delete existing user
}
header('location: list_users.php');
?>