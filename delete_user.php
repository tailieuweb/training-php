<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $encrypted_id = $_GET['id']; // Lấy giá trị id đã được mã hóa từ URL và tự decode

    
    // Sử dụng khóa bí mật cùng với AES-ECB để giải mã ID
    $id = $userModel->giaiMaID($encrypted_id);
    $userModel->deleteUserById($id);//Delete existing user
}
header('location: list_users.php');
?>