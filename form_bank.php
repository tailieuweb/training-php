<?php
// Start the session
session_start();
require_once 'models/FactoryPattern.php';
require_once 'models/UserModel.php';
$factory = new FactoryPattern();
$userModel = $factory::create("user");
$bankModel = $factory::create("bank");
$user = NULL; //Add new user
$bank = NULL;
$_id = NULL;
$params = [];
$prevCost = 0;

if (!empty($_GET['id'])) { 
    //Update SQL Injection - convert id -> int -> string
    $_id = isset($_GET['id'])?(string)(int)$_GET['id']:null;
    $user =  $userModel->findUserById($_id);//Update existing user
    $params['user_id'] =  $_id; 
    $bank = $bankModel->getBanksInfo($params);
}


if (!empty($_POST['submit'])) {
    //Use clean()(UserModel) clean all special chars (-@) 
    $_POST =  FactoryPattern::clean($_POST);
    if (!empty($_id) && $bank) {
       $bankModel->updateBankInfo($_POST);
    } else {
       $bankModel->insertBankInfo($_POST);
    }
    header('location: list_users.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>
    <?php include 'views/header.php';?>
<body>
    <div class="container">

        <?php if (($user || !isset($_id))) { ?>
        <div class="alert alert-warning" role="alert">
            Bank form
        </div>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $_id ?>">
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <span><?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?></span>
            </div>
            <div class="form-group mb-3">
                <label for="password">Fullname</label>
                <span><?php if (!empty($user[0]['name'])) echo $user[0]['fullname'] ?></span>
            </div>
            <div class="form-group mb-3">
                <label for="password">Email</label>
                <span><?php if (!empty($user[0]['name'])) echo $user[0]['email'] ?></span>
            </div>
            <div class="form-group mb-3">
                <label for="cost">Cost</label>
                <?php if ($bank) {?>
                <input class="form-control" name="cost" placeholder="cost"
                    value='<?php if (!empty($user[0]['name'])) echo $bank[0]['cost'] ?>' required>
                <?php } else {?>
                <input class="form-control" name="cost" placeholder="cost"
                    value='<?= 0?>' required>
                <?php }?>        
            </div>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php } else { ?>
            User not found
        <?php }?>
    </div>  
</body>

</html>