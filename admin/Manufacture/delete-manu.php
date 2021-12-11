<?php
session_start();
include '../../models/ManufactureModel.php';

// -----------Factory------------------
require '../../models/FactoryPattentTwoAdmin.php';
$facrory = new FactoryPattentTwoAdmin();
$manusModel = $facrory->make('manu');
// -----------Factory------------------

// $manusModel = new ManufactureModel();
// var_dump($manufacture);
$_id = null;
// if (isset($_GET['manu_id'])) {
//     $_id = $_GET['manu_id'];
//     $manusModel->deleteManufacture($_id); 

// }
if (isset($_GET['manu_id'])) {
    $_id = $_GET['manu_id'];
    if (!empty($_GET['token'])) {
        // var_dump($_GET['token']);
        // var_dump($_SESSION['token']);
        // die();
        if (hash_equals($_SESSION['token'], $_GET['token'])) {
            $manusModel->deleteManufacture($_id);
        }
    }
}

header('location: ./index.php');
