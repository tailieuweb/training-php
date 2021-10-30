<?php
// Start the session
session_start();
require_once 'models/FactoryPattern.php';

$factory = new FactoryPattern();

$bankModel = $factory->make('bank');

$users = $bankModel->getUser();
$bank = NULL; //Add new bank
$_id = NULL;

if (!empty($_GET['id'])) {
    $_id = $_GET['id'];
    $bank = $bankModel->findBankById($_id);//Update existing user
}


if (!empty($_POST['submit'])) {

    if (!empty($_id)) {
        $bankModel->updateBank($_POST);
    } else {
        $bankModel->insertBank($_POST);
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

            <?php if ($bank || empty($_id)) { ?>
                <div class="alert alert-warning" role="alert">
                    Bank form
                </div>
                <form method="POST">
                    <input type="hidden" name="bank_id" value="<?php echo $_id ?>">

                    <div class="form-group">
                        <label for="type">Name user</label>
                        <select name="id" class="form-control">
                            <?php
                            foreach($users as $value) {
                                if($value['id'] == $bank[0]['user_id']){
                                ?>
                                <option selected value="<?php if (!empty($value['id'])) echo $value['id'] ?>"><?php if (!empty($value['name'])) echo $value['name'] ?></option>
                            <?php } else{ ?>
                                <option value="<?php if (!empty($value['id'])) echo $value['id'] ?>"><?php if (!empty($value['name'])) echo $value['name'] ?></option>
                             <?php   }
                            }?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="fullname">Cost</label>
                        <input class="form-control" name="cost" placeholder="Cost" value="<?php if (!empty($bank[0]['cost'])) echo $bank[0]['cost'] ?>">
                    </div>

                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                </form>
            <?php } else { ?>
                <div class="alert alert-success" role="alert">
                    Bank not found!
                </div>
            <?php } ?>
    </div>
</body>
</html>