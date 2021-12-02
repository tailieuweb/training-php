<?php
require_once 'DesignPattern/FactoryPattern.php';
$factory = new FactoryPattern();
$bankModel = $factory->make('bank');

$bank = NULL; //Add new bank
$_id = NULL;
$params = [];
if (!empty($_GET['keyword'])) {
    $params['keyword'] = $_GET['keyword'];
    
}
$banks = $bankModel->getbanks($params);
if (!empty($_GET['id'])&&isset($_GET['token'])&& ($_GET['token']==$_SESSION['token'])) {
    foreach ($banks as $bank1) {
        if($_GET['id'] == md5($bank1['id'])){                      
            $_id = $bank1['id'];    
        }
    }  
    $bankModel->deletebankById($_id);
    header('location: list_banks.php');      
}
else{
    header('location: list_banks.php');
}
?>