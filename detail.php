<!DOCTYPE html>
<html lang="en">
<?php require "./form/head.php"; ?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['last_id'] = $id;
?>

<body>
    <?php require "./form/header-bottom.php"; ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Thương Hiệu</h2>
                        <div class="panel-group category-products" id="accordian">
                            <!--category-productsr-->
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
                <div class="col-sm-9 padding-right">
                    <div class="product-details">
                        <!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <?php foreach ($product->getProductsByID($id) as $value) { ?>
                                <img src="images/<?php echo $value['pro_image'] ?>" alt="" />
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information">
                                <!--/product-information-->
                                <h2><?php echo $value['name'] ?></h2>
                                <span>
                                    <span>Giá: <?php echo number_format($value['price']) ?> VNĐ</span>
                                    <span class="detail-products">Chi tiết sản phẩm:<span
                                            class="desc-products"><?php echo  $value['description'] ?></span></span>

                                    <form action="" method="post">
                                        <label name="quantity" style="color: #000">Số lượng:</label>
                                        <input type="text" value="0" name="num" />
                                        <button style="background-color: orange;
                                        padding: 10px;
                                        border-radius: 5px;" name="cart" type="submit"><i
                                                class="fa fa-shopping-cart"></i>Thêm vào giỏ</button><br>
                                    </form>
                                </span>
                                <p><b>Tình trạng hàng:</b> còn hàng</p>
                                <p><b>Thương hiệu:</b> <?php echo $value['manu_name'] ?></p>
                                <!--/product-information-->
                               
                            </div>
                            <?php require "./comments.php";?>
                            

                        <!--/product-details-->
                        <!--features_items-->
                    </div>

                </div>
    </section>
    
    <?php require "./form/footer.php"; ?>
    <?php require "./form/script.php"; ?>
</body>

</html>
<?php

                                    }
                                    if (isset($_POST['cart'])) {
                                        $num = $_POST['num'];
                                        $id = $_SESSION['last_id'];
                                        if (is_numeric($num)) {
                                            $_SESSION['cart'][$id] = $num - 1;
                                        }
                                        echo "<script>window.location.href='cart.php'</script>";
                                    }
                                } else {
                                    header("location:index.php");
                                }