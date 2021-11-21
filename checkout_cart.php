<?php
include "./view/check_out/header.php";
require_once 'Controller/Product.php';
require_once 'Controller/order.php';
$data = new Order();
$dataoder = $data->getDataOder();
//var_dump($dataoder);
?>
<table id="tblDanhSach" class="table table-bordered table-hover table-sm table-responsive mt-2">
    <thead class="thead-dark">
    <tr>
        <th>Mã Đơn đặt hàng</th>
        <th>Khách hàng</th>
        <th>Nơi giao</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Tổng thành tiền</th>
        <th>Trạng thái</th>
        <th>Xác nhận</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($dataoder as $value) : ?>
        <tr>
            <td><?= $value['OrderID'] ?></td>
            <td><?= $value['Ten'] ?></td>
            <td><?= $value['Address'] ?></td>
            <td><?= $value['mail'] ?></td>
            <td><?= $value['Phone'] ?></td>
            <td><?= $value['total'] ?></td>
            <td>
                <?php if ($value['Status'] == 0) : ?>
                    <span class="badge badge-danger">Chưa xử lý</span>
                <?php else : ?>
                    <span class="badge badge-success">Đã xử lý</span>
                <?php endif; ?>
            </td>
            <td>
                <button type="button" class="btn btn-success" name="confirm">Xác Nhận</button>
                <button type="button" class="btn btn-danger" name="huy" >Hủy</button>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php

?>

