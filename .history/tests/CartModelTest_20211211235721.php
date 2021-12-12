<?php

use PHPUnit\Framework\TestCase;

class CartModelTest extends TestCase
{
    // test deleteUserById truyền vào đúng id
    public function testDeleteUserByIdOK()
    {
        $cart = new cart();
        $id = 1;
        $excute = true;
        $actual = $cart->delete_cart($id);
        $this->assertEquals($excute, $actual);
    }
}
