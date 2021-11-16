<head>
<link rel="stylesheet" href="style.css"/>
</head>
<body>
<div class="noidung" >
<table border="1">
<?php
require 'posts_connect.php';
// Up bài viết
if (isset($_POST['btn_submit'])) {
    //XSS
    $id_cate = htmlentities($_POST['id_cate']);
    $name = htmlentities($_POST['name']);

        $sql = "INSERT INTO category(id_category, NAME ) VALUES ( '$id_cate', '$name' )";
        if (mysqli_query($conn, $sql)){
            header('location: cate_view.php');
            } else{
            echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý");</script>';
        }
}
?>
</table>
</div>

</body>
</html>