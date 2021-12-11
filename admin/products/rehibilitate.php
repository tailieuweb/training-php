<?php
require_once '../../models/ProductModel.php';

 // ----------Factory----------
 require '../../models/FactoryPattentTwoAdmin.php';
 $factory = new FactoryPattentTwoAdmin();
 $productModel = $factory->make('product');
 // ----------Factory----------

// $productModel = new ProductModel();
$user = NULL; //Add new user
$id = NULL;
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $id_start = substr($id,3);
    $id_end=substr($id_start,0,-3);
    $productModel->rehibilitate($id_end);//Delete existing user
}
header('location: index.php');
