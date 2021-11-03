<?php

require_once 'models/FactoryPattern.php';

$bankModel = FactoryPattern::make('bank');

if (!empty($_GET['bank_id'])) {
    $bank_id = $_GET['bank_id'];
    $bank = $bankModel->findBankById($bank_id);
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

    <?php if ($bank || empty($uuid)) { ?>
        <div class="alert alert-warning" role="alert">
            User profile
        </div>
        <form method="POST">
            <div class="form-group">
                <label for="name">ID:</label>
                <span><?php if (!empty($bank[0]['id'])) echo $bank[0]['id'] ?></span>
            </div>
            <div class="form-group">
                <label for="password">User ID:</label>
                <span><?php if (!empty($bank[0]['user_id'])) echo $bank[0]['user_id'] ?></span>
            </div>
            <div class="form-group">
                <label for="password">Cost:</label>
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