<?php
require_once 'models/FactoryPattern.php';
require_once 'models/BaseModel.php';

$factory = new FactoryPattern();

$bankModel = $factory->make('bank');
$userModel = $factory->make('user');


$bank = NULL; //Add new user
$id = NULL;
$err = 0;
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    try {
        $bank = $userModel->findUserById($id, $bankModel);
    } catch (Throwable $e) {
        $err = 1;
    }
}

if (!empty($_POST['submit'])) {
    if (!empty($id)) {
        try {
            $userModel->updateUser($_POST, $bankModel);
        } catch (Throwable $e) {
            $err = 1;
        }
    } else {
        try {
            $userModel->insertUser($_POST, $bankModel);
            header('location: list_bank.php');
        } catch (Throwable $e) {
            $err = 2;
        }
    }
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
        <?php if ($err == 1) { ?>
            <div style="text-align: center; margin-top: 30px; color: #aa1212;">
                <hr>
                <h1 style="font-size: 5rem;">404 | Not Update</h1>
                <hr>
            </div>
            <p>Các hạ từ xa đến đây gặp phải vấn đề này là lỗi của tại hạ !</p>
            <p>Xin mời các hạ lần sau hãy ghé qua !! Xin cáo từ.</p>
            <a href="list_bank.php"><< Go home</a>
        <?php }else if($err == 2){?>
            <div style="text-align: center; margin-top: 30px; color: #aa1212;">
                <hr>
                <h1 style="font-size: 5rem;">404 | Not Insert</h1>
                <hr>
            </div>
            <p>Các hạ từ xa đến đây gặp phải vấn đề này là lỗi của tại hạ !</p>
            <p>Xin mời các hạ lần sau hãy ghé qua !! Xin cáo từ.</p>
            <a href="list_bank.php"><< Go home</a>
        <?php } else { ?>
            <?php if ($bank || isset($id)) { ?>
                <div class="alert alert-warning" role="alert">
                    Bank form
                </div>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php if (!empty($bank[0]['id'])) echo $bank[0]['id'] ?>">
                    <div class="form-group">
                        <label for="user_id">User ID</label>
                        <input class="form-control" name="user_id" placeholder="User ID" value="<?php if (!empty($bank[0]['user_id'])) echo $bank[0]['user_id'] ?>" require>
                    </div>
                    <div class="form-group">
                        <label for="cost">Cost</label>
                        <input class="form-control" name="cost" placeholder="cost" value="<?php if (!empty($bank[0]['cost'])) echo $bank[0]['cost'] ?>" require>
                    </div>
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                </form>
            <?php } else { ?>
                <div class="alert alert-success" role="alert">
                    User not found!
                </div>
            <?php } ?>
         <?php } ?>
    </div>
</body>

</html>