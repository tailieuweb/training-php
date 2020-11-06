<?php 
session_start();

include('functions.php');
$id = base64_decode(isset($_GET['id']) ? $_GET['id'] : '') ;
if (isset($_GET['edit'])) {
    if(isLoggedIn()){
        $query = "SELECT * FROM users WHERE id=" . $_SESSION['user']['id'];
        $results = mysqli_query($conn, $query);
        
    }
}
$result = getUserById($id);
?>

<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
<div class="header">
	<h2>Edit User</h2>
</div>
</form>

<form method="post" action="" enctype="multipart/form-data">
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
            <input type="text" name="username1" value="<?php echo $result['username'] ?>" disabled>
        </div>
        <div class="input-group">
            <label>Full Name</label>
            <input type="text" name="fullname1" value="<?php echo $result['fullname'] ?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email1" value="<?php echo $result['email'] ?>">
        </div>
        <div class="input-group">
			<label for="image">User Image</label>
            <input type="file" name="image" id="image">
		</div>
        <div class="input-group">
            <button  type="submit" class="btn" name="save_btn" onClick = "return confirm('Bạn có muốn sửa?')"> Save</button>
        </div>

</form>
<div class="back" style="text-align: center">
    <input type="button" value="Back" onClick="javascript:history.go(-2)" />
</div>
	


</body>
</html>