<?php
require_once 'repositories/UserRepository.php';
$userRepository = new UserRepository();

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $userRepository->deleteUserById($id);//Delete existing user
}
header('location: list_users.php');
