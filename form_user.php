<?php
// Start the session
session_start();
require_once 'DesignPattern/FactoryPattern.php';
$factory = new FactoryPattern();
$userModel = $factory->make('user');

$user = NULL; //Add new user
$_id = NULL;
$params = [];
if (!empty($_GET['keyword'])) {
    $params['keyword'] = $_GET['keyword'];
    
}
$users = $userModel->getUsers($params);

if (!empty($_GET['id'])) {
    foreach ($users as $user1) {
        if($_GET['id'] == md5($user1['id'])){                      
            $_id = $user1['id'];    
        }
    }  
    $user = $userModel->findUserById($_id);//Update existing user
}


if (!empty($_POST['submit'])) {
    if (!empty($_id)) {
        if(isset($_POST['version'])&&$_POST['version']==md5($user[0]['version'])){            
                $userModel->updateUser($_POST);
            
            header('location: list_users.php');
        }
        else{
        echo '<script>alert("Version đã thay đổi, vui lòng làm mới trang!");</script>';
            header('Refresh:3');
        }
    } else {
        $userModel->insertUser($_POST);
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

            <?php if ($user || !isset($_id)) { ?>
                <div class="alert alert-warning" role="alert">
                    User form
                </div>
                <p><?php if(isset($user[0]['version'])) echo 'Version: ' . $user[0]['version'] ?></p>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $_id ?>">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" name="name" placeholder="Name" value='<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>'>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" name="email" placeholder="Email" value="<?php if (!empty($user[0]['email'])) echo $user[0]['email'] ?>">
                        <label for="type">Type</label>
                        <select class="form-control" name="type" value="1" placeholder="Type">
                            <option value="admin" <?php if (!empty($user[0]['type'])&&$user[0]['type'] =='admin') echo "selected=\"selected\""; ?>>Admin</option>
                            <option value="user" <?php if (!empty($user[0]['type'])&&$user[0]['type'] =='user') echo "selected=\"selected\"";?> >User</option>
                            <option value="guest" <?php if (!empty($user[0]['type'])&& $user[0]['type']=='guest') echo "selected=\"selected\"";?>>Guest</option>
                        </select>
                        <label for="fullname">Full Name</label>
                        <input class="form-control" name="fullname" placeholder="FullName" value="<?php if (!empty($user[0]['fullname'])) echo $user[0]['fullname'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <input type="hidden" name="version"
                    value="<?php if (!empty($user[0]['version'])) echo md5($user[0]['version']) ?>">
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