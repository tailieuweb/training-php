<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;
$params = [];
if (!empty($_GET['keyword'])) {
    $params['keyword'] = $_GET['keyword'];
    
}
$users = $userModel->getUsers($params);

if (!empty($_GET['id'])) {
    foreach ($users as $user1) {
        if($_GET['id'] == md5($user1['id'])){                      
            $_id = $user1['id'];    
        }
    }  
    $userModel->deleteUserById($_id);
    header('location: list_users.php');      
}
?>