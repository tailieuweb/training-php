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
        $id = 66;
        $expected = 'tra dao';
        $user = $userModel->findTwoTable($id);
        $actual = $user[0]['name'];
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Not good
     */
    public function testFindUserTwoTableNg()
    {
        $userModel = new UserModel();
        $id = 100;
        $user = $userModel->findTwoTable($id);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test case id is string
     */
    public function testFindUserTwoTableIsString()
    {
        $userModel = new UserModel();
        $id = '123';
        $expected = 'Invalid';
        $actual = $userModel->findTwoTable($id);
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is array
     */
    public function testFindUserTwoTableIsArray()
    {
        $userModel = new UserModel();
        $id = [];
        $expected = 'Invalid';
        $actual = $userModel->findTwoTable($id);
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
        $actual = $userModel->findTwoTable($id);
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
        $actual = $userModel->findTwoTable($id);
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
        $actual = $userModel->findTwoTable($id);
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is not exist
     */
    public function testFindUserTwoTableIsNotExist()
    {
        $userModel = new UserModel();
        $id = 100;
        $user = $userModel->findTwoTable($id);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test case id is special characters(@,#)
     */
    public function testFindUserTwoTableIdIsSpecialCharacter()
    {
        $userModel = new UserModel();
        $id = '@@';
        $expected = 'Invalid';
        $actual = $userModel->findTwoTable($id);
        $this->assertEquals($expected, $actual);
    }
}
