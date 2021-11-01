<?php
require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();
$userModel = $factory->make("user");
$BankModel = $factory->make("bank");

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
     $handleFirst = substr($id,23);
     $id = "";
    for ($i=0; $i <strlen($handleFirst)-9 ; $i++) { 
        $id.=$handleFirst[$i];
    }    
    $user = $userModel->findUserById($id);//Update existing user
    $cost  = $BankModel->SelectCostByUserId($id);
}


if (!empty($_POST['submit'])) {

    if (!empty($id)) {
        $userModel->updateUser($_POST);
    } else {
        $userModel->insertUser($_POST);
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
<body>
<?php include 'views/header.php'?>
<div class="container">

    <?php if ($user || empty($id)) { ?>
        <div class="alert alert-warning" role="alert">
            User profile
        </div>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $id ?>">
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
            <div class="form-group">
                <label for="password">Bank Cost</label>
                <span><?php if (!empty($cost[0]['cost']))  echo $cost[0]['cost']; else echo  0;     ?></span>
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