<?php

use PHPUnit\Framework\TestCase;

class BillModelTest extends TestCase
{

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

    public function testDeleteBillByIdIsString()
    {
        $bill = new bill();
        $oder_id = "sdfsd";
        $excute = false;
        $actual = $bill->delete_Order($oder_id);
        $this->assertEquals($excute, $actual);
    }
    //test deleteBillById id là kiểu mảng
    public function testDeletebillByIdIsArray()
    {
        $bill = new bill();
        $oder_id = ["132"];
        $excute = false;
        $actual = $bill->delete_Order($oder_id);
        $this->assertEquals($excute, $actual);
    }
    //test deleteBillById id là kiểu object
    public function testDeleteBillByIdIsObject()
    {
        $bill = new bill();
        $oder_id = $bill;
        $excute = false;
        $actual = $bill->delete_Order($oder_id);
        $this->assertEquals($excute, $actual);
    }
    //test deleteBillById id là kiểu boolean
    public function testDeleteBillByIdIsBoolean()
    {
        $bill = new bill();
        $oder_id = true;
        $excute = false;
        $actual = $bill->delete_Order($oder_id);
        $this->assertEquals($excute, $actual);
    }
    //test deleteById id là kiểu số thực
    public function testDeleteBillByIdIsFloat()
    {
        $bill = new bill();
        $oder_id = 1.52;
        $excute = false;
        $actual = $bill->delete_Order($oder_id);
        $this->assertEquals($excute, $actual);
    }
    //test deleteCartById id là kiểu kí tự đặc biệt
    public function testDeleteCartByIdIsCharacters()
    {
        $bill = new bill();
        $oder_id = '@!$%#';
        $excute = false;
        $actual = $bill->delete_Order($oder_id);
        $this->assertEquals($excute, $actual);
    }
}
