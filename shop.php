<?php
session_start();
// --------------Factory----------
require 'models/FactoryPattent.php';
$factory = new FactoryPattent();
$productModel = $factory->make('home');
// --------------Factory----------
$noti = 0;
$insertUnSuccess = 1;
//$products = $productModel->getProducts();
if (!empty($_SESSION["lgUserID"])) {
    if (!empty($_GET['id'])) {
        $allProducts =  $productModel->getProducts();
        foreach ($allProducts as $value) {
            if(md5($value['id'].'chuyen-de-web-2') ==  $_GET['id']){
                $inserWhishlist = $productModel->insertWhishList($_GET['id'], $_SESSION['lgUserID']);
                 $noti = 1;
            }
        }
        if((int)$noti != 1){
            $insertUnSuccess = 2;
        }
    }
} else {
    $noti = 2;
}
$search  = '';
$searchCate  = '';
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
if (!is_numeric($page)) {
    header('Location:404.php');
}
$vaCate = [];
$vaPro = [];
?>
<!DOCTYPE html>
<html lang="vi">

<?php include_once("views/head.php"); ?>

<body>

    <!--================Main Header Area =================-->
    <?php include_once("views/header.php"); ?>
    <!--================End Main Header Area =================-->

    <!--================End Main Header Area =================-->
    <section class="banner_area">
        <div class="container">
            <div class="banner_text">
                <h3>Cửa hàng</h3>
                <ul>
                    <li><a href="index.php">Nhà</a></li>
                    <li><a href="shop.php">Cửa hàng</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Main Header Area =================-->

    <!--================Product Area =================-->
    <section class="product_area p_100">
        <div class="container">
            <div class="row product_inner_row">

                <div class="col-lg-9">
                    <?php if(isset($noti)){?>
                    <?php if ($noti == 1) { ?>
                    <div class="alert alert-success" role="alert">
                        Thêm vào danh sách thành công.
                    </div>
                    <?php } else if ($noti == 2) { ?>
                    <div class="alert alert-success" role="alert">
                        Bạn cần phải đăng nhập
                    </div>
                    <?php }else if (isset($insertUnSuccess) && $insertUnSuccess == 2) { ?>
                    <div class="alert alert-success" role="alert">
                        Thêm vào danh sách không thành công
                    </div>
                    <?php } }?>
                    <div class="row m0 product_task_bar">
                        <div class="product_task_inner">
                            <div class="float-left">
                                <a class="active" href="#"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-th-list" aria-hidden="true"></i></a>
                            </div>
                            <div class="float-right">
                                <h4>Sắp xếp theo :</h4>
                                <select class="short"
                                    onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                    <option>Loại</option>
                                    <option value="?field=price&sort=desc">Giảm (A - Z)</option>
                                    <option value="?field=price&sort=asc">Tăng (Z - A)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($page > 0) {
                        if (!empty($_GET['submit'])) {
                            if (!empty($_GET['search-cate'])) { ?>
                    <!-- search categories -->
                    <div class="row product_item_inner">
                        <?php
                                    $searchCate = $_GET['search-cate'];
                                    $products = $productModel->paginationSearchCate($searchCate, $page, 6);
                                    if (count($products) == 0) {
                                        $vaCate = 0;
                                    }
                                    // var_dump($products);
                                    foreach ($products as $product) { ?>
                        <div class="col-lg-4 col-md-4 col-6">
                            <div class="cake_feature_item">
                                <div class="cake_img">
                                    <img src="<?= $product['pro_image'] ?>" alt="">
                                    <?php if (isset($_SESSION['lgUserID'])) { ?>
                                    <?php if (empty($productModel->getWhishlistExist($_SESSION['lgUserID'], $product['id']))) { ?>
                                    <div class="icon-whishlist">
                                        <a href="shop.php?id=<?= md5($product['id'] . 'chuyen-de-web-2') ?>">
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <?php }
                                                    } ?>
                                </div>
                                <div class="cake_text">
                                    <h4>$<?= $product['price'] ?></h4>
                                    <h3> <a href="product-details.php?id=<?= md5($product['id'] . 'chuyen-de-web-2') ?>" ><?= $product['name'] ?></a></h3>
                                    <a class="pest_btn" href="cart.php?id=<?= $product['id'] ?>"
                                        onclick="return insertCart(<?= $product['id'] ?>)">Thêm vào giỏ hàng</a>
                                </div>
                            </div>
                        </div>
                        <?php }
                                    ?>
                    </div>
                    <!-- Phân trang -->
                    <?php
                                $result = $productModel->searchCategories($searchCate);
                                $number_of_result = count($result);
                                $number_of_pages = ceil($number_of_result / 6);
                                if ($number_of_pages > 1) {
                                    if ($page <= $number_of_pages) {
                                ?>
                    <div class="product_pagination">
                        <div class="left_btn">
                            <a
                                href="shop.php?<?php if (isset($searchCate)) ?>search-cate=<?php echo $searchCate ?>&<?php if (isset($_GET['submit'])) ?>submit=<?php echo $_GET['submit'] ?>&page=<?php if ($page > 1) echo $page - 1;
                                                                                                                                                                                                                        else echo 1 ?>">
                                <i class="lnr lnr-arrow-left"></i>Trước
                            </a>
                        </div>
                        <div class="middle_list">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <?php for ($i = 1; $i <= $number_of_pages; $i++) { ?>

                                    <li class="page-item ">
                                        <a class="page-link <?php if (isset($_GET['page']) && $_GET['page'] == $i) {
                                                                                        echo 'active';
                                                                                    } ?>"
                                            href="shop.php?<?php if (isset($searchCate)) ?>search-cate=<?php echo $searchCate ?>&<?php if (isset($_GET['submit'])) ?>submit=<?php echo $_GET['submit'] ?>&page=<?php echo $i ?>"><?php echo $i ?></a>

                                    </li>

                                    <?php } ?>
                                </ul>
                            </nav>
                        </div>
                        <div class="right_btn">
                            <a
                                href="shop.php?<?php if (isset($searchCate)) ?>search-cate=<?php echo $searchCate ?>&<?php if (isset($_GET['submit'])) ?>submit=<?php echo $_GET['submit'] ?>&page=<?php if ($page < $number_of_pages) echo $page + 1;
                                                                                                                                                                                                                        else echo $number_of_pages ?>">
                                Sau <i class="lnr lnr-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <?php } else { ?>
                    <div class="alert alert-danger" role="alert">
                        KHÔNG CÓ TRANG BẠN TÌM KIẾM
                    </div>
                    <?php  }
                                }
                            }
                            if (!empty($_GET['search'])) { ?>
                    <!-- search products -->
                    <div class="row product_item_inner">
                        <?php
                                    $search = $_GET['search'];
                                    // $sql = "SELECT * FROM products WHERE name LIKE '%$search%' OR description LIKE '%$search%' ORDER BY products.price DESC";
                                    $products = $productModel->paginationSearchProduct($search, $page, 6);
                                    if (count($products) == 0) {
                                        $vaPro = 0;
                                    }
                                    if (count($products) > 0) {
                                        foreach ($products as $product) { ?>
                        <div class="col-lg-4 col-md-4 col-6">
                            <div class="cake_feature_item">
                                <div class="cake_img">
                                    <img src="<?= $product['pro_image'] ?>" alt="">
                                    <?php if (isset($_SESSION['lgUserID'])) { ?>
                                    <?php if (empty($productModel->getWhishlistExist($_SESSION['lgUserID'], $product['id']))) { ?>
                                    <div class="icon-whishlist">
                                        <a href="shop.php?id=<?= md5($product['id'] . 'chuyen-de-web-2') ?>">
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <?php }
                                                        } ?>
                                </div>
                                <div class="cake_text">
                                    <h4>$<?= $product['price'] ?></h4>
                                    <h3> <a href="product-details.php?id=<?= md5($product['id'] . 'chuyen-de-web-2') ?>" ><?= $product['name'] ?></a></h3>
                                    <a class="pest_btn" href="cart.php?id=<?= $product['id'] ?>"
                                        onclick="return insertCart(<?= $product['id'] ?>)">Thêm vào giỏ hàng</a>
                                </div>
                            </div>
                        </div>
                        <?php }
                                    }
                                    ?>
                    </div>

                    <!-- Phân trang -->
                    <?php
                                $result = $productModel->searchProduct($search);
                                $number_of_result = count($result);
                                $number_of_pages = ceil($number_of_result / 6);
                                if ($number_of_pages > 1) {
                                    if ($page <= $number_of_pages) {
                                ?>
                    <div class="product_pagination">
                        <div class="left_btn">
                            <a
                                href="shop.php?<?php if (isset($search)) ?>search=<?php echo $search ?>&<?php if (isset($_GET['submit'])) ?>submit=<?php echo $_GET['submit'] ?>&page=<?php if ($page > 1) echo $page - 1;
                                                                                                                                                                                                            else echo 1 ?>">
                                <i class="lnr lnr-arrow-left"></i>Trước
                            </a>
                        </div>
                        <div class="middle_list">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <?php for ($i = 1; $i <= $number_of_pages; $i++) { ?>
                                    <li class="page-item ">
                                        <a class="page-link <?php if (isset($_GET['page']) && $_GET['page'] == $i) {
                                                                                        echo 'active';
                                                                                    } ?>"
                                            href="shop.php?<?php if (!empty($search)) ?>search=<?php echo $search ?>&<?php if (!empty($_GET['submit'])) ?>submit=<?php echo $_GET['submit'] ?>&page=<?php echo $i ?>"><?php echo $i ?></a>


                                    </li>

                                    <?php } ?>
                                </ul>
                            </nav>
                        </div>
                        <div class="right_btn">
                            <a
                                href="shop.php?<?php if (!empty($search)) ?>search=<?php echo $search ?>&<?php if (!empty($_GET['submit'])) ?>submit=<?php echo $_GET['submit'] ?>&page=<?php if ($page < $number_of_pages) echo $page + 1;
                                                                                                                                                                                                            else echo $number_of_pages ?>">
                                Sau <i class="lnr lnr-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <?php } else { ?>
                    <div class="alert alert-danger" role="alert">
                        KHÔNG CÓ TRANG BẠN TÌM KIẾM
                    </div>
                    <?php  }
                                } else { ?>
                    <?php  }
                            }
                            if (empty($_GET['search']) && empty($_GET['search-cate']) ) { ?>
                    <!-- search products -->
                    <div class="row product_item_inner">
                        <?php
                                    $sort = '';
                                    if (isset($_GET['sort'])) {
                                        if ($_GET['sort'] == 'desc') {
                                            $sort = 'DESC';
                                        } elseif ($_GET['sort'] == 'asc') {
                                            $sort = 'ASC';
                                        }
                                    }
                                    $sql = 'SELECT * FROM `products` WHERE detele_at IS NULL ORDER BY products.price ' . $sort;
                                    $products = $productModel->pagination($sql, $page, 6);
                                    if (count($products) > 0) {

                                        foreach ($products as $product) { ?>
                        <div class="col-lg-4 col-md-4 col-6">
                            <div class="cake_feature_item">
                                <div class="cake_img">
                                    <img src="<?= $product['pro_image'] ?>" alt="">
                                    <?php if (isset($_SESSION['lgUserID'])) { ?>
                                    <?php if (empty($productModel->getWhishlistExist($_SESSION['lgUserID'], $product['id']))) { ?>
                                    <div class="icon-whishlist">
                                        <a href="shop.php?id=<?= md5($product['id'] . 'chuyen-de-web-2') ?>">
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <?php }
                                                        } ?>
                                </div>
                                <div class="cake_text">
                                    <h4>$<?= $product['price'] ?></h4>
                                    <h3> <a href="product-details.php?id=<?= md5($product['id'] . 'chuyen-de-web-2') ?>" ><?= $product['name'] ?></a></h3>
                                    <a class="pest_btn" href="cart.php?id=<?= $product['id'] ?>"
                                        onclick="return insertCart(<?= $product['id'] ?>)">Thêm vào giỏ hàng</a>
                                </div>
                            </div>
                        </div>
                        <?php }
                                    } ?>


                    </div>
                    <!-- Phân trang -->
                    <?php
                                $result = $productModel->getProducts();
                                $number_of_result = count($result);
                                $number_of_pages = ceil($number_of_result / 6);
                                if ($number_of_pages > 1) {
                                    if ($page <= $number_of_pages) {
                                ?>
                    <div class="product_pagination">
                        <div class="left_btn">
                            <a
                                href="shop.php?<?php if (isset($search)) ?>search=<?php echo $search ?>&<?php if (isset($_GET['submit'])) ?>submit=<?php echo $_GET['submit'] ?>&page=<?php if ($page > 1) echo $page - 1;
                                                                                                                                                                                                            else echo 1 ?>">
                                <i class="lnr lnr-arrow-left"></i>Trước
                            </a>
                        </div>
                        <div class="middle_list">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <?php for ($i = 1; $i <= $number_of_pages; $i++) { ?>

                                    <li class="page-item ">
                                        <a class="page-link <?php if (isset($_GET['page']) && $_GET['page'] == $i) {
                                                                                        echo 'active';
                                                                                    } ?>"
                                            href="shop.php?<?php if (!empty($search)) ?>search=<?php echo $search ?>&<?php if (!empty($_GET['submit'])) ?>submit=<?php echo $_GET['submit'] ?>&page=<?php echo $i ?>"><?php echo $i ?></a>


                                    </li>

                                    <?php } ?>
                                </ul>
                            </nav>
                        </div>
                        <div class="right_btn">
                            <a
                                href="shop.php?<?php if (!empty($search)) ?>search=<?php echo $search ?>&<?php if (!empty($_GET['submit'])) ?>submit=<?php echo $_GET['submit'] ?>&page=<?php if ($page < $number_of_pages) echo $page + 1;
                                                                                                                                                                                                            else echo $number_of_pages ?>">
                                Sau <i class="lnr lnr-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <?php } else { ?>
                    <div class="alert alert-danger" role="alert">
                        KHÔNG CÓ TRANG BẠN TÌM KIẾM
                    </div>
                    <?php }
                                }
                            }
                            if ($vaCate == 0 || $vaPro == 0) { ?>
                    <div class="alert alert-danger" role="alert">
                        KHÔNG TÌM THẤY
                    </div>
                    <?php }
                        } else { ?>
                    <div class="row product_item_inner">
                        <?php
                                $sort = '';
                                if (isset($_GET['sort'])) {
                                    if ($_GET['sort'] == 'desc') {
                                        $sort = 'DESC';
                                    } elseif ($_GET['sort'] == 'asc') {
                                        $sort = 'ASC';
                                    }
                                }
                                $sql = 'SELECT * FROM `products` WHERE detele_at IS NULL ORDER BY products.price ' . $sort;
                                $products = $productModel->pagination($sql, $page, 6);
                                if (count($products) > 0) {

                                    foreach ($products as $product) { ?>
                        <div class="col-lg-4 col-md-4 col-6">
                            <div class="cake_feature_item">
                                <div class="cake_img">
                                    <img src="<?= $product['pro_image'] ?>" alt="">
                                    <?php if (isset($_SESSION['lgUserID'])) { ?>
                                    <?php if (empty($productModel->getWhishlistExist($_SESSION['lgUserID'], $product['id']))) { ?>
                                    <div class="icon-whishlist">
                                        <a href="shop.php?id=<?= md5($product['id'] . 'chuyen-de-web-2') ?>">
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <?php }
                                                    } ?>
                                </div>
                                <div class="cake_text">
                                    <h4>$<?= $product['price'] ?></h4>
                                    <h3> <a href="product-details.php?id=<?= md5($product['id'] . 'chuyen-de-web-2') ?>" ><?= $product['name'] ?></a></h3>
                                    <a class="pest_btn" href="cart.php?id=<?= $product['id'] ?>"
                                        onclick="return insertCart(<?= $product['id'] ?>)">Thêm vào giỏ hàng</a>
                                </div>
                            </div>
                        </div>
                        <?php }
                                } ?>


                    </div>
                    <!-- Phân trang -->
                    <?php
                            $result = $productModel->getProducts();
                            $number_of_result = count($result);
                            $number_of_pages = ceil($number_of_result / 6);
                            if ($number_of_pages > 1) {
                                if ($page <= $number_of_pages) {
                            ?>
                    <div class="product_pagination">
                        <div class="left_btn">
                            <a href="shop.php?page=<?php if ($page > 1) echo $page - 1;
                                                                    else echo 1 ?>">
                                <i class="lnr lnr-arrow-left"></i>Trước
                            </a>
                        </div>
                        <div class="middle_list">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <?php for ($i = 1; $i <= $number_of_pages; $i++) { ?>

                                    <li class="page-item ">
                                        <a class="page-link <?php if (isset($_GET['page']) && $_GET['page'] == $i) {
                                                                                    echo 'active';
                                                                                } ?>"
                                            href="shop.php?page=<?php echo $i ?>"><?php echo $i ?></a>

                                    </li>

                                    <?php } ?>
                                </ul>
                            </nav>
                        </div>
                        <div class="right_btn">
                            <a href="shop.php?page=<?php if ($page < $number_of_pages) echo $page + 1;
                                                                    else echo $number_of_pages ?>">
                                Sau <i class="lnr lnr-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <?php } else { ?>
                    <div class="alert alert-danger" role="alert">
                        KHÔNG CÓ TRANG BẠN TÌM KIẾM
                    </div>

                    <?php }
                            }
                        }
                    }
                    // So trang <0
                    else { ?>
                    <div class="alert alert-danger" role="alert">
                        KHÔNG CÓ TRANG BẠN TÌM KIẾM
                    </div>
                    <?php } ?>
                </div>

                <div class="col-lg-3">
                    <div class="product_left_sidebar">
                        <aside class="left_sidebar search_widget">
                            <form method="get" class="input-group">
                                <input type="text" name="search-cate" value="<?= $searchCate ?>" class="form-control"
                                    placeholder="Nhập từ khóa tìm kiếm">
                                <div class="input-group-append">
                                    <button class="btn" type="submit" name="submit" value="submit"><i
                                            class="icon icon-Search"></i></button>
                                </div>
                            </form>
                        </aside>
                        <!-- Manufacture -->
                        <aside class="left_sidebar p_catgories_widget">
                            <div class="p_w_title">
                                <h3>Danh mục sản phẩm</h3>
                            </div>
                            <?php
                            $manufactures = $productModel->getManufactures();

                            ?>
                            <ul class="list_style">
                                <?php foreach ($manufactures as $manufacture) { ?>
                                <li><a
                                        href="manufacture-shop.php?manu_id=<?= md5($manufacture['manu_id'] . 'chuyen-de-web-2') ?>"><?= $manufacture['manu_name'] ?>
                                        (<?= count($productModel->countProductWithManufacture($manufacture['manu_id'])) ?>)</a>
                                </li>
                                <?php } ?>

                            </ul>
                        </aside>

                        <aside class="left_sidebar p_sale_widget">
                            <div class="p_w_title">
                                <h3>Sản phẩm mới nhất</h3>
                            </div>
                            <?php $latests = $productModel->getProductLasters(); ?>
                            <?php
                            if (!empty($latests)) {
                                foreach ($latests as $latest) {

                            ?>
                            <div class="media">
                                <div class="d-flex">
                                    <img src="<?= $latest['pro_image'] ?>" alt="<?= $latest['name'] ?>"
                                        style="max-width: 100px;">
                                </div>
                                <div class="media-body">
                                    <a href="product-details.php?id=<?= md5($latest['id'] . 'chuyen-de-web-2') ?>">
                                        <h4><?= $latest['name'] ?></h4>
                                    </a>

                                    <h5>$<?= $latest['price'] ?></h5>
                                </div>
                            </div>
                            <?php }
                            } ?>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Product Area =================-->

    <!--================Newsletter Area =================-->
    <?php include_once("views/layouts/news.php"); ?>
    <!--================End Newsletter Area =================-->

    <!--================Footer Area =================-->
    <?php include_once("views/layouts/footer.php"); ?>
    <!--================End Footer Area =================-->


    <!--================Search Box Area =================-->
    <?php include_once("views/layouts/search.php"); ?>
    <!--================End Search Box Area =================-->



    <script src="./public/js/page.js"></script>

    <?php include_once("views/footer.php"); ?>


</body>

</html>