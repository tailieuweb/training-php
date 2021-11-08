<?php

require_once 'proxypattern/User.php';
require_once 'proxypattern/RealUser.php';
require_once 'proxypattern/UserProxy.php';
$userModel = new UserProxy();
$user = NULL; //Add new user
$id = NULL;


if (!empty($_GET['id'])) {
    $id = $_GET['id'];

if (!empty(strip_tags($_GET['id']))) {
    $id = strip_tags($_GET['id']);
     $id = isset($_GET['id'])?(string)(int)$_GET['id']:null;
	 $id = $_GET['id'];
    $handleFirst = substr($id,23);
     $idx = "";
    for ($i=0; $i <strlen($handleFirst)-9 ; $i++) { 
        $idx.=$handleFirst[$i];
    }    
     $userModel->deleteUserandBank($id);//Delete existing user
}
header('location: list_users.php');
}
?>