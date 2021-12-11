<?php
session_start();
require_once '../../models/ProductModel.php';

// ----------Factory----------
require '../../models/FactoryPattentTwoAdmin.php';
$factory = new FactoryPattentTwoAdmin();
$productModel = $factory->make('product');
// ----------Factory----------

// $productModel = new ProductModel();
$user = NULL; //Add new user
$id = NULL;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (!empty($_GET['token'])) {
        if (hash_equals($_SESSION['token'], $_GET['token'])) {
            $id_start = substr($id, 3);
            $id_end = substr($id_start, 0, -3);
            $productModel->deleteProduct($id_end);
        }
    }
}
header('location: trash.php');
