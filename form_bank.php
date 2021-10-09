<?php
// Start the session
session_start();
require_once 'models/BankModel.php';
$bankModel = new BankModel();

$user = NULL; //Add new user
$_id = NULL;

if (!empty($_GET['id'])) {
    $_id = $_GET['id'];
    $user = $bankModel->findBankById($_id);//Update existing user
}


if (!empty($_POST['submit'])) {

    if (!empty($_id)) {
        $bankModel->updateBank($_POST);
    } else {
        $bankModel->insertBank($_POST);
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
    <?php include 'views/header.php' ?>
    <div class="container">

            <?php if ($user || !isset($_id)) { ?>
                <div class="alert alert-warning" role="alert">
                    Bank form
                </div>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $_id ?>">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input class="form-control" name="id" placeholder="Id" value='<?php if (!empty($user[0]['id'])) echo htmlentities( $user[0]['id']) ?>'>
                    </div>
                    <div class="form-group">
                        <label for="user_id">User_id</label>
                        <input class="form-control" name="user_id" placeholder="User_id" value="<?php if (!empty($user[0]['user_id'])) echo htmlentities($user[0]['user_id']) ?>">
                    <div class="form-group">
                        <label for="cost">Cost</label>
                        <input class="form-control" name="cost" placeholder="Cost" value="<?php if (!empty($user[0]['cost'])) echo htmlentities($user[0]['cost']) ?>">
                    
                    <div class="form-group">
                        <label for="type">Type</label>
                            <select name="type">
                                <option value="admin">admin</option>
                                <option value="user">user</option>
                                <option value="guest">guest</option>
                            </select>
                    </div>
                    <button type="submit" name="submit" value="submit" class="btn btn-primary" >Submit</button>
                </form>
            <?php } else { ?>
                <div class="alert alert-success" role="alert">
                    User not found!
                </div>
            <?php } ?>
    </div>
</body>

</html>