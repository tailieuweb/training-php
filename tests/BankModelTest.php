<?php

use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    /**
     * Test DeleteBankById Function in BankModel - 'Danh' do this
     */
    // Test case testDeleteBankById
    public function testDeleteBankByIdOK()
    {
        $bankModel = new BankModel();
        $id = -1;
        $bankModel->insertBank($id,'12345');
        $check = $bankModel->deleteBankByUserId($id);
        $findUser = $bankModel->getBankByUserId($id);
        if (
            $check == true &&
            ($findUser) == false
        ) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testDeleteBankByIdNg
    public function testDeleteBankByIdNg()
    {
        $bankModel = new BankModel();
        $id = "a";
        $check = $bankModel->deleteBankByUserId($id);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
     // Test case testDeleteBankNotId
     public function testDeleteBankNotId()
     {
        $bankModel = new BankModel();
        $id = "";
        $check = $bankModel->deleteBankByUserId($id);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
     }
       // Test case testDeleteBankBool
       public function testDeleteBankBool()
       {
        $bankModel = new BankModel();
        $id = true;
        $check = $bankModel->deleteBankByUserId($id);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
       }
        // Test case testDeleteBankObject
        public function testDeleteBankObject()
        {
        $bankModel = new BankModel();
        $id = new UserModel;
        $check = $bankModel->deleteBankByUserId($id);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testDeleteBankExpectedandActual
    public function testDeleteBankExpectedandActual()
    {
        $bankModel = new BankModel();
        $id = -1;
        $expected = $bankModel->deleteBankByUserId($id);
        $actual = true;
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test getBankByUserId Function in BankModel - 'Danh' do this
     */
    // Test case testDeleteBankById
    public function testGetBankByUserIdNg()
    {
        $bankModel = new BankModel();
        $id = -1;
        $bankModel->insertBank($id,'12345');
        $check = $bankModel->getBankByUserId($id);
        if ($check == false) {
        }
    }
}
