<?php
// Start the session
session_start();
require_once 'models/BankModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$_id = NULL;

if (!empty($_GET['id'])) {
    $_id = $_GET['id'];
    $user = $userModel->findUserById($_id);//Update existing user
}


if (!empty($_POST['submit'])) {

    if (!empty($_id)) {
        $userModel->updateUser($_POST);
    } else {
        $userModel->insertUser($_POST);
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
                        <label for="user_ID">User_ID</label>
                        <input type="user_ID" name="user_ID" class="form-control" placeholder="User_ID">
                    </div>
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