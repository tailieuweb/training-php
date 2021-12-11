<?php
 session_start();

  require 'models/FactoryPattent.php';
  require 'models/Cart.php';
  $factory = new FactoryPattent();
  $HomModel = $factory->make('home');
  $Cart = new Cart();
  $id = null;
  $error = "";
  if(!empty($_GET['id'])) {
    $id = $_GET['id'];
    //print_r($id);
    $product = $HomModel->firstProductDetail($id);
    // Tên sản phẩm:
    $name = $product[0]['name'];
    //var_dump($id).die();
    if(!empty($product)) {
        $quantity = $_SESSION['mycart'][$product[0]['id']];
    } else {
        $error .= "Không phải sản phẩm này!Xin quý khách chọn đúng sản phẩm";
    }
  } else {
      $error .= "Không phải sản phẩm này!Xin quý khách chọn đúng sản phẩm";
  }
  if(isset($_POST['submit'])) {
    $quantity = $_POST['quantity'];
    if(is_numeric($quantity)) {
        $Cart->UpdateCart($product[0]['id'], $quantity);
        header("Location: cart.php");
        exit; // dừng các mã chạy phía dưới;
    }
  }
   
?>
<!DOCTYPE html>
<html lang="vi">

<?php include "views/head.php"?>
<link href="public/backend/css/theme.css" rel="stylesheet" media="all">


<body>

    <!--================Main Header Area =================-->
    <?php include_once("views/header.php");?>
    <!--================End Main Header Area =================-->

    <!--================End Main Header Area =================-->
    <section class="banner_area">
        <div class="container">
            <div class="banner_text">
                <h3>Chỉnh sửa giỏ hàng</h3>
                <ul>
                    <li><a href="index.php">Nhà</a></li>
                    <li><a href="cart.php">Giỏ hàng</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Main Header Area =================-->

    <!--================Cart Table Area =================-->
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="#">
                            <img src="public/img/logo-2.png" alt="CoolAdmin">
                        </a>
                    </div>
                   
                    <div class="login-form">
                        <?php if($error != "") { ?>
                        <div class="alert alert-danger" role="alert">
                           <?= $error ?>
                        </div>
                        <?php } ?>
                        <form method="post" action="update-cart.php?id=<?php echo $id; ?>"
                            onSubmit="return IsEditCart()">
                            <div class="form-group">
                                <label>Sản phẩm</label>
                                <input class="au-input au-input--full" type="text" name="name" id="txtProduct"
                                    value="<?php echo $name; ?>" placeholder="Sản phẩm" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label>Số lượng</label>
                                <input class="au-input au-input--full" type="number" name="quantity"
                                    value="<?php echo $quantity; ?>" id="txtQuantity" placeholder="Số lượng">
                            </div>

                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="submit">Lưu
                                lại</button>

                        </form>
                        <div class="register-link">
                            <p>
                                <a href="cart.php">Quay lại</a>
                            </p>
                        </div>
                    </div>
                </div>
             
            </div>
        </div>
    </div>
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
    function IsEditCart() {
        if (IsNull("txtQuantity")) {
            $("error").innerHTML = "Vui lòng nhận số sản phẩm";
            return false;
        }
        quantity = $("txtQuantity");
        if (isNaN(quantity.value)) {
            quantity.focus();
            $("error").innerHTML = "Số lượng sản phẩm không hợp lệ";
            return false;
        }
        if (quantity.value < 1) {
            quantity.focus();
            $("error").innerHTML = "Số lượng sản phẩm phải lớn hơn 0";
            return false;
        }
        return true;
    }
    </script>
</body>

</html>