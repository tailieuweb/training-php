<?php
// Start the session
session_start();

require_once 'DesignPattern/FactoryPattern.php';
$factory = new FactoryPattern();

$userRepository = $factory->make('UserRepository');

$user = NULL; //Add new user
$_id = NULL;

if (!empty($_GET['id'])) {
    $_id = $_GET['id'];

  //Lấy số đầu tiên 
    $start = substr($_id, 0, 5);

  //Lấy số cuối
    $end = substr($_id, -5);

    //thay thế số đầu bằng null
    $_id = str_replace($start, "", $_id);

    //thay thế số cuối bằng null
    $_id = str_replace($end, "", $_id);
    $user = $userRepository->getBankAccountByUserID($_id); //Update existing user
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
    <?php include 'views/header.php' ?>
    <div class="container">

            <?php if ($user || !isset($id)) { ?>
                <div class="alert alert-warning" role="alert">
                    User form
                </div>
                <p><?php if(isset($user[0]['version'])) echo 'Version: ' . $user[0]['version'] ?></p>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
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
                        <label for="email">Email</label>
                        <input class="form-control" name="email" placeholder="Email" value="<?php if (!empty($user[0]['email'])) echo $user[0]['email'] ?>">
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