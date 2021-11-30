<?php
require_once "./models/UserModel.php";
$userModel = new UserModel();
var_dump($userModel->findUserById("47"));