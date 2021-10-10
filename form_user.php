<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
<<<<<<< HEAD
    $_id = $_GET['id'];
    //Xử lý chuỗi đầu
    $string_first = substr($_id, 0, 4);
    //Xử lý chuỗi sau
    $string_last = substr($_id, -4);
    //Thay thể chuỗi đầu = null
    $_id = str_replace($string_first, "", $_id);
    //Thay thế chuỗi sau = null
    $_id = str_replace($string_last, "", $_id);
    var_dump($_id);
    $user = $userModel->findUserById($_id);
     
=======
    $id = $_GET['id'];
    $user = $userModel->findUserById($id); //Update existing user
>>>>>>> 2-php-202109/2-groups/8-H/4-33-Tri
}
if (!empty($_POST['submit'])) {
<<<<<<< HEAD
    if (!empty($_id)) {
=======

    if (!empty($id)) {
>>>>>>> 2-php-202109/2-groups/8-H/4-33-Tri
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

<<<<<<< HEAD
        <?php if ($user || empty($_id)) { ?>
=======
        <?php if ($user || empty($id)) { ?>

>>>>>>> 2-php-202109/2-groups/8-H/4-33-Tri
        <div class="alert alert-warning" role="alert">
            User form
        </div>
        <form method="POST">
<<<<<<< HEAD
            <input type="hidden" name="id" value="<?php echo $_id ?>">
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" name="name" placeholder="Name"
                    value="<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>">
            </div>
            <div class="form-group">
                <label for="full-name">Full name</label>
                <input class="form-control" name="full-name" placeholder="Full name"
                    value="<?php if (!empty($user[0]['fullname'])) echo $user[0]['fullname'] ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password"
                    value="<?php if (!empty($user[0]['password'])) echo $user[0]['password'] ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="email"
                    value="<?php if (!empty($user[0]['email'])) echo $user[0]['email'] ?>">
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <select name="type">
                    <option value="0" <?php if (!empty($user[0]['type']) == '0') {
                                                echo "selected";
                                            } ?>>---</option>
                    <option value="admin" <?php if (!empty($user[0]['type']) == 'admin') {
                                                    echo "selected";
                                                } ?>>Admin</option>
                    <option value="user" <?php if (!empty($user[0]['type']) == 'user') {
                                                    echo "selected";
                                                } ?>>User</option>
                    <option value="guest" <?php if (!empty($user[0]['type']) == 'guest') {
                                                    echo "selected";
                                                } ?>>Guest
                    <option>
                </select>
            </div>

=======
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" name="name" placeholder="Name"
                    value="<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="name">Full Name</label>
                <input class="form-control" name="fullname" placeholder="Full Name"
                    value="<?php if (!empty($user[0]['fullname'])) echo $user[0]['fullname'] ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" placeholder="Email"
                    value="<?php if (!empty($user[0]['email'])) echo $user[0]['email'] ?>" required>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <select class="form-control" name="type">
                    <option value="admin" <?php if (!empty($user[0]['type'])){
                         if ($user[0]['type'] == 'admin'){
                            echo "selected";
                         }}?>>Admin</option>
                    <option value="user" <?php if (!empty($user[0]['type'])){
                         if ($user[0]['type'] == 'user'){
                            echo "selected";
                         }}?>>User</option>
                    <option value="guest" <?php if (!empty($user[0]['type'])){
                         if ($user[0]['type'] == 'guest'){
                            echo "selected";
                         }}?>>Guest</option>
                </select>
            </div>
>>>>>>> 2-php-202109/2-groups/8-H/4-33-Tri
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