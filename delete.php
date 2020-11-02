<?php
 session_start();

 include('functions.php');
 error_reporting(0);
 
 $id=$_GET['id'];
 $query = "DELETE FROM users WHERE id = '$id'";
$data = mysqli_query($conn,$query);
if($data)
{
    echo '<script> 
     alert("xóa thành công!!");  
     javascript:history.go(-1)
     </script>';
}
else
{
    '<script> 
    alert("xóa không thành công!!");  
    </script>';
}
?>
