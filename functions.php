<?php 
$conn = mysqli_connect('localhost', 'root', '', 'userlogin');

$username = "";
$fullname = "";
$email    = "";
$errors   = array(); 


if (isset($_POST['register_btn'])) {
	register();
}

function register(){
	// Define path image
    defined( 'YIVIC_FOLDER_PATH' ) || define( 'YIVIC_FOLDER_PATH', 'public/images/' );
    defined( 'YIVIC_FILE_PATH' ) || define( 'YIVIC_FILE_PATH', YIVIC_FOLDER_PATH.$_FILES['upload_file']['name'] );

    defined( 'YIVIC_FOLDER_EXT_PATH' ) || define( 'YIVIC_FOLDER_EXT_PATH', 'public/libs/' );
    defined( 'YIVIC_FILE_EXT_PATH' ) || define( 'YIVIC_FILE_EXT_PATH', YIVIC_FOLDER_EXT_PATH.$_FILES['upload_file_ext']['name'] );

	global $conn, $errors, $username,$fullname, $email, $image,$file;

    	$username    =  escape($_POST['username']);
    	$fullname    =  escape($_POST['fullname']);
		$email       =  escape($_POST['email']);
		$image       =  escape( YIVIC_FILE_PATH );
		$file     =  escape( __DIR__.'/'.YIVIC_FILE_EXT_PATH );
		$password_1  =  escape($_POST['password_1']);
		$password_2  =  escape($_POST['password_2']);
		$flag_ok = true;
	
	// Check upload image
    if( isset( $_POST['submit'] ) ) {
        $check = getimagesize($_FILES['upload_file']['name']);
        if( $check !== false ) {
            echo 'File is an image - '. $check['mime'] .'.';
            $flag_ok = true;
        } else {
            echo 'File is not an image';
            $flag_ok = false;
        }
    }
    if( file_exists( YIVIC_FILE_PATH ) ) {
        echo 'File đã tồn tại';
        $flag_ok = false;
    }

    $ex = array( 'jpg', 'png', 'jpeg', 'jpeg' );
    $file_type = strtolower( pathinfo( YIVIC_FILE_PATH, PATHINFO_EXTENSION ) );
    if( !in_array( $file_type, $ex ) ) {
        echo 'Loại file không hợp lệ!';
        $flag_ok = false;
    }

    if( $_FILES['upload_file']['size'] > 5000000 ) {
        echo 'Dung lượng tệp quá lớn!';
        $flag_ok = false;
    }
    if( $flag_ok ) {
        move_uploaded_file( $_FILES['upload_file']['tmp_name'], YIVIC_FILE_PATH );
    }
    else {
        echo 'Không upload được!';
    }

    // Check upload file
    $sizeExt = $_FILES["upload_file_ext"]["size"];
    if( $sizeExt <= 5*1024*1024 ) {
        move_uploaded_file( $_FILES["upload_file_ext"]["tmp_name"],YIVIC_FILE_EXT_PATH );
    } else{
        echo "File cua ban phai nho hon 5M";
    }



	if (empty($username)) { 
		array_push($errors, "Username is required"); 
    }
    if (empty($fullname)) { 
		array_push($errors, "Fullname is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($image)) {
        array_push($errors, "Image is required");
    }
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}

	//kiểm tra xem trong form có file ?
	$path='./public/uploads/';
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

$styleme='./public/file/';
if(isset($_FILES['avata']))
{
	
		if($_FILES['avata']['size']<800000)
		{
			if($_FILES['avata']['error']==0)
			{
				$fileName = $_FILES['avata']['name'];
				move_uploaded_file($fileName,$styleme.$_FILES['avata']['name']);
			}
			else{
				echo "Lỗi file:";
			}

		}else{
			echo "Phải quá lớn:";
		}
	

}
	if (count($errors) == 0) {
		$password = md5($password_1);

		if (isset($_POST['user_type'])) {
			$user_type = escape($_POST['user_type']);
			$query = "INSERT INTO users (username,fullname, email,image ,user_type, password, file) 
					  VALUES('$username', '$fullname', '$email','$image','$user_type', '$password', '$file')";
			mysqli_query($conn, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: home.php');
		}else{
			$query = "INSERT INTO users (username, fullname, email,image, user_type, password, file) 
					  VALUES('$username', '$fullname', '$email','$image', '$user_type','user', '$password', '$file')";
			mysqli_query($conn, $query);

			$logged_in_user_id = mysqli_insert_id($conn);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: index.php');				
		}
	}
}

function edit() {
	global $conn, $errors, $id, $username,$fullname, $email;
	$id    =  escape($_POST['id']);
	$username    =  escape($_POST['username1']);
    $fullname    =  escape($_POST['fullname1']);
	$email       =  escape($_POST['email1']);
	$image       =  escape($_POST['image1']);

	mysqli_query($conn, "UPDATE `users` SET `username` = '$username', `fullname` = '$fullname', `email`='$email', `image`='$image' WHERE `id` = '$id'");
	
	$_SESSION['success']  = "Change successfully";
	// // header("Refresh:2; url=page2.php");
	if (isset($_COOKIE["user"]) AND isset($_COOKIE["pass"])){
		setcookie("user", '', time() - 3600);
		setcookie("pass", '', time() - 3600);
    }
	header('location:list.php?list=aa');
	
}

if (isset($_POST['save_btn'])) {
	edit();
}
function edit_tt() {
	global $conn, $errors, $id, $username,$fullname, $email;
	$id    =  escape($_POST['id']);
	$username    =  escape($_POST['username1']);
    $fullname    =  escape($_POST['fullname1']);
	$email       =  escape($_POST['email1']);
	$image       =  escape($_POST['image1']);

	mysqli_query($conn, "UPDATE `users` SET `username` = '$username', `fullname` = '$fullname', `email`='$email', `image`='$image' WHERE `id` = '$id'");
	
	$_SESSION['success']  = "Change successfully";
	// // header("Refresh:2; url=page2.php");
	if (isset($_COOKIE["user"]) AND isset($_COOKIE["pass"])){
		setcookie("user", '', time() - 3600);
		setcookie("pass", '', time() - 3600);
	}
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		header('location:home.php');
	}else{
		header('location:index.php');
    }
	
	
}

if (isset($_POST['save_btntt'])) {
	edit_tt();
}
function getUserById($id){
	global $conn;
	$query = "SELECT * FROM users WHERE id=$id";
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
	
        $isAdmin = mysqli_fetch_array($results2);
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
			}
		
			else{
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
function xapxep()
{
	$xapxep = "SELECT * FROM `users` ORDER BY `users`.`username` ASC";
	$xep = mysqli_query($conn, $xapxep);
	
}
function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
    }
}

function delete($id){
	global $conn;
	$sql = "DELETE FROM `users` WHERE id = $id";
	if($conn->query($sql) === true){
		echo('xóa thành công');
	}
	else{
		echo('xóa không thành công');
	}
	header("location: list.php?list=%271%27");
}
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
function getAllUser()
{
	global $conn;
	$sql = "SELECT * FROM users";
	$query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
	return $row;
}
function pagination($page,$per_page)
{
	
}
function pagination_admin($url, $page, $total)
{
    $adjacents = 2;
    $out = '<ul class="pagination">';
    //first
    if ($page == 1) {
        $out .= '<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Đầu</a></li>';
    } else {
        $out .= '<li class="page-item"><a class="page-link" href="' . $url . '">Đầu</a></li>';
    }
    // previous
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
    // next
    if ($page < $total) {
        $out .= '<li class="page-item"><a class="page-link" href="' . $url . '&amp;page=' . ($page + 1) . '"> <span aria-hidden="true">&raquo;</span></a></li>';
    } else {
        $out .= '<li class="page-item disabled"><span class="page-link"><span aria-hidden="true">&raquo;</span></span></li>';
    }
    //last
    if ($page < $total) {
        $out .= '<li class="page-item"><a class="page-link" href="' . $url . '&amp;page=' . $total . '">Cuối</a></li>';
    } else {
        $out .= '<li class="page-item disabled"><span class="page-link">Cuối</span></li>';
    }
    $out .= '</ul>';
    return $out;
}

