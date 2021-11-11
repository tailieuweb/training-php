<?php
// Start the session
session_start();
require_once 'models/FactoryPattern.php';
require_once 'models/UserModel.php';
$factory = new FactoryPattern();
$userModel = $factory->make("user");
$bankModel = $factory->make("bank");
$user = NULL; //Add new user
$bank = NULL;
$_id = NULL;
$params = [];
$prevCost = 0;

if (!empty($_GET['id'])) { 
    //Update SQL Injection - convert id -> int -> string
    $_id = isset($_GET['id'])?(string)(int)$_GET['id']:null;
    $user =  $userModel->find($_id);//Update existing user
    $params['user_id'] =  $_id; 
    $bank = $bankModel->search($params);
}


if (!empty($_POST['submit'])) {
    if (!empty($_id) && !empty($bank)) {
       $bankModel->update($_POST);
    } else {
       $params['cost'] = $_POST['cost'];
       $bankModel->insert($params);
    }
    //header('location: list_users.php');
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
                    value='<?php (!empty($bank)) ? $bank['cost'] : 0?>' required>
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