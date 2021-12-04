<?php

use PHPUnit\Framework\TestCase;

class VoThanhDat_BankModelTest extends TestCase
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

    // Test case insert bank: User_id is Array
    public function testInsertBankUserIdIsArray()
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

    // Test case insert bank: User_id is Object
    public function testInsertBankUserIdIsObject()
    {
        $bankModel = new BankModel();

        $id = new BankModel();
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

    // Test case insert bank: cost is Array
    public function testInsertBankCostIsArray()
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

    // Test case insert bank: cost is object
    public function testInsertBankCostIsObject()
    {
        $bankModel = new BankModel();

        $id = 999;
        $cost = new BankModel();
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
}