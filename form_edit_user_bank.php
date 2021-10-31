<?php
// Start the session
session_start();
require_once 'models/BankModel.php';
$user_bankModel = new BankModel;


$user = NULL; //Add new user
$_id = NULL;
if (!empty($_GET['id'])) {
    $_id = $_GET['id'];
    $user = $user_bankModel->findBankById($_id);//Update existing user
}
if (!empty($_POST['submit'])) {

    if (!empty($_id)) {
        $user_bankModel->updateUser_bank($_POST);
    }
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
<?php include 'views/header.php' ?>
<div class="container">

    <?php if ($user || isset($_id)) ; { ?>
    <div class="alert alert-warning" role="alert">
        User form
    </div>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo substr($_id, 4, 1) ?>">
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" name="name" placeholder=""
                   value="<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>">
        </div>

        <div class="form-group">
            <label for="fullname">Fullname</label>
            <input class="form-control" name="fullname" placeholder="Fullname"
                   value="<?php if (!empty($user[0]['fullname'])) echo $user[0]['fullname'] ?>">
        </div>
        <div class="form-group">
            <label for="fullname">So dien thoai</label>
            <input class="form-control" name="sdt" placeholder="So dien thoai"
                   value="<?php if (!empty($user[0]['sdt'])) echo $user[0]['sdt'] ?>">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" name="email" placeholder="Email"
                   value="<?php if (!empty($user[0]['email'])) echo $user[0]['email'] ?>">
        </div>
        <div class="form-group">
            <label for="stk">STK</label>
            <input name="stk" class="form-control" placeholder="So tai khoan"
                   value="<?php if (!empty($user[0]['stk'])) echo $user[0]['stk'] ?>">
        </div>

        <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
<?php } ?>
</body>
</html>