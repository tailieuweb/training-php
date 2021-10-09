<?php
require_once 'models/BankModel.php';
$bankModel = new BankModel();

$user_id = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $user_id = $bankModel->findUserById($id); //Update existing user
}


if (!empty($_POST['submit'])) {

    if (!empty($id)) {
        $bankModel->updateUser($_POST);
    } else {
        $bankModel->insertUser($_POST);
    }
    header('location: list_banks.php');
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

            <?php if ($user_id || !isset($_id)) { ?>
                <div class="alert alert-warning" role="alert">
                    Bank form
                </div>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $_id ?>">
                    <div class="form-group">
                        <label for="name">User ID</label>
                        <input class="form-control" name="name" placeholder="User_id" value='<?php if (!empty($user_id[0]['name'])) echo $user_id[0]['name'] ?>'>
                    </div>
                    <div class="form-group">
                        <label for="cost">Cost</label>
                        <input name="cost" class="form-control" placeholder="cost">
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