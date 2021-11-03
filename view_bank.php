<?php
require_once 'models/BankModel.php';

$bank = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $bank = BankModel::getInstance()->findBankById($id);//Update existing user
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

    <?php if ($bank || empty($id)) { ?>
        <div class="alert alert-warning" role="alert">
            Bank profile
        </div>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="form-group">
                <label for="name">User_ID</label>
                <span><?php if (!empty($bank[0]['user_id'])) echo $bank[0]['user_id'] ?></span>
            </div>
            <div class="form-group">
                <label for="text">Cost</label>
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