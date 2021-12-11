<?php
    session_start();
    require 'models/FactoryPattent.php';
    $factory = new FactoryPattent();
    $HomeModel = $factory->make('home');
    $error = "";
    if(!empty($_SESSION['lgUserID'])) {
        $order = $HomeModel->getCheckoutsByUserId($_SESSION['lgUserID']);
        
    } else {
        $error .= "Qúy khách cần đăng nhập để biết thông tin chi tiết!";
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
                <h3>Đơn hàng của tôi</h3>
                <ul>
                    <li><a href="index.php">Nhà</a></li>
                    <li><a href="shop.php">Cửa hàng</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Main Header Area =================-->

    <!--================Cart Table Area =================-->
    <?php
        if(!empty($order)) { 
            //print_r($order);
    ?>
    <section class="cart_table_area p_100">
        

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Giá bán</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Điện thoại</th>
                        <th scope="col">Ngày đặt</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Thời gian nhận</th>
                        <th scope="col">Tổng tiền</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($order as $key) { ?>
                    <tr>
                        <td>
                            <?php 
                            $item = $HomeModel->getOrderItemById($key['id']);
                           
                            foreach ($item as $product) {?>

                            <ul style="list-style: none;margin-left: -40px;">
                                <li><?= $product['name'] ?></li>
                            </ul>

                            <?php } ?>
                        </td>
                        <td>
                            <?php 
                            $item = $HomeModel->getOrderItemById($key['id']);
                           
                            foreach ($item as $product) {?>

                            <ul style="list-style: none;">
                                <li>x <?= $product['quantity'] ?></li>
                            </ul>

                            <?php } ?>
                        </td>
                        <td>
                            <?php 
                            $item = $HomeModel->getOrderItemById($key['id']);
                           $gia=0;
                            foreach ($item as $product) {
                            $gia = $product['quantity'] * $product['price'];
                        ?>

                            <ul style="list-style: none;">
                                <li> $<?= $gia ?></li>
                            </ul>

                            <?php } ?>
                        </td>
                        <td>
                            <?= $key['address']?>
                        </td>
                        <td>
                            <?= $key['phone']?>
                        </td>
                        <td>
                            <?= date( "d-m-Y", strtotime($key['addedDate'])) ?>
                        </td>
                        <?php if($key['status'] == 0) {?>
                        <td>
                            <span class="status--process">Đang đóng gói</span>
                        </td>
                        <?php } else { ?>
                        <td>
                            <span class="status--process">Đang vận chuyển</span>
                        </td>
                        <?php } ?>
                        <td>
                            Thời gian dự kiến từ 3-5 ngày
                        </td>
                        <td>
                            $ <?= $key['sum']?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>


       
    </section>
    <?php } else { ?>
    <section class="cart_table_area p_100">
        <div class="container">
            <h2 style="color:red;text-align: center;">Bạn chưa có đơn hàng nào!</h2>
            <p style="text-align: center;">
                Cảm ơn đã tin dùng sản phẩm của chúng tôi!
            </p>
            <a href="shop.php" class="btn order_s_btn form-control">Quay lại cửa hàng</a>
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