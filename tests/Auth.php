<?php

use PHPUnit\Framework\TestCase;

class Auth extends TestCase
{
    // Tien lam test function auth
    /**
     * Test case Okie
     */
    public function testAuthOk()
    {
        $userModel = new UserModel();
        $userName = 'tien';
        $password = 123;
        $expected = 'tien';
        $user = $userModel->auth($userName, $password);
        $actual = $user[0]['name'];
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Not good
     */
    public function testAuthNg()
    {
        $userModel = new UserModel();
        $userName = 'mmmmm';
        $password = 123;
        $user = $userModel->auth($userName, $password);
        if (empty($user[0])) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    /**
     * Test username là null
     */
    public function testAuthByUsernameIsNull()
    {
        $userModel = new UserModel();
        $userName = null;
        $password = 123;
        $expected = [];
        $actual = $userModel->auth($userName, $password);
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test password là null
     */
    public function testAuthByPasswordIsNull()
    {
        $userModel = new UserModel();
        $userName = 'tien';
        $password = null;
        $expected = [];
        $actual = $userModel->auth($userName, $password);
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test username là boolean(true/false)
     */
    public function testAuthByUsernameIsBoolean()
    {
        $userModel = new UserModel();
        $userName = true;
        $password = 123;
        $expected = [];
        $actual = $userModel->auth($userName, $password);
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test password là boolean(true/false)
     */
    public function testAuthByPasswordIsBoolean()
    {
        $userModel = new UserModel();
        $userName = 'tien';
        $password = true;
        $expected = [];
        $actual = $userModel->auth($userName, $password);
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test username là object
     */
    public function testAuthByUsernameIsObject()
    {
        $userModel = new UserModel();
        $userName = new BankModel();
        $password = 123;
        $expected = 'Invalid';
        $actual = $userModel->auth($userName, $password);
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test password là object
     */
    public function testAuthByPasswordIsObject()
    {
        $userModel = new UserModel();
        $userName = 'tien';
        $password = new UserModel();
        $expected = 'Invalid';
        $actual = $userModel->auth($userName, $password);
        $this->assertEquals($expected, $actual);
    }
}
