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
$query=mysqli_query($conn,"select * from `users` where id ='$id'");
$row=mysqli_fetch_assoc($query);

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
            <input type="text" value="<?php echo $row['username']; ?>" name="username1" required pattern="[a-zA-Z1-9]{1,30}">
        </div>
        <div class="input-group">
            <label>Full Name</label>
            <input type="text/javascript" value="<?php echo $row['fullname']; ?>" name="fullname1" required pattern="[a-z A-Z 1-9]{1,50}">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" value="<?php echo $row['email']; ?>" name="email1" required >
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="saveuserusid_btn"  onclick="return checkDelete()">Save</button>
        </div>

<div class="back" style="text-align: center">
    <input type="button" value="Back" onClick="javascript:history.go(-1)" />
</div>
    <script language="JavaScript" type="text/javascript">
        function checkDelete(){
        return confirm('Are you update?');
    }
    </script>


</body>
</html>