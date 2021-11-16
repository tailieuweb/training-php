<?php
    include_once('posts_connect.php');
    if(isset($_REQUEST['id_category']) and $_REQUEST['id_category']!=""){
        $id=$_GET['id_category'];
        $sql = "DELETE FROM category WHERE id_category='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "Xoá thành công!";
            ?>
            <form method="get" action="cate_view.php">
                <button type="submit">OK</button>
            </form>
            <?php
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();
    }
?>