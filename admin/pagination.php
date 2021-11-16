<?php  
    include 'posts_connect.php';
    $limit = 6; 
    $result_db = mysqli_query($conn,"SELECT COUNT(ID_POST) FROM post"); 
    $row_db = mysqli_fetch_row($result_db);  
    $total_records = $row_db[0];  
    $total_pages = ceil($total_records / $limit); 
    $pagLink = "<ul class='pagination' style='justify-content: center;'>";  
    for ($i=1; $i<=$total_pages; $i++) {
                  $pagLink .= "<li style='display: inline; margin: 3px; font-size: 20px;' 
                  class='page-item'><a class='page-link' style='color: #be2623;' href='posts_view.php?page=".$i."'>".$i."</a></li>";   
    }
    echo $pagLink . "</ul>";
?>