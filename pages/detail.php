<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    define('urlPage', '../');
    require urlPage . 'layouts/head.php';

    $factory = new FactoryPattern();
    $post = $factory->make('post');

    $postDetail = [];

    $idFirst = $_GET['idPost'];
    $rmFirst = substr($idFirst, 3);
    $rmLast = substr($rmFirst, 0, -3);
    $id = $rmLast;

    if (!isset($id) || empty($id)) {
        header('location: ../');
    } else {
        $postDetail = $post->getByID($id);
    }

    $arrPostMore = $post->getByCategory($postDetail['id_category']);
    ?>
</head>

<body>
    <!-- Header -->
    <header>
        <?php include urlPage . "layouts/components/nav.php"; ?>
    </header>
    <!-- /Header -->

    <!-- Content Details-->
    <div class="content" style="margin: 100px 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="post-detail">
                        <p class="category"><?php echo $postDetail['NAME'] ?></p>
                        <hr>
                        <h1 class="post-title">
                            <?php echo $postDetail['TITLE'] ?>
                        </h1>
                        <p class="date-up" style="text-align: right; opacity: 0.7;">
                            <?php DateUp::view($postDetail['DATE_UP']) ?></p>

                        <img src="../public/images/<?php echo $postDetail['IMAGE1'] ?>" class="w-100" alt="">

                        <p class="post-sapo">
                            <?php echo $postDetail['SAPO'] ?>
                        </p>

                        <p class="post-content">
                            <?php echo substr($postDetail['CONTENT'], 0, strlen(($postDetail['CONTENT'])) / 2) ?>
                        </p>

                        <img src="../public/images/<?php echo !empty($postDetail['IMAGE2']) ? ($postDetail['IMAGE2']) : '' ?>"
                            class="w-100" alt="">

                        <p class="post-content">
                            <?php echo substr($postDetail['CONTENT'], strlen(($postDetail['CONTENT'])) / 2, strlen($postDetail['CONTENT'])) ?>
                        </p>
                    </div>

                    <hr>

                    <!-- Comment -->
                    <div class="comment shadow">
                        <h5>Bình luận:</h5>

                        <?php
                    $comment = new Comment();
                    $listComment = $comment->getByIDPost($postDetail['ID_POST']);

                    echo ListComment::view($listComment);
                    if (!empty($_SESSION['comment']['post'])) {
                        echo $_SESSION['comment']['post'];
                    }
                    ?>

                        <hr>
                        <form id="FormComment" method="post" class="form-post"
                            onsubmit="event.preventDefault(); postComment()">
                            <div class="form-row">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="Tên..." name="username"
                                        id="username" required>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" placeholder="Viết bình luận..." id="content"
                                        name="comment" required>
                                </div>
                                <input style="display: none" value="<?php echo $postDetail['ID_POST'] ?>" id="idPost"
                                    name="idPost">
                                <div class="col">
                                    <button type="submit" class="btn btn-danger form-control">Đăng</button>
                                </div>
                            </div>
                        </form>
                        <ul class="bg-circle">
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>

                    <!-- /Comment -->
                </div>

                <!--Bai viet lien quan-->
                <div class="col-md-4">
                    <h5 style="margin-top: 30px; margin-bottom: 20px;">Tin liên quan</h5>

                    <?php
                $listPostMore = [];

                if (!empty($arrPostMore[0])) {
                    array_push($listPostMore, $arrPostMore[0]);
                }
                if (!empty($arrPostMore[1])) {
                    array_push($listPostMore, $arrPostMore[1]);
                }
                if (!empty($arrPostMore[2])) {
                    array_push($listPostMore, $arrPostMore[2]);
                }

                echo ListPost::view($listPostMore, urlPage);

                if (!empty($arrPostMore[3]))
                    echo PostNormal::view($arrPostMore[3], urlPage);
                if (!empty($arrPostMore[4]))
                    echo PostNormal::view($arrPostMore[4], urlPage);
                ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /Content -->

    <?php require '../layouts/footer.php' ?>

    <!-- Go to top -->
    <div class="go-top top">
        <i class="fa fa-chevron-up" aria-hidden="true"></i>
    </div>
    <!-- /Go to top -->

    <?php
require '../layouts/script.php';
?>

</body>

</html>