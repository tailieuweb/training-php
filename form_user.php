<?php
session_start();



require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) { 
    //Update SQL Injection - convert id -> int -> string
    $id = isset($_GET['id'])?(string)(int)$_GET['id']:null;
    $user = $userModel->findUserById($id);//Update existing user
}

//Kiem tra nếu token bằng nhau thì thực hiện submit form theo yêu cầu:
if (!empty($_POST['submit'])&& $_SESSION['_token']===$_POST['_token']) {
    var_dump($_POST);

    if (!empty($id)) {
        $userModel->updateUser($_POST);
    } else if($_POST['name']&& $_POST['fullname']&&$_POST['password']&&$_POST['type1']) {
        $userModel->insertUser($_POST);

    }
    header('location: list_users.php');

}
$token = md5(uniqid());
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
<!--                   Ẩn token-->
                    <input type="hidden" name="_token" value="<?php echo $token ?>">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" name="name" placeholder="Name" value="<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>">
                    </div>
<!--                    add fullnname-->
                  
<!--                    add email-->
                   
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" value="<?php if (!empty($user[0]['password'])) echo $user[0]['password'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="fullname">Fullname</label>
                        <input name="fullname" class="form-control" placeholder="Fullname">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        Type:
                        <br>
                        <label for="admin">Admin</label>
                       <input type="radio" id="admin" name="type1" value="admin">
                        <label for="user">User</label>
                         <input type="radio" id="user" name="type1" value="user">
                          <label for="user">Guest</label>
                         <input type="radio" id="user" name="type1" value="Guest">
                    </div>

                      <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
<!--                    Lưu sesion_token-->
               <?php $_SESSION['_token']=$token;
               ?>
                </form>

            <?php } else { ?>
                <div class="alert alert-success" role="alert">
                    User not found!
                </div>
            <?php } ?>
    </div>
</body>
</html>