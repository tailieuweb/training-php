<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

if (!empty($_POST['name']) && !empty($_POST['password'])) {

    $data = array('name' => $_POST['name'], 'password' => $_POST['password']);
    $userModel->insertUser($data); //add user
}
header('location: list_users.php');
