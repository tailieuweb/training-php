<?php
// Start the session
session_start();

require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();

$bankModel = $factory->make('bank');
$userModel = $factory->make('user');

$bankInfo = NULL; //Add new bank
$_id = NULL;

if (!empty($_GET['id'])) {
    $_id = $_GET['id'];
    //Decode id param

    //Get first number
    $start = substr($_id, 0, 5);

    //Get last number
    $end = substr($_id, -5);

    //Replace first number with null
    $_id = str_replace($start, "", $_id);

    //Replace last number with null
    $_id = str_replace($end, "", $_id);
    $bankInfo = $bankModel->findBankInfoByUserID($_id); //Update existing bank info
    $user = $userModel->findUserById($_id);
}


if (!empty($_POST['submit'])) {

    if (!empty($_id)) {
        if (count($bankInfo) > 0) {
            $bankModel->updateBankInfo($_POST);
            header('location: index.php');
        }
    } else {
        $bankModel->insertBankInfo($_POST);
        header('location: index.php');
    }
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>Form</title>
    <?php include 'views/meta.php' ?>
</head>

<body>
    <?php include 'views/header.php' ?>
    <div class="container">

        <?php if ($bankInfo || empty($_id)) { ?>
            <div class="alert alert-warning" role="alert">
                Form
            </div>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $bankInfo[0]['id'] ?>">

                <?php
                    if (!empty($_id)) {
                ?>
                <div class="form-group">
                    <label for="name">Name</label>
                    <span><?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Fullname</label>
                    <span><?php if (!empty($user[0]['name'])) echo $user[0]['fullname'] ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Email</label>
                    <span><?php if (!empty($user[0]['name'])) echo $user[0]['email'] ?></span>
                </div>
                <?php
                    } else {
                ?>
                <div class="form-group">
                    <label for="user_id">User ID</label>
                    <input class="form-control" name="user_id" placeholder="User ID" value="<?php if ($bankInfo[0]['user_id'] >= 0) echo $bankInfo[0]['cost'] ?>">
                </div>
                <?php
                    }
                ?>
                
                <div class="form-group">
                    <label for="cost">Cost</label>
                    <input class="form-control" name="cost" placeholder="Amount of money" value="<?php if ($bankInfo[0]['cost'] >= 0) echo $bankInfo[0]['cost'] ?>">
                </div>
                
                <!-- Hidden version field: -->
                <div class="form-group">
                    <input type="hidden" name="ver" value="<?php echo rand(10000,99999).rand(10000,99999) ?>">
                </div>

                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
            </form>
        <?php } else { ?>
            <div class="alert alert-success" role="alert">
                BankInfo not found!
            </div>
        <?php } ?>
        
    </div>
</body>

</html>