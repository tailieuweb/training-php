<?php 
session_start();

include('functions.php');
if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
};
if(!empty($_POST))
{
$username = $fullname = $email = $user_type = $password_1 = $password_2 = '';
if(isset($_POST['username']))
{
	$username=$_POST['username'];
}
if(isset($_POST['fullname']))
{
	$fullname=$_POST['fullname'];
}
if(isset($_POST['user_type']))
{
	$user_type=$_POST['user_type'];
}
if(isset($_POST['password_1']))
{
	$password_1=$_POST['password_1'];
}
if(isset($_POST['password_2']))
{
	$password_2=$_POST['password_2'];
}
$path='./public/uploads/';
if(isset($_FILES['avata']))
{
	if($_FILES['avata']['type'] =="image/png"||$_FILES['avata']['type'] =="image/jpg"||$_FILES['avata']['type'] =="image/jpeg"||$_FILES['avata']['type'] =="image/gif")
	{
		if($_FILES['avata']['size']<800000)
		{
			if($_FILES['avata']['error']==0)
			{
				$fileName = $_FILES['avata']['tmp_name'];
				move_uploaded_file($fileName,$path.$_FILES['avata']['name']);
			}
			else{
				echo "Lỗi file:";
			}

		}else{
			echo "Phải quá lớn:";
		}
	}
	else{
		echo "file không đúng định dạng";
	}
}
}


$styleme='./public/file/';
if(isset($_FILES['avata']))
{
	
		if($_FILES['avata']['size']<800000)
		{
			if($_FILES['avata']['error']==0)
			{
				$fileName = $_FILES['avata']['tmp_name'];
				move_uploaded_file($fileName,$styleme.$_FILES['avata']['name']);
			}
			else{
				echo "Lỗi file:";
			}

		}else{
			echo "Phải quá lớn:";
		}
}
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
            <label>Avata image</label>
            <input type="file" name="upload_file" id="upload_file"/>
            <?php
                $str_out = '';
                if( isset( $image ) ) {
                    $str_out .= '<a style="background:url("'.$image.'") "></a>';
                }
                echo $str_out;
            ?>
        </div>
		<div class="input-group">
			<label>Upload File:</label>
			<input type="file" name="avata">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="register_btn"> Create User</button>
		</div>

		<p>
		<a href="http://localhost/newlogin/home.php">HOME</a></p>
	</form>
	<script language="javascript">

		var check = true;
		function checkBeforeSubmit() {
			check = confirm('Bạn có muốn thêm thông tin nhân viên không:')
			if (!check) {
				check = false;

				return check;
			} else {
				return true;
			}
		}
	</script>
</body>
</html>