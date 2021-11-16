<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cate view</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/css/post.css">
</head>

<body>
    <?php
    include 'header_admin.php';
    ?>
    <section class="body">
        <div class="container">
            <div class="title">
                <h1>Categories</h1>
            </div>
            <div class="link">
                <a href="cate_add.php">
                    Add Categories
                </a>
            </div>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                </tr>
                <?php
        require 'posts_connect.php';
        $query=mysqli_query($conn,"select * from `category`");
        while($row=mysqli_fetch_array($query)){
    ?>
                <tr>
                    <td><?php echo htmlentities($row['id_category']); ?></td>
                    <td><?php echo htmlentities($row['NAME']); ?></td>
                    <td class="icon"><a href="../pages/search.php?idCategory=<?php echo $row['id_category']; ?>"><i
                                class="fa fa-eye" aria-hidden="true" title="View"></i></a></td>
                    <td class="icon"><a href="cate_edit.php?id_category=<?php echo $row['id_category']; ?>"><i
                                class="fa fa-pencil-square-o" aria-hidden="true" title="Edit"></i></a></td>
                    <td class="icon"><a href="cate_delete.php?id_category=<?php echo $row['id_category']; ?>"><i
                                class="fa fa-eraser" aria-hidden="true" title="Delete"></i></a></td>
                </tr>
                <?php
    }
    ?>
            </table>
        </div>
    </section>
</body>

</html>