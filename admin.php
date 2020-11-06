<?php 
session_start();

include('functions.php');
if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
if (isset($_POST['register_btn']) && $_SESSION['token'] == $_POST['token']) {
	register();
}
$token = md5(random(6));
$_SESSION['token'] = $token;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Create user</title>
	<link rel="stylesheet" type="text/css" href="public/css/styles.css">
	<style>
		.header {
			background: #003366;
		}
		button[name=register_btn] {
			background: #003366;
		}
	</style>
</head>
<body>
	<div class="header">
		<h2>Admin - Create User</h2>
	</div>
	
	<form method="post" action="admin.php" enctype="multipart/form-data">

		<?php echo display_error(); ?>
		<?php if (isset($_SESSION['success'])) : ?>
                <div class="error success">
                    <h3>
                        <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>
                    </h3>
                </div>
            <?php endif ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Full Name</label>
			<input type="text" name="fullname" value="<?php echo $fullname; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>User type</label>
			<select name="user_type" id="user_type" >
				<option value=""></option>
				<option value="admin">Admin</option>
				<option value="user">User</option>
			</select>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<label for="image">User Image</label>
            <input type="file" name="image" id="image">
		</div>
		<input type="hidden" name="token" value="<?php echo $token?>">
		<div class="input-group">
			<button type="submit" class="btn" name="register_btn" onClick = "return confirm('Bạn có muốn thêm?')"> Create User</button>
		</div>
		
		<p>
		<a href="home.php">HOME</a></p>
	</form>
</body>
</html>