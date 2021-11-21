<?php
require 'Controller/order.php';
require 'Controller/Pagination.php';
$orders = new Order();
if($_GET['action'] == 0){ // minus
    if($_GET['number'] > 1){
        $orders->changeQuantity($_GET['number']-1, $_GET['id']);

    }
}
if($_GET['action'] == 1){ // push
    $orders->changeQuantity($_GET['number']+1, $_GET['id']);
}
if($_GET['action'] == 2) { // delete
    $orders->deleteOrder($_GET['id']);
}
if($_GET['action'] == 3) { // add product
    $orders->addOrder($_GET['id']);
}

//echo '<script language="javascript">window.location="cart.php";</script>';
?>