<?php
require_once 'models/FactoryPattern.php';
$factory = FactoryPattern::getInstance();

$userModel = $factory->make('user');

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $user = $userModel->findUserById($id); //Update existing user
}


if (!empty($_POST['submit'])) {
    if (!empty($id)) {
        $temp = $userModel->updateUser($_POST);
        if ($temp->isSuccess == true) {
            echo "<script>alert('$temp->data');window.location.href='./list_users.php'</script>";
        } else {
            echo "<script>alert('$temp->error');</script>";
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
    <?php include 'views/header.php' ?>
    <div class="container">
        <?php if ($user || empty($id)) { ?>

            <div class="alert alert-warning" role="alert">
                User form
            </div>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" name="name" placeholder="Name" value="<?php if (!empty($user[0]['name'])) echo strip_tags($user[0]['name']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="hidden" name="version" value="<?php if (!empty($user[0]['version'])) echo $user[0]['version'] ?>">
                    <input class="form-control" name="fullname" placeholder="Full Name" value="<?php if (!empty($user[0]['fullname'])) echo strip_tags($user[0]['fullname']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" placeholder="Email" value="<?php if (!empty($user[0]['email'])) echo strip_tags($user[0]['email']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <select class="form-control" name="type">
                        <option value="admin" <?php if (!empty($user[0]['type'])) {
                                                    if ($user[0]['type'] == 'admin') {
                                                        echo "selected";
                                                    }
                                                } ?>>Admin</option>
                        <option value="user" <?php if (!empty($user[0]['type'])) {
                                                    if ($user[0]['type'] == 'user') {
                                                        echo "selected";
                                                    }
                                                } ?>>User</option>
                        <option value="guest" <?php if (!empty($user[0]['type'])) {
                                                    if ($user[0]['type'] == 'guest') {
                                                        echo "selected";
                                                    }
                                                } ?>>Guest</option>
                    </select>
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