<?php
// Start the session
session_start();
require_once "models/FactoryPattern.php";
$factory = new FactoryPattern();
$userModel = $factory->make('user');
$BankModel = $factory->make('bank');

$user = NULL; //Add new user
$_id = NULL;

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
<body>
    <?php include 'views/header.php'?>
    <div class="container">

            <?php if ($user || !isset($_id)) { ?>
                <div class="alert alert-warning" role="alert">
                    User form
                </div>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $formid; ?>">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" name="name" placeholder="Name" value='<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>'>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="fullname">Fullname</label>
                        <input class="form-control" name="fullname" placeholder="Fullname" >
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" value="Sisa@gmail.com"  name="email" placeholder="email" >
                    </div>
                  
                    <div class="form-group">
                        Type:
                        <br>
                        <label for="admin">Admin</label>
                       <input type="radio" id="admin" name="t1" value="admin">
                        <label for="user">User</label>
                         <input type="radio" id="user" name="t1" value="user">

                    </div>

                    

                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                </form>
            <?php } else { ?>
                <div class="alert alert-success" role="alert">
                    User not found!
                </div>
            <?php } ?>
    </div>
</body>
</html>