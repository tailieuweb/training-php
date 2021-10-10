<?php
// Start the session
session_start();
require_once 'models/BankModel.php';
require_once 'models/UserModel.php';
$banksModel = new BankModel();
$userModel = new UserModel();
$users = $userModel->getUsers();
$bank = NULL; //Add new user
$_id = NULL;

if (!empty($_POST['submit'])) {

    if (empty($_id)) {
        $banksModel->insertBank($_POST);
    }
    header('location: list_users.php');
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

        <?php if ($bank || empty($id)) { ?>
            <div class="alert alert-warning" role="alert">
                Bank form
            </div>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <div class="form-group">
                    <label for="User_id">User id</label>
                    <select name="user_id" value="<?php if (!empty($user[0]['user_id'])) echo $user[0]['user_id'] ?>">
                        <option value="">-</option>
                        <?php foreach ($users as $user) { ?>
                            <option value="<?php echo $user['id'] ?>"><?php echo $user['id'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Cost">Cost</label>
                    <input type="number" name="cost" class="form-control" placeholder="Cost" value="<?php if (!empty($bank[0]['cost'])) echo $bank[0]['cost'] ?>">
                </div>
                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
            </form>
        <?php } else { ?>
            <div class="alert alert-success" role="alert">
                Bank not found!
            </div>
        <?php } ?>
    </div>
</body>

</html>