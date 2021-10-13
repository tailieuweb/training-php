<?php
// Start the session
session_start();
require_once './models/FactoryPattern.php';
$userModel = new UserModel();
$type = $userModel->getTypes();

$user = NULL; //Add new user
$_id = NULL;
//  sql Injection: chuyen doi dinh dang string -> int, khong phai int thif se bi clean
if (!empty($_GET['id'])) {
    $_id = isset($_GET['id'])?(string)(int)$_GET['id']:null;
    $user = $userModel->findUserById($_id);//Update existing user
}


if (!empty($_POST['submit'])) {
    // giu nguyen $_id
    if (!empty($_id)) {
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
            <!-- chú ý lỗi insset -> empty -->
            <?php if ($user || empty($_id)) { ?>
                <div class="alert alert-warning" role="alert">
                    User form
                </div>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $_id ?>">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" name="name" placeholder="Name" value='<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>'>
                    </div>

                    <div class="form-group">
                        <label for="fullname">Fullname</label>
                        <input class="form-control" name="fullname" placeholder="Fullname" value="<?php if (!empty($user[0]['fullname'])) echo $user[0]['fullname'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input  class="form-control" name="email" placeholder="Email" value="<?php if (!empty($user[0]['email'])) echo $user[0]['email'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="type">Type user</label>
                        <select name="type" class="form-control">
                            <?php
                            foreach($type as $value) {
                                if($value['type_id'] == $user[0]['type']){
                                ?>
                            <option selected value="<?php if (!empty($value['type_id'])) echo $value['type_id'] ?>"><?php if (!empty($value['name_type'])) echo $value['name_type'] ?></option>
                            <?php } else{ ?>
                                    <option value="<?php if (!empty($value['type_id'])) echo $value['type_id'] ?>"><?php if (!empty($value['name_type'])) echo $value['name_type'] ?></option>
                             <?php   }
                            }?>
                        </select>
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