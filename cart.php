<?php
    session_start();
    require 'models/FactoryPattent.php';
    $factory = new FactoryPattent();
    $HomeModel = $factory->make('home');

    if (isset($_GET['id'])) {
        include_once("models/Cart.php");
        $id=$_GET['id'];
        Cart::InsertCart($id);
        
        echo count($_SESSION['mycart']);
    }
   
?>
<!DOCTYPE html>
<html lang="vi">


    <?php include_once("views/head.php");?>


<body>

    <!--================Main Header Area =================-->
    <?php include_once("views/header.php");?>
    <!--================End Main Header Area =================-->

    <!--================End Main Header Area =================-->
    <section class="banner_area">
        <div class="container">
            <div class="banner_text">
                <h3>Giỏ hàng</h3>
                <ul>
                    <li><a href="index.php">Nhà</a></li>
                    <li><a href="cart.php">Giỏ hàng</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Main Header Area =================-->

    <!--================Cart Table Area =================-->
    <?php
        if(empty($_SESSION['mycart'])) {
            echo "</br><center><a href=\"shop.php\" class=\"btn btn-primary\" type=\"button\">Mời bạn mua hàng!</a></center>";
        }
    ?>
    <?php
        if(isset($_SESSION['mycart'])) {
    ?>

    <section class="cart_table_area p_100">
        <div class="container">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>

                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Giá bán</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Tổng tiền</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sum = 0;
                        foreach ($_SESSION['mycart'] as $key => $value) {
                            $row = $HomeModel->firstProductDetail(md5($key . 'chuyen-de-web-2'));
                            // Tổng:
                            $sum += $value * $row[0]["price"];
                            $total = $value * $row[0]["price"];
                            //var_dump($value).die();
                    ?>
                        <tr>

                            <td>
                                <img src="<?= $row[0]['pro_image'] ?>" alt="<?= $row[0]['name'] ?>"
                                    style="width: 100px;float: left;">
                            </td>
                            <td><?= $row[0]['name'] ?></td>
                            <td>$<?= $row[0]['price'] ?></td>
                            <td>
                                <?= $value ?>
                            </td>
                            <td>$<?= $total?></td>

                            <td>
                                <a href="delete-cart.php?id=<?= md5($key . 'chuyen-de-web-2') ?>" onclick="return IsDelete();">Delete</a>
                            </td>
                            <td>
                                <a href="update-cart.php?id=<?= md5($key . 'chuyen-de-web-2') ?>">Edit</a>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td>
                                <?php
                                if(!empty($_SESSION['lgUserID'])) {
                                    $check = $HomeModel->getCouponByID($_SESSION['lgUserID']);
                                    $zipcode = null;
                                    if(isset($_POST['submit'])) {
                                        $coupon = $_POST['coupon'];
                                        if(!empty($coupon)) {
                                           $zipcode = $HomeModel->getCouponByZipcode($coupon);
                                        }
                                        //print_r($zipcode);
                                        $_SESSION['coupon'] = $coupon;
                                    } else {
                                        unset($_SESSION['coupon']);
                                    }
                                } else {
                                    echo "Mời bạn đăng nhập";
                                }
                                ?>
                                <form method="post" class="form-inline">
                                    <div class="form-group">
                                        
                                        <input type="text" class="form-control" name="coupon" value="<?php if(isset($zipcode)) echo $zipcode[0]['zipcode'] ?>" placeholder="Mã giảm giá">
                                    </div>
                                    <button type="submit" name="submit" class="btn">Áp dụng</button>
                                </form>
                            </td>
                          
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row cart_total_inner">
                <div class="col-lg-7"></div>
                <div class="col-lg-5">
                    <div class="cart_total_text">
                        <div class="cart_head">
                            Tổng số giỏ hàng
                        </div>
                       
                        <div class="total">
                            <h4>Thành tiền <span>$<?= $sum ?></span></h4>
                        </div>
                        <?php
                            if(!empty($zipcode)) {
                            $phantram = (100 - $zipcode[0]['discount']) / 100;
                            $tienphu = $sum * $phantram;
                            $tongphu = $sum - $tienphu;
                        ?>
                        <div class="sub_total">
                            <h5>Khuyến mãi <span> - $<?= $tongphu ?></span></h5>
                        </div>
                        <div class="sub_total">
                            <h5>Tổng tiền sau khi khuyến mãi<span>$<?= $tienphu ?></span></h5>
                        </div>
                        <?php } else { ?>
                        <div class="sub_total">
                            <h5>Tiền phụ <span>$<?= $sum ?></span></h5>
                        </div>
                        <?php }  ?>
                        <?php if(count($_SESSION['mycart']) == 0) { ?>
                        <div class="cart_footer">
                            <a class="pest_btn" href="shop.php">Mời bạn mua hàng!</a>
                        </div>
                        <?php } else { ?>
                        <div class="cart_footer">
                            <a class="pest_btn" href="checkout.php">Tiến hành đặt hàng</a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } else { ?>
    <section class="cart_table_area p_100">
        <div class="container">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Giá bán</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Tổng tiền</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    </tbody>
                </table>
            </div>
         
        </div>
    </section>
    <?php } ?>
    <!--================End Cart Table Area =================-->

    <!--================Newsletter Area =================-->
    <?php include_once("views/layouts/news.php");?>
    <!--================End Newsletter Area =================-->

    <!--================Footer Area =================-->
    <?php include_once("views/layouts/footer.php");?>
    <!--================End Footer Area =================-->


    <!--================Search Box Area =================-->
    <?php include_once("views/layouts/search.php");?>
    <!--================End Search Box Area =================-->





    <?php include_once("views/footer.php");?>
    <script>
    function IsDelete() {
        return confirm("Bạn có chắc muốn xóa không");
    }
    </script>
</body>

</html>