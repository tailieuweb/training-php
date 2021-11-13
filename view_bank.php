<?php
require_once 'models/BankModel.php';
$bankModel = new BankModel();

$bank = NULL; //Add new bank
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
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
</html>