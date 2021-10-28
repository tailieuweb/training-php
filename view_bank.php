<?php

// require_once 'models/BankModel.php';
// $bankModel = new BankModel();
require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();

$bankModel = $factory->make('bank');

$params = [];

$banks = $bankModel->getBank($params);

$user = NULL; //Add new user

require_once 'models/BankModel.php';
$bankModel = new BankModel();

$bank = NULL; //Add new bank

$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $user = $bankModel->findBankById($id); //Update existing user
}


if (!empty($_POST['submit'])) {

    if (!empty($id)) {
        $bankModel->updateBankInfo($_POST);
    } else {
        $bankModel->insertBankInfo($_POST);
    }
    header('location: list_bank.php');

    //Xử lý chuỗi đầu
    $string_first = substr($id, 0, 4);
    //Xử lý chuỗi sau
    $string_last = substr($id, -4);
    //Thay thể chuỗi đầu = null
    $id = str_replace($string_first, "", $id);
    //Thay thế chuỗi sau = null
    $id = str_replace($string_last, "", $id);
    $bank = $bankModel->findBankById($id);//Update existing user

}

?>
<!DOCTYPE html>
<html>


<head>
    <title>Bank form</title>
    <?php include 'views/meta.php' ?>
</head>

<body>
    <?php include 'views/header.php' ?>
    <div class="container">

        <?php if ($user || empty($id)) { ?>
            <div class="alert alert-warning" role="alert">
                Bank profile
            </div>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <div class="form-group">
                    <label for="name">User ID : </label>
                    <span><?php if (!empty($user[0]['id'])) echo $user[0]['id'] ?></span>
                </div>
                <div class="form-group">
                    <label for="cost">Cost : </label>
                    <span><?php if (!empty($user[0]['cost'])) echo $banks[0]['cost'] ?></span>
                </div>
    </div>
    </form>
<?php } else { ?>
    <div class="alert alert-success" role="alert">
        Bank not found!
    </div>
<?php } ?>
</div>
</body>


<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>
<body>
<?php include 'views/header.php'?>
<div class="container">

    <?php if ($bank || empty($id)) { ?>
        <div class="alert alert-warning" role="alert">
            LIST BANK
        </div>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="form-group">
                <label for="name">Name: </label>
                <span><?php if (!empty($bank[0]['name'])) echo $bank[0]['name'] ?></span>
            </div>
            <div class="form-group">
                <label for="fullname">Fullname:</label>
                <span><?php if (!empty($bank[0]['fullname'])) echo $bank[0]['fullname'] ?></span>
            </div>
            <div class="form-group">
                <label for="sdt">Số Điện Thoại: </label>
                <span><?php if (!empty($bank[0]['sdt'])) echo $bank[0]['sdt'] ?></span>
            </div>
            <div class="form-group">
                <label for="email">Email: </label>
                <span><?php if (!empty($bank[0]['email'])) echo $bank[0]['email'] ?></span>
            </div>
            <div class="form-group">
                <label for="stk">Số Tài Khoản: </label>
                <span><?php if (!empty($bank[0]['stk'])) echo $bank[0]['stk'] ?></span>
            </div>
        </form>
    <?php } else { ?>
        <div class="alert alert-success" role="alert">
            User not found!
        </div>
    <?php } ?>
</div>
</body>
>>>>>>> origin/1-php-202109/1-master
</html>