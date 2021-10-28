<?php
// Start the session
session_start();
require_once 'models/BankModel.php';
$user_bankModel = new BankModel;

$user = NULL; //Add new user
$_id = NULL;

if (!empty($_POST['submit'])) {
    $user_bankModel->insertUser_bank($_POST);
    header('location: list_bank.php');
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
        <div class="alert alert-warning" role="alert">
            User form
        </div>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $_id ?>">
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" name="name" placeholder="Name" value="">
            </div>

            <div class="form-group">
                <label for="fullname">Fullname</label>
                <input class="form-control" name="fullname" placeholder="Fullname" value="">
            </div>
            <div class="form-group">
                <label for="fullname">So dien thoai</label>
                <input class="form-control" name="sdt" placeholder="So dien thoai" value="">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input  class="form-control" name="email" placeholder="Email" value="">
            </div>
            <div class="form-group">
                <label for="stk">STK</label>
                <input name="stk" class="form-control" placeholder="So tai khoan">
            </div>

            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
        </form>
</div>
</body>
</html>