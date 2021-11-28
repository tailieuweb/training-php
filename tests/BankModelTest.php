<?php

use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    /**
     * Test getBanks function, 'Hiếu Cao' do this
     * */
    // Test case Get Banks Pass
    public function testGetBanksPass()
    {
        $bankModel = new BankModel();
        $bankId = $userId = -1;
        $cost = 100;

        $bankModel->insertBankWithId($bankId, $userId, $cost);
        $listBank = $bankModel->getBanks();

        $expected = true;
        $actual = is_array($listBank) && count($listBank) > 0;
        // Delete new Bank After test
        $bankModel->deleteBankByUserId($userId);

        $this->assertEquals($expected, $actual);
    }
    // Test case Get Banks Fail
    public function testGetBanksFail()
    {
        $bankModel = new BankModel();
        $bankId = $userId = -1;
        $cost = 100;

        $bankModel->insertBankWithId($bankId, $userId, $cost);
        $listBank = $bankModel->getBanks();

        $actual = !is_array($listBank) || !count($listBank) > 0 ? false : true;
        // Delete new Bank After test
        $bankModel->deleteBankByUserId($userId);

        if ($actual == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test get bank by id
     * */
    // Test get bank by id ok
    public function testBankByIdOk()
    {
        $bankModel = new BankModel();
        $bankId = -1;

        $bankModel->startTransaction();

        $bankModel->insertBankWithId($bankId, -1, 123);

        $findBank = $bankModel->getBankById($bankId);
        $actual = $findBank != false &&
            $findBank["id"] == $bankId &&
            $findBank["cost"] == 123 &&
            $findBank["user_id"] == -1;

        $bankModel->rollBack();
        $this->assertTrue($actual ? true : false);
    }
    // Test get bank by id float
    public function testBankByIdFloat()
    {
        $bankModel = new BankModel();
        $bankId = 1.23;

        $bankModel->startTransaction();

        $findBank = $bankModel->getBankById($bankId);

        $bankModel->rollBack();
        $this->assertTrue($findBank ? false : true);
    }
    // Test get bank by id String
    public function testBankByIdString()
    {
        $bankModel = new BankModel();
        $bankId = "abc";

        $bankModel->startTransaction();

        $findBank = $bankModel->getBankById($bankId);

        $bankModel->rollBack();
        $this->assertTrue($findBank ? false : true);
    }
    // Test get bank by id Null
    public function testBankByIdNull()
    {
        $bankModel = new BankModel();
        $bankId = null;

        $bankModel->startTransaction();

        $findBank = $bankModel->getBankById($bankId);

        $bankModel->rollBack();
        $this->assertTrue($findBank ? false : true);
    }
    // Test get bank by id Object
    public function testBankByIdObject()
    {
        $bankModel = new BankModel();
        $bankId = new BankModel();

        $bankModel->startTransaction();

        $findBank = $bankModel->getBankById($bankId);

        $bankModel->rollBack();
        $this->assertTrue($findBank ? false : true);
    }
    // Test get bank by id Bool true
    public function testBankByIdBoolTrue()
    {
        $bankModel = new BankModel();
        $bankId = true;

        $bankModel->startTransaction();

        $findBank = $bankModel->getBankById($bankId);

        $bankModel->rollBack();
        $this->assertTrue($findBank ? false : true);
    }
    // Test get bank by id Bool false
    public function testBankByIdBoolFalse()
    {
        $bankModel = new BankModel();
        $bankId = false;

        $bankModel->startTransaction();

        $findBank = $bankModel->getBankById($bankId);

        $bankModel->rollBack();
        $this->assertTrue($findBank ? false : true);
    }
     // Test get bank by id Array
     public function testBankByIdArray()
     {
         $bankModel = new BankModel();
         $bankId = [1,2,3];
 
         $bankModel->startTransaction();
 
         $findBank = $bankModel->getBankById($bankId);
 
         $bankModel->rollBack();
         $this->assertTrue($findBank ? false : true);
     }
}
