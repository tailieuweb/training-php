<?php
require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();
$bankModel = $factory->make('bank');

$bank = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $bank = $bankModel->findBankById($id);//Update existing user
}


if (!empty($_POST['submit'])) {

    if (!empty($id)) {
        $bankModel->updateBank($_POST);
    } else {
        $bankModel->insertBank($_POST);
    }
    header('location: list_banks.php');
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>
<body>
    <?php include 'views/header.php'?>
    <div class="container">

            <?php if ($bank || empty($id)) { ?>
                <div class="alert alert-warning" role="alert">
                    Bank form
                </div>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $bank[0]['id'] ?>">
                    <div class="form-group">
                        <label for="user_id">User Id</label>
                        <input class="form-control" name="user_id" placeholder="User Id" value="<?php if (!empty($bank[0]['user_id'])) echo $bank[0]['user_id'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="cost">Cost</label>
                        <input type="text" name="cost" class="form-control" placeholder="Cost">
                    </div>        
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                </form>
            <?php } else { ?>
                <div class="alert alert-success" role="alert">
                    Banks not found!
                </div>
            <?php } ?>
    </div>
</body>
</html>