<?php

use PHPUnit\Framework\TestCase;

class CartModelTest extends TestCase
{
    // test deleteCartById truyền vào đúng id
    public function testDeleteCartByIdOK()
    {
        $cart = new cart();
        $cartid = 191;
        $excute = null;
        $actual = $cart->delete_cart($cartid);
        $this->assertEquals($excute, $actual);
    }
    // test deleteCartById truyền vào sai id
    public function testDeleteCartByIdNotOK()
    {
        $cart = new cart();
        $cartid = 475;
        $excute = false;
        $actual = $cart->delete_cart($cartid);
        $this->assertEquals($excute, $actual);
    }
    //test deleteUserById id bằng null
    public function testDeleteCartByIdNull()
    {
        $cart = new cart();
        $cartid = null;
        $actual = $cart->delete_cart($cartid);
        if ($actual == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    //test deleteCartbyId id không tồn tại trong database
    public function testDeleteCartByIdDoseNotExist()
    {
        $cart = new cart();
        $cartid = 2312;
        $excute = false;
        $actual = $cart->delete_cart($cartid);
        $this->assertEquals($excute, $actual);
    }
    //test deleteCartById id là kiểu chuỗi
    public function testDeleteCartByIdIsString()
    {
        $cart = new cart();
        $cartid = "123abc";
        $excute = false;
        $actual = $cart->delete_cart($cartid);
        $this->assertEquals($excute, $actual);
    }
    //test deleteCartById id là kiểu mảng
    public function testDeleteCartByIdIsArray()
    {
        $cart = new cart();
        $id = ["100"];
        $excute = false;
        $actual = $cart->delete_cart($id);
        $this->assertEquals($excute, $actual);
    }
    //test deleteCartById id là kiểu object
    public function testDeleteUserByIdIsObject()
    {
        $cart = new cart();
        $id = $cart;
        $excute = false;
        $actual = $cart->delete_cart($id);
        $this->assertEquals($excute, $actual);
    }
}
