<?php
session_start();

require_once 'proxypattern/User.php';
require_once 'proxypattern/RealUser.php';
require_once 'proxypattern/UserProxy.php';
require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();

$userM = $factory->make('user');
$bankM = $factory->make('bank');
$userModel = new UserProxy();
$user = NULL; //Add new user
$id = NULL;
$id_user = NULL;
$bank = NULL;

 if (!empty($_GET['id'])) {
     $id = $_GET['id'];
     $user = $userM->findUserById($id);//Update existing user
 }
 if (!empty($_GET['id'])) {
    $id_user = $_GET['id'];
    $bank = $bankM->findBankByUserId($id_user);//Update existing user
}

if (!empty($_POST['submit'])) {

    if (isset($id)) {
          $userModel->updateUserandBank($_POST); 
    }
     else {
        $userModel->insertUserandBank($_POST);
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
            User form
        </div>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="form-group">
                <label for="name">
                    <Name></Name>
                </label>
                <input class="form-control" name="name" placeholder="Name"
                    value="<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>">
            </div>
            <!-- <?php if(!empty($_GET['id'])){?> 
            <div class="form-group">
                <label for="password">Old Password</label>
                <input type="password" name="old_password" class="form-control" placeholder="Password">
            </div>
            <?php } ?> -->
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            
            <div class="form-group">
                        <label for="fullname">Fullname</label>
                        <input type="fullname" name="fullname" class="form-control" placeholder="Fullname" value="<?php if (!empty($user[0]['fullname'])) echo $user[0]['fullname'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php if (!empty($user[0]['email'])) echo $user[0]['email'] ?>" required>
                    </div>
					
					  <label for="admin">Admin</label>
                    <input type="radio" id="admin" name="t1" value="admin" checked >
                        <label for="user">User</label>
                         <input type="radio" id="user" name="t1" value="user" > 
                         <label for="guest">Guest</label>
                         <input type="radio" id="guest" name="t1" value="guest">
                    
                  

                   <?php if(isset($id)){?>
                    <div class="form-group">   
                        <input type="hidden" name="version" class="form-control" placeholder="Version" value="<?php if (!empty($user[0]['version'])) echo ($user[0]['version']) ?>" required>
                    </div>
                   <?php }?>
                  
                   <?php if ($bank || empty($id_user)) { ?>
                    <div class="form-group">   
                        <input type="hidden" name="user_id" class="form-control" placeholder="user_id" value="<?php echo $id_user ?>" required>
                    </div>
                   <div class="form-group">   
                        <input type="text" name="cost" class="form-control" placeholder="Cost" value="<?php if (!empty($bank[0]['cost'])) echo ($bank[0]['cost']) ?>" required>
                    </div>
                     <?php } else {?>
                        <div class="alert alert-success" role="alert">
            Bank not found!
        </div>
        <?php } ?>
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