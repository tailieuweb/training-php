<?php 
session_start();
require "../../models/ProtypeModel.php";

// -----------Factory------------------
require "../../models/FactoryPattentTwoAdmin.php";
$factory = new FactoryPattentTwoAdmin();
$protypesModel = $factory->make('protype');
// -----------Factory------------------

// $protypesModel = new ProtypeModel();

$protype = NULL; 
$id = NULL;

// if (!empty($_GET['type_id'])) {
//     $id = $_GET['type_id'];
//     $protypesModel->DeleteProtype($id);//Delete existing user
// }
if (isset($_GET['type_id'])) {
    $id = $_GET['type_id'];
    if (!empty($_GET['token'])) {
        if (hash_equals($_SESSION['token'], $_GET['token'])) {
            $protypesModel->DeleteProtype($id);
        }
    }
}
header('location: ./index.php');