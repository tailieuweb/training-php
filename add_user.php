<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

if (!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['fullname']) && !empty($_POST['email'])) {

    $data = array('name' => $_POST['name'], 'password' => $_POST['password'], 'fullname' => $_POST['fullname'], 'email' => $_POST['email']);
    $userModel->insertUser($data); //add user
}
header('location: list_users.php');
