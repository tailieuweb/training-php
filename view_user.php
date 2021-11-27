<?php
session_start();
require_once 'models/FactoryPattern.php';
require_once 'models/UserRepository.php';
$factory = FactoryPattern::getInstance();
$repository = $factory->make('user-repository');
$user = NULL; //Add new user
$id = NULL;
if (!isset($_SESSION['error'])) {
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $user = $repository->findById($id);
    }
    if (!empty($_POST['submit'])) {

        if (!empty($id)) {
            $repository->updateUser($_POST);
        } else {
            $repository->insertUser($_POST);
        }
        header('location: list_users.php');
    }
    if (isset($_GET['keyword'])) {
        header('location: ./list_users.php?keyword=' . $_GET['keyword']);
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
        <?php
        if (isset($_SESSION['error'])) { ?>
            <div class="alert alert-warning" role="alert">
                <?= $_SESSION['error']; ?>
            </div>
        <?php } else if ($user || empty($id)) { ?>
            <div class="alert alert-warning" role="alert">
                User profile
            </div>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <div class="form-group">
                    <label for="name">ID : </label>
                    <span><?php if (!empty($user['id'])) echo htmlentities($user['id']) ?></span>
                </div>
                <div class="form-group">
                    <label for="name">Name : </label>
                    <span><?php if (!empty($user['name'])) echo htmlentities($user['name']) ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Full Name : </label>
                    <span><?php if (!empty($user['fullname'])) echo htmlentities($user['fullname']) ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Email : </label>
                    <span><?php if (!empty($user['email'])) echo htmlentities($user['email']) ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Type : </label>
                    <span><?php if (!empty($user['type'])) echo htmlentities($user['type']) ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Cost : </label>
                    <span><?php if (!empty($user['cost'])) echo number_format(htmlentities($user['cost'])) . ' $' ?></span>
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