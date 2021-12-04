<?php

require_once "./models/FactoryPattern.php";

$factory = new FactoryPattern();
$bankModel = $factory->make("bank");
$input = [
        'user_id' => 113,
        'cost' => '1111',
];

var_dump($bankModel->insert($input));

