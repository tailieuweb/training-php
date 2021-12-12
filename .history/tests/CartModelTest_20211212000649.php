<?php

use PHPUnit\Framework\TestCase;

class CartModelTest extends TestCase
{
    // test deleteCartById truyền vào đúng id
    public function testDeleteCartByIdOK()
    {
        $cart = new cart();
        $cart_id = 189;
        $excute = true;
        $actual = $cart->delete_cart($cart_id);
        $this->assertEquals($excute, $actual);
    }
}
