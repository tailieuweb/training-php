<?php
// Start the session
session_start();

require_once 'models/FactoryPattern.php';

$userModel = FactoryPattern::make("user");

$user = NULL; //Add new user
$uuid = NULL;

if (isset($_GET['btcsrf']) && $_SESSION["csrf_token"]) {
    if (!empty($_GET['uuid'])) {
        $uuid = $_GET['uuid'];

        // kiểm tra uuid có trên csdl không.

        // Có: thực hiện quy trình xóa
            // kiểm tra người dùng này được quyền xóa bài post này không.
                // Có: xóa luôn bài post
                $userModel->deleteUserUUById($uuid); //Delete existing user
                // Không: Thông báo không được phép xóa

        // không: thông báo.

    } else {
        echo "Unique user id doesn't match!";
        die;
    }
} else {
    echo "Token doesn't match!";
    die;
}

header('location: list_users.php');
