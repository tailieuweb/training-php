<?php
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    //TEST OF FUNCTION findUserById
    public function testFindUserByIdWithOK()
    {
       $userModel = new UserModel();
       $expected = [
           "id" => 3,
           "name" => "pp6",
           "fullname" => "Paul Pogba",
           "email" => "aaa@gmail.com",
           "type" => "admin",
           "password" => "827ccb0eea8a706c4c34a16891f84e7b",
       ];
       $actual = $userModel->findUserById(3);
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

    //TEST OF FUNCTION findUser
    public function testFindUserByNameWithOK()
    {
       $userModel = new UserModel();
       $expected = [
           "id" => 6,
           "name" => "mp7",
           "fullname" => "Kylian Mbappe",
           "email" => "ccc@gmail.com",
           "type" => "admin",
           "password" => "827ccb0eea8a706c4c34a16891f84e7b",
       ];
       $keyword = "mp7";
       $actual = $userModel->findUser($keyword);
       $this->assertEquals($expected, $actual[0]);
    }
    //
    public function testFindUserByEmailWithOK()
    {
       $userModel = new UserModel();
       $expected = [
           "id" => 5,
           "name" => "hacker",
           "fullname" => "Hack Nasa By HTML",
           "email" => "hackworld@gmail.com",
           "type" => "admin",
           "password" => "827ccb0eea8a706c4c34a16891f84e7b",
       ];
       $keyword = "hackworld@gmail.com";
       $actual = $userModel->findUser($keyword);
       $this->assertEquals($expected, $actual[0]);
    }
    //
    public function testFindUserWithNullKey()
    {
       $userModel = new UserModel();
       $expected = false;
       $keyword = null;
       $actual = $userModel->findUser($keyword);
       $this->assertEquals($expected, $actual);
    }
    //
    public function testFindUserBySpecialKey()
    {
        $userModel = new UserModel();
        $expected = [];
        $actual = $userModel->findUser("/**//#@^%$");
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindUserWithNoData()
    {
       $userModel = new UserModel();
       $expected = [];
       $keyword = "áldasldsadj";
       $actual = $userModel->findUser($keyword);
       $this->assertEquals($expected, $actual);
    }
    //
    public function testFindUserNumberKey()
    {
        $userModel = new UserModel();
        $expected = false;
        $keyword = 1123;
        $actual = $userModel->findUser($keyword);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindUserByArrayKey()
    {
        $userModel = new UserModel();
        $expected = false;
        $keyword = [];
        $actual = $userModel->findUserById($keyword);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindUserByObjectKey()
    {
        $userModel = new UserModel();
        $expected = false;
        $key = new stdClass;
        $actual = $userModel->findUser($key);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindUserByBooleanKey()
    {
        $userModel = new UserModel();
        $expected = false;
        $key = true;
        $actual = $userModel->findUser($key);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindUserByDoubleKey()
    {
        $userModel = new UserModel();
        $expected = false;
        $key = 1.1221;
        $actual = $userModel->findUser($key);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindUserWithEmptyKey()
    {
        $userModel = new UserModel();
        $expected = [
            "id" => 3,
            "name" => "pp6",
            "fullname" => "Paul Pogba",
            "email" => "aaa@gmail.com",
            "type" => "admin",
            "password" => "827ccb0eea8a706c4c34a16891f84e7b",
        ];
        $key = "";
        $actual = $userModel->findUser($key);
        $this->assertEquals($expected, $actual[0]);
    }
    //TEST OF FUNCTION auth
    public function testAuthWithOK()
    {
       $userModel = new UserModel();
       $expected = [
           "id" => 3,
           "name" => "pp6",
           "fullname" => "Paul Pogba",
           "email" => "aaa@gmail.com",
           "type" => "admin",
           "password" => "827ccb0eea8a706c4c34a16891f84e7b",
       ];
       $name = "pp6";
       $password = "12345";
       $actual = $userModel->auth($name,$password);
       $this->assertEquals($expected, $actual[0]);
    }
    //
    public function testAuthWithFailed()
    {
       $userModel = new UserModel();
       $expected = [];
       $name = "pp6123";
       $password = "123451232";
       $actual = $userModel->auth($name,$password);
       $this->assertEquals($expected, $actual);
    }
    //
    public function testAuthWithNameIsNumber()
    {
       $userModel = new UserModel();
       $expected = false;
       $name = 1;
       $password = "123451232";
       $actual = $userModel->auth($name,$password);
       $this->assertEquals($expected, $actual);
    }
    //
    public function testAuthWithPasswordIsNumber()
    {
       $userModel = new UserModel();
       $expected = false;
       $name = "pp6";
       $password = 11123;
       $actual = $userModel->auth($name,$password);
       $this->assertEquals($expected, $actual);
    }
    //
    public function testAuthWithBothIsNumber()
    {
       $userModel = new UserModel();
       $expected = false;
       $name = 3004;
       $password = 1975;
       $actual = $userModel->auth($name,$password);
       $this->assertEquals($expected, $actual);
    }
    //
    public function testAuthWithNameIsArray()
    {
       $userModel = new UserModel();
       $expected = false;
       $name = [];
       $password = "12345";
       $actual = $userModel->auth($name,$password);
       $this->assertEquals($expected, $actual);
    }
    //
    public function testAuthWithPasswordIsArray()
    {
       $userModel = new UserModel();
       $expected = false;
       $name = "pp6";
       $password = [];
       $actual = $userModel->auth($name,$password);
       $this->assertEquals($expected, $actual);
    }
    //
    public function testAuthWithBothIsArray()
    {
       $userModel = new UserModel();
       $expected = false;
       $name = [];
       $password = [];
       $actual = $userModel->auth($name,$password);
       $this->assertEquals($expected, $actual);
    }
    //
    public function testAuthWithNameIsObject()
    {
       $userModel = new UserModel();
       $expected = false;
       $name = new stdClass;
       $password = "12345";
       $actual = $userModel->auth($name,$password);
       $this->assertEquals($expected, $actual);
    }
    //
    public function testAuthWithPasswordIsObject()
    {
       $userModel = new UserModel();
       $expected = false;
       $name = "pp6";
       $password = new stdClass;
       $actual = $userModel->auth($name,$password);
       $this->assertEquals($expected, $actual);
    }
    //
    public function testAuthWithBothIsObject()
    {
       $userModel = new UserModel();
       $expected = false;
       $name = new stdClass;
       $password = new stdClass;
       $actual = $userModel->auth($name,$password);
       $this->assertEquals($expected, $actual);
    }
    //
    public function testAuthWithNameIsNull()
    {
       $userModel = new UserModel();
       $expected = false;
       $name = null;
       $password = "12345";
       $actual = $userModel->auth($name,$password);
       $this->assertEquals($expected, $actual);
    }
    //
    public function testAuthWithPasswordIsNull()
    {
       $userModel = new UserModel();
       $expected = false;
       $name = "pp6";
       $password = null;
       $actual = $userModel->auth($name,$password);
       $this->assertEquals($expected, $actual);
    }
    //
    public function testAuthWithBothIsNull()
    {
       $userModel = new UserModel();
       $expected = false;
       $name = null;
       $password = null;
       $actual = $userModel->auth($name,$password);
       $this->assertEquals($expected, $actual);
    }
}