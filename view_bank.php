<?php
require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();
$bankModel = $factory->make('bank');

$bank = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $bank = $bankModel->findBankById($id);//Update existing user bank
}


if (!empty($_POST['submit'])) {

    if (!empty($id)) {
        $bankModel->updateBank($_POST);
    } else {
        $userModel->insertBank($_POST);
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
            Bank Profile
        </div>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="form-group">
                <label for="name">User Id</label>
                <span><?php if (!empty($bank[0]['user_id'])) echo $bank[0]['user_id'] ?></span>
            </div>
            <div class="form-group">
                <label for="password">Cost</label>
                <span><?php if (!empty($bank[0]['cost'])) echo $bank[0]['cost'] ?></span>
            </div>
        </form>
    <?php } else { ?>
        <div class="alert alert-success" role="alert">
            Bank not found!
        </div>
    <?php } ?>
</div>
</body>
</html>