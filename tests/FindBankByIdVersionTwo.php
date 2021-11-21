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
        $id = 41;
        $expected = 500;
        $bank = $bankModel->findBankByIdVersionTwo($id);
        $actual = $bank[0]['cost'];
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Not good
     */
    public function testFindBankByIdVersionTwoNg()
    {
        $bankModel = new BankModel();
        $id = 100;
        $bank = $bankModel->findBankByIdVersionTwo($id);
        if (empty($bank)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test case id is string
     */
    public function testFindBankByIdVersionTwoIsString()
    {
        $bankModel = new BankModel();
        $id = '123';
        $expected = 'Not invalid';
        $actual = $bankModel->findBankByIdVersionTwo($id);
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
        $actual = $bankModel->findBankByIdVersionTwo($id);
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
        $actual = $bankModel->findBankByIdVersionTwo($id);
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
        $actual = $bankModel->findBankByIdVersionTwo($id);
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
        $actual = $bankModel->findBankByIdVersionTwo($id);
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
        $actual = $bankModel->findBankByIdVersionTwo($id);
        $this->assertEquals($expected, $actual);
    }
}
