<?php
include('functions.php');
if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
$id=$_GET['id'];
$sql = "DELETE FROM users WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
    // echo 'alert("Delete user success !!");';
    echo 'window.location.href="list.php";';
    echo '</script>';
} else {
echo "Error updating record: " . $conn->error;
}
 
$conn->close();
}
?>