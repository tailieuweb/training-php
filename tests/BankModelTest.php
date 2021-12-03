<?php

use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    // Test truong hop thanh cong
    public function testFindBankByIdOk()
    {
        $bankModel = new BankModel();
        $idBank = 6;
        $expected = '100';
        $actual = $bankModel->findBankById($idBank);
        // var_dump($actual[0]['cost']);
        // die();
        $this->assertEquals($expected, $actual[0]['cost']);
    }
    // Bao lam test getBanks
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
    // Test trường hợp sai
    public function testGetBanksNg()
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
        $params['keyword']  = 1.5;
        $bank = $bankModel->getBanks($params);
        if (empty($bank[0])) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }

    // Test keyword là null
    public function testGetBanksIsNull()
    {
        $bankModel = new BankModel();
        $params['keyword']  = null;
        $bank = $bankModel->getBanks($params);
        if (empty($bank[0])) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
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
    // Test keyword là object
    public function testGetBanksIsObject()
    {
        $bankModel = new BankModel();
        $params['keyword']  = new BankModel();
        $bank = $bankModel->getBanks($params);
        if (empty($bank[0])) {
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
        $actual = $Bank->getAllBanks($id);
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // End test getBanks
    
    //  Test id nhap vao là ki tu dac biet
    public function testUpdateBankIdIsCharacters()
    {
        $bank = new BankModel();
        $input = array('id' => '@','user_id' => '1', 'cost' => 100);
        $actual = $bank->updateBank($input);
        if ($actual == false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertFalse(true);
        }
    }
    // New
     //  Test cost nhap vao la chuoi
     public function testUpdateBankCostIsString()
     {
         $bank = new BankModel();
         $input = array('id' => 4,'user_id' => '1', 'cost' => '100');
         $actual = $bank->updateBank($input);
         if ($actual == false) {
             return $this->assertTrue(true);
         } else {
             return $this->assertFalse(true);
         }
     }
     //  Test cost nhap vao la số âm
     public function testUpdateBankCostIsNegNum()
     {
         $bank = new BankModel();
         $input = array('id' => 4,'user_id' => '1', 'cost' => -100);
         $actual = $bank->updateBank($input);
         if ($actual == false) {
             return $this->assertTrue(true);
         } else {
             return $this->assertFalse(true);
         }
     }
     //  Test cost nhap vao la số thực
     public function testUpdateBankCostIsDoubleNum()
     {
         $bank = new BankModel();
         $input = array('id' => '1.5','user_id' => '1', 'cost' => 150.5);
         $actual = $bank->updateBank($input);
         if ($actual == false) {
             return $this->assertTrue(true);
         } else {
             return $this->assertFalse(true);
         }
     }
     //  Test cost nhap vao là null
     public function testUpdateBankCostIsNull()
     {
         $bank = new BankModel();
         $input = array('id' => 4,'user_id' => '1', 'cost' => null);
         $actual = $bank->updateBank($input);
         if ($actual == false) {
             return $this->assertTrue(true);
         } else {
             return $this->assertFalse(true);
         }
     }
     //  Test cost nhap vao là object
     public function testUpdateBankCostIsObject()
     {
         $bank = new BankModel();
         $input = array('id' => 4,'user_id' => '1', 'cost' => new BankModel());
         $actual = $bank->updateBank($input);
         if ($actual == false) {
             return $this->assertTrue(true);
         } else {
             return $this->assertFalse(true);
         }
     }
     //  Test cost nhap vao là kiểu boolean
     public function testUpdateBankCostIsBoolean()
     {
         $bank = new BankModel();
         $input = array('id' => 4,'user_id' => '1', 'cost' => true);
         $actual = $bank->updateBank($input);
         if ($actual == false) {
             return $this->assertTrue(true);
         } else {
             return $this->assertFalse(true);
         }
     }
     //  Test cost nhap vao là ki tu dac biet
     public function testUpdateBankCostIsCharacters()
     {
         $bank = new BankModel();
         $input = array('id' => 4,'user_id' => '1', 'cost' => '@');
         $actual = $bank->updateBank($input);
         if ($actual == false) {
             return $this->assertTrue(true);
         } else {
             return $this->assertFalse(true);
         }
     }

    // Huynh lam test findBankById
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

    public function testgetAllBankNg()
    {
        $Bank = new BankModel();
        $id = 18;
        $actual = $Bank->getAllBanks($id);
        if (empty($actual)) {
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
        $actual = $bankModel->getAllBanks($idBank);
        $this->assertEquals($expected, $actual);
    }
    // Test id là số thuc
    public function testgetAllBanksWithIdIsDouble()
    {
        $bankModel = new BankModel();
        $expected = 'Not invalid';
        $idBank = 2.5;
        $actual = $bankModel->getAllBanks($idBank);
        $this->assertEquals($expected, $actual);
    }
    // Test id là chuỗi
    public function testgetAllBanksWithIdIsString()
    {
        $bankModel = new BankModel();
        $expected = 'Not invalid';
        $idBank = 'hi';
        $actual = $bankModel->getAllBanks($idBank);
        $this->assertEquals($expected, $actual);
    }
    // Test id là mảng
    public function testgetAllBanksWithIdIsArray()
    {
        $bankModel = new BankModel();
        $expected = 'Not invalid';
        $idBank = [10];
        $actual = $bankModel->getAllBanks($idBank);
        $this->assertEquals($expected, $actual);
    }
    // Test id là null
    public function testgetAllBanksWithIdIsNull()
    {
        $bankModel = new BankModel();
        $expected = 'Not invalid';
        $idBank = null;
        $actual = $bankModel->getAllBanks($idBank);
        $this->assertEquals($expected, $actual);
    }
    // Test id là boolean(true/false)
    public function testgetAllBanksWithIdIsBoolean()
    {
        $bankModel = new BankModel();
        $id = true;
        $actual = $bankModel->getAllBanks($id);
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
        $actual = $bankModel->getAllBanks($id);
        if (empty($actual)) {
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
        $actual = $bankModel->getAllBanks($idBank);
        $this->assertEquals($expected, $actual);
    }
    // Test id là object
    public function testgetAllBanksWithIdIsObject()
    {
        $bankModel = new BankModel();
        $idBank = new UserModel();
        $expected ='Not invalid';
        $actual = $bankModel->getAllBanks($idBank);
        $this->assertEquals($expected, $actual);
    }

    // End Chien lam
}


   
