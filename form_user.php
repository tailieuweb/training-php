<?php
require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();

$userModel = $factory->make('user');
$bankModel = $factory->make('bank');

$user = NULL; //Add new user
$id = NULL;
$keyCode = "aomU87239dadasdasd";

if (!empty($_GET['id'])) {
    $id = base64_decode($_GET['id']);
    $newid = substr($id,23);
    $user = $userModel->findUserById($newid);//Update existing user
}

if (!empty($_POST['submit'])) {

    if (!empty($id)) {
        $userModel->updateUser($_POST,$bankModel);
    } else {
        $userModel->insertUser($_POST,$bankModel); 
        header('location: list_users.php');  
    }   
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
            <?php if ($user || !isset($newsid)) { ?>
                <div class="alert alert-warning" role="alert">
                    User form
                </div>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php if(!empty($newid)){echo $newid;}else{echo $id;}?>">
                    <input type="hidden" name="version" value="<?php if (!empty($user[0]['version'])) echo base64_encode($keyCode.$user[0]['version'])?>">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" name="name" placeholder="Name" value="<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">User Name</label>
                        <input class="form-control" name="fullname" placeholder="User Name" value="<?php if (!empty($user[0]['fullname'])) echo $user[0]['fullname'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input class="form-control" name="email" placeholder="Email" value='<?php if (!empty($user[0]['email'])) echo $user[0]['email'] ?>'>
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label><br>
                        <Select name="type" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                            <option value="guest">Guest</option>
                        </Select>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
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