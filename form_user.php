<?php
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;
$Name_store = "";
$password_store = "";

if (!empty($_GET['id'])) { 
    //Update SQL Injection - convert id -> int -> string
    if (!empty(strip_tags($_GET['id']))) {
     $id = strip_tags($_GET['id']);
     $id = isset($_GET['id'])?(string)(int)$_GET['id']:null;
	  $id = $_GET['id'];
     $handleFirst = substr($id,23);
    $id = "";
   for ($i=0; $i <strlen($handleFirst)-9 ; $i++) { 
       $id.=$handleFirst[$i];
   }    
     $user = $userModel->findUserById($id);//Update existing user
    $Name_store = $user[0]['name'];
    $password_store = $user[0]['password'];
   
   
}
   //Update existing user
}


//Kiem tra nếu token bằng nhau thì thực hiện submit form theo yêu cầu:
if (!empty($_POST['submit'])&& $_SESSION['_token']===$_POST['_token']) {
    var_dump($_POST);

    if (!empty($id)) {
       if(CheckuserdataBeforeUpdate($userModel,$id,$Name_store,$_POST['old_password'])){
           $userModel->updateUser($_POST);
       }
    } else if($_POST['name']&& $_POST['fullname']&&$_POST['password']&&$_POST['type1']) {
        $userModel->insertUser($_POST);

    }
    header('location: list_users.php');

}
$token = md5(uniqid());//Kiem tra nếu token bằng nhau thì thực hiện submit form theo yêu cầu:
if (!empty($_POST['submit'])&& $_SESSION['_token']===$_POST['_token']) {
    var_dump($_POST);

    if (!empty($id)) {
       if(CheckuserdataBeforeUpdate($userModel,$id,$Name_store,$_POST['old_password'])){
           $userModel->updateUser($_POST);
       }
    } else if($_POST['name']&& $_POST['fullname']&&$_POST['password']&&$_POST['type1']) {
        $userModel->insertUser($_POST);

    }
    header('location: list_users.php');

}
$token = md5(uniqid());

function CheckuserdataBeforeUpdate($userModel,$id,$Name_store,$old_password){
   $data_check = $userModel->findUserById($id);
   $check = true;
    if ($Name_store != $data_check[0]['name']){
    $check = false;
    }
    if($password_store != $old_password ){
        $check = false;
    }
    return $check;


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
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" value="<?php if (!empty($user[0]['name'])) echo md5($user[0]['password']) ?>">
                    </div>

                    <div class="form-group">
                        <label for="fullname">Fullname</label>
                        <input name="fullname" class="form-control" placeholder="Fullname" value="<?php if (!empty($user[0]['name'])) echo $user[0]['fullname'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" class="form-control" placeholder="Email" value="<?php if (!empty($user[0]['name'])) echo $user[0]['email'] ?>">
                    </div>
                 
                
                    <div class="form-group">
                        Type:
                        <br>
                        <label for="admin">Admin</label>
                        <input type="radio" id="admin" name="type1" value="admin" checked >
                        <label for="user">User</label>
                         <input type="radio" id="user" name="type1" value="user" > 
                         <label for="guest">Guest</label>
                         <input type="radio" id="guest" name="type1" value="guest">

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