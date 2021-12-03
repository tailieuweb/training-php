<?php
require_once "./models/FactoryPattern.php";
require_once "./tests/resource-test/User.php";

$factory = new FactoryPattern();
$userModel = $factory->make("user");

function demo()
{
    $input = [];
    $input["name"] = ["name" => "test2"];
    $input["fullname"] = "testinsert";
    $input["email"] = "testinsert@gmail.com";
    $input["type"] = "user";
    $input["password"] = "password";
    
    foreach ($input as $key => $value) {
        if (is_array($value)) {
            return [];
        }
    }
    return "success";
}

var_dump(demo());

require_once './models/FactoryPattern.php';
$factory = new FactoryPattern();
$userModel = $factory->make("user");
$bankModel = $factory->make("bank");
var_dump($bankModel->read());
