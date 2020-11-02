<?php 
session_start();

include('functions.php');

// if (isset($_GET['edit'])) {
//     if(isLoggedIn()){
//         $query = "SELECT * FROM users WHERE id=" . $_SESSION['user']['id'];
//         $results = mysqli_query($conn, $query);
        
//     }
// }
$id = $_SESSION['user']['id'];
$query=mysqli_query($conn,"select * from `users` where id='$id'");
$row=mysqli_fetch_assoc($query);

?>

<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
<div class="header">
	<h2>Edit Password</h2>
</div>
</form>

<form method="post" action="">
	<?php echo display_error(); ?>	
        <div class="input-group">
            <label>Username</label>
            <input type="text" value="<?php echo $row['username']; ?>" name="username1" readonly>
        </div>
        <div class="input-group">
            <label>Full Name</label>
            <input type="text" value="<?php echo $row['fullname']; ?>" name="fullname1" readonly>
        </div>
        <div class="input-group">
            <label>Old password</label>
            <input type="password"  name="password1" pattern="[a-zA-Z1-9]{1,15}">
        </div>
        <div class="input-group">
            <label>New password</label>
            <input type="password" name="password2" pattern="[a-zA-Z1-9]{1,15}">
        </div>
        <div class="input-group">
            <label>Re-enter new password</label>
            <input type="password" name="password3" pattern="[a-zA-Z1-9]{1,15}">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="password_btn" onclick="return updatepassword()">Save</button>
        </div>
<div class="back" style="text-align: center">
    <input type="button" value="Back" onClick="javascript:history.go(-2)" />
</div>
    <script language="JavaScript" type="text/javascript">
        function updatepassword(){
        return confirm('Are you update?');
        }
    </script>


</body>
</html>