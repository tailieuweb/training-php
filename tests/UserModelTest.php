<?php

use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{

    //TEST OF FUNCTION findUserById
    public function testFindUserByIdWithOK()
    {
        $userModel = new UserModel();
        $expected = [
            "id" => 9,
            "name" => "nguyen minh tien",
            "fullname" => "Nguyen minh tien",
            "email" => "nguyenminhtien1808@gmail.com",
            "type" => "admin",
            "password" => "202cb962ac59075b964b07152d234b70",
        ];
        $actual = $userModel->findUserById(9);
        $this->assertEquals($expected, $actual[0]);
    }
    //
    public function testFindUserByIdWithNullId()
    {
        $userModel = new UserModel();
        $expected = false;
        $actual = $userModel->findUserById(null);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindUserByIdWithNoData()
    {
        $userModel = new UserModel();
        $expected = [];
        $actual = $userModel->findUserById(0);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindUserByStringNumberId()
    {
        $userModel = new UserModel();
        $expected = false;
        $actual = $userModel->findUserById("1");
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindUserByStringId()
    {
        $userModel = new UserModel();
        $expected = false;
        $actual = $userModel->findUserById("abcd");
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindUserBySpecialKeyId()
    {
        $userModel = new UserModel();
        $expected = false;
        $actual = $userModel->findUserById("/**//#@^%$");
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindUserByArrayId()
    {
        $userModel = new UserModel();
        $expected = false;
        $actual = $userModel->findUserById([]);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindUserByObjectId()
    {
        $userModel = new UserModel();
        $expected = false;
        $key = new stdClass;
        $actual = $userModel->findUserById($key);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindUserByBooleanId()
    {
        $userModel = new UserModel();
        $expected = false;
        $key = true;
        $actual = $userModel->findUserById($key);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindUserByDoubleId()
    {
        $userModel = new UserModel();
        $expected = false;
        $key = 1.345;
        $actual = $userModel->findUserById($key);
        $this->assertEquals($expected, $actual);
    }
}
