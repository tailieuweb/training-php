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

<body>
    <?php require "./form/header-bottom.php"; ?>
    <div class="text-center" style="padding: 50px 50px; padding-top: 20px;
padding-bottom: 20px; text-align: center;">
        <h1>ĐƠN HÀNG</h1>
            <table border="1" style="font-size: 20px; width: 100%;" cellpadding="8">
                <tr>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th style="text-align: center;">Tên hàng</th>
                    <th style="text-align: center;">Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>

                <tr>

                    <?php if (isset($_SESSION['id']) && isset($_SESSION['cart'])) {
                        foreach ($_SESSION['id'] as $numberID) {
                            foreach ($product->getProductsByID($numberID) as $value) { ?>
                                <td><?php echo $_POST["name"] ?></td>
                                <td><?php echo $_POST["email"] ?></td>
                                <td><?php echo $_POST["address"] ?></td>
                                <td><?php echo $_POST["phone"] ?></td>
                                <td>
                                    <h4><img style="width:150px;height;200px" src="images/<?php echo $value['pro_image'] ?>" alt="" width=110><?php echo $value['name'] ?></a></h4>
                                </td>
                                <td><?php echo number_format($value['price']) ?> VND</td>
                                <td><?php echo $_SESSION['cart'][$numberID] ?></td>
                                <td><?php echo number_format($value['price'] * $_SESSION['cart'][$numberID]) ?> VND</p>
                                    <?php $total += $value['price'] * $_SESSION['cart'][$numberID];
                                    $_SESSION['total'] = $total;
                                    ?></td>

                </tr>
    <?php }
                        }
                    } ?>

    <?php

    ?>
    <tr>
        <td colspan="8" align="right">Tổng tiền: <?php echo number_format($total) ?> VND</td>
    </tr>
            </table>
      
        <div class="form-group col-md-12 text-center" style="padding-top: 50px;">
            <a class="btn btn-default mua-ngay" href="camon.php" onclick="return confirm('Bạn có chắc đã chọn đủ hàng và muốn thanh toán ?');" style="background: #0098db; color: white;">Mua ngay</a>
            <a class="btn btn-default back" href="cart.php" style="background: #0098db; color: white;">Quay lại</a>
        </div>
    </div>

    <?php require "./form/footer.php"; ?>
    <?php require "./form/script.php"; ?>
</body>

</html>
<?php
ob_end_flush();
?>