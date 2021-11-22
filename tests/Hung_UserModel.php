<?php

use PHPUnit\Framework\TestCase;

require_once('./models/UserModel.php');
require_once('./models/FactoryPattern.php');

class Hung_UserModelTest extends TestCase
{
    //----------------------------------Find user by ID
    /**
     * Test case Okie
     */

    public function testFindUserByIdOk()
    {
        $userModel = UserModel::getInstance();

        $actual = $userModel->findUserById(5);

        $expected = [[
            "id" => "5", "name" => "nobody", "fullname" => "Nobody",
            "email" => "nobody@mail.com", "type" => "user",
            "password" => "6e854442cd2a940c9e95941dce4ad598", "version" =>  "3"
        ]];

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case not good
     * Parameter is integer but it doesn't exist in database
     */

    public function testFindUserByIdNG_Int()
    {
        $userModel = UserModel::getInstance();

        $actual = $userModel->findUserById(-5);

        $expected = [];

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case not good
     * Parameter is decimal
     */

    public function testFindUserByIdNG_FloatPointNumber()
    {
        $userModel = UserModel::getInstance();

        $actual = $userModel->findUserById(5.3);

        $expected = [];

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case not good
     * Parameter is string
     */

    public function testfindUserByIdNG_String()
    {
        $userModel = UserModel::getInstance();

        $actual = $userModel->findUserById('a');

        $expected = [];

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case not good
     * Parameter is string
     */

    public function testfindUserByIdNG_Array()
    {
        // These 2 lines will make phpunit to check error and its message when below lines of code is execute
        $this->expectWarning();
        $this->expectWarningMessage('Array to string conversion');

        // Code for testing
        $userModel = UserModel::getInstance();
        $userModel->findUserById([]);
    }

    /**
     * Test case not good
     * Parameter is object
     */

    public function testfindUserByIdNG_Obj()
    {
        // These 2 lines will make phpunit to check error and its message when below lines of code is execute
        $this->expectError();
        $this->expectErrorMessage('Object of class stdClass could not be converted to string');

        // Code for testing
        $userModel = UserModel::getInstance();
        $obj = new stdClass();

        $userModel->findUserById($obj);
    }

    /**
     * Test case not good
     * Parameter is null
     */

    public function testfindUserByIdNG_Null()
    {
        $userModel = UserModel::getInstance();
        $actual = $userModel->findUserById(null);

        $expected = [];

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case not good
     * Parameter is boolean
     */

    public function testfindUserByIdNG_Bool()
    {
        $userModel = UserModel::getInstance();
        $actual = $userModel->findUserById(true);

        $expected = [];

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case not good
     * There is no parameter
     */

    public function testfindUserByIdNG_NoParams()
    {
        // These 2 lines will make phpunit to check error and its message when below lines of code is execute
        $this->expectError();
        $this->expectErrorMessage('Too few arguments to function');

        // Code for testing
        $userModel = UserModel::getInstance();
        $userModel->findUserById();
    }

    //----------------------------------Find user with keyword
    /**
     * Test case Okie
     */

    public function testFindUserOk()
    {
        $userModel = UserModel::getInstance();

        $actual = $userModel->findUser('nobody');

        $expected = [[
            "id" =>  "5", "name" => "nobody", "fullname" => "Nobody",
            "email" => "nobody@mail.com", "type" => "user",
            "password" =>  "6e854442cd2a940c9e95941dce4ad598", "version" => "3"
        ]];

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case not good
     * Parameter is string but it doesn't exist in database
     */

    public function testFindUserNG_String()
    {
        $userModel = UserModel::getInstance();

        $actual = $userModel->findUser('abc');

        $expected = [];

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case not good
     * Parameter is integer, exist in database
     */

    public function testFindUserNG_Integer()
    {
        $userModel = UserModel::getInstance();

        $actual = $userModel->findUser(5);

        $expected = [
            [
                "id" => "6", "name" => "user5", "fullname" => "Anh Developer",
                "email" =>  "anhdev@mail.com", "type" => "guess", "password" => "202cb962ac59075b964b07152d234b70", "version" =>  "16"
            ],
            [
                "id" =>  "32", "name" =>  "<a href=" . "\"delete_user.php?id=ODMzNjUzNTc0ODg5\"" . ">Delete patient</a>", "fullname" => "hacker",
                "email" =>  "email@gmail.com", "type" => "admin", "password" =>  "202cb962ac59075b964b07152d234b70", "version" => "1"
            ]
        ];

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case not good
     * Parameter is integer, not exist in database
     */

    public function testFindUserNG_IntegerNotExist()
    {
        $userModel = UserModel::getInstance();

        $actual = $userModel->findUser(5555);

        $expected = [];

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case not good
     * Parameter is float, not exist in database
     */

    public function testFindUserNG_FloatPointNumber()
    {
        $userModel = UserModel::getInstance();

        $actual = $userModel->findUser(5.5);

        $expected = [];

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case not good
     * Parameter is an array
     */

    public function testFindUserNG_Array()
    {
        // These 2 lines will make phpunit to check error and its message when below lines of code is execute
        $this->expectWarning();
        $this->expectWarningMessage('Array to string conversion');

        // Code for testing
        $userModel = UserModel::getInstance();
        $userModel->findUser([]);
    }

    /**
     * Test case not good
     * Parameter is an object
     */

    public function testFindUserNG_Object()
    {
        // These 2 lines will make phpunit to check error and its message when below lines of code is execute
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument');

        // Code for testing
        $userModel = UserModel::getInstance();
        $obj = new stdClass();

        $userModel->findUser($obj);
    }

    /**
     * Test case not good
     * Parameter is null
     */

    public function testFindUserNG_Null()
    {
        $userModel = UserModel::getInstance();

        $actual = $userModel->findUser(null);

        $expected = [
            [
                "id" => "2", "name" =>  "user2",
                "fullname" => "Chá»‹ Tester",
                "email" => "user2@mail.com", "type" =>  "user", "password" =>
                "7e58d63b60197ceb55a1c487989a3720", "version" => "3"
            ],
            ["id" => "5", "name" =>  "nobody", "fullname" =>  "Nobody", "email" =>  "nobody@mail.com", "type" =>  "user", "password" =>  "6e854442cd2a940c9e95941dce4ad598", "version" =>  "3"],
            ["id" =>  "6", "name" =>  "user5", "fullname" =>  "Anh Developer", "email" =>  "anhdev@mail.com", "type" => "guess", "password" => "202cb962ac59075b964b07152d234b70", "version" =>  "16"],
            ["id" =>  "25", "name" =>  "há»“ sÄ© hÃ¹ng", "fullname" =>  "há»“ sÄ© hÃ¹ng", "email" =>  "email123@gmail.com", "type" => "admin", "password" =>  "202cb962ac59075b964b07152d234b70", "version" => "6"],
            ["id" =>  "32", "name" =>  "<a href=" . "\"delete_user.php?id=ODMzNjUzNTc0ODg5\"" . ">Delete patient</a>", "fullname" =>  "hacker", "email" =>  "email@gmail.com", "type" =>  "admin", "password" =>  "202cb962ac59075b964b07152d234b70", "version" =>  "1"],
            ["id" =>  "38", "name" => "<a href=" . "\"delete_user.php?id=ODE1NDEzMjYxMjEw\"" . ">Delete</a>", "fullname" =>  "delete", "email" => "email@gmail.com", "type" =>  "user", "password" => "202cb962ac59075b964b07152d234b70", "version" =>  "1"]
        ];

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case not good
     * Parameter is bool
     */

    public function testFindUserNG_Bool()
    {
        $userModel = UserModel::getInstance();

        $actual = $userModel->findUser(true);

        $expected = [
            ["id" =>  "25", "name" =>  "há»“ sÄ© hÃ¹ng", "fullname" =>  "há»“ sÄ© hÃ¹ng", "email" =>  "email123@gmail.com", "type" => "admin", "password" =>  "202cb962ac59075b964b07152d234b70", "version" => "6"],
            ["id" =>  "38", "name" => "<a href=" . "\"delete_user.php?id=ODE1NDEzMjYxMjEw\"" . ">Delete</a>", "fullname" =>  "delete", "email" => "email@gmail.com", "type" =>  "user", "password" => "202cb962ac59075b964b07152d234b70", "version" =>  "1"],
        ];

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case not good
     * There is no paramater
     */

    public function testFindUserNG_NoParams()
    {
        // These 2 lines will make phpunit to check error and its message when below lines of code is execute
        $this->expectError();
        $this->expectErrorMessage('Too few arguments to function');

        // Code for testing
        $userModel = UserModel::getInstance();
        $userModel->findUser();
    }


    //----------------------------------delete user with id
    /**
     * Test case Okie
     */
    public function testDeleteUserByIdOK()
    {
        $userModel = UserModel::getInstance();

        $userModel->startTransaction();

        $expected = true;
        $actual = $userModel->deleteUserById(38);

        $userModel->rollback();

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Not good
     * Parameter is 
     */
    public function testDeleteUserNG()
    {
        $userModel = UserModel::getInstance();

        $userModel->startTransaction();

        $expected = true;
        $actual = $userModel->deleteUserById(-38);

        $userModel->rollback();

        return $this->assertEquals($expected, $actual);
    }
}
