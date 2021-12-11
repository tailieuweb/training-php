<?php
require_once '../../models/ZipCodeModel.php';

$zipcode = new ZipCodeModel();
$user = NULL; //Add new user
$id = NULL;
if (!empty($_GET['id'])) {
    $zipcode->deleteZipcode($_GET['id']);//Delete existing user
}
header('location: index.php');