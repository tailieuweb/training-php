<?php 
$conn = mysqli_connect('localhost', 'root', '', 'userlogin');

$id = isset($_GET['id']) ? $_GET['id'] : '';
    $query = "DELETE  FROM users WHERE id = '$id'" or die ("Lỗi truy vấn");
    mysqli_query($conn,$query);
    header("location: http://localhost/php-training1/list.php?list=%271%27");
   
?>