<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./public/css/style_sass.css">   
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
</head>
<body>
 
        <div class="top-header">
            <ul>
                <li>Trang Chủ</li>
                <li>Giới Thiệu</li>
                <li><a href="home.php?logout='1'">Logout</a></li>
                <li onclick="mo_edit()" class="add_user">add user</li>
            </ul>
        </div>
        <script src="./public/js/modal_edit.js"></script>
        <script>
            function mo_edit(){
    document.getElementById("top_modal").style.display ="block";
}
        </script>
</body>
</html>