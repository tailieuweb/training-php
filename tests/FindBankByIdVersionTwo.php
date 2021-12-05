<?php

use PHPUnit\Framework\TestCase;

class FindBankByIdVersionTwo extends TestCase
{
    // Tien lam test function FindBankByIdVersionTwo
    /**
     * Test case Okie
     */
    public function testFindBankByIdVersionTwoOk()
    {
        $bankModel = new BankModel();
        $id = 53;
        $expected = "30000";
        $bankModel->startTransaction();
        $bank = $bankModel->findBankByIdVersionTwo($id);
        $actual = $bank[0]['cost'];
        $bankModel->rollback();
        // var_dump($actual);
        // die();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Not good
     */
    public function testFindBankByIdVersionTwoNg()
    {
        $bankModel = new BankModel();
        $id = 100;
        $bankModel->startTransaction();
        $bank = $bankModel->findBankByIdVersionTwo($id);
        $bankModel->rollback();
        if (empty($bank)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test case id is double
     */
    public function testFindBankByIdVersionTwoIdIsEmpty()
    {
        $bankModel = new BankModel();
        $id = "";
        $bankModel->startTransaction();
        $expected = 'Not invalid';
        $bankModel->startTransaction();
        $actual = $bankModel->findBankByIdVersionTwo($id);
        $bankModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is double
     */
    public function testFindBankByIdVersionTwoIdIsDouble()
    {
        $bankModel = new BankModel();
        $id = 10.5;
        $bankModel->startTransaction();
        $expected = 'Not invalid';
        $bankModel->startTransaction();
        $actual = $bankModel->findBankByIdVersionTwo($id);
        $bankModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is negative number
     */
    public function testFindBankByIdVersionTwoIdIsNegative()
    {
        $bankModel = new BankModel();
        $id = -2;
        $bankModel->startTransaction();
        $expected = 'Not invalid';
        $bankModel->startTransaction();
        $actual = $bankModel->findBankByIdVersionTwo($id);
        $bankModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is string
     */
    public function testFindBankByIdVersionTwoIsString()
    {
        $bankModel = new BankModel();
        $id = '123';
        $expected = [];
        $bankModel->startTransaction();
        $actual = $bankModel->findBankByIdVersionTwo($id);
        $bankModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is array
     */
    public function testFindBankByIdVersionTwoIsArray()
    {
        $bankModel = new BankModel();
        $id = [];
        $expected = 'Not invalid';
        $bankModel->startTransaction();
        $actual = $bankModel->findBankByIdVersionTwo($id);
        $bankModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is null
     */
    public function testFindBankByIdVersionTwoIsNull()
    {
        $bankModel = new BankModel();
        $id = null;
        $expected = 'Not invalid';
        $bankModel->startTransaction();
        $actual = $bankModel->findBankByIdVersionTwo($id);
        $bankModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is object
     */
    public function testFindBankByIdVersionTwoIsObject()
    {
        $bankModel = new BankModel();
        $id = new UserModel();
        $expected = 'Not invalid';
        $bankModel->startTransaction();
        $actual = $bankModel->findBankByIdVersionTwo($id);
        $bankModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is bool(true/false)
     */
    public function testFindBankByIdVersionTwoIsBool()
    {
        $bankModel = new BankModel();
        $id = true;
        $expected = 'Not invalid';
        $bankModel->startTransaction();
        $actual = $bankModel->findBankByIdVersionTwo($id);
        $bankModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is special characters(@,#)
     */
    public function testFindBankByIdVersionTwoIdIsSpecialCharacter()
    {
        $bankModel = new BankModel();
        $id = '@@';
        $expected = 'Not invalid';
        $bankModel->startTransaction();
        $actual = $bankModel->findBankByIdVersionTwo($id);
        $bankModel->rollback();
        $this->assertEquals($expected, $actual);
    }
}
