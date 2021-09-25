<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
<<<<<<< HEAD
    //$id = $_GET['id'];
    $id = base64_decode($_GET['id']);
    $id = substr($id,0,-5);
=======
    $id = base64_decode($_GET['id']);
    $id = substr($id,0,-5);//
>>>>>>> 1-php-202109/2-groups/4-D/1-21-Hung
    $user = $userModel->findUserById($id);//Update existing user
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
                    User form
                </div>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" name="name" placeholder="Name" value="<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>">
                    </div>
                    <div class="form-group">
<<<<<<< HEAD
                        <label for="fullname">Full name</label>
                        <input class="form-control" name="fullname" placeholder="Full name" value="<?php if (!empty($user[0]['fullname'])) echo $user[0]['fullname'] ?>">
                    </div>
                    <!-- <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" name="email" placeholder="Email" value="?php if (!empty($user[0]['email'])) echo $user[0]['email'] ?>">
                    </div>
                    <div class="form-group">
                    <label for="type">Type</label>                    
                    <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                    </select>
                        
                    </div> -->
                  
=======
                        <label for="Email">Email</label>
                        <input class="form-control" name="email" placeholder="email" value="<?php if (!empty($user[0]['email'])) echo $user[0]['email'] ?>">
                    </div>
>>>>>>> 1-php-202109/2-groups/4-D/1-21-Hung
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
<<<<<<< HEAD

                    <button type="submit" name="submit" value="submit" class="btn btn-primary"><?php
                     if (!empty($user[0]['id'])){echo 'Update';}else{echo 'Submit';} ?></button>
=======
                    
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
>>>>>>> 1-php-202109/2-groups/4-D/1-21-Hung
                </form>
            <?php } else { ?>
                <div class="alert alert-success" role="alert">
                    User not found!
                </div>
            <?php } ?>
    </div>
</body>
</html>