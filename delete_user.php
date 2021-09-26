<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;

$user_arr = $userModel->getUsers();

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    foreach ($user_arr as $key) {
        if($id === md5($key['id'])){
            $userModel->deleteUserById($key['id']);//Delete existing user         
        }
    }
  
}
header('location: list_users.php');
?>