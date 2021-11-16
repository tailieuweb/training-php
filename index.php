<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    define('urlPage', '');
    require urlPage . 'layouts/head.php';

    $factory = new FactoryPattern();
    $post = $factory->make('post');

    $arrPost = $post->getAll();
    $arrCategory1 = $post->getByCategory(1);
    $arrCategory2 = $post->getByCategory(2);
    $arrCategory3 = $post->getByCategory(3);
    $arrCategory4 = $post->getByCategory(4);
    $arrCategory5 = $post->getByCategory(5);
    ?>
    <title>Trang chủ</title>
</head>

<body>
    <!-- Load page -->
    <div class="preload load">
        <ul>
            <li style=" animation: preload 2s ease infinite;"></li>
            <li style=" animation: preload 2.1s ease infinite;"></li>
            <li style=" animation: preload 2.2s ease infinite;"></li>
            <li style=" animation: preload 2.3s ease infinite;"></li>
            <li style=" animation: preload 2.5s ease infinite;"></li>
        </ul>
    </div>
    <!-- /Load page -->

    <!-- Header -->
    <header>
        <!-- Category -->
        <?php
    include "layouts/components/nav.php";
    ?>
        <!-- Carousel -->
        <div id="carousel" class="slide carousel" style="padding-top: 74px;">
            <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
                <li data-target="#carousel" data-slide-to="3"></li>
                <li data-target="#carousel" data-slide-to="4"></li>
            </ol>

            <div class="carousel-inner">
                <?php
            echo CarouselInner::view([$arrPost[0], $arrPost[1], $arrPost[2], $arrPost[3], $arrPost[4]], urlPage);
            ?>
            </div>

            <a class="carousel-control-prev control" href="#carousel" role="button" data-slide="prev">
                <i class="fa fa-chevron-left" aria-hidden="true"></i>
            </a>
            <a class="carousel-control-next control" href="#carousel" role="button" data-slide="next">
                <i class="fa fa-chevron-right" aria-hidden="true"></i>
            </a>
            <svg viewBox="0 0 1440 142" fill="none" xmlns="http://www.w3.org/2000/svg" class="down-svg">
                <path
                    d="M0 133.96V59.3599C26.6 85.6599 79.5 65.0599 132.5 59.3599C185.8 54.0599 238.5 123.2 291.5 112.5C344.8 102.2 427 -5.50001 480 37.5C533.3 80.5 621 132.2 674 100.5C727.3 68.2 778.5 29.2 831.5 23.5C884.8 18.2 933.5 42.7 986.5 80C1039.8 117.7 1097 79.8 1150 37.5C1203.3 -5.20001 1299 42.8 1352 37.5C1405.3 31.8 1440 -20.5 1440 9.50001V256.66H1413.3C1386.7 256.66 1333 256.66 1280 256.66C1226.7 256.66 1173 256.66 1120 256.66C1066.7 256.66 1013 256.66 960 256.66C906.7 256.66 853 256.66 800 256.66C746.7 256.66 693 256.66 640 256.66C586.7 256.66 533 256.66 480 256.66C426.7 256.66 373 256.66 320 256.66C266.7 256.66 213 256.66 160 256.66C106.7 256.66 53 256.66 27 256.66H0V133.96Z"
                    fill="#4b00ff40"></path>
            </svg>
            <svg viewBox="0 0 1440 135" fill="none" xmlns="http://www.w3.org/2000/svg" class="down-svg">
                <path
                    d="M0 133.96V59.3599C26.6 85.6599 79.5 65.0599 132.5 59.3599C185.8 54.0599 238.5 123.2 291.5 112.5C344.8 102.2 427 -5.50001 480 37.5C533.3 80.5 621 132.2 674 100.5C727.3 68.2 778.5 29.2 831.5 23.5C884.8 18.2 933.5 42.7 986.5 80C1039.8 117.7 1097 79.8 1150 37.5C1203.3 -5.20001 1299 42.8 1352 37.5C1405.3 31.8 1440 -20.5 1440 9.50001V256.66H1413.3C1386.7 256.66 1333 256.66 1280 256.66C1226.7 256.66 1173 256.66 1120 256.66C1066.7 256.66 1013 256.66 960 256.66C906.7 256.66 853 256.66 800 256.66C746.7 256.66 693 256.66 640 256.66C586.7 256.66 533 256.66 480 256.66C426.7 256.66 373 256.66 320 256.66C266.7 256.66 213 256.66 160 256.66C106.7 256.66 53 256.66 27 256.66H0V133.96Z"
                    fill="#f7f7f9"></path>
            </svg>
            <ul class="bg-bubble">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
        <!-- /Carousel -->
    </header>
    <!-- /Header -->

    <!-- Content -->
    <div class="content">
        <!-- New Post Le-->
        <section class="new-posts">
            <div class="container">
                <h5 class="title mb-md-5">
                    Tin tức mới
                </h5>

                <!-- post -->
                <div class="row">
                    <div class="col-md-4 mb-md-5 mr-xs-2" data-scroll>
                        <?php echo PostNormal::view($arrPost[0], urlPage) ?>
                    </div>

                    <div class="col-md-4 mb-md-5 mr-xs-2" data-scroll>
                        <?php echo PostNormal::view($arrPost[1], urlPage) ?>
                    </div>

                    <div class="col-md-4 mb-md-5 mr-xs-2" data-scroll>
                        <?php echo PostNormal::view($arrPost[2], urlPage) ?>
                    </div>

                    <div class="col-md-8 mr-xs-2 large" data-scroll>
                        <?php echo PostLarge::view($arrPost[3], urlPage) ?>
                    </div>

                    <div class="col-md-4 mr-xs-2 list">
                        <?php echo ListPost::view(
                        [$arrPost[4], $arrPost[5], $arrPost[6], $arrPost[7]],
                        urlPage) ?>
                    </div>
                </div>
                <!-- /post -->
            </div>
        </section>
        <!-- /New Post -->

        <!-- Post Dependent Category -->
        <section class="posts-dep-cate">
            <div class="container">
                <hr>
                <?php echo pagePostDepCate::view($arrCategory1, urlPage, true) ?>
                <hr>
                <?php echo pagePostDepCate::view($arrCategory2, urlPage, false) ?>
                <hr>
                <?php echo pagePostDepCate::view($arrCategory3, urlPage, true) ?>
                <hr>
                <?php echo pagePostDepCate::view($arrCategory4, urlPage, false) ?>
                <hr>
                <?php echo pagePostDepCate::view($arrCategory5, urlPage, true) ?>
            </div>
        </section>
        <!-- /Post Dependent Category -->
    </div>
    <!-- /Content -->

    <?php require 'layouts/footer.php' ?>

    <!-- Go to top -->
    <div class="go-top top">
        <i class="fa fa-chevron-up" aria-hidden="true"></i>
    </div>
    <!-- /Go to top -->

    <?php
require 'layouts/script.php';
?>

</body>

</html>