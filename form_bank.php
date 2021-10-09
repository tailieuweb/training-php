<?php
// Start the session
session_start();
require_once 'models/BankModel.php';
$bankModel = new BankModel();

$bank = NULL; //Add new user
$_id = NULL;

if (!empty($_GET['id'])) {
    $_id = $_GET['id'];
    $bank = $bankModel->findBankById($_id);//Update existing user
}


if (!empty($_POST['submit'])) {

    if (!empty($_id)) {
        $bankModel->updateUser_id($_POST);
    } else {
        $bankModel->insertUser_id($_POST);
    }
    header('location: list_banks.php');
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

            <?php if ($bank || !isset($_id)) { ?>
                <div class="alert alert-warning" role="alert">
                    User form
                </div>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $_id ?>">
                    <div class="form-group">
                        <label for="name">User_ID</label>
                        <input class="form-control" name="user_id" placeholder="User_id" value='<?php if (!empty($bank[0]['user_id'])) echo $bank[0]['user_id'] ?>'>
                    </div>
                    <div class="form-group">
                    <label for="name">Cost</label>
                        <input class="form-control" name="cost" placeholder="Cost" value='<?php if (!empty($bank[0]['cost'])) echo $bank[0]['cost'] ?>'>
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