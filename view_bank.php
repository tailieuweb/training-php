<?php
session_start();
require_once 'models/FactoryPattern.php';

$factory = new FactoryPattern();

$bankModel = $factory->make('bank');
$userMondel = $factory->make('user');

$bank= NULL; //Add new bank
$id = NULL;
// $params =[];
// $banks = $bankModel->getBanks($params);

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $bank = $bankModel->findBankById($id);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Form</title>
    <?php include 'views/meta.php' ?>
</head>
<body>
<?php include 'views/header.php'?>
<div class="container">

    <?php if ($bank || empty($id)) { ?>
        <div class="alert alert-warning" role="alert">
            User profile
        </div>
        <form method="POST">
           
            <div class="form-group">
                <label for="name">User Bank :</label>
                <span><?php if (!empty($bank[0]['name'])) echo $bank[0]['name'] ?></span>
            </div>
            <div class="form-group">
                <label for="password">Cost :</label>
                <span><?php if (!empty($bank[0]['cost'])) echo $bank[0]['cost'] ?></span>
            </div>
        </form>
    <?php } else { ?>
        <div class="alert alert-success" role="alert">
            User not found!
        </div>
    <?php } ?>
</div>
</body>
</html>