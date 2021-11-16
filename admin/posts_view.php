<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts view</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/css/post.css">
</head>
<?php
    require 'posts_connect.php';
    $limit = 8;  
        if (isset($_GET["page"])) {
            $page  = $_GET["page"]; 
            } 
            else{ 
            $page=1;
            };  
        $start = ($page-1) * $limit;  
        $resulte = mysqli_query($conn,"SELECT * FROM post ORDER BY ID_POST ASC LIMIT $start, $limit");
    ?>

<body>
    <?php
    include 'header_admin.php';
    ?>
    <section class="body">
        <div class="container">
            <div class="title">
                <h1>Posts</h1>
            </div>
            <div class="link">
                <a href="posts_add.php">
                    Add Post
                </a>
            </div>
            <table border="1" class="post">
                <tr>
                    <th>ID</th>
                    <th>IMAGE</th>
                    <th>TITLE</th>
                    <th>HEADER</th>
                </tr>
                <?php
                    $query=mysqli_query($conn,"select * from `post`");
                    while($row=mysqli_fetch_array($resulte)){
                ?>
                <tr>
                    <td><?php echo htmlentities($row['ID_POST']); ?></td>
                    <td><?php echo "<img src='../public/images/".$row['IMAGE1']."' height=70px width = 90px>"?></td>
                    <td><?php echo htmlentities($row['TITLE']); ?></td>
                    <td><?php echo htmlentities($row['SAPO']); ?></td>
                    <td class="icon"><a
                            href="../pages/detail?idPost=<?php echo  rand(100, 999) . $row['ID_POST'] . rand(100, 999); ?>"><i
                                class="fa fa-eye" aria-hidden="true" title="View"></i></a></td>
                    <td class="icon"><a
                            href="posts_edit.php?ID_POST=<?php echo rand(100, 999) . $row['ID_POST'] . rand(100, 999); ?>"><i
                                class="fa fa-pencil-square-o" aria-hidden="true" title="Edit"></i></a></td>
                    <td class="icon"><a
                            href="posts_delete.php?ID_POST=<?php echo rand(100, 999) . $row['ID_POST'] . rand(100, 999); ?>"><i
                                class="fa fa-eraser" aria-hidden="true" title="Delete"></i></a></td>
                </tr>
                <?php
    }
    ?>
            </table>
            <?php include 'pagination.php';?>
        </div>
    </section>
</body>

</html>