<?php 
session_start();

include('functions.php');

if(isset($_POST['username1']))
{
	$username=$_POST['username1'];
}
if(isset($_POST['fullname1']))
{
	$fullname=$_POST['fullname1'];
}
if(isset($_POST['email1']))
{
	$email=$_POST['email1'];
}
if(isset($_POST['id']))
{
	$id=$_POST['id'];
}

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
            <input type="text" name="username1" value="<?php $username?>">
        </div>
        <div class="input-group">
            <label>Full Name</label>
            <input type="text" name="fullname1"value="<?php $fullname?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email1"value="<?php $email?>">
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