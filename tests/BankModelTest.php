<?php

use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    public function testGetBanksGood()
    {
        $bankModel = new BankModel();
        $params['keyword']  = 11;
        $bank = $bankModel->getBanks($params);
        // var_dump($bank);
        // die();
        if (empty($bank[0])) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    //
    public function testGetBanksNg()
    {
        $bankModel = new BankModel();
        $params['keyword']  = 1000;
        $bank = $bankModel->getBanks($params);
        if (empty($bank[0])) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // Test keyword là chuoi
    public function testGetBanksByIsString()
    {
        $bankModel = new BankModel();
        $params['keyword']  = '11';
        $bank = $bankModel->getBanks($params);
        if (empty($bank[0])) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // Test keyword là số âm
    public function testGetBanksIsNegativeNum()
    {
        $bankModel = new BankModel();
        $params['keyword']  = -11;
        $bank = $bankModel->getBanks($params);
        if (empty($bank[0])) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // Test keyword là số thuc
    public function testGetBanksIsDouble()
    {
        $bankModel = new BankModel();
        $params['keyword']  = 1.1;
        $bank = $bankModel->getBanks($params);
        if (empty($bank[0])) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }

    // // Test keyword là null
    // public function testGetBanksIsNull()
    // {
    //     $bankModel = new BankModel();
    //     $params['keyword']  = null;
    //     $bank = $bankModel->getBanks($params);
    //     if (empty($bank[0])) {
    //         return $this->assertTrue(true);
    //     } else {
    //         return $this->assertTrue(false);
    //     }
    // }
    // Test keyword là boolean(true/false)
    public function testGetBanksIsBoolean()
    {
        $bankModel = new BankModel();
        $params['keyword']  = true;
        $bank = $bankModel->getBanks($params);
        if (empty($bank[0])) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // Test keyword không tồn tại
    public function testGetBanksIsNotExist()
    {
        $bankModel = new BankModel();
        $params['keyword']  = 100;
        $bank = $bankModel->getBanks($params);
        if (empty($bank[0])) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // Test keyword là object
    public function testGetBankObject()
    {
        $bankModel = new BankModel();
        $expected = false;
        $id = new stdClass;
        $actual = $bankModel->getBanks($id);
        $this->assertEquals($expected, $actual);
    }
}
