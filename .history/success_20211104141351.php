<?php
include 'inc/header.php';
?>
<?php
    $buyer= Session::get('customer_user');
?>
<section class="breadcrumb-section set-bg" data-setbg="img/background.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Thanh toán thành công</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Trang chủ</a>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="product-details spad">
				<?php
            $show = $bill->get_Bill_Max();
                if($show){
                           
                    while($result = $show->fetch_assoc()){
                               
                ?>
    <div class="blog__details__text">
        <center><h3>Chào <?php echo " " .$buyer ?>!</h3></center>
        <center><h4>Cảm ơn bạn đã mua hàng tại BUG SHOP.</h4></center>
        <?php 
            }
        }
         ?>
        <center>
        <?php
        $show = $bill->get_Bill_Max();
            if($show){        
            while($result = $show->fetch_assoc()){
                ?>
                <h3 class="one">MÃ ĐƠN HÀNG CỦA BẠN: #<?php echo $result['order_Id']; ?></h3>
            <?php
            }
        }

        ?>
        <h5>( Vui lòng giữ lại mã hóa đơn này.) <br>
        Vui lòng <a href="bill.php">click here</a> để xem thông tin chi tiết đơn hàng
        </h5>
        <h5 class="htest">Chân thành cảm ơn,</h5>
        <br>
        <h5>Your Friends at BUG SHOP</h5>
        </center>
        
        
    </div>
    <div class="col-lg-12">
        <div class="shoping__cart__btns">
            <center><a href="index.php" class="primary-btn cart-btn">CONTINUE SHOPPING</a></center>
            
        </div>
    </div>
</section>
<style type="text/css">
    a:hover {
        color: blue;
    }
    h3.one{
        margin-top: 1em;
    }
    h5.htest{
        margin-top: 1em;
    }
</style>

<?php

include 'inc/footer.php';

?>