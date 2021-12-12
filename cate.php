<?php
if (isset($_GET['manu_id']) || isset($_GET['type_id']) || isset($_GET['brands']) || isset($_GET['protypes'])) {
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
                                    <h4 class="panel-title"><a
                                            href="cate.php?manu_id=<?php echo $value['manu_id'] ?>"><?php echo $value['manu_name'] ?></a>
                                    </h4>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="filter_products" style="padding-top: 30px;">
                        <form action="" method="GET">
                            <div class="filter_manu">
                                <div class="card-filter-body">
                                    <h4 style="color:#365d6c">Lọc sản phẩm</h4>
                                    <hr style="margin-top:-8px;border-top: 3px solid #eee;">
                                    <?php
                                    $con = mysqli_connect("localhost","root","","nhomg","3308",'utf8');
                                    mysqli_set_charset($con, 'UTF8');
                                    $brand_query = "SELECT * FROM manufactures";
                                    $brand_query_run = mysqli_query($con,$brand_query);
                                    
                                    $pro_query = "SELECT * FROM protypes";
                                    $pro_query_run = mysqli_query($con,$pro_query);
                                    if(mysqli_num_rows($brand_query_run) > 0 && mysqli_num_rows($pro_query_run)>0){
                                        ?> <h5 style="color: #9449a7;width: 32%;border-bottom: 3px double #b1b8cfee;">
                                        Thương hiệu</h5> <?php
                                    foreach($brand_query_run as $brandList){
                                        //echo $brandList['name'];
                                        $checked = [];
                                        if(isset($_GET['brands'])){
                                            $checked = $_GET['brands'];
                                        }
                                        ?>
                                    <div>

                                        <input style="margin-left: 15px;" type="checkbox" name="brands[]"
                                            value="<?= $brandList['manu_id'];?>">
                                        <?php if(in_array($brandList['manu_id'],$checked)){echo ""; } ?>
                                        <?= $brandList['manu_name'];?>
                                    </div>
                                    <?php
                                    }
                                    ?> <h5 style="color: #9449a7;width: 36%;border-bottom: 3px double #b1b8cfee;">Loại
                                        sản phẩm</h5> <?php
                                    foreach($pro_query_run as $proList){
                                        //echo $brandList['name'];
                                        $checked = [];
                                        if(isset($_GET['protypes'])){
                                            $checked = $_GET['protypes'];
                                        }
                                        ?>
                                    <div>
                                        <input style="margin-left: 15px;" type="checkbox" name="protypes[]"
                                            value="<?= $proList['type_id'];?>">
                                        <?php if(in_array($proList['type_id'],$checked)){echo ""; } ?>
                                        <?= $proList['type_name'];?>
                                    </div>
                                    <?php
                                    }
                                }
                                else{
                                    echo "Not found branch";
                                }
                                ?>
                                </div>
                                <div class="card-filter-bottom">
                                    <button type="submit" class="btn-filter btn-primary" style="padding: 5px 21px; border: none; margin-top: 15px; font-size: 15px;">Tìm</button>
                                </div>

                            </div>
                        </form>
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
                                            <img class="img-fluid img-products"
                                                src="images/<?php echo $value['pro_image'] ?>" alt="" />
                                            <p class="title-products"><?php echo $value['name'] ?></p>
                                            <p class="price-products"><?php echo number_format($value['price']) ?> VND
                                            </p>
                                            <a href="cart.php?id=<?php echo $value['ID'] ?>"
                                                class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
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
                                            <img class="img-fluid img-products" style="width: 250px; height: 200px"
                                                src="images/<?php echo $value['pro_image'] ?>" alt="" />
                                            <p class="title-products "><?php echo $value['name'] ?></p>
                                            <p class="price-products"><?php echo number_format($value['price']) ?> VND
                                            </p>
                                            <a href="cart.php?id=<?php echo $value['ID'] ?>"
                                                class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }
                        } else if (isset($_GET['brands'])) {
                            ?>
                        <div style="padding-left:10px">
                            <h3>Sản phẩm</h3> <br>
                            <hr style="margin-top:0px">
                        </div>
                        <?php
                            if(isset($_GET['brands']))
                            {
                                $branchecked = [];
                                $branchecked = $_GET['brands'];
                                
                                foreach($branchecked as $rowbrand)
                                {
                                    // echo $rowbrand;
                                    
                                    $products = "SELECT * FROM products WHERE manu_id IN ($rowbrand)";
                                    $products_run = mysqli_query($con, $products);
                                    if(mysqli_num_rows($products_run) > 0)
                                    {
                                        foreach($products_run as $proditems) :
                                            ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center" style="height:360px">
                                        <a href="detail.php?id=<?php echo $proditems['ID'] ?>">
                                            <img class="img-fluid img-products" style="width: 250px; height: 200px"
                                                src="images/<?php echo $proditems['pro_image'] ?>" alt="" />
                                            <p class="title-products "><?php echo $proditems['name'] ?></p>
                                            <p class="price-products"><?php echo number_format($proditems['price']) ?>
                                                VND
                                            </p>
                                            <a href="cart.php?id=<?php echo $proditems['ID'] ?>"
                                                class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                                        endforeach;
                                    }
                                }
                            }
                            else
                            {
                                $products = "SELECT * FROM products";
                                $products_run = mysqli_query($con, $products);
                                if(mysqli_num_rows($products_run) > 0)
                                {
                                    foreach($products_run as $proditems) :
                                        ?>
                        <div class="col-md-4 mt-3">
                            <div class="border p-2">
                                <h6><?= $proditems['manu_name']; ?></h6>
                            </div>
                        </div>
                        <?php
                                    endforeach;
                                }
                                else
                                {
                                    echo "No Items Found";
                                }
                            }
                        } else if (isset($_GET['protypes'])) {
                            ?>
                        <div style="padding-left:10px">
                            <h3>Sản phẩm</h3> <br>
                            <hr style="margin-top:0px">
                        </div>
                        <?php
                            if(isset($_GET['protypes']))
                            {
                                $branchecked = [];
                                $branchecked = $_GET['protypes'];
                                
                                foreach($branchecked as $rowbrand)
                                {
                                    // echo $rowbrand;
                                    
                                    $products = "SELECT * FROM products WHERE type_id IN ($rowbrand)";
                                    $products_run = mysqli_query($con, $products);
                                    if(mysqli_num_rows($products_run) > 0)
                                    {
                                        foreach($products_run as $proditems) :
                                            ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center" style="height:360px">
                                        <a href="detail.php?id=<?php echo $proditems['ID'] ?>">
                                            <img class="img-fluid img-products" style="width: 250px; height: 200px"
                                                src="images/<?php echo $proditems['pro_image'] ?>" alt="" />
                                            <p class="title-products "><?php echo $proditems['name'] ?></p>
                                            <p class="price-products"><?php echo number_format($proditems['price']) ?>
                                                VND
                                            </p>
                                            <a href="cart.php?id=<?php echo $proditems['ID'] ?>"
                                                class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                                        endforeach;
                                    }
                                }
                            }
                            else
                            {
                                $products = "SELECT * FROM products";
                                $products_run = mysqli_query($con, $products);
                                if(mysqli_num_rows($products_run) > 0)
                                {
                                    foreach($products_run as $proditems) :
                                        ?>
                        <div class="col-md-4 mt-3">
                            <div class="border p-2">
                                <h6><?= $proditems['manu_name']; ?></h6>
                            </div>
                        </div>
                        <?php
                                    endforeach;
                                }
                                else
                                {
                                    echo "No Items Found";
                                }
                            }
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