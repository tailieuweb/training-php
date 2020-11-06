<?php 
session_start();

include('functions.php');
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

if(isAdmin() == true && isloggedIn() == true)
{
	header('location: home.php');
}

else
{
	?>
	<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="public/css/styles.css">
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/font-awesome.min.css">
	<link rel="stylesheet/less" type="text/css" href="public/css/style.less" />
    <script  type="text/javascript" src="public/js/less.min.js"></script>
</head>
<body>
	<div class="header">
		<h2>Home Page</h2>
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
			<img src="public/images/user_profile.png">
			
			<div>
			
				<?php  if (isset($_SESSION['user'])) : ?>
					<br><strong>Username: <?php echo $_SESSION['user']['username']; ?><i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i></strong>

					<small>
						<br><strong>Fullname: </strong> <?php echo $_SESSION['user']['fullname']; ?>
						<br><strong>Email: </strong> <?php echo $_SESSION['user']['email']; ?><br>
						<?php $id_encode = $_SESSION['user']['id']; ?>
						<div class="input-group">
							<button class="btn" name="login_btn"><a href="edituserus.php?id='<?php echo md5($id_encode); ?>" style="color: #FFFFFF;">Edit Information</a><br></button>
						</div>
						<div class="input-group">
							<button class="btn" name="updatepassword_btn"><a href="password.php?id='<?php echo md5($id_encode); ?>" style="color: #FFFFFF;">Update Pasword</a><br></button>
						</div>
						<div class="input-group">
							<button class="btn" name="login_btn"><a href="index.php?logout='1'" style="color: #FFFFFF;">Logout</a></button>
						</div>
					</small>		
				<?php endif ?>
			</div>
		</div>
	</div>
</body>
</html>
	<?php
}
?>

