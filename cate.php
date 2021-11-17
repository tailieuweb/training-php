<?php
if (isset($_GET['manu_id']) || isset($_GET['type_id'])) {
?>
    <!DOCTYPE html>
    <html lang="en">
    <?php require "./form/head.php"; ?>

    <body>
        <?php require "./form/header-bottom.php"; ?>
        <?php
        $perPage = 6;
        if (!isset($_GET['page'])) {
            $_GET['page'] = 1;
        }
        $page = $_GET['page'];
        $url = $_SERVER['PHP_SELF'];
        $total = 1;
        ?>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2>Thương Hiệu</h2>
                            <div class="panel-group category-products" id="accordian">
                                <!--category-productsr-->
                                <div class="panel panel-default">
                                    <?php foreach ($manufacture->getAllManufactures() as $value) { ?>
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><a href="cate.php?manu_id=<?php echo $value['manu_id'] ?>"><?php echo $value['manu_name'] ?></a>
                                            </h4>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9 padding-right">
                        <div class="features_items">
                            <!--features_items-->
                            <?php
                            if (isset($_GET['type_id'])) {
                                $type_id = $_GET['type_id'];
                                $total = count($product->getProductsByType_ID($type_id));
                                foreach ($product->getProductsByType_IDByPage($page, $perPage, $type_id) as $value) { ?>
                                    <h2 class="title text-center"><?php echo $value['type_name'];
                                                                    break;
                                                                } ?></h2>
                                    <?php foreach ($product->getProductsByType_IDByPage($page, $perPage, $type_id) as $value) { ?>
                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <a href="detail.php?id=<?php echo $value['ID'] ?>">
                                                            <img class="img-fluid img-products" src="images/<?php echo $value['pro_image'] ?>" alt="" />
                                                            <p class="title-products"><?php echo $value['name'] ?></p>
                                                            <p class="price-products"><?php echo number_format($value['price']) ?> VND</p>
                                                            <a href="cart.php?id=<?php echo $value['ID'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                                                        </a>
                                                    </div>
                                                    <!-- <div class="product-overlay">
                                                        <div class="overlay-content">
                                                            <h2><?php echo number_format($value['price']) ?> VND</h2>
                                                            <p><a href="detail.php?id=<?php echo $value['ID'] ?>"><?php echo $value['name'] ?></a></p>
                                                            <a href="cart.php?id=<?php echo $value['ID'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                } else if (isset($_GET['manu_id'])) {
                                    $manu_id = $_GET['manu_id'];
                                    $total = count($product->getProductsByManu_ID($manu_id));
                                    foreach ($product->getProductsByManu_IDByPage($page, $perPage, $manu_id) as $value) { ?>
                                        <h2 class="title text-center"><?php echo $value['manu_name'];
                                                                        break;
                                                                    } ?></h2>
                                        <?php foreach ($product->getProductsByManu_IDByPage($page, $perPage, $manu_id) as $value) { ?>
                                            <div class="col-sm-4">
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">
                                                        <div class="productinfo text-center" style="height:360px">
                                                            <a href="detail.php?id=<?php echo $value['ID'] ?>">
                                                                <img class="img-fluid img-products" style="width: 250px; height: 200px" src="images/<?php echo $value['pro_image'] ?>" alt="" />
                                                                <p class="title-products "><?php echo $value['name'] ?></p>
                                                                <p class="price-products"><?php echo number_format($value['price']) ?> VND</p>
                                                                <a href="cart.php?id=<?php echo $value['ID'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php }
                                    } ?>


                                    <ul class="pagination col-sm-12">
                        </div>
                    </div>
                </div>
            </div>
        </section>
          <!--paginate-->
        <?php if (isset($_GET['manu_id'])) { ?>
            <h3 style=text-align:center>
                </p><?php echo $manufacture->paginateManu($url, $total, $page, $perPage, $manu_id) ?></p>
            </h3>
        <?php } else if (isset($_GET['type_id'])) { ?>
            <h3 style=text-align:center>
                </p><?php echo $protype->paginateProtype($url, $total, $page, $perPage, $type_id) ?></p>
            </h3>
        <?php } ?>
        <?php require "./form/footer.php"; ?>
        <?php require "./form/script.php"; ?>
    </body>

    </html>
<?php
} else {
    // header("location:index.php");
}
?>