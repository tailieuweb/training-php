<?php
//add files
//include '../../factory/factory.php';

//initilize model
// $factory = new Factory();
// //
// $manufactures = $factory->make('manufacture');
// $categories = $factory->make('category');
// $products = $factory->make('product');
//field names
$field = [
    'name' => 'name',
    'price' => 'price',
    'quantity' => 'quantity',
    'description' => 'description',
    'origin' => 'origin',
    'manufacture' => 'manufacture',
    'category' => 'category',
    'image' => 'image'
];
//error and missing arrays.
$errors = [];
$missing = [];
$values = [];
$warning = [];
