<?php
require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();

$bankModel = $factory->make('bank');
$userModel = $factory->make('user');

$bank = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $bank = $bankModel->findBankById($id);//Update existing user
    //$bank = $userModel->findUserById($id);
}

if (!empty($_POST['submit'])) {

    if (!empty($id)) {
        //$userModel->updateUser($_POST,$bankModel);
        $userModel->updateUser($_POST);
    } else {
       $userModel->insertUser($_POST);
    }  
    header('location: list_bank.php');   
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Bank form</title>
    <?php include 'views/meta.php' ?>
</head>
<body>
    <?php include 'views/header.php'?>
    <div class="container">
            <?php if ( $bank || isset($id)) { ?>
                <div class="alert alert-warning" role="alert">
                    Bank form
                </div>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php if (!empty($bank[0]['id'])) echo $bank[0]['id']?>">
                    <div class="form-group">
                        <label for="user_id">User ID</label>
                        <input class="form-control" name="user_id" placeholder="User ID" value="<?php if (!empty($bank[0]['user_id'])) echo $bank[0]['user_id'] ?>" require>
                    </div>
                    <div class="form-group">
                        <label for="cost">Cost</label>
                        <input class="form-control" name="cost" placeholder="cost" value="<?php if (!empty($bank[0]['cost'])) echo $bank[0]['cost'] ?>" require>
                    </div>
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                </form>
            <?php } else { ?>
                <div class="alert alert-success" role="alert">
                    User not found!
                </div>
            <?php } ?>
    </div>
</body>
</html>