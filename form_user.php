<?php
// Start the session
session_start();
require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();
$userModel = $factory->make("user");
$bankModel = $factory->make("bank");
$user = NULL; //Add new user
$bank = NULL;
$_id = NULL;
$params = [];
$prevCost = 0;

if (!empty($_GET['id'])) {
    $_id = $_GET['id'];
    $formid = $_id;
     $handleFirst = substr($_id,23);
    $_id = "";
   for ($i=0; $i <strlen($handleFirst)-9 ; $i++) { 
       $_id.=$handleFirst[$i];
   }    
    $user = $userModel->findUserById($_id);//Update existing user
}


if (!empty($_POST['submit'])) {
    if (!empty($_id)) {

        
        $userModel->updateUser($_POST,$BankModel);
    } else {
        $userModel->insertUser($_POST,$BankModel);
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
            User form
        </div>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $_id ?>">
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input class="form-control" name="name" placeholder="Name"
                    value='<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>' required>
            </div>
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="text" name="password" class="form-control" placeholder="Password" value='<?php if (!empty($user[0]['name'])) echo $user[0]['password'] ?>' required>
            </div>
            <div class="form-group mb-3">
                <label for="fullname">Fullname</label>
                <input class="form-control" name="fullname" placeholder="fullname"
                    value='<?php if (!empty($user[0]['name'])) echo $user[0]['fullname'] ?>' required>
            </div>
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input name="email" class="form-control" placeholder="email"
                    value='<?php if (!empty($user[0]['name'])) echo $user[0]['email'] ?>'>
            </div>
            
            <div class="form-group mb-3">
                <label for="type" class="form-label">Type</label>
                <select class="form-control" name="type">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                    <option value="guest">Guest</option>
                </select>
            </div>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
            <?php if (isset($_id)) {?>
            <button class="btn btn-success">
                <a href="form_bank.php?id=<?= $_id?>" style="text-decoration: none; color: white;">
                    Add Cost
                </a>
            </button>
            <?php } ?>
        </form>
        <?php } else { ?>
            User not found
        <?php }?>
    </div>
</body>

</html>