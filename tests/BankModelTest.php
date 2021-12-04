<?php

use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    //
    public function testGetBanksGood()
    {
        $bankModel = new BankModel();
        $params['keyword']  = 11;
        $bank = $bankModel->getBanks($params);
        if (empty($bank[0])) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // 
    public function testGetBankObject()
    {
        $bank = new BankModel();
        $bankId = new stdClass();
        try {
            $bank->getBanks($bankId);
        } catch (Throwable $ex) {
            $this->assertTrue(True);
        }
    }
    //test kiểm tra gia trị có tồn tại trong mảng hay không
    public function testGetBanks()
    {
        $bankModel = new BankModel();
        $UserIdInBank = 3;
        $array = array("id" => 3, "user_id" => 3, "cost" => 1111);
        //kiểm tra giá trị tồn tại trong mang
        $expected = in_array(3, $array);
        $actual = $bankModel->getBanks($expected);
        //var_dump($actual);die();

        if ($actual == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testGetBanksByDoubleKey()
    {
        $bankModel = new BankModel();
        $expected = false;
        $key = 1.11;
        $actual = $bankModel->getBanks($key);
        $this->assertEquals($expected, $actual);
    }
}
