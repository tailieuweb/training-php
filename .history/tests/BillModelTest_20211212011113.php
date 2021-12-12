<?php

use PHPUnit\Framework\TestCase;

class BillModelTest extends TestCase
{
    // test deleteBillById truyền vào đúng id
    public function deleteBillByIdOK()
    {
        $bill = new bill();
        $oder_id = 87;
        $excute = true;
        $actual = $bill->delete_Order($oder_id);
        $this->assertEquals($excute, $actual);
    }
    // test deleteCartById truyền vào sai id
    public function testDeleteBillByIdNotOK()
    {
        $bill = new bill();
        $id = 12312;
        $excute = false;
        $actual = $bill->delete_Order($id);
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
        $cartid = ["100"];
        $excute = false;
        $actual = $cart->delete_cart($cartid);
        $this->assertEquals($excute, $actual);
    }
    //test deleteCartById id là kiểu object
    public function testDeleteUserByIdIsObject()
    {
        $cart = new cart();
        $cartid = $cart;
        $excute = false;
        $actual = $cart->delete_cart($cartid);
        $this->assertEquals($excute, $actual);
    }
    //test deleteCartById id là kiểu boolean
    public function testDeleteCartByIdIsBoolean()
    {
        $cart = new cart();
        $cartid = true;
        $excute = false;
        $actual = $cart->delete_cart($cartid);
        $this->assertEquals($excute, $actual);
    }
    //test deleteCartById id là kiểu số thực
    public function testDeleteCartByIdIsFloat()
    {
        $cart = new cart();
        $cartid = 1.5;
        $excute = false;
        $actual = $cart->delete_cart($cartid);
        $this->assertEquals($excute, $actual);
    }
    //test deleteCartById id là kiểu kí tự đặc biệt
    public function testDeleteCartByIdIsCharacters()
    {
        $cart = new cart();
        $cartid = '@!$%#';
        $excute = false;
        $actual = $cart->delete_cart($cartid);
        $this->assertEquals($excute, $actual);
    }
}
