<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
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
                <h1>Category</h1>
            </div>
            <div class="wrapper">
                <form action="cate_add.php" enctype="multipart/form-data" method="post" class="form">
                    <div class="form__input">
                        <h3 class="title">Id Category</h3>
                        <input type="text" name="id_cate" />
                    </div>
                    <div class="form__input">
                        <h3 class="title">Name</h3>
                        <input type="text" name="name" />
                    </div>
                    <div class="form__button">
                        <input type="submit" name="btn_submit" value="Save Data" />
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php require 'cate_xuly.php';?>
</body>

</html>