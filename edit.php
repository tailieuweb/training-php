<?php 
session_start();

include 'functions.php';
$id=$_GET['edit'];
$md_id = base64_decode(base64_decode(base64_decode($id)));
$query=mysqli_query($conn,"SELECT * from users Where id=$md_id");
$result=mysqli_fetch_assoc($query);

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

<form method="POST">	
        
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username1" value="<?php echo $result['username'] ?>">
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
            <button  type="submit" class="btn" name="save_btn" onClick = "return confirm('Bạn có muốn sửa?')"> Save</button>
        </div>

</form>
<div class="back" style="text-align: center">
    <input type="button" value="Back" onClick="javascript:history.go(-2)" />
</div>
<?php
if (isset($_POST['save_btn'])){
$id=$_GET['edit'];
$md_id = base64_decode(base64_decode(base64_decode($id)));
$username=$_POST['username1'];
$fullname=$_POST['fullname1'];
$email=$_POST['email1'];

$sql = "UPDATE users SET username='$username', fullname='$fullname', email='$email' WHERE id='$md_id'";
 
if ($conn->query($sql) === TRUE) {
echo "Record updated successfully";
} else {
echo "Error updating record: " . $conn->error;
}
 
$conn->close();
}
?>

</body>
</html>