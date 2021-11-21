<?php

function cartElement($product_img, $productName, $product_Price, $product_id, $quantity) {
    $id      = $product_id;
    $element = "
    
    <form method=\"post\" action = \"cart.php?action=remove&id=$product_id\" class=\"cart-items\" style='margin-bottom: 2px;border: 2px solid #000000;'>
                            <div class=\"row bg-white\">
                                <div class=\"col-md-3\">
                                    <img src =\"pictures/upload/$product_img\"style='width:180px;height:220px;';>
                                </div >
                                <div class=\"col-md-6\">
                                    <h4 class=\"h2\">$productName</h4>
                                    <h4 class=\"text - warning\">$ $product_Price</h4>
                                    <button type=\"submit\" class=\"btn-group-sm\"name = \"check_out\">
                                        Đặt Hàng
                                                 </button >
                                    <button type = \"submit\" class=\"btn-group-sm\" name = \"remove\">
                                        Remove
                                    </button >
                                    <h4 style='padding-top: 10px'>Còn lại : <span>$quantity</span> </h4>
                                    
                                </div >
                                <div class=\"col-md-3\" style =\"padding-top: 50px\">
                                    <div style =\"display:flex\">
                                        <button type=\"submit\" class=\"minus\" style =\"border-radius: 20px\" name='minus'><i
                                                    class=\"fa fa-minus\"></i></button>
                                        <input type=\"text\" value=\"".$_SESSION['quanlity'][$id]."\" class=\"form - control w - 25 d - inline\"
                                               style=\"width: 30%;height: auto;text-align: center\" name='price'>
                                        <button type=\"submit\" class=\"plus\" style =\"border-radius: 20px\" name='plus'><i
                                                    class=\"fa fa-plus\"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php }?>
    ";

    echo $element;
}

function checkOutElment($product_img, $productName,$product_Price, $product_id, $quantity) {
    $id      = $product_id;
    $price = (double)$product_Price;
    $gia = $price *  $_SESSION['quanlity'][$id];
    $product_Price= $gia;
    $elementCheckOut = " 
                 <div class='line'></div>
  <table class='order-table' >
                        <tbody >
                        <tr >
                            <td ><img src = \"pictures/upload/$product_img\"
                                     class='full-width' ></img >
                            </td >
                            <td >
                                <h4>$productName</h4>
                                <div class='price' >$$product_Price </div >
                                <div class='soluong'>Số lượng: ".$_SESSION['quanlity'][$id]."</div>
                            </td >

                        </tr >
                        <tr >
                            <td >
                          
                            </td >
                        </tr >
                        </tbody >

                    </table >";
    echo $elementCheckOut;

}