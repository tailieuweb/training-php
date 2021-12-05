<?php

use PHPUnit\Framework\TestCase;

class FindUserTwoTable extends TestCase
{
    // Tien lam test function findUserTwoTable
    /**
     * Test case Okie
     */
    public function testFindUserTwoTableOk()
    {
        $userModel = new UserModel();
        $id = 54;
        $expected = 'Thái Ngô';
        $userModel->startTransaction();
        $user = $userModel->findTwoTable($id);
        $actual = $user[0]['name'];
        $userModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Not good
     */
    public function testFindUserTwoTableNg()
    {
        $userModel = new UserModel();
        $id = 100;
        $userModel->startTransaction();
        $user = $userModel->findTwoTable($id);
        $userModel->rollback();
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test case id is double
     */
    public function testFindUserTwoTableIdIsDouble()
    {
        $userModel = new UserModel();
        $id = 10.5;
        $expected = 'Invalid';
        $userModel->startTransaction();
        $actual = $userModel->findTwoTable($id);
        $userModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is negative number
     */
    public function testFindUserTwoTableIdIsNegative()
    {
        $userModel = new UserModel();
        $id = -2;
        $expected = 'Invalid';
        $userModel->startTransaction();
        $actual = $userModel->findTwoTable($id);
        $userModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is string
     */
    public function testFindUserTwoTableIsString()
    {
        $userModel = new UserModel();
        $id = '123';
        $expected = [];
        $userModel->startTransaction();
        $actual = $userModel->findTwoTable($id);
        $userModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is array
     */
    public function testFindUserTwoTableIsArray()
    {
        $userModel = new UserModel();
        $id = [1,2,3];
        $expected = 'Invalid';
        $userModel->startTransaction();
        $actual = $userModel->findTwoTable($id);
        $userModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test keyword rỗng
     */
    public function testFindUserTwoTableIsEmpty()
    {
        $userModel = new UserModel();
        $id = "";
        $expected = 'Invalid';
        $userModel->startTransaction();
        $actual = $userModel->findTwoTable($id);
        $userModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is null
     */
    public function testFindUserTwoTableIsNull()
    {
        $userModel = new UserModel();
        $id = null;
        $expected = 'Invalid';
        $userModel->startTransaction();
        $actual = $userModel->findTwoTable($id);
        $userModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is object
     */
    public function testFindUserTwoTableIsObject()
    {
        $userModel = new UserModel();
        $id = new BankModel();
        $expected = 'Invalid';
        $userModel->startTransaction();
        $actual = $userModel->findTwoTable($id);
        $userModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is bool(true/false)
     */
    public function testFindUserTwoTableIsBool()
    {
        $userModel = new UserModel();
        $id = true;
        $expected = 'Invalid';
        $userModel->startTransaction();
        $actual = $userModel->findTwoTable($id);
        $userModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is special characters(@,#)
     */
    public function testFindUserTwoTableIdIsSpecialCharacter()
    {
        $userModel = new UserModel();
        $id = '@@';
        $expected = 'Invalid';
        $userModel->startTransaction();
        $actual = $userModel->findTwoTable($id);
        $userModel->rollback();
        $this->assertEquals($expected, $actual);
    }
}
