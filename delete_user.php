<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;

$user_arr = $userModel->getUsers();
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    foreach($user_arr as $user){
        if($id === md5($user['id'])){
            $userModel->deleteUserById($user['id']);//Delete existing user
        }
    }
}
header('location: list_users.php');
?>