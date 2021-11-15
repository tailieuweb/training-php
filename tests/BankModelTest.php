<?php

use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    // Chien lam test cho DeleteBankById
    public function testDeleteBankByIdGood()
    {
        $Bank = new BankModel();
        $id = 3;
        $actual = $Bank->deleteBankById($id);
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }

    public function testDeleteBankByIdNg()
    {
        $Bank = new BankModel();
        $id = 18;
        $actual = $Bank->deleteBankById($id);
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // Test id là số âm
    public function testDeleteBankByIdIsNegativeNum()
    {
        $bankModel = new BankModel();
        $expected = 'Not invalid';
        $idBank = -10;
        $actual = $bankModel->deleteBankById($idBank);
        $this->assertEquals($expected, $actual);
    }
    // Test id là số thuc
    public function testDeleteBankByIdIsDouble()
    {
        $bankModel = new BankModel();
        $expected = 'Not invalid';
        $idBank = 2.5;
        $actual = $bankModel->deleteBankById($idBank);
        $this->assertEquals($expected, $actual);
    }
    // Test id là chuỗi
    public function testDeleteBankByIdIsString()
    {
        $bankModel = new BankModel();
        $expected = 'Not invalid';
        $idBank = 'hi';
        $actual = $bankModel->deleteBankById($idBank);
        $this->assertEquals($expected, $actual);
    }
    // Test id là mảng
    public function testDeleteBankByIdIsArray()
    {
        $bankModel = new BankModel();
        $expected = 'Not invalid';
        $idBank = [10];
        $actual = $bankModel->deleteBankById($idBank);
        $this->assertEquals($expected, $actual);
    }
    // Test id là null
    public function testDeleteBankByIdIsNull()
    {
        $bankModel = new BankModel();
        $expected = 'Not invalid';
        $idBank = null;
        $actual = $bankModel->deleteBankById($idBank);
        $this->assertEquals($expected, $actual);
    }
    // Test id là boolean(true/false)
    public function testDeleteBankByIdIsBoolean()
    {
        $bankModel = new BankModel();
        $id = true;
        $actual = $bankModel->deleteBankById($id);
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // Test id không tồn tại
    public function testDeleteBankByIdIsNotExist()
    {
        $bankModel = new BankModel();
        $id = 25;
        $actual = $bankModel->deleteBankById($id);
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // Test id là kí tự đặc biệt
    public function testDeleteBankByIdIsCharacter()
    {
        $bankModel = new BankModel();
        $expected = 'Not invalid';
        $idBank = '@@';
        $actual = $bankModel->deleteBankById($idBank);
        $this->assertEquals($expected, $actual);
    }
    // Test id là object
    public function testDeleteBankByIdIsObject()
    {
        $bankModel = new BankModel();
        $idBank = new UserModel();
        $expected = 'Not invalid';
        $actual = $bankModel->deleteBankById($idBank);
        $this->assertEquals($expected, $actual);
    }

    // End Chien lam

    // Chien lam test function getAllBanks
    public function testgetAllBanksGood()
    {
        $Bank = new BankModel();
        $id = 3;
        $actual = $Bank->deleteBankById($id);
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }

    public function testgetAllBankNg()
    {
        $Bank = new BankModel();
        $id = 18;
        $actual = $Bank->deleteBankById($id);
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // Test id là số âm
    public function testgetAllBanksWithIdIsNegativeNum()
    {
        $bankModel = new BankModel();
        $expected = 'Not invalid';
        $idBank = -10;
        $actual = $bankModel->deleteBankById($idBank);
        $this->assertEquals($expected, $actual);
    }
    // Test id là số thuc
    public function testgetAllBanksWithIdIsDouble()
    {
        $bankModel = new BankModel();
        $expected = 'Not invalid';
        $idBank = 2.5;
        $actual = $bankModel->deleteBankById($idBank);
        $this->assertEquals($expected, $actual);
    }
    // Test id là chuỗi
    public function testgetAllBanksWithIdIsString()
    {
        $bankModel = new BankModel();
        $expected = 'Not invalid';
        $idBank = 'hi';
        $actual = $bankModel->deleteBankById($idBank);
        $this->assertEquals($expected, $actual);
    }
    // Test id là mảng
    public function testgetAllBanksWithIdIsArray()
    {
        $bankModel = new BankModel();
        $expected = 'Not invalid';
        $idBank = [10];
        $actual = $bankModel->deleteBankById($idBank);
        $this->assertEquals($expected, $actual);
    }
    // Test id là null
    public function testgetAllBanksWithIdIsNull()
    {
        $bankModel = new BankModel();
        $expected = 'Not invalid';
        $idBank = null;
        $actual = $bankModel->deleteBankById($idBank);
        $this->assertEquals($expected, $actual);
    }
    // Test id là boolean(true/false)
    public function testgetAllBanksWithIdIsBoolean()
    {
        $bankModel = new BankModel();
        $id = true;
        $actual = $bankModel->deleteBankById($id);
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // Test id không tồn tại
    public function testgetAllBanksWithIdIsNotExist()
    {
        $bankModel = new BankModel();
        $id = 25;
        $actual = $bankModel->deleteBankById($id);
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // Test id là kí tự đặc biệt
    public function testgetAllBanksWithIdIsCharacter()
    {
        $bankModel = new BankModel();
        $expected = 'Not invalid';
        $idBank = '@@';
        $actual = $bankModel->deleteBankById($idBank);
        $this->assertEquals($expected, $actual);
    }
    // Test id là object
    public function testgetAllBanksWithIdIsObject()
    {
        $bankModel = new BankModel();
        $idBank = new UserModel();
        $expected ='Not invalid';
        $actual = $bankModel->deleteBankById($idBank);
        $this->assertEquals($expected, $actual);
    }
    // End Chien lam
}
