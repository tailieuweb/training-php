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
        $userModel->startTransaction();
        $user = $userModel->auth($userName, $password);
        $actual = $user[0]['name'];
        $userModel->rollback();
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
        $userModel->startTransaction();
        $user = $userModel->auth($userName, $password);
        $userModel->rollback();
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
        $userModel->startTransaction();
        $actual = $userModel->auth($userName, $password);
        $userModel->rollback();
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
        $userModel->startTransaction();
        $actual = $userModel->auth($userName, $password);
        $userModel->rollback();
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
        $userModel->startTransaction();
        $actual = $userModel->auth($userName, $password);
        $userModel->rollback();
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
        $userModel->startTransaction();
        $actual = $userModel->auth($userName, $password);
        $userModel->rollback();
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
        $userModel->startTransaction();
        $actual = $userModel->auth($userName, $password);
        $userModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test password là số
     */
    public function testAuthByPasswordIsObject()
    {
        $userModel = new UserModel();
        $userName = 'tien';
        $password = new UserModel();
        $expected = 'Invalid';
        $userModel->startTransaction();
        $actual = $userModel->auth($userName, $password);
        $userModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test password là số
     */
    public function testAuthByUsernameIsNumber()
    {
        $userModel = new UserModel();
        $userName = 123;
        $password = 123;
        $expected = [];
        $userModel->startTransaction();
        $actual = $userModel->auth($userName, $password);
        $userModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test username chứa kí tự đặc biệt
     */
    public function testAuthByUsernameIsSpecialCharacter()
    {
        $userModel = new UserModel();
        $userName = '#@';
        $password = 123;
        $expected = [];
        $userModel->startTransaction();
        $actual = $userModel->auth($userName, $password);
        $userModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test password chứa kí tự đặc biệt
     */
    public function testAuthByPasswordIsSpecialCharacter()
    {
        $userModel = new UserModel();
        $userName = 'tien';
        $password = '%';
        $expected = [];
        $userModel->startTransaction();
        $actual = $userModel->auth($userName, $password);
        $userModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test username có 2 khoảng trống
     */
    public function testAuthByUsernameHasMoreSpace()
    {
        $userModel = new UserModel();
        $userName = 'tien  my';
        $password = 123;
        $expected = [];
        $userModel->startTransaction();
        $actual = $userModel->auth($userName, $password);
        $userModel->rollback();
        $this->assertEquals($expected, $actual);
    }
}
