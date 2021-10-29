<?php
// Start the session
session_start();
require_once 'models/BankModel.php';
$bankModel = new BankModel();

$bank = NULL; //Add new bank
$_id = NULL;

if (!empty($_GET['id'])) {
    $_id = $_GET['id'];
    $bank = $bankModel->findBankById($_id);//Update existing bank
}


if (!empty($_POST['submit'])) {

    if (!empty($_id)) {
        $bankModel->updateBank($_POST);
    } else {
        // $bankModel->insertBank($_POST);
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
                    Bank form
                </div>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $_id ?>">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" name="name" placeholder="Name" value='<?php if (!empty($bank[0]['name'])) echo $bank[0]['name'] ?>'>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="cost">Cost</label>
                        <input type="cost" name="cost" class="form-control" placeholder="Cost">
                    </div>
                    <div class="form-group">
                    <label for="type">Type</label>
                    <select class="form-control" name="type">
                        <option value="admin" <?php if (!empty($bank[0]['type'])) {
                                                    if ($bank[0]['type'] == 'admin') {
                                                        echo "selected";
                                                    }
                                                } ?>>Admin</option>
                        <option value="user" <?php if (!empty($bank[0]['type'])) {
                                                    if ($user[0]['type'] == 'user') {
                                                        echo "selected";
                                                    }
                                                } ?>>User</option>
                        <option value="guest" <?php if (!empty($bank[0]['type'])) {
                                                    if ($bank[0]['type'] == 'guest') {
                                                        echo "selected";
                                                    }
                                                } ?>>Guest</option>
                    </select>
                </div>

                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                </form>
            <?php } else { ?>
                <div class="alert alert-success" role="alert">
                    user not found!
                </div>
            <?php } ?>
    </div>
 
</body>
</html>