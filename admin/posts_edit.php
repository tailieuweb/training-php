</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Edit</title>
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/css/post.css">
</head>
<?php
// Kết nối Database
include 'posts_connect.php';
$id=$_GET['ID_POST'];
$rmfId = substr($id, 3);
$rmlId = substr($rmfId, 0, -3);

$query=mysqli_query($conn,"select * from `post` where ID_POST='$rmlId'");
$row=mysqli_fetch_assoc($query);
?>

<body>
    <?php
    include 'header_admin.php';
    ?>
    <section class="body">
        <div class="container">
            <div class="title">
                <h1>Update Post</h1>
            </div>
            <div class="wrapper">
                <form method="POST" class="form">
                    <div class="form__input">
                        <h3 class="title">Title</h3>
                        <textarea name="title" id="content" placeholder="Import title..." rows="3"
                            cols="80"><?php echo $row['TITLE']; ?></textarea>
                    </div>
                    <div class="form__input">
                        <h3 class="title">Header</h3>
                        <textarea name="sapo" class="noidung" rows="3" cols="80"><?php echo $row['SAPO']; ?></textarea>
                    </div>
                    <div class="form__input">
                        <h3 class="title">Content</h3>
                        <textarea name="content" class="noidung" rows="10"
                            cols="80"><?php echo $row['CONTENT']; ?></textarea>
                    </div>
                    <div class="form__input">
                        <h3 class="title">Category</h3>
                        <input type="text" value="<?php echo $row['ID_CATEGORY']; ?>" name="id_category" />
                    </div>
                    <div class="form__input">
                        <h3 class="title">Images</h3>
                        <?php echo "<img src='../public/images/".$row['IMAGE1']."' height=70px width = 90px>"?>
                        <input type="text" name="image" class="hinhanh" value="<?php echo $row['IMAGE1']; ?>">
                    </div>
                    <div class="form__button">
                        <input type="submit" name="update_post" value="Update" />
                    </div>
                </form>
                <form method="get" action="posts_view.php">
                    <button type="submit" class="back">Back</button>
                </form>
            </div>
        </div>
    </section>
    <?php
if (isset($_POST['update_post'])){
$id=$rmlId;
$title=$_POST['title'];
$sapo=$_POST['sapo'];
$content=$_POST['content'];
$id_cate=$_POST['id_category'];
//Upload anh
$image=$_POST['image'];


// Create connection
$conn = new mysqli("localhost", "root", "", "doan_nhomi");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    $sql = "UPDATE `post` SET TITLE='$title', SAPO='$sapo',CONTENT='$content', ID_CATEGORY='$id_cate', IMAGE1='$image' WHERE ID_POST='$id'";
    $conn->set_charset('utf8');

if ($conn->query($sql) === TRUE) {
    header("Location: posts_view.php");
} else {
    echo "Error updating record: " . $conn->error;
}

    $conn->close();
}
?>
</body>

</html>