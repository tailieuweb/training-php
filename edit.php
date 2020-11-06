<?php 
session_start();

include('functions.php');

$id = isset($_GET['id']) ? $_GET['id'] : '';
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

<form method="post" action="">
	<?php echo display_error(); ?>	
        
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username1" value="<?php echo $result['username']; ?>">
        </div>
        <div class="input-group">
            <label>Full Name</label>
            <input type="text" name="fullname1" value="<?php echo $result['fullname']; ?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email1" value="<?php echo $result['email']; ?>">
        </div>
        <div class="input-group">
            <button  type="submit" class="btn" name="save_btn"> Save</button>
        </div>

</form>
<p  class="back"  style="text-align: center">
		<a href="http://localhost/php-training1/home.php">Back</a></p>
	


</body>
</html>