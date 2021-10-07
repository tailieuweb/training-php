<?php
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = isset($_GET['id']) ? base64_decode($_GET['id']) : null;

// find user
$user = $userModel->getUserByID($id);

// PREPARE DATA FOR CREATE VIEW TOKENS
$payload = new \stdClass();
$payload->name = empty($user) ? null : $user['name'];
$payload->email = empty($user) ? null : $user['email'];

$header = new \stdClass();
$header->alg = "HS256";
$header->typ = "JWT";

$signature = "secret key";

$token = hash_hmac("sha256", base64_encode(json_encode($payload)) . base64_encode(json_encode($header)), $signature);


if (!empty($id) && ($_COOKIE['token'] == $token)) {
    $userModel->deleteUserById($id); //Delete existing user
} else {
    $_SESSION['message'] = 'Methods are not allowed!';
}

//REMOVE DELETE TOKENS
unset($token);

header('location: list_users.php');
