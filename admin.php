<?php 
session_start();

// include('functions.php');
// if (!isAdmin()) {
// 	$_SESSION['msg'] = "You must log in first";
// 	header('location: login.php');
// };
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
	
<div class="body_admin">

<?php include "haeder.php" ?>
	<form class="form_admin" method="post" action="admin.php" enctype="multipart/form-data">
		
				<h2>Admin - Create User</h2>
		
	
			<label>Username</label>
			<input class="form-control" type="text" name="username" value="<?php  if(isset($username)){ echo $username; } ?>" placeholder="Nhập username...">
		
		
			<label>Full Name</label>
			<input class="form-control" type="text" name="fullname" value="<?php  if(isset($fullname)){ echo $fullname; } ?>" placeholder="Nhập fullname...">
		
	
			<label>Email</label>
			<input class="form-control" type="email" name="email" value="<?php  if(isset($email)){ echo $email; } ?>" placeholder="Nhập email...">
	
		
			<label>User type</label>

			<select class="form-control" name="user_type" id="user_type" >
				
				<option value="admin">Admin</option>
				<option value="user">User</option>
			</select>
	
	
			<label>Password</label>
			<input class="form-control" type="password" name="password_1" placeholder="Nhập password...">
	
			<label>Confirm password</label>
			<input class="form-control" type="password" name="password_2" placeholder="Nhập lại password...">
	
            <label>Avata image</label>
            <input class="form-control" type="file" name="upload_file" id="upload_file"/>
            <?php
                $str_out = '';
                if( isset( $image ) ) {
                    $str_out .= '<a style="background:url("'.$image.'") "></a>';
                }
                echo $str_out;
            ?>
      
			<label>Upload File:</label>

			<input class="form-control" type="file" name="avata">
	
			<button type="submit" class="btn" name="register_btn"> Create User</button>
	

		<p>
		<a href="http://localhost/login/home.php">HOME</a></p>
		<p>
		Already a member? <a href="login.php">Sign in</a>
	</p>
	</form>
	

	<?php include "foooter.php" ?>
	</div>
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
<script>
		const password_1 = document.querySelector('#password-1');
		const password_2 = document.querySelector('#password-2');
		const register_btn = document.querySelector('#register_btn');
		const username = document.querySelector('#username');
		const fullname = document.querySelector('#fullname');
		const form = document.querySelector('form');
		username.pattern = '[a-zA-Z0-9]{3,}';
		fullname.pattern = '[a-zA-Z]{3,}(\\s[a-zA-Z]+)+';
	
		register_btn.onclick = () => {
			if (password_1.value != password_2.value) {
				return false;
			}
		}
		form.onsubmit = (e) => {
			if (form.checkValidity() === false) {
				e.preventDefault();
			}
			form.classList.add('was-validated');
			
		};
	</script>
</body>
</html>