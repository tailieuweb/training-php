<?php

use PHPUnit\Framework\TestCase;

class CartModelTest extends TestCase
{
    // test deleteCartById truyền vào đúng id
    public function testDeleteCartByIdOK()
    {
        $cart = new cart();
        $cartid = 194;
        $excute = True;
        $actual = $cart->delete_cart($cartid);
        $this->assertEquals($excute, $actual);
    }
}
