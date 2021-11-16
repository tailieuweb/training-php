<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add post</title>
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
                <h1>Add Post</h1>
            </div>
            <div class="wrapper">
                <form action="posts_add.php" enctype="multipart/form-data" method="post" class="form">
                    <div class="form__input">
                        <h3 class="title">Title</h3>
                        <textarea name="title" id="content" placeholder="Import title..." rows="3" cols="80"></textarea>
                    </div>
                    <div class="form__input">
                        <h3 class="title">Header</h3>
                        <textarea name="header" id="content" placeholder="Import header..." rows="3"
                            cols="80"></textarea>
                    </div>
                    <div class="form__input">
                        <h3 class="title">Content</h3>
                        <textarea name="content" id="content" placeholder="Import content..." rows="10"
                            cols="80"></textarea>
                    </div>
                    <div class="form__input">
                        <h3 class="title">Category</h3>
                        <input type="text" name="id_cate" />
                    </div>
                    <div class="form__input">
                        <h3 class="title">Images</h3>
                        <input type="hidden" name="size" value="1000000">
                        <input type="file" name="image" class="hinhanh">
                    </div>
                    <div class="form__button">
                        <input type="submit" name="btn_submit" value="Save Data" />
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php require 'posts_xuly.php';?>
</body>

</html>