<?php 
$conn = mysqli_connect('localhost', 'root', '', 'users');

$username = "";
$fullname = "";
$email    = "";
$errors   = array(); 


if (isset($_POST['register_btn'])) {
	if(isset($_POST['user_type']))
	{
		if($_POST['user_type'] == 'user' || $_POST['user_type'] == 'admin')
		{
			register();
		}

		else
		{
			array_push($errors, "Please choose a User Type!");
		}
	}

	register();

	
}


function register(){

	global $conn, $errors, $username,$fullname, $email;

    $username    =  escape($_POST['username']);
    $fullname    =  escape($_POST['fullname']);
	$email       =  escape($_POST['email']);
	$password_1  =  escape($_POST['password_1']);
	$password_2  =  escape($_POST['password_2']);

	// định nghĩa các biến và set giá trị mặc định là blank
	$user = $email1 = $fullname1 = $pass1 = $pass2 = "";

	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	$user = test_input($_POST["username"]);
	$email1 = test_input($_POST["email"]);
	$fullname1 = test_input($_POST["fullname"]);
	$pass1 = test_input($_POST["password_1"]);
	if(!empty($fullname) || !empty($email) || !empty($username))
	{
		if(!preg_match("/^[a-z0-9_-]{3,16}$/",$user))
		{
			array_push($errors, "only Number,letter and minium 3 characters!"); 
		}


		if (!preg_match("/^[a-zA-Z][\\w-]+@([\\w]+\\.[\\w]+|[\\w]+\\.[\\w]{2,}\\.[\\w]{2,})$/", $email1)) 
		{
			array_push($errors, "Wrong  Email format!"); 
		}

		if (!preg_match("/^[a-zA-Z]{2,20}(\s[a-zA-Z]+)+$/",$fullname1))
		{
			array_push($errors, "Only letters and whitespace allowed");
		}

		if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,20}$/",$pass1)) 
		{
			array_push($errors, "Password: Minimum six characters, at least one letter and one number");
		}
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



	if (count($errors) == 0) {
		$password = md5($password_1);

		$sql="select * from users where username='$username'";
		$kt = mysqli_query($conn, $sql);
		$sql1="select * from users where email='$email'";
		$kt1 = mysqli_query($conn, $sql1);

		if(mysqli_num_rows($kt)  > 0){
			array_push($errors, "Username already exist"); 
		}
		else if(mysqli_num_rows($kt1)  > 0)
		{
			array_push($errors, "email already exist"); 
		}

		else
		{
			if (isset($_POST['user_type'])) {
				$user_type = escape($_POST['user_type']);
				$query = "INSERT INTO users (username,fullname, email, user_type, password) 
						  VALUES('$username', '$fullname', '$email', '$user_type', '$password')";
				mysqli_query($conn, $query);
				$_SESSION['success']  = "New user successfully created!!";
				header('location: home.php');
			}
			else
			{
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
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
  }


function edit($user_id) {
	global $conn, $errors, $username,$fullname, $email;
	$username    =  escape($_POST['username1']);
    $fullname    =  escape($_POST['fullname1']);
	$email       =  escape($_POST['email1']);

	// định nghĩa các biến và set giá trị mặc định là blank
	//$user2 = $email2 = $fullname2 = $pass2 = $pass3 = "";

	mysqli_query($conn, "UPDATE `users` SET `username` = '$username', `fullname` = '$fullname', `email`='$email' WHERE `id` = '$user_id'");
	
	$_SESSION['success']  = "Change successfully";
	// // header("Refresh:2; url=page2.php");
	if (isset($_COOKIE["user"]) AND isset($_COOKIE["pass"])){
		setcookie("user", '', time() - 3600);
		setcookie("pass", '', time() - 3600);
    }
	header('location: home.php');
	


    if (empty($fullname)) { 
		array_push($errors, "Fullname is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	// if ($password_1 != $password_2) {
	// 	array_push($errors, "The two passwords do not match");
	// }
	
}

if (isset($_POST['save_btn'])) {
	$username    =  escape($_POST['username1']);
    $fullname    =  escape($_POST['fullname1']);
	$email       =  escape($_POST['email1']);

	$user2 = $email2 = $fullname2 = "";
	$user2 = test_input($_POST["username1"]);
	$email2 = test_input($_POST["email1"]);
	$fullname2 = test_input($_POST["fullname1"]);
	if(isAdmin() == true && !empty($username) && !empty($fullname) && !empty($email))
	{
		if(!preg_match("/^[a-z0-9_-]{3,16}$/",$user2))
		{
			array_push($errors, "only Number,letter and minium 3 characters!"); 
		}

		if (!preg_match("/^[a-zA-Z][\\w-]+@([\\w]+\\.[\\w]+|[\\w]+\\.[\\w]{2,}\\.[\\w]{2,})$/", $email2)) 
		{
			array_push($errors, "Wrong  Email format!"); 
		}

		if (!preg_match("/^[a-zA-Z]{2,}(\s[a-zA-Z]+)+$/",$fullname2))
		{
			array_push($errors, "Only letters and whitespace allowed");
		}

		else
		{
			edit($user_id);
			header('location: index.php');
		}
	}
	else if(isAdmin() == false && !empty($username) && !empty($fullname) && !empty($email))
	{
		if(!preg_match("/^[a-z0-9_-]{3,16}$/",$user2))
		{
			array_push($errors, "only Number,letter and minium 3 characters!"); 
		}

		if (!preg_match("/^[a-zA-Z][\\w-]+@([\\w]+\\.[\\w]+|[\\w]+\\.[\\w]{2,}\\.[\\w]{2,})$/", $email2)) 
		{
			array_push($errors, "Wrong  Email format!"); 
		}

		if (!preg_match("/^[a-zA-Z]{2,}(\s[a-zA-Z]+)+$/",$fullname2))
		{
			array_push($errors, "Only letters and whitespace allowed");
		}

		else
		{
			edit($user_id);
			header('location: index.php');
		}
	}

	
	else
	{
		array_push($errors, "please fill in the form!");
	}
}

function edituserID() {
	global $conn, $errors, $id, $username,$fullname, $email;
	$id    		 =  escape($_POST['id1']);
	$username    = escape($_POST['username1']);
    $fullname    =  escape($_POST['fullname1']);
	$email       =  escape($_POST['email1']);

	mysqli_query($conn, "UPDATE `users` SET `id` = '$id', `username` = '$username', `fullname` = '$fullname', `email`='$email' WHERE `id` = '$id'");
	
	$_SESSION['success']  = "Change successfully";
	// // header("Refresh:2; url=page2.php");
	if (isset($_COOKIE["user"]) AND isset($_COOKIE["pass"])){
		setcookie("user", '', time() - 3600);
		setcookie("pass", '', time() - 3600);
    }
	header('location: home.php');
	
}

if (isset($_POST['saveuserid_btn'])) {
	edituserID();
}

function edittuserID() {
	global $conn, $errors, $id, $username,$fullname, $email;
	$id    		 =   $_SESSION['user']['id'];
	$username    = escape($_POST['username1']);
    $fullname    =  escape($_POST['fullname1']);
	$email       =  escape($_POST['email1']);

	mysqli_query($conn, "UPDATE `users` SET `id` = '$id', `username` = '$username', `fullname` = '$fullname', `email`='$email' WHERE `id` = '$id'");
	
	$_SESSION['success']  = "Change successfully";
	// // header("Refresh:2; url=page2.php");
	if (isset($_COOKIE["user"]) AND isset($_COOKIE["pass"])){
		setcookie("user", '', time() - 3600);
		setcookie("pass", '', time() - 3600);
    }
	header('location: home.php');
	
}

if (isset($_POST['saveuserusid_btn'])) {
	edittuserID();
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


function getUserById($id){
	global $conn;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($conn, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
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


//get value by options
function get_by_options($table, $options = array())
{
    $select = isset($options['select']) ? $options['select'] : '*';
    $where = isset($options['where']) ? 'WHERE ' . $options['where'] : '';
    $order_by = isset($options['order_by']) ? 'ORDER BY ' . $options['order_by'] : '';
    $limit = isset($options['offset']) && isset($options['limit']) ? 'LIMIT ' . $options['offset'] . ',' . $options['limit'] : '';
    global $conn;
    $sql = "SELECT $select FROM `$table` $where $order_by $limit";
    $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $data = array();
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;
        }
        mysqli_free_result($query);
    }
    return $data;
}

function get_total($table, $options = array())
{
    global $conn;
    $where = isset($options['where']) ? 'WHERE ' . $options['where'] : '';
    $sql = "SELECT COUNT(*) as total FROM `$table` $where";
    $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($query);
    return $row['total'];
}

//phan trang admin
function pagination_admin($url, $page, $total)
{
    $adjacents = 2;
    $out = '<ul class="pagination">';
    //trang dau
    if ($page == 1) {
        $out .= '<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Trang Đầu</a></li>';
    } else {
        $out .= '<li class="page-item"><a class="page-link" href="' . $url . '">Trang Đầu</a></li>';
    }
    // lui
    if ($page == 1) {
        $out .= '<li class="page-item disabled"><span class="page-link"><span aria-hidden="true">&laquo;</span></li>';
    } elseif ($page == 2) {
        $out .= '<li class="page-item"><a class="page-link" href="' . $url . '"><span aria-hidden="true">&laquo;</span></a></li>';
    } else {
        $out .= '<li class="page-item"><a class="page-link" href="' . $url . '&amp;page=' . ($page - 1) . '"><span aria-hidden="true">&laquo;</span></a></li>';
    }
    $pmin = ($page > $adjacents) ? ($page - $adjacents) : 1;
    $pmax = ($page < ($total - $adjacents)) ? ($page + $adjacents) : $total;
    for ($i = $pmin; $i <= $pmax; $i++) {
        if ($i == $page) {
            $out .= '<li class="page-item active"><span class="page-link">' . $i . '</span></li>';
        } elseif ($i == 1) {
            $out .= '<li class="page-item"><a class="page-link" href="' . $url . '">' . $i . '</a></li>';
        } else {
            $out .= '<li class="page-item"><a class="page-link" href="' . $url . "&amp;page=" . $i . '">' . $i . '</a></li>';
        }
    }
    // tiep
    if ($page < $total) {
        $out .= '<li class="page-item"><a class="page-link" href="' . $url . '&amp;page=' . ($page + 1) . '"> <span aria-hidden="true">&raquo;</span></a></li>';
    } else {
        $out .= '<li class="page-item disabled"><span class="page-link"><span aria-hidden="true">&raquo;</span></span></li>';
    }
    //Trang cuoi
    if ($page < $total) {
        $out .= '<li class="page-item"><a class="page-link" href="' . $url . '&amp;page=' . $total . '">Trang  	Cuối</a></li>';
    } else {
        $out .= '<li class="page-item disabled"><span class="page-link">Trang Cuối</span></li>';
    }
    $out .= '</ul>';
    return $out;
}

function passwordID() {
	global $conn, $errors, $id, $username,$fullname, $email;
	$id    		 =  $_SESSION['user']['id'];
	$username    = escape($_POST['username1']);
    $fullname    =  escape($_POST['fullname1']);
	$password_1      =  escape($_POST['password1']);
	$password_2      =  escape($_POST['password2']);
	$password_3      =  escape($_POST['password3']);

	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if (empty($password_2)) { 
		array_push($errors, "Password is required"); 
	}
	if (empty($password_3)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_2 != $password_3) {
		array_push($errors, "The two passwords do not match");
	}
	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password_1  = md5($password_1 );
		$password_2  = md5($password_2 );

        $query = "SELECT * FROM users WHERE username='$username' AND password='$password_1' LIMIT 1";
        $query2 = "SELECT * FROM users WHERE username='$username' AND password='$password_1'";
        $results = mysqli_query($conn, $query);
        $results2 = mysqli_query($conn, $query2);
        $row = mysqli_fetch_array($results2);
		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
            $logged_in_user = mysqli_fetch_assoc($results);
            
			if ($logged_in_user['user_type'] == 'user') {

				$_SESSION['user'] = $logged_in_user;
                $_SESSION['success']  = "You are now logged in";
                
                if (isset($_POST['remember'])){
                    //thiết lập cookie username và password
                    setcookie("user", $row['username'], time() + (86400 * 30)); 
                    setcookie("pass", $row['password'], time() + (86400 * 30)); 
                }
				mysqli_query($conn, "UPDATE `users` SET `password` = '$password_2' WHERE `id` = '$id'");	  
				header('location: index.php');
			}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

if (isset($_POST['password_btn'])) {
	passwordID();
}


