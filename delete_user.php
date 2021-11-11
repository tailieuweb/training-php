<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();
//Require model Repository và tạo mới
require_once 'design-pattern/repository/UseRepository.php';
$repository = $userModel;

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    //Sử dụng repository xoá user id
    $user = $repository ->deleteUserById($id);
}
header('location: list_users.php');
?>