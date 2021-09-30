<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;

if (!empty(strip_tags($_GET['id']))) {
    $id = strip_tags($_GET['id']);
    $user = $userModel->findUserById($id);//Update existing user
 $id = $_GET['id'];
     $handleFirst = substr($id,23);
     $id = "";
    for ($i=0; $i <strlen($handleFirst)-9 ; $i++) { 
        $id.=$handleFirst[$i];
    }
    $user = $userModel->findUserById($id);
}




if (!empty($_POST['submit'])) {

    if (!empty($id)) {
        $userModel->updateUser(strip_tags($_POST));
    } else {
        $userModel->insertUser(strip_tags($_POST));
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
                <label for="fullname">Fullname</label>
                <span><?php if (!empty($user[0]['name'])) echo $user[0]['fullname'] ?></span>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <span><?php if (!empty($user[0]['name'])) echo $user[0]['email'] ?></span>
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