<head>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="noidung">
        <table border="1">
            <?php
require 'posts_connect.php';
// Up bài viết
if (isset($_POST['btn_submit'])) {
    //XSS
    $title = htmlentities($_POST['title']);
    $header = htmlentities ($_POST['header']);
    $content = htmlentities($_POST['content']);
    $id_cate = htmlentities($_POST['id_cate']);

    // Upload ảnh 
    $image = $_FILES['image']['name'];
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_parts =explode('.',$_FILES['image']['name']);
    $file_ext=strtolower(end($file_parts));
           
    $expensions= array("jpeg","jpg","png");
           
    if(in_array($file_ext,$expensions)=== false){
        $errors[]="Chỉ hỗ trợ upload file JPEG hoặc PNG.";
    }
           
    if($file_size > 2097152) {
        $errors[]='Kích thước file không được lớn hơn 2MB';
    }
    $target = "../public/images/".basename($image);
    $sql = "INSERT INTO post( TITLE, SAPO, CONTENT, ID_CATEGORY, IMAGE1 ) VALUES ( '$title', '$header', '$content', $id_cate,'$image' )";
    if (mysqli_query($conn, $sql) && move_uploaded_file($_FILES['image']['tmp_name'], $target) && empty($errors)==true) {
            echo '<script language="javascript">alert("Đăng bài viết thành công!");</script>';
            header('location: posts_view.php');
            } else{
            echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý");</script>';
    }
}
?>
        </table>
    </div>

</body>

</html>