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
if (!empty($_GET['id'])) {
    foreach ($banks as $bank1) {
        if($_GET['id'] == md5($bank1['id'])){                      
            $_id = $bank1['id'];    
        }
    }  
    $bank = $bankModel->findbankById($_id);//Update existing bank
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>bank form</title>
    <?php include 'views/meta.php' ?>
</head>
<body>
<?php include 'views/header.php'?>
<div class="container">

    <?php if ($bank || empty($id)) { ?>
        <div class="alert alert-warning" role="alert">
            bank profile
        </div>
        <form method="POST">
        <div class="form-group">
                <label for="id">ID: </label>
                <span><?php if (!empty($bank[0]['id'])) echo $bank[0]['id'] ?></span>
            </div>            
            <div class="form-group">
                <label for="user_id">User_ID: </label>
                <span><?php if (!empty($bank[0]['user_id'])) echo $bank[0]['user_id'] ?></span>
            </div>
            <div class="form-group">
                <label for="cost">Cost: </label>
                <span><?php if (!empty($bank[0]['cost'])) echo $bank[0]['cost'] ?></span>
            </div>
        </form>
    <?php } else { ?>
        <div class="alert alert-success" role="alert">
            bank not found!
        </div>
    <?php } ?>
</div>
</body>
</html>