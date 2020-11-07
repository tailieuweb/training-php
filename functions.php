<?php 
$conn = mysqli_connect('localhost', 'root', '', 'user');

$username = "";
$fullname = "";
$email    = "";
$errors   = array(); 


if (isset($_POST['register_btn'])) {
	register();
}
function register(){

	global $conn, $errors, $username,$fullname, $email,$fileName,$addfile;
	

    $username    =  escape($_POST['username']);
    $fullname    =  escape($_POST['fullname']);
	$email       =  escape($_POST['email']);
	$password_1  =  escape($_POST['password_1']);
	$password_2  =  escape($_POST['password_2']);
	

	if (empty($username)) { 
		array_push($errors, "Username is required"); 
    }
    if (empty($fullname)) { 
		array_push($errors, "Fullname is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}
	//kiểm tra xem trong form có file ?
	$path='./public/uploads/';
	$styleMe='./public/file/';
if(isset($_FILES['avata']))
{
	if($_FILES['avata']['type'] =="image/png"||$_FILES['avata']['type'] =="image/jpg"||$_FILES['avata']['type'] =="image/jpeg"||$_FILES['avata']['type'] =="image/gif")
	{
		if($_FILES['avata']['size']<800000)
		{
			if($_FILES['avata']['error']==0)
			{
				$fileName = $_FILES['avata']['name'];
				move_uploaded_file($fileName,$path.$_FILES['avata']['name']);
			}
			else{
				echo "Lỗi file:";die();
			}

		}else{
			echo "Phải quá lớn:";die();
		}
	}
	else{
		echo "file không đúng định dạng";die();
	}
	print_r($_FILES);
	die();
}
if($_FILES['addfile'])
{
	if($_FILES['addfile']['size']<999999)
	{
		if($_FILES['addfile']['error']==0)
		{
			$addfile = $_FILES['addfile']['name'];
			move_uploaded_file($addfile,$styleMe.$_FILES['addfile']['name']);
		}
		else{
			echo "Lỗi file";die();
		}
	}else{
		echo "kích thước lớn hơn cho phép";die();
	}die();
}
	

	if (count($errors) == 0) {
		$password = md5($password_1);
		
		if (isset($_POST['user_type'])) {
			$user_type = escape($_POST['user_type']);
			$query = "INSERT INTO users (username,fullname, email, user_type,password,avata,file) 
					  VALUES('$username', '$fullname', '$email', '$user_type', '$password','$fileName','$addfile')";
			mysqli_query($conn, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: home.php');
		}else{
			$query = "INSERT INTO users (username, fullname, email, user_type, password) 
					  VALUES('$username', '$fullname', '$email', 'user', '$password')";
			mysqli_query($conn, $query);

			$logged_in_user_id = mysqli_insert_id($conn);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: index.php');				
		}
	}
}

function edit() {
	global $conn, $errors, $username,$fullname, $email;
	$username    =  escape($_POST['username1']);
    $fullname    =  escape($_POST['fullname1']);
	$email       =  escape($_POST['email1']);

	mysqli_query($conn, "UPDATE `users` SET `username` = '$username', `fullname` = '$fullname', `email`='$email' WHERE `username` = '$username'");
	
	$_SESSION['success']  = "Change successfully";
	// // header("Refresh:2; url=page2.php");
	if (isset($_COOKIE["user"]) AND isset($_COOKIE["pass"])){
		setcookie("user", '', time() - 3600);
		setcookie("pass", '', time() - 3600);
    }
	header('location: home.php');
	
}



if (isset($_POST['save_btn'])) {
	edit();
}


function getUserById($id){
	global $conn;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($conn, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

function escape($val){
	global $conn;
	return mysqli_real_escape_string($conn, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

// log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_destroy();
    unset($_SESSION['user']);

    if (isset($_COOKIE["user"]) AND isset($_COOKIE["pass"])){
		setcookie("user", '', time() - 3600);
		setcookie("pass", '', time() - 3600);
    }
    
	header("location: login.php");
}
if (isset($_POST['login_btn'])) {
	login();
}


// LOGIN USER
function login(){
	global $conn, $username, $errors;

	// grap form values
	$username = escape($_POST['username']);
	$password = escape($_POST['password']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

        $query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
        $query2 = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($conn, $query);
        $results2 = mysqli_query($conn, $query2);
        $row = mysqli_fetch_array($results2);
		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
            $logged_in_user = mysqli_fetch_assoc($results);
            
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
                $_SESSION['success']  = "You are now logged in";
                
                if (isset($_POST['remember'])){
                    //thiết lập cookie username và password
                    setcookie("user", $row['username'], time() + (86400 * 30)); 
                    setcookie("pass", $row['password'], time() + (86400 * 30)); 
                }


				header('location: home.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
                $_SESSION['success']  = "You are now logged in";
                
                if (isset($_POST['remember'])){
                    //thiết lập cookie username và password
                    setcookie("user", $row['username'], time() + (86400 * 30)); 
                    setcookie("pass", $row['password'], time() + (86400 * 30)); 
                }

				header('location: index.php');
			}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}
function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
    }
}
//them:
function add_account($username,$fullname,$email,$user_type,$password_1,$password_2)
{
	global $conn, $errors, $username,$fullname, $email,$user_type,$password_1,$password_2;
	$username    =  escape($_POST['username']);
    $fullname    =  escape($_POST['fullname']);
	$email       =  escape($_POST['email']);
	$password_1  =  escape($_POST['password_1']);
	$password_2  =  escape($_POST['password_2']);
	$query = "INSERT INTO `users` ( `username`, `fullname`, `email`, `user_type`, `password_1`, `password_2`) VALUES ( '$username','$fullname', '$email', '$user_type', '$password_1','$password_2');";
	$results = mysqli_query($conn, $query);
}


