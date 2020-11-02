<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'userlogin');

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //Bước 1: Tạo thư mục lưu file
        $error = array();
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES['upload']['name']);
        // Kiểm tra kiểu file hợp lệ
        $type_file = pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION);
        $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif');
        if (!in_array(strtolower($type_file), $type_fileAllow)) {
            $error['upload'] = "File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn hình ảnh";
        }
        //Kiểm tra kích thước file
        $size_file = $_FILES['upload']['size'];
        if ($size_file > 5242880) {
            $error['upload'] = "File bạn chọn không được quá 5MB";
        }
    // Kiểm tra file đã tồn tại trê hệ thống
        if (file_exists($target_file)) {
            $error['upload'] = "File bạn chọn đã tồn tại trên hệ thống";
        }
    //
        if (empty($error)) {
            if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {
                echo "Bạn đã upload file thành công";
                $flag = true;
            } else {
                echo "File bạn vừa upload gặp sự cố";
            }
        }
    }
    ?>

?>