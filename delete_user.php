<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    // Get all users from users table
    $users = $userModel->getUsers();

    // Compare user id from users table with $_GET['id']
    foreach ($users as $user) {
        if (md5($user['id']) == $id) {
            $id  = $user['id'];
            break;
        }
    }

    $userModel->deleteUserById($id); //Delete existing user
}
header('location: list_users.php');
