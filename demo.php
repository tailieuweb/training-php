<?php

require_once "./models/UserModel.php";


$userModel=new UserModel();

/* $input = []; 
$input["name"] = "khnhn";
$input["fullname"] = "insert";
$input["email"] = "insert@gmail.com";
$input["type"] = "user";
$input["password"] = "123";  */
$params = ["keyword" => ""];

$actual = $userModel->getUsers($params);
var_dump($actual);

