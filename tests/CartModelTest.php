<?php

use PHPUnit\Framework\TestCase;

class CartModelTest extends TestCase
{
    // Test delete cart
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
    //Xóa mã giảm giá tại vị trí đúng id
    public function testDeleteDiscountByIdOK()
    {
        $cart = new cart();
        $discountid = 2;
        $excute = true;
        $alert = "<span>Xóa thàh công</span";
        $actual = $cart->delete_Discount($discountid);
        $this->assertEquals($excute, $actual,$alert);
    }

    public function testInsertDiscountOk(){
        $cart = new cart();
        $discount = array(
            'id_discount' => 5,
            'code' => 'Maymanngaymoi',
            'discount' => 20
        );
        $expected = true; 
        $actual = $cart->insert_Discount($discount);
        $this->assertEquals($actual,$expected);   
    }
}
