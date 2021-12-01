<?php

use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    /**
     * Test insertBank Function in BankModel - 'Dattt' do this
     */
    // Test case insert bank good
    public function testInsertBankGood()
    {
        $bankModel = new BankModel();
        $userModel = new UserModel();

        $id = 9999;
        $name = 'Dattt';
        $fullname = "Vo Thanh Dat";
        $type = 'admin';
        $email = 'vothanhdat123123@gmail.com';
        $password = '12345';

        $bankModel->startTransaction();
        $userModel->insertUserWithId($id, $name, $fullname, $email, $type, $password);
        $bankModel->insertBank($id, 12345);
        $actual = $bankModel->getBankByUserId($id);

        $bankModel->rollBack();
        $expected = 12345;
        $this->assertEquals($expected, $actual['cost']);
    }

    // Test case insert bank not good
    public function testInsertBankNg()
    {
        $bankModel = new BankModel();
        $userModel = new UserModel();

        $id = 9999;
        $name = 'Dattt';
        $fullname = "Vo Thanh Dat";
        $type = 'admin';
        $email = 'vothanhdat123123@gmail.com';
        $password = '12345';

        $bankModel->startTransaction();
        $userModel->insertUserWithId($id, $name, $fullname, $email, $type, $password);
        $bankModel->insertBank($id, '12345a');
        $actual = $bankModel->getBankByUserId($id);

        $bankModel->rollBack();
        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case insert bank: User_id is string
    public function testInsertBankUserIdIsString()
    {
        $bankModel = new BankModel();


        $bankModel->startTransaction();

        $actual = $bankModel->insertBank('ancv', 12345);
        $bankModel->rollBack();
        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case insert bank: User_id is object
    public function testInsertBankUserIdIsObject()
    {
        $bankModel = new BankModel();

        $id = [
            "id" => 123
        ];
        $bankModel->startTransaction();

        $actual = $bankModel->insertBank($id, 12345);
        $bankModel->rollBack();
        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case insert bank: User_id is bool
    public function testInsertBankUserIdIsBool()
    {
        $bankModel = new BankModel();

        $id = true;
        $bankModel->startTransaction();

        $actual = $bankModel->insertBank($id, 12345);
        $bankModel->rollBack();
        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case insert bank: User_id is null
    public function testInsertBankUserIdIsNull()
    {
        $bankModel = new BankModel();

        $id = "";
        $bankModel->startTransaction();

        $actual = $bankModel->insertBank($id, 12345);
        $bankModel->rollBack();
        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case insert bank: User_id is special
    public function testInsertBankUserIdIsSpecial()
    {
        $bankModel = new BankModel();

        $id = "!&*@&*^%#";
        $bankModel->startTransaction();

        $actual = $bankModel->insertBank($id, 12345);
        $bankModel->rollBack();
        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case insert bank: cost is string
    public function testInsertBankCostIsString()
    {
        $bankModel = new BankModel();

        $id = 999;
        $bankModel->startTransaction();

        $actual = $bankModel->insertBank($id, "123bvb");
        $bankModel->rollBack();
        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case insert bank: cost is object
    public function testInsertBankCostIsObject()
    {
        $bankModel = new BankModel();

        $id = 999;
        $cost = [
            "cost" => 123,
        ];
        $bankModel->startTransaction();

        $actual = $bankModel->insertBank($id, $cost);
        $bankModel->rollBack();
        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case insert bank: cost is bool
    public function testInsertBankCostIsBool()
    {
        $bankModel = new BankModel();

        $id = 999;
        $cost = true;
        $bankModel->startTransaction();

        $actual = $bankModel->insertBank($id, $cost);
        $bankModel->rollBack();
        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case insert bank: cost is null
    public function testInsertBankCostIsNull()
    {
        $bankModel = new BankModel();

        $id = 999;
        $cost = "";
        $bankModel->startTransaction();

        $actual = $bankModel->insertBank($id, $cost);
        $bankModel->rollBack();
        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case insert bank: cost is special
    public function testInsertBankCostIsSpecial()
    {
        $bankModel = new BankModel();

        $id = 999;
        $cost = "!*&#&^!";
        $bankModel->startTransaction();

        $actual = $bankModel->insertBank($id, $cost);
        $bankModel->rollBack();
        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case insert bank: cost is float
    public function testInsertBankCostIsFloat()
    {
        $bankModel = new BankModel();

        $id = 999;
        $cost = 2123.1234;
        $bankModel->startTransaction();

        $actual = $bankModel->insertBank($id, $cost);
        $bankModel->rollBack();
        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    // Test case insert bank: cost is negative number
    public function testInsertBankCostIsNegativeNumber()
    {
        $bankModel = new BankModel();

        $id = 999;
        $cost = -2123.1234;
        $bankModel->startTransaction();

        $actual = $bankModel->insertBank($id, $cost);
        $bankModel->rollBack();
        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Test DeleteBankById Function in BankModel - 'Danh' do this
     */
    // Test case testDeleteBankById
    public function testDeleteBankByIdOK()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $id = -1;
        $bankModel->insertBank($id, '12345');
        $check = $bankModel->deleteBankByUserId($id);
        $findUser = $bankModel->getBankByUserId($id);
        $bankModel->rollBack();
        if (
            $check == true &&
            ($findUser) == false
        ) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        // $bankModel->deleteBankByUserId($id);
    }
    // Test case testDeleteBankByIdString
    public function testDeleteBankByIdString()
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
    public function testGetBankByUserIdOk()
    {
        $bankModel = new BankModel();
        $userModel = new UserModel();
        $bankModel->startTransaction();
        $userId = -1;
        $userModel->insertUserWithId($userId, 'Danh', 'Nguyen Khac Danh', 'nguyenkhacdanh@gmail.com', 'guest', '12345');
        $bankModel->insertBank($userId, '12345');
        $getBank = $bankModel->getBankByUserId($userId);
        $check = $getBank != false &&
            $getBank['user_id'] == $userId &&
            $getBank['cost'] == '12345';
        $bankModel->rollBack();
        if ($check === true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testGetBankByUserIdUserIdFloat
    public function testGetBankByUserIdUserIdFloat()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $userId = -1.4;
        $getBank = $bankModel->getBankByUserId($userId);
        $check = $getBank == false;
        $bankModel->rollBack();
        if ($check === true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testGetBankByUserIdUserIdSpecial
    public function testGetBankByUserIdUserIdSpecial()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $userId = '#$#@#';
        $getBank = $bankModel->getBankByUserId($userId);
        $check = $getBank == false;
        $bankModel->rollBack();
        if ($check === true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testGetBankByUserIdUserIdString
    public function testGetBankByUserIdUserIdString()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $userId = 'Danh';
        $getBank = $bankModel->getBankByUserId($userId);
        $check = $getBank == false;
        $bankModel->rollBack();
        if ($check === true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testGetBankByUserIdUserIdObject
    public function testGetBankByUserIdUserIdObject()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $userId = new UserRepository;
        $getBank = $bankModel->getBankByUserId($userId);
        $check = $getBank == false;
        $bankModel->rollBack();
        if ($check === true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testGetBankByUserIdUserIdNull
    public function testGetBankByUserIdUserIdNull()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $userId = null;
        $getBank = $bankModel->getBankByUserId($userId);
        $check = $getBank == false;
        $bankModel->rollBack();
        if ($check === true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
}