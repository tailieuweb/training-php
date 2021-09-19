<?php 
session_start();

include('functions.php');

// if (isset($_GET['edit'])) {
//     if(isLoggedIn()){
//         $query = "SELECT * FROM users WHERE id=" . $_SESSION['user']['id'];
//         $results = mysqli_query($conn, $query);
        
//     }
// }
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

<form method="post" action="">
	<?php echo display_error(); ?>	
        
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username1">
        </div>
        <div class="input-group">
            <label>Full Name</label>
            <input type="text" name="fullname1">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email1">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="save_btn">Save</button>
        </div>

</form>
<div class="back" style="text-align: center">
    <input type="button" value="Back" onClick="javascript:history.go(-2)" />
</div>
	


</body>
</html>