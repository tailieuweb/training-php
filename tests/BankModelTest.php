<?php

use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    /**
<<<<<<< HEAD
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
=======
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
>>>>>>> 1-php-202109/2-groups/10-J/master-phpunit
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
<<<<<<< HEAD
        
=======
>>>>>>> 1-php-202109/2-groups/10-J/master-phpunit
    }
}
