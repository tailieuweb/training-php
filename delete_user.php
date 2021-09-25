<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    //Lấy chuỗi nối đầu
    $start = substr($id, 0, 5);
    //Lấy chuỗi nối cuối
    $end = substr($id, -5);
    //Replace chuỗi đầu
    $id = str_replace($start, "", $id);
    //Replace chuỗi cuối
    $id = str_replace($end, "", $id);
    
    $userModel->deleteUserById($id);//Delete existing user
}
header('location: list_users.php');
?>