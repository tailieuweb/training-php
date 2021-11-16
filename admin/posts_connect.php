<?php
$conn = mysqli_connect("localhost","root","","doan_nhomi");
$conn->set_charset('utf8');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>