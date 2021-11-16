<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    define('urlPage', '../');
    require urlPage . 'layouts/head.php';
    
    $factory = new FactoryPattern();
    $post = $factory->make('post');

    $arrResult = [];

    if (!empty($_GET['idCategory'])) {
        $arrResult = $post->getByCategory($_GET['idCategory']);
    } else {
        if (!empty($_GET['key'])) {
            $arrResult = $post->getByTitle($_GET['key']);
        } else {
            header('location: ../');
        }
    }
    ?>
</head>

<body>
    <!-- Header -->
    <header>
        <?php include urlPage . "layouts/components/nav.php"; ?>
    </header>
    <!-- /Header -->

    <!-- Content -->
    <div class="content" style="margin: 100px 0;">
        <div class="container">
            <h4>Kết quả tìm kiếm:
                <span class="badge badge-dark"><?php echo count($arrResult) ?></span>
            </h4>
            <div class="row">
                <?php
            foreach ($arrResult as $item) {
                echo '<div class="col-md-4 my-md-3">
                        '. PostNormal::view($item, urlPage) .'
                      </div>';
            }
            ?>

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