<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cate edit</title>
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/css/post.css">
</head>
<?php
// Kết nối Database
include 'posts_connect.php';
$id=$_GET['id_category'];
$query=mysqli_query($conn,"select * from `category` where id_category ='$id'");
$row=mysqli_fetch_assoc($query);
?>

<body>
    <?php
    include 'header_admin.php';
    ?>
    <section class="body">
        <div class="container">
            <div class="title">
                <h1>Update Category</h1>
            </div>
            <div class="wrapper">
                <form method="POST" class="form">
                    <div class="form__input">
                        <h3 class="title">Name</h3>
                        <input type="text" value="<?php echo $row['NAME']; ?>" name="name" />
                    </div>
                    <div class="form__button">
                        <input type="submit" name="update_cate" value="Update" />
                    </div>
                </form>
                <form method="get" action="cate_view.php">
                    <button type="submit" class="back">Back</button>
                </form>
            </div>
        </div>
    </section>
    <?php
if (isset($_POST['update_cate'])){
$id=$_GET['id_category'];
$name=$_POST['name'];
// Create connection
$conn = new mysqli("localhost", "root", "", "doan_nhomi");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE `category` SET NAME='$name' WHERE id_category='$id'";
$conn->set_charset('utf8');

if ($conn->query($sql) === TRUE) {
header("Location: cate_view.php");
} else {
echo "Error updating record: " . $conn->error;
}

$conn->close();
}
?>

</body>

</html>