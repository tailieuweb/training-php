<?php
// Start the session
session_start();

require_once 'models/UserModel.php';
$userModel = new UserModel();
if (!empty($_POST['submit'])) {
    $username = $_POST["username"];
    $users = [
        'username' => $_POST['username'],
        'password' => $_POST['password']
    ];
    $user = NULL;
    if ($user = $userModel->auth($users['username'], $users['password'])) {
        //Login successful
        $_SESSION['id'] = $user[0]['id'];
        $_SESSION['username'] =$username;
        $_SESSION['message'] = 'Login successful';
        header('location: list_users.php');
    }else {
        //Login failed
        $_SESSION['message'] = 'Login failed';
    }

}

?>
<!DOCTYPE html>
<html>

<body>
    <form class="navbar-form navbar-left">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search users">
        </div>
        <button type="submit" name="search" class="btn btn-default">Search</button>
    </form>
    <form method="post" class="form-horizontal" role="form">

        <div class="input">
            <input id="login-username" type="text" class="form-control" name="username" value=""
                placeholder="username or email" required>
        </div>

        <div class="input">
            <input id="login-password" type="password" class="form-control" name="password" placeholder="password" required>
        </div>


        <div class="input">
            <!-- Button -->
            <div class="control">
                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <?php $message = 'Please fill in the form';
        echo($message); ?>
    </form>

</body>

</html>