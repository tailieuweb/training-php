<?php

use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
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

}