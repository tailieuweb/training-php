<?php
foreach (glob("./tests/resource-test/*.php") as $file) {
    require $file;
}
require_once "./models/FactoryPattern.php";

use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    /*
    File: UserModel.
    Id: 01
    Function: getAll().
    Status: OK
    Author: Phuong Nguyen
    */
    public function testGetAllOk()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $expectedFirst = [
            [
                "id" => "1",
                "name" => "test2first",
                "fullname" => "test2",
                "email" => "test2@gmail.com",
                "type" => "user",
                "password" => "202cb962ac59075b964b07152d234b70"
            ],
        ];

        $expectedLast = [
            [
                "id" => "5",
                "name" => "test2last",
                "fullname" => "test2",
                "email" => "test2@gmail.com",
                "type" => "user",
                "password" => "5f4dcc3b5aa765d61d8327deb882cf99"
            ],
        ];
        $expectedLength = 5;
        $actual = $userModel->read();
        $actualLength = count($actual);

        if ($actualLength === $expectedLength) {
            $v1 = $this->assertEquals(
                $expectedFirst[0],
                $actual[0],
                "Expected and actual not equals"
            );
            $v2 = $this->assertEquals(
                $expectedLast[0],
                $actual[4],
                "Expected and actual not equals"
            );
            $this->assertFalse(($v1 && $v2), "actualfrist is not equals actuallast");
        } else {
            $this->assertTrue(false, "actual length is not correct");
        }
    }


    /*
    File: UserModel.
    Id: 02
    Function: auth(username, password)
    Desc: Test auth ok
    Status: OK
    Author: Phuong Nguyen
    */
    public function testAuthOk()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $username = "test2first";
        $password = "123";

        $expected = [
            "id" => "1",
            "name" => "test2first",
            "fullname" => "test2",
            "email" => "test2@gmail.com",
            "type" => "user",
            "password" => "202cb962ac59075b964b07152d234b70"
        ];

        $actual = $userModel->auth($username, $password);
        $this->assertEquals(
            $expected,
            $actual[0],
            "Expected and actual not equals"
        );
    }

    /*
    File: UserModel.
    Id: 03
    Function: auth(username, password).
    Desc: Test if input is special characters -> unaffected to data of another(bank) model 
    Status: OK
    Author: Phuong Nguyen.
    */
    public function testAuth_SpecialChars_AffectedToAnotherModel()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $bankModel = $factory->make("bank");


        $username = 'test2%";TRUNCATE bank;##';
        $password = '202cb962ac59075b964b07152d234b70';
        $actionAuth = $userModel->auth($username, $password);

        //Array
        $actual = $bankModel->read();
        $this->assertNotEmpty(
            $actual[0],
            "actual is empty"
        );
    }

    /*
    File: UserModel.
    Id: 04
    Function: auth(username, password)
    Desc: Test auth with input(username) is obj
    Status: Fail
    Author: Phuong Nguyen
    */
    public function testAuth_WithUsername_IsObj()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $username = new User("test2", "123");
        $password = "123";

        $actual = $userModel->auth($username, $password);
        $this->assertEmpty($actual, "actual is not empty");
    }

    /*
    File: UserModel.
    Id: 05
    Function: auth(username, password)
    Desc: Test auth with input(password) is obj
    Status: OK
    Author: Phuong Nguyen
    */
    public function testAuth_WithPassword_IsObj()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $password = new User("test2", "123");
        $username = "test2";

        $actual = $userModel->auth($username, $password);
        $this->assertEmpty($actual, "actual is not empty");
    }

    /*
    File: UserModel.
    Id: 06
    Function: auth(username, password)
    Desc: Test auth with input(password) is null
    Status: Ok
    Author: Phuong Nguyen
    */
    public function testAuth_WithPassword_IsNull()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $password = null;
        $username = "test2";

        $actual = $userModel->auth($username, $password);
        $this->assertEmpty($actual, "actual is not empty");
    }

    /*
    File: UserModel.
    Id: 07
    Function: auth(username, password)
    Desc: Test auth with input(username) is null
    Status: Ok
    Author: Phuong Nguyen
    */
    public function testAuth_WithUsername_IsNull()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $password = "password";
        $username = null;

        $actual = $userModel->auth($username, $password);
        $this->assertEmpty($actual, "actual is not empty");
    }

    /*
    File: UserModel.
    Id: 08
    Function: auth(username, password)
    Desc: Test auth with input(username) not exist
    Status: Ok
    Author: Phuong Nguyen
    */
    public function testAuth_WithUsername_NotExist()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $password = "passwordtxt";
        $username = "usernamenotexist";

        $actual = $userModel->auth($username, $password);
        $this->assertEmpty($actual, "actual is not empty");
    }

    /*
    File: UserModel.
    Id: 09
    Function: auth(username, password) 
    Desc: Test auth with correct input(username) exist but input(password) not exist
    Status: Ok
    Author: Phuong Nguyen
    */
    public function testAuth_CorrectUsername_PasswordNotExist()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $password = "passwordnotexist";
        $username = "test2";

        $actual = $userModel->auth($username, $password);
        $this->assertEmpty($actual, "actual is not empty");
    }

    /*
    File: UserModel.
    Id: 10
    Function: auth(username, password) 
    Desc: Test auth with input(username) is array
    Status: Ok
    Author: Phuong Nguyen
    */
    public function testAuth_WithUsername_IsArr()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $password = "password";
        $username = ["username" => "test2"];

        $actual = $userModel->auth($username, $password);
        $this->assertEmpty($actual, "actual is not empty");
    }

    /*
    File: UserModel.
    Id: 10
    Function: auth(username, password) 
    Desc: Test auth with input(password) is array
    Status: Ok
    Author: Phuong Nguyen
    */
    public function testAuth_WithPassword_IsArr()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $password = ["password" => "123"];
        $username = "test2";

        $actual = $userModel->auth($username, $password);
        $this->assertEmpty($actual, "actual is not empty");
    }
}
