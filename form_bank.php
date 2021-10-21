<?php
// Start the session
session_start();
<<<<<<< HEAD
require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();

$bankModel = $factory->make('bank');

$bank = NULL; //Add new bank
=======
require_once 'models/BankModel.php';
$bankModel = new BankModel();

$bank = NULL; //Add new user
>>>>>>> 1-php-202109/2-groups/9-I/1-25-Le
$_id = NULL;

if (!empty($_GET['id'])) {
    $_id = $_GET['id'];
<<<<<<< HEAD
    $bank = $bankModel->findBankById($_id); //Update existing bank
=======
    $bank = $bankModel->findBankById($_id); //Update existing user
>>>>>>> 1-php-202109/2-groups/9-I/1-25-Le
}


if (!empty($_POST['submit'])) {

    if (!empty($_id)) {
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
    <title>Bank form</title>
    <?php include 'views/meta.php' ?>
</head>

<body>
    <?php include 'views/header.php' ?>
    <div class="container">

        <?php if ($bank || !isset($_id)) { ?>
        <div class="alert alert-warning" role="alert">
            Bank form
        </div>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $_id ?>">
            <div class="form-group">
<<<<<<< HEAD
                <label for="user_id">User id</label>
                <input class="form-control" name="user_id" placeholder="User id"
                    value='<?php if (!empty($bank[0]['user_id'])) echo htmlentities($bank[0]['user_id'])  ?>'>
=======
                <label for="user_id">User ID</label>
                <input class="form-control" name="user_id" placeholder="User ID"
                    value='<?php if (!empty($bank[0]['user_id'])) echo $bank[0]['user_id']  ?>'>
>>>>>>> 1-php-202109/2-groups/9-I/1-25-Le
            </div>
            <div class="form-group">
                <label for="cost">Cost</label>
                <input class="form-control" name="cost" placeholder="Cost"
<<<<<<< HEAD
                    value="<?php if (!empty($bank[0]['cost'])) echo htmlentities( $bank[0]['cost']) ?>">
=======
                    value="<?php if (!empty($bank[0]['cost'])) echo $bank[0]['cost'] ?>">
>>>>>>> 1-php-202109/2-groups/9-I/1-25-Le
            </div>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php } else { ?>
        <div class="alert alert-success" role="alert">
<<<<<<< HEAD
            bank not found!
=======
            User not found!
>>>>>>> 1-php-202109/2-groups/9-I/1-25-Le
        </div>
        <?php } ?>
    </div>
</body>

</html>