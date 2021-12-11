<?php
session_start();
    require 'models/FactoryPattent.php';
    $factory = new FactoryPattent();
    $HomeModel = $factory->make('home');
    $resuft = "";
    $login = "";
    $input = "";
    if(!empty($_SESSION['lgUserID'])) {
        if(!empty($_SESSION['mycart'])) {
            if(isset($_POST['submit'])) {
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $note = $_POST['message'];
                //Đặt hàng:
                if(!empty($firstname) && !empty($lastname)  && !empty($address) && !empty($email) && !empty($phone)) {
                    $Orders = $HomeModel->insertOrder($_SESSION['lgUserID'],$firstname,$lastname,$address,$email,$phone,$note);
                    
                } else {
                    $input .= "Bạn phải nhập đầy đủ thông tin để đặt hàng";
                }
               
                
                if($Orders == true) {
                  
                    $OrderID = $HomeModel->getOrderMaxById();
                    //var_dump($OrderID).die();
                    $sum = 0;
                    foreach ($_SESSION['mycart'] as $key => $value) {
                        $row = $HomeModel->firstProductDetail(md5($key . 'chuyen-de-web-2'));
                        ///var_dump($row).die();
                        $sum += $value * $row[0]["price"];
                        $total = $value * $row[0]["price"];
                        $HomeModel->insertOrderItem($OrderID , $key , $value);

                    }
                    if(!empty($_SESSION['coupon'])) {
                        $check2 = $HomeModel->getCouponByZipcode($_SESSION['coupon']);
                        $phantram = (100 - $check2[0]['discount']) / 100;
                        $khuyenmai = $sum * $phantram;
                        $HomeModel->updateSum($OrderID,$khuyenmai);
                    } else {
                        $HomeModel->updateSum($OrderID,$sum);
                    }
                    header("location: checkout.php");
                    unset($_SESSION['mycart']);
                   
                } 
            }
        }
      
    } else {
       $input .= "Bạn cẩn phản đăng nhập";
       $login .= "<h4>Phản hồi khách hàng? <a href=\"login.php\">Nhấn vào đây để đăng nhập</a></h4>";
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
                <h3>Đặt hàng</h3>
                <ul>
                    <li><a href="index.php">Nhà</a></li>
                    <li><a href="checkout.php">Đặt hàng</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Main Header Area =================-->

    <!--================Billing Details Area =================-->
    <section class="billing_details_area p_100">
        <div class="container">
            <?php if($login != "") { ?>
            <div class="return_option">
                <?= $login ?>
            </div>
            <?php } ?>

            <div class="row">
                <div class="col-lg-7">
                    <?php if($input != "") { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $input ?>
                    </div>
                    <?php } ?>
                    <?php if($resuft != "") { ?>
                    <div class="alert alert-success" role="alert">
                        <?= $resuft ?>
                    </div>
                    <?php } ?>
                    <div class="main_title">
                        <h2>Chi tiết thanh toán</h2>
                    </div>
                    <div class="billing_form_area">
                        <form class="billing_form row" method="post" id="contactForm" novalidate="novalidate"
                            onSubmit="return IsInsertOrder()">
                            <div class="form-group col-md-6">
                                <label for="first">Tên đầu tiên *</label>
                                <input type="text" class="form-control" id="first" name="firstname"
                                    placeholder="Tên đầu tiên">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last">Họ *</label>
                                <input type="text" class="form-control" id="last" name="lastname" placeholder="Họ">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="address">Địa chỉ nhà *</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Địa chỉ">

                            </div>

                            <div class="form-group col-md-6">
                                <label for="email">Địa chỉ email *</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Địa chỉ email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Điện thoại *</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="Chọn một tùy chọn">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="phone">Ghi chú đơn hàng</label>
                                <textarea class="form-control" name="message" id="message" rows="1"
                                    placeholder="Lưu ý về đặt hàng của bạn. ví dụ: lưu ý đặt biệt để giao hàng"></textarea>
                            </div>
                            <button type="submit" value="submit" id="button-check" name="submit" class="btn pest_btn"
                                >Đặt hàng</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="order_box_price">
                        <div class="main_title">
                            <h2>Đơn hàng của bạn</h2>
                        </div>
                        <?php   if(!empty($_SESSION['mycart'])) { ?>
                        <div class="payment_list">
                            <div class="price_single_cost">
                                <h5>SẢN PHẨM <span>TOÀN BỘ</span></h5>
                                <?php
                                    $sum = 0;
                                    
                                    foreach ($_SESSION['mycart'] as $key => $value) {
                                        $row = $HomeModel->firstProductDetail(md5($key . 'chuyen-de-web-2'));
                                        // Tổng:
                                        $sum += $value * $row[0]["price"];
                                        $total = $value * $row[0]["price"]; ?>
                                <h5><?= $row[0]['name'] ?> X <?= $value ?><span>$<?= $total ?></span></h5>
                                <?php
                                    }  ?>
                                <?php
                                    $khuyenmai = null;
                                    if (!empty($_SESSION['coupon'])) {
                                        $check = $HomeModel->getCouponByZipcode($_SESSION['coupon']);
                                        $phantram = (100 - $check[0]['discount']) / 100;
                                        $khuyenmai = $sum * $phantram;
                                        $tongphu = $sum - $khuyenmai; ?>
                                <h4>Khuyến mãi <?= $check[0]['discount'] ?>% còn <span>- $<?= $tongphu ?></span></h4>
                                <h5>Vận chuyển và xử lý<span class="text_f">Miễn phí vận chuyển</span></h5>
                                <h3>TOÀN BỘ <span>$<?= $khuyenmai ?></span></h3>
                                <?php
                                    } else { ?>
                                <h4>TỔNG PHỤ <span>$<?= $sum ?></span></h4>
                                <h5>Vận chuyển và xử lý<span class="text_f">Miễn phí vận chuyển</span></h5>
                                <h3>TOÀN BỘ <span>$<?= $sum ?></span></h3>
                                <?php } ?>
                            </div>
                            <div id="accordion" class="accordion_area">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse"
                                                data-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                Chuyển khoản trực tiếp
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            Thực hiện thanh toán của bạn trực tiếp vào tài khoản ngân hàng của chúng
                                            tôi. Vui lòng sử dụng ID đơn đặt hàng của bạn làm tham chiếu thanh toán. Đơn
                                            đặt hàng của bạn sẽ không được giao cho đến khi tiền đã hết trong tài khoản
                                            của chúng tôi.
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <?php } else { ?>
                        <div class="alert alert-success" role="alert">
                            Đặt hàng thành công! Cảm ơn quý khách vì đã đến.
                        </div>
                        <a href="shop.php" class="btn pest_btn">Cửa hàng</a>
                        <?php }  ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Billing Details Area =================-->

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
    function IsInsertOrder() {
        if (IsNull("email")) {
            $("error").innerHTML = "Vui lòng nhập địa chỉ";
            return false;
        }
        if (IsNull("phone")) {
            $("error").innerHTML = "Vui lòng nhận số điện thoại";
            return false;
        }
        dienThoai = $("phone");
        if (isNaN(dienThoai.value)) {
            dienThoai.focus();
            $("error").innerHTML = "Số điện thoại không hợp lệ";
            return false;
        }
        return true;
    }
    </script>
</body>

</html>