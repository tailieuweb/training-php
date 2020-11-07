<?php 
session_start();

// Require https
// if ($_SERVER['HTTPS'] != "on") {
//     $url = "https://". $_SERVER['localhost'] . $_SERVER['localhost'];
//     header("location: admin.php");
//     EXIT;
// }

include('functions.php');
if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}?>
<!DOCTYPE html>
<html>
<head>
	<title>Create user</title>
	<link rel="stylesheet" type="text/css" href="public/css/styles.css">
	<link rel="stylesheet" type="text/css" href="public/css/common.css">
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
		<!-- Chọn file để upload: -->

		<label>Chọn hình ảnh:</label> <br>
		<input type="file" name="fileupload" id="fileupload">
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
			<button type="submit" class="btn" name="register_btn"> Create User</button>
		</div>

		<p>
		<a href="home.php">HOME</a></p>
	</form>
<?php 
    // file upload.php xử lý upload file

    //   if ($_SERVER['REQUEST_METHOD'] !== 'POST')
    //   {
    //       // Dữ liệu gửi lên server không bằng phương thức post
    //       echo "Phải Post dữ liệu";
    //       die;
    //   }

    // Kiểm tra có dữ liệu fileupload trong $_FILES không
    // Nếu không có thì dừng

















    
    // if (!isset($_FILES["fileupload"]))
    // {
    //     echo " ";
    //     die;
    // }


    // // Đã có dữ liệu upload, thực hiện xử lý file upload

    // //Thư mục bạn sẽ lưu file upload
    // $target_dir    = "public/images/";
    // //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
    // $target_file   = $target_dir . basename($_FILES["fileupload"]["name"]);

    // $allowUpload   = true;

    // //Lấy phần mở rộng của file (jpg, png, ...)
    // $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    // // Cỡ lớn nhất được upload (bytes)
    // $maxfilesize   = 800000;

    // //Những loại file được phép upload
    // $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');
  
    // //check bằng hàm getimagesize
    // if(isset($_POST["submit"])) {
    //         //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
    //         $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
    //         if($check !== false)
    //         {
    //             echo "Đây là file ảnh - " . $check["mime"] . ".";
    //             $allowUpload = true;
    //         }
    //         else
    //         {
    //             echo "Không phải file ảnh.";
    //             $allowUpload = false;
    //         }
    //     }

    // // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
    // // Bạn có thể phát triển code để lưu thành một tên file khác
    // if (file_exists($target_file))
    // {
    //     echo "Tên file đã tồn tại trên server, không được ghi đè";
    //     $allowUpload = false;
    // }
    // // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
    // if ($_FILES["fileupload"]["size"] > $maxfilesize)
    // {
    //     echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
    //     $allowUpload = false;
    // }

    // // Kiểm tra kiểu file
    // if (!in_array($imageFileType,$allowtypes ))
    // {
    //     echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
    //     $allowUpload = false;
    // }

    // //Kiểm tra xem allowUpload là true/false

    // if ($allowUpload)
    // {
    //     // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
    //     if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file))
    //     {
    //         echo "File ". basename( $_FILES["fileupload"]["name"]).
    //         " Đã upload thành công.";
  
    //         echo "File lưu tại " . $target_file;
  
    //     }
    //     else
    //     {
    //         echo "Có lỗi xảy ra khi upload file.";
    //     }
    // }
    // else
    // {
    //     echo "Không upload được file, có thể do file lớn, kiểu file không đúng ...";
    // }
?>
</body>
</html>