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
        $user = $userModel->getUsers($params);
        $actual = $user[0]['name'];
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Not good
     */
    public function testGetUsersNg()
    {
        $userModel = new UserModel();
        $params['keyword']  = 'minh';
        $user = $userModel->getUsers($params);
        if (empty($user[0])) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    /**
     * Test keyword là số
     */
    // public function testGetUsersByIsNum()
    // {
    //     $userModel = new UserModel();
    //     $params['keyword']  = 22;
    //     $expected = 222;
    //     $user = $userModel->getUsers($params);
    //     $actual = $user[0]['name'];
    //     $this->assertEquals($expected, $actual);
    // }
    /**
     * Test keyword là null
     */
    public function testGetUsersIsNull()
    {
        $userModel = new UserModel();
        $params['keyword']  = null;
        $expected = 'Thái Ngô';
        $user = $userModel->getUsers($params);
        $actual = $user[0]['name'];
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test keyword là boolean(true/false)
     */
    public function testGetUsersIsBoolean()
    {
        $userModel = new UserModel();
        $params['keyword']  = true;
        $expected ='Invalid';
        $actual = $userModel->getUsers($params);
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
        $actual = $userModel->getUsers($params);
        //var_dump($actual).die();
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
        $actual = $userModel->getUsers($params);
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
        $user = $userModel->getUsers($params);
        $actual = $user[0]['name'];
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
        $actual = $userModel->getUsers($params);
        $this->assertEquals($expected, $actual);
    }
}