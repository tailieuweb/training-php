<?php

use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    // Huynh lam test findBankById
    // Test truong hop thanh cong
    public function testFindBankByIdOk()
    {
        $bankModel = new BankModel();
        $idBank = 6;
        $expected = 100;
        $bank = $bankModel->findBankById($idBank);
        $actual = $bank[0]['cost'];
        $this->assertEquals($expected, $actual);
    }
    // Test truong hop sai
    public function testFindBankByIdNg()
    {
        $bankModel = new BankModel();
        $idBank = 7;
        $bank = $bankModel->findBankById($idBank);
        if (empty($bank)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test truong hop id la chuoi
    public function testFindBankByIdIsString()
    {
        $bankModel = new BankModel();
        $bankId = '123';
        $expected = 'Not invalid';
        $actual = $bankModel->findBankById($bankId);
        $this->assertEquals($expected, $actual);
    }
    // Test trường hợp id là số âm
    public function testFindBankByIdIsNegativeNumber()
    {
        $bankModel = new BankModel();
        $bankId = -10;
        $expected = 'Not invalid';
        $actual = $bankModel->findBankById($bankId);
        $this->assertEquals($expected, $actual);
    }
    // Test trường hợp id là số thực
    public function testFindBankByIdIsDoubleNumber()
    {
        $bankModel = new BankModel();
        $bankId = 2.5;
        $expected = 'Not invalid';
        $actual = $bankModel->findBankById($bankId);
        $this->assertEquals($expected, $actual);
    }
    // Test trường hợp id là null
    public function testFindBankByIdIsNull()
    {
        $bankModel = new BankModel();
        $bankId = null;
        $expected = 'Not invalid';
        $actual = $bankModel->findBankById($bankId);
        $this->assertEquals($expected, $actual);
    }
    // Test trường hợp id là boolean(true/false)
    public function testFindBankByIdIsBoolean()
    {
        $bankModel = new BankModel();
        $bankId = true;
        $actual = $bankModel->findBankById($bankId);
        if (empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test trường hợp id là mảng
    public function testFindBankByIdIsArray()
    {
        $bankModel = new BankModel();
        $bankId = null;
        $expected = 'Not invalid';
        $actual = $bankModel->findBankById($bankId);
        $this->assertEquals($expected, $actual);
    }
    // Test trường hợp id là 1 object
    public function testFindBankByIdIsObject()
    {
        $bankModel = new BankModel();
        $bankId = new BankModel();
        $expected = 'Not invalid';
        $actual = $bankModel->findBankById($bankId);
        $this->assertEquals($expected, $actual);
    }
    // Test trường hợp id không tồn tại
    public function testFindBankByIdNotExist()
    {
        $bankModel = new BankModel();
        $bankId = 50;
        $bank = $bankModel->findBankById($bankId);
        if (empty($bank)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test trường hợp id là kí tự
    public function testFindBankByIdIsCharacters()
    {
        $bankModel = new BankModel();
        $bankId = '@11';
        $expected = 'Not invalid';
        $actual = $bankModel->findBankById($bankId);
        $this->assertEquals($expected, $actual);
    }
    // End test findBankById
}