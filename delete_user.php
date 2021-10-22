<?php
require_once 'DesignPattern/FactoryPattern.php';
$factory = new FactoryPattern();
$userModel = $factory->make('user');

$user = NULL; //Add new user
$_id = NULL;
$params = [];
if (!empty($_GET['keyword'])) {
    $params['keyword'] = $_GET['keyword'];
    
}
$users = $userModel->getUsers($params);
if (!empty($_GET['id'])&&isset($_GET['token'])&& ($_GET['token']==$_SESSION['token'])) {
    foreach ($users as $user1) {
        if($_GET['id'] == md5($user1['id'])){                      
            $_id = $user1['id'];    
        }
    }  
    $userModel->deleteUserById($_id);
    header('location: list_users.php');      
}
else{
    // header('location: list_users.php');
}
?>