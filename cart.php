<!DOCTYPE html>
<html lang="en">
<?php require "./form/head.php"; ?>
<?php
$total = 0;
if (isset($_GET['id']) || isset($_SESSION['last_id'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else if (isset($_SESSION['last_id'])) {
        $id = $_SESSION['last_id'];
    }
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]++;
    } else {
        $_SESSION['cart'][$id] = 1;
    }
    if (!isset($_SESSION['id'][$id])) {
        $_SESSION['id'][$id] = $id;
    }
}
?>
<!--Xu ly gio hang-->

<body>
    <?php require "./form/header-bottom.php"; ?>
    <section>
        <section id="cart_items">
            <div class="container">
                <h3>Đơn Hàng của bạn</h3>
                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu" style=" background: #7b7977;">
                                <td class="image"></td>
                                <td class="description">Tên</td>
                                <td class="price">Giá</td>
                                <td class="quantity">Số lượng</td>
                                <td class="total">Tổng cộng</td>
                                <td>Xóa</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php if (isset($_SESSION['id']) && isset($_SESSION['cart'])) {
                                    foreach ($_SESSION['id'] as $numberID) {
                                        foreach ($product->getProductsByID($numberID) as $value) { ?>
                                            <td class="cart_product">
                                                <a href=""><img style="width:150px;height;200px" src="images/<?php echo $value['pro_image'] ?>" alt="" width=110></a>
                                            </td>
                                            <td class="cart_description">
                                                <h4><a href="detail.php?id=<?php echo $value['ID'] ?>"><?php echo $value['name'] ?></a></h4>
                                            </td>
                                            <td class="cart_price">
                                                <p><?php echo number_format($value['price']) ?> VND</p>
                                            </td>
                                            <td class="cart_quantity">
                                                <div class="cart_quantity_button">
                                                    <a class="cart_quantity_up" href="change.php?id=<?php echo $numberID ?>&control=1"> + </a>
                                                    <input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $_SESSION['cart'][$numberID] ?>" autocomplete="off" size="2">
                                                    <a class="cart_quantity_down" href="change.php?id=<?php echo $numberID ?>&control=2"> - </a>
                                                </div>
                                            </td>
                                            <td class="cart_total">
                                                <p class="cart_total_price"><?php echo number_format($value['price'] * $_SESSION['cart'][$numberID]) ?> VND</p>
                                                <?php $total += $value['price'] * $_SESSION['cart'][$numberID];
                                                $_SESSION['total'] = $total;
                                                ?>
                                            </td>
                                            <td class="cart_delete">
                                                <a class="cart_quantity_delete" href="change.php?id=<?php echo $numberID ?>&control=3"><i class="fa fa-times"></i></a>
                                            </td>
                            </tr>
                <?php }
                                    }
                                } ?>
                <!--Form dat hang-->
                        </tbody>
                    </table>
                    <h3>
                        <p style=text-align:center;background-color:#7b7977;padding:10px;color:white>Tổng Cộng: <?php echo number_format($total) ?> VND</p>
                    </h3>
                    <form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="thanhtoan.php">
                        <div class="form-group col-md-6">
                            <input type="text" name="name" id="inputname" class="form-control" placeholder="Họ tên" required>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" id="inputemail" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="address" id="inputaddress" class="form-control" placeholder="Địa chỉ" required>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="number" name="phone" id="inputphone" class="form-control" placeholder="Số điện thoại" required>
                        </div>
                        <div class="form-group col-md-12">
                            <a class="btn btn-default update" href="index.php" style="background: #4b5051;">Tiếp tục mua hàng</a>
                            <a class="btn btn-default check_out" href="change.php?control=4" style="background: #a53535;">Xóa tất cả</a>
                            <input type="submit" name="submitOrder" class="btn btn-primary pull-right" value="Đặt hàng" style="background: #4b5051;">
                            
                        </div>
                        
                    </form>
                </div>
            </div>
        </section>
        </div>
        </div>
    </section>
    <?php require "./form/footer.php"; ?>
    <?php require "./form/script.php"; ?>
</body>

</html>