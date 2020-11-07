<?php
session_start();
session_regenerate_id(true);
include('functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}
$query=mysqli_query($conn,"SELECT * from users Where id ");
$result=mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="public/css/sass/home.css">
</head>
<body>
	<div class="header">
		<h2>Admin - Home Page</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<div class="profile_info">
			<img src="public/images/admin_profile.png"  >

			<div>
                <?php  if (isset($_SESSION['user'])) : ?>
                    <strong><?php echo $_SESSION['user']['username']; ?></strong>
					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<?php echo $_SESSION['user']['fullname']; ?><br>
                        <?php echo $_SESSION['user']['email']; ?><br>
						<a class="btn btn-primary" href="admin.php">Add User</a> &nbsp; <a class="btn btn-primary"  href="list.php">List User</a> &nbsp; <a class="btn btn-primary" href="edit.php?edit=<?php echo base64_encode(base64_encode(base64_encode($result['id']))) ?>">Edit Information</a> <a class="btn btn-primary"  href="home.php?logout='1'" style="color: white;">Logout</a>
                       
					</small>
				<?php endif ?>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="./public/js/less.min.js"></script>
</body>
</html>