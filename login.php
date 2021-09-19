<?php
session_start();

    include('functions.php')
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="public/css/styles.css">
    <link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/font-awesome.min.css">
</head>
<body>
    <?php include 'views/header.php'?>
    <div class="container">
        <form method="post" action="login.php">

            <?php echo display_error(); ?>

            <div class="input-group">
                <label>Username</label>
                <input type="text" value="<?php if (isset($_COOKIE["user"])){echo $_COOKIE["user"];}?>" name="username" >
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" value="<?php if (isset($_COOKIE["pass"])){echo $_COOKIE["pass"];}?>" name="password">
            </div>
            <div class="row align-items-center">
                <input type="checkbox" name="remember">Remember Me
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="login_btn">Login</button>
            </div>
            <p>
                Not yet a member? <a href="register.php">Sign up</a>
            </p>
        </form>
    </div>
</body>
</html>