<?php

use PHPUnit\Framework\TestCase;

class BillModelTest extends TestCase
{
    // // test deleteBillById truyền vào đúng id
    // public function deleteBillByIdOK()
    // {
    //     $bill = new bill();
    //     $oder_id = 87;
    //     $excute = true;
    //     $actual = $bill->delete_Order($oder_id);
    //     $this->assertEquals($excute, $actual);
    // }
    // // test deleteCartById truyền vào sai id
    // public function testDeleteBillByIdNotOK()
    // {
    //     $bill = new bill();
    //     $oder_id = 12312;
    //     $excute = false;
    //     $actual = $bill->delete_Order($oder_id);
    //     $this->assertEquals($excute, $actual);
    // }
    //test deleteBillById id bằng null
    public function testDeleteBillByIdNull()
    {
        $bill = new bill();
        $oder_id = null;
        $actual = $bill->delete_Order($bill);
        if ($actual == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // //test deleteCartbyId id không tồn tại trong database
    // public function testDeleteCartByIdDoseNotExist()
    // {
    //     $bill = new bill();
    //     $oder_id = 534534;
    //     $excute = false;
    //     $actual = $bill->delete_Order($oder_id);
    //     $this->assertEquals($excute, $actual);
    // }
    //test deleteCartById id là kiểu chuỗi
    public function testDeleteBillByIdIsString()
    {
        $bill = new bill();
        $oder_id = "sdfsd";
        $excute = false;
        $actual = $bill->delete_Order($oder_id);
        $this->assertEquals($excute, $actual);
    }
    //test deleteCartById id là kiểu mảng
    public function testDeleteCartByIdIsArray()
    {
        $bill = new bill();
        $oder_id = ["132"];
        $excute = false;
        $actual = $bill->delete_Order($oder_id);
        $this->assertEquals($excute, $actual);
    }
    //test deleteCartById id là kiểu object
    public function testDeleteUserByIdIsObject()
    {
        $bill = new bill();
        $oder_id = $bill;
        $excute = false;
        $actual = $bill->delete_Order($oder_id);
        $this->assertEquals($excute, $actual);
    }
    //test deleteCartById id là kiểu boolean
    public function testDeleteCartByIdIsBoolean()
    {
        $bill = new bill();
        $oder_id = true;
        $excute = false;
        $actual = $bill->delete_Order($oder_id);
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
        $actual = $cart->delete_cart($oder_id);
        $this->assertEquals($excute, $actual);
    }
}
