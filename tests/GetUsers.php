<?php

use PHPUnit\Framework\TestCase;

class GetUsers extends TestCase{
    /**
     * Test case Okie
     */
    public function testGetUsersGood()
    {
        $userModel = new UserModel();
        $params['keyword']  = 'Thái Ngô';
        $expected = 'Thái Ngô';
        $userModel->startTransaction();
        $user = $userModel->getUsers($params);
        $actual = $user[0]['name'];
        $userModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Not good
     */
    public function testGetUsersNg()
    {
        $userModel = new UserModel();
        $params['keyword']  = 'minh';
        $userModel->startTransaction();
        $user = $userModel->getUsers($params);
        $userModel->rollback();
        if (empty($user[0])) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    /**
     * Test keyword rỗng
     */
    public function testGetUsersByIsEmpty()
    {
        $userModel = new UserModel();
        $params['keyword']  = "";
        $expected = "Thái Ngô";
        $userModel->startTransaction();
        $user = $userModel->getUsers($params);
        $actual = $user[0]['name'];
        $userModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test keyword rỗng
     */
    public function testGetUsersByIsNull()
    {
        $userModel = new UserModel();
        $params['keyword']  = null;
        $expected = "Thái Ngô";
        $userModel->startTransaction();
        $user = $userModel->getUsers($params);
        $actual = $user[0]['name'];
        $userModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test keyword là số
     */
    public function testGetUsersByIsNum()
    {
        $userModel = new UserModel();
        $params['keyword']  = 22;
        $expected = [];
        $userModel->startTransaction();
        $actual = $userModel->getUsers($params);
        $userModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test keyword là boolean(true/false)
     */
    public function testGetUsersIsBoolean()
    {
        $userModel = new UserModel();
        $params['keyword']  = true;
        $expected = [];
        $userModel->startTransaction();
        $actual = $userModel->getUsers($params);
        $userModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test keyword là boolean(true/false)
     */
    public function testGetUsersIsArray()
    {
        $userModel = new UserModel();
        
        $params['keyword']  = ['1','2','3'];
        $expected = 'Invalid';
        $userModel->startTransaction();
        $actual = $userModel->getUsers($params);
        $userModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test keyword là object
     */
    public function testGetUsersIsObject()
    {
        $userModel = new UserModel();
        $params['keyword']  = new BankModel();
        $expected ='Invalid';
        $userModel->startTransaction();
        $actual = $userModel->getUsers($params);
        $userModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test keyword có 1 khoảng trắng
     */
    public function testGetUsersIsOneSpace()
    {
        $userModel = new UserModel();
        $params['keyword']  = 'Thái Ngô';
        $expected = 'Thái Ngô';
        $userModel->startTransaction();
        $user = $userModel->getUsers($params);
        $actual = $user[0]['name'];
        $userModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test keyword có từ 2 khoảng trắng
     */
    public function testGetUsersIsMoreSpace()
    {
        $userModel = new UserModel();
        $params['keyword']  = 'tra  dao';
        $expected = [];
        $userModel->startTransaction();
        $actual = $userModel->getUsers($params);
        $userModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testGetUsersIsSpecialCharacter()
    {
        $userModel = new UserModel();
        $params['keyword']  = '@#';
        $expected = [];
        $userModel->startTransaction();
        $actual = $userModel->getUsers($params);
        $userModel->rollback();
        $this->assertEquals($expected, $actual);
    }
}