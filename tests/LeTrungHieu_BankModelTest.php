<?php

use PHPUnit\Framework\TestCase;

class LeTrungHieu_BankModelTest extends TestCase
{
    /**
     * Test get bank by id Hieu-Le
     * */
    // Test get bank by id ok
    public function testBankByIdOk()
    {
        $bankModel = new BankModel();
        $bankId = -56;

        $bankModel->startTransaction();

        $bankModel->insertBankWithId($bankId, -1, 123);

        $findBank = $bankModel->getBankById($bankId);
        $actual = $findBank == true &&
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
        $bankId = 1.233;

        $bankModel->startTransaction();

        $findBank = $bankModel->getBankById($bankId);

        $bankModel->rollBack();
        $this->assertTrue($findBank ? false : true);
    }
    // Test get bank by id negative
    public function testBankByIdNegative()
    {
        $bankModel = new BankModel();
        $bankId = -1234;

        $bankModel->startTransaction();

        $findBank = $bankModel->getBankById($bankId);

        $bankModel->rollBack();
        $this->assertTrue($findBank ? false : true);
    }
    // Test get bank by id null Array
    public function testBankByIdNullArray()
    {
        $bankModel = new BankModel();
        $bankId = [];

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
         $bankId = [1,2,3,6,5];
 
         $bankModel->startTransaction();
 
         $findBank = $bankModel->getBankById($bankId);
 
         $bankModel->rollBack();
         $this->assertTrue($findBank ? false : true);
     }
}
