
<?php

if(isset($_POST["city"]))
{
 $connect = mysqli_connect("localhost", "root","", "db_sport");
 $output = '';
 
  $query = "SELECT * FROM tbl_district WHERE matp = '".$_POST["matp"]."'";
  $result = mysqli_query($connect, $query);
    $output .= '<option value="">Chọn quận huyện</option>';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["maqh"].'">'.$row["name"].'</option>';
  }
  echo $output;

 }
?>





