<?php
// Start the session
session_start();

require_once 'models/FactoryPattern.php';

$bankModel = FactoryPattern::make('bank');


if (isset($_GET['btcsrf']) && $_SESSION["csrf_token"]) {
    if (!empty($_GET['bank_id'])) {
        $bank_id = $_GET['bank_id'];
        $bankModel->deleteBankByID($bank_id); //Delete existing bank
    } else {
        echo "Bank ID isn't match!";
        die;
    }
} else {
    echo "Token isn't match!";
    die;
}

header('location: list_banks.php');
