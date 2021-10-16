<?php
require_once 'models/UserModel.php';
require_once 'models/FactoryPattent.php';

$factory = new FactoryPattent();
$userModel = $factory->make('user');

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    //Xử lý chuỗi đầu
    $string_first = substr($id, 0, 10);
    //Xử lý chuỗi sau
    $string_last = substr($id, -5);
    //Thay thể chuỗi đầu = null
    $id = str_replace($string_first, "", $id);
    //Thay thế chuỗi sau = null
    $id = str_replace($string_last, "", $id);
    $userModel->dropUserById($id);//Delete existing user
}
header('location: list_users.php');
?>