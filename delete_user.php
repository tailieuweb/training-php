<?php
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();
$user = null; //Add new user
$uid = null;
//
if (!empty($_GET['token']) && hash_equals($_SESSION['token'], $_GET['token'])) {
	if (!empty($_GET['uid'])) {
		$uid = $_GET['uid'];
		$userModel->deleteUserByUId($uid); //Delete existing user
	}
}
//
header('location: list_users.php');
