<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;
if (!empty($_GET['id'])) {
    // var_dump($_GET['id']);
    // die();
    // $id = $_GET['id'];
    // $id_manage = $userModel->substrID($id);
    // $userModel->deleteUserById($id_manage);//Delete existing user
    $id = $_GET['id'];
    $userModel->deleteUserById($id);
}
header('location: list_users.php');
?>