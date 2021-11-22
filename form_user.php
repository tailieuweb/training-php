<?php
session_start();
require_once 'models/FactoryPattern.php';

$factory = FactoryPattern::getInstance();
$userRepository = $factory-> make('user-repository');
$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id']) && !isset($_SESSION['error'])) {
    $id = $_GET['id'];
    $user = $userRepository->findById($id); //Update existing user
}


if (!empty($_POST['submit'])) {
    if (!empty($id)) {
        $temp = $userRepository->updateUserWithBank($_POST);
        if ($temp->isSuccess == true) {
            echo "<script>alert('$temp->data');window.location.href='./list_users.php'</script>";
        } else {
            echo "<script>alert('$temp->error');</script>";
        }
    } else {
        $userRepository->insertUser($_POST);
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
    <?php include 'views/header.php' ?>
    <div class="container">
        <?php if (!isset($_SESSION['error'])) {
            if ($user || empty($id)) { ?>

                <div class="alert alert-warning" role="alert">
                    User form
                </div>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" name="name" placeholder="Name" value="<?php if (!empty($user['name'])) echo strip_tags($user['name']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="hidden" name="version" value="<?php if (!empty($user['version'])) echo $user['version'] ?>">
                        <input class="form-control" name="fullname" placeholder="Full Name" value="<?php if (!empty($user['fullname'])) echo strip_tags($user['fullname']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" placeholder="Email" value="<?php if (!empty($user['email'])) echo strip_tags($user['email']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select class="form-control" name="type">
                            <option value="admin" <?php if (!empty($user['type'])) {
                                                        if ($user['type'] == 'admin') {
                                                            echo "selected";
                                                        }
                                                    } ?>>Admin</option>
                            <option value="user" <?php if (!empty($user['type'])) {
                                                        if ($user['type'] == 'user') {
                                                            echo "selected";
                                                        }
                                                    } ?>>User</option>
                            <option value="guest" <?php if (!empty($user['type'])) {
                                                        if ($user['type'] == 'guest') {
                                                            echo "selected";
                                                        }
                                                    } ?>>Guest</option>
                        </select>
                    </div>
                    <?php if(isset($user['cost'])){ ?>
                    <div class="form-group">
                        <label for="cost">Cost</label>
                        <input class="form-control" type="number" name="cost" placeholder="cost" value="<?php echo strip_tags($user['cost']) ?>" required>
                    </div>
                    <?php }?>
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                </form>
            <?php } else { ?>
                <div class="alert alert-success" role="alert">
                    User not found!
                </div>
        <?php }
        }else{
            echo $_SESSION['error'];
        } ?>
    </div>
</body>

</html>