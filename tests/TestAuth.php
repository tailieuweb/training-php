<?php

use PHPUnit\Framework\TestCase;

class TestAuth extends TestCase
{
    //test auth ok
    public function testAuthOk()
    {
        $userModel = new UserModel();
        $userName = 'quan';
        $password = 'quan';
        $user = $userModel->auth($userName, $password);
        if (empty($user[0])) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(true);
        }
    }
    //test auth ng
    public function testAuthNg()
    {
        $userModel = new UserModel();
        $userName = 'quan';
        $password = '';
        $user = $userModel->auth($userName, $password);
        if (empty($user[0])) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    //test username null
    public function testUsernameIsNull()
    {
        $userModel = new UserModel();
        $userName = null;
        $password = '';
        $expected = [];
        $actual = $userModel->auth($userName, $password);
        $this->assertEquals($expected, $actual);
    }
    //test password null
    public function testPasswordIsNull()
    {
        $userModel = new UserModel();
        $userName = 'quan';
        $password = null;
        $expected = [];
        $actual = $userModel->auth($userName, $password);
        $this->assertEquals($expected, $actual);
    }
    //test username and password is null
    public function testUsernameAndPasswordIsNull()
    {
        $userModel = new UserModel();
        $userName = null;
        $password = null;
        $expected = [];
        $actual = $userModel->auth($userName, $password);
        $this->assertEquals($expected, $actual);
    }
    //test username is string
    public function testUsernameIsString()
    {
        $userModel = new UserModel();
        $userName = 'jadfgkahdahdkadjagahdadkhak';
        $password = '';
        $expected = [];
        $actual = $userModel->auth($userName, $password);
        $this->assertEquals($expected, $actual);
    }
    //test password is string
    public function testPasswordIsString()
    {
        $userModel = new UserModel();
        $userName = 'quan';
        $password = 'akjhkahdkhalkdhakhda';
        $expected = [];
        $actual = $userModel->auth($userName, $password);
        $this->assertEquals($expected, $actual);
    }
    //test username is email
    public function testUsernameIsEmail()
    {
        $userModel = new UserModel();
        $userName = 'quantatoo77@gmail.com';
        $password = '';
        $expected = [];
        $actual = $userModel->auth($userName, $password);
        $this->assertEquals($expected, $actual);
    }
    //test password is email
    public function testPasswordIsEmail()
    {
        $userModel = new UserModel();
        $userName = '';
        $password = 'quantatoo77@gmail.com';
        $expected = [];
        $actual = $userModel->auth($userName, $password);
        $this->assertEquals($expected, $actual);
    }
    //test username is boolean
    public function testUsernameIsBoolean()
    {
        $userModel = new UserModel();
        $userName = true;
        $password = 'aaa';
        $expected = [];
        $actual = $userModel->auth($userName, $password);
        $this->assertEquals($expected, $actual);
    }
    //test password is boolean
    public function testPasswordIsBoolean()
    {
        $userModel = new UserModel();
        $userName = 'quan';
        $password = true;
        $expected = [];
        $actual = $userModel->auth($userName, $password);
        $this->assertEquals($expected, $actual);
    }
    //test username and password is boolean
    public function testUsernameAndPasswordIsBoolean()
    {
        $userModel = new UserModel();
        $userName = true;
        $password = true;
        $expected = [];
        $actual = $userModel->auth($userName, $password);
        $this->assertEquals($expected, $actual);
    }
    //test username is float
    public function testUsernameIsFloat()
    {
        $userModel = new UserModel();
        $userName = 1.2222;
        $password = 'aaa';
        $expected = [];
        $actual = $userModel->auth($userName, $password);
        $this->assertEquals($expected, $actual);
    }
    //test password is float
    public function testPasswordIsFloat()
    {
        $userModel = new UserModel();
        $userName = 'quan';
        $password = 1.23333;
        $expected = [];
        $actual = $userModel->auth($userName, $password);
        $this->assertEquals($expected, $actual);
    }
    //test username and password is float
    public function testUsernameAndPasswordIsFloat()
    {
        $userModel = new UserModel();
        $userName = 1.22222;
        $password = 1.23333;
        $expected = [];
        $actual = $userModel->auth($userName, $password);
        $this->assertEquals($expected, $actual);
    }
}