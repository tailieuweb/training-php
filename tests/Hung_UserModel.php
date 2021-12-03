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
            "id" => "5", "name" => "user5", "fullname" =>  "Anh Dev",
            "email" =>  "user5@mail.com", "type" => "admin",
            "password" => "0a791842f52a0acfbb3a783378c066b8",
            "updated_at" => "2021-10-14 01:18:51pm",
            "version" => "18"
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

        $actual = $userModel->findUserById(1.3);

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
     * Parameter is string but its value is integer and exists in database
     */

    public function testfindUserByIdNG_StringValueNumber()
    {
        $userModel = UserModel::getInstance();

        $actual = $userModel->findUserById('2');

        $expected = [
            [
                "id" =>  "2", "name" =>  "user2", "fullname" => "Nobody",
                "email" =>  "user2@mail.com", "type" => "admin", "password" => "d41d8cd98f00b204e9800998ecf8427e",
                "updated_at" =>  "2021-10-16 12:46:24pm", "version" => "7"
            ]
        ];

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case not good
     * Parameter is string but its value is speical character
     */

    public function testfindUserByIdNG_StringSpecialCharacters()
    {
        $userModel = UserModel::getInstance();

        $actual = $userModel->findUserById('/');

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
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument');

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
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument');

        // Code for testing
        $userModel = UserModel::getInstance();

        $userModel->findUserById(new stdClass());
    }

    /**
     * Test case not good
     * Parameter is null
     */

    public function testfindUserByIdNG_Null()
    {
        $this->expectException(ArgumentCountError::class);
        $this->expectExceptionMessage('Too few argument');

        $userModel = UserModel::getInstance();
        $userModel->findUserById(null);
    }

    /**
     * Test case not good
     * Parameter is boolean
     */

    public function testfindUserByIdNG_Bool()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument');

        $userModel = UserModel::getInstance();
        $userModel->findUserById(true);
    }

    /**
     * Test case not good
     * There is no parameter
     */

    public function testfindUserByIdNG_NoParams()
    {
        // These 2 lines will make phpunit to check error and its message when below lines of code is execute
        $this->expectException(ArgumentCountError::class);
        $this->expectExceptionMessage('Too few argument');

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

        $actual = $userModel->findUser('2');

        $expected = [[
            "id" => "2", "name" =>  "user2", "fullname" =>  "Nobody",
            "email" => "user2@mail.com", "type" => "admin", "password" => "d41d8cd98f00b204e9800998ecf8427e",
            "updated_at" => "2021-10-16 12:46:24pm", "version" => "7"
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

        $actual = $userModel->findUser(2);

        $expected = [[
            "id" => "2", "name" =>  "user2", "fullname" =>  "Nobody",
            "email" => "user2@mail.com", "type" => "admin", "password" => "d41d8cd98f00b204e9800998ecf8427e",
            "updated_at" => "2021-10-16 12:46:24pm", "version" => "7"
        ]];

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
        $this->expectException(InvalidArgumentException::class);
        $this->expectWarningMessage('Invalid argument');

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
        $this->expectException(ArgumentCountError::class);
        $this->expectExceptionMessage('Too few argument');

        $userModel = UserModel::getInstance();

        $userModel->findUser(null);
    }

    /**
     * Test case not good
     * Parameter is bool
     */

    public function testFindUserNG_Bool()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument');

        $userModel = UserModel::getInstance();

        $userModel->findUser(true);
    }

    /**
     * Test case not good
     * There is no paramater
     */

    public function testFindUserNG_NoParams()
    {
        // These 2 lines will make phpunit to check error and its message when below lines of code is execute
        $this->expectException(ArgumentCountError::class);
        $this->expectExceptionMessage('Too few arguments');

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
        $actual = $userModel->deleteUserById(2);

        $userModel->rollback();

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Not good
     * Parameter is integer but not exist in database
     */
    public function testDeleteUserByIdNG_Integer()
    {
        $userModel = UserModel::getInstance();

        $userModel->startTransaction();

        $expected = true;
        $actual = $userModel->deleteUserById(-38);

        $userModel->rollback();

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Not good
     * Parameter is float
     */
    public function testDeleteUserByIdNG_FloatPointNumber()
    {
        $userModel = UserModel::getInstance();

        $userModel->startTransaction();

        $expected = true;
        $actual = $userModel->deleteUserById(-3.8);

        $userModel->rollback();

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Not good
     * Parameter is string
     */
    public function testDeleteUserByIdNG_String()
    {
        $userModel = UserModel::getInstance();

        $userModel->startTransaction();

        $expected = true;
        $actual = $userModel->deleteUserById('1');

        $userModel->rollback();

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Not good
     * Parameter is alphabet string
     */
    public function testDeleteUserByIdNG_StringAlphabet()
    {
        $userModel = UserModel::getInstance();

        $userModel->startTransaction();

        $expected = false;
        $actual = $userModel->deleteUserById('u');

        $userModel->rollback();

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Not good
     * Parameter is special string
     */
    public function testDeleteUserByIdNG_StringSpecialCharacters()
    {
        $userModel = UserModel::getInstance();

        $userModel->startTransaction();

        $expected = false;
        $actual = $userModel->deleteUserById('%');

        $userModel->rollback();

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Not good
     * Parameter is object
     */
    public function testDeleteUserByIdNG_Object()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument');

        $userModel = UserModel::getInstance();

        $userModel->startTransaction();
        $userModel->deleteUserById(new stdClass());

        $userModel->rollback();
    }

    /**
     * Test case Not good
     * Parameter is array
     */
    public function testDeleteUserByIdNG_Array()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument');

        $userModel = UserModel::getInstance();

        $userModel->startTransaction();
        $userModel->deleteUserById([]);

        $userModel->rollback();
    }

    /**
     * Test case Not good
     * Parameter is null
     */
    public function testDeleteUserByIdNG_Null()
    {
        $this->expectException(ArgumentCountError::class);
        $this->expectExceptionMessage('Too few argument');

        $userModel = UserModel::getInstance();

        $userModel->startTransaction();
        $userModel->deleteUserById(null);

        $userModel->rollback();
    }

    /**
     * Test case Not good
     * Parameter is boolean
     */
    public function testDeleteUserByIdNG_Bool()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument');

        $userModel = UserModel::getInstance();

        $userModel->startTransaction();
        $userModel->deleteUserById(false);

        $userModel->rollback();
    }

    /**
     * Test case Not good
     * There is no parameter
     */
    public function testDeleteUserByIdNG_NoParams()
    {
        $this->expectException(ArgumentCountError::class);
        $this->expectExceptionMessage('Too few argument');

        $userModel = UserModel::getInstance();

        $userModel->startTransaction();
        $userModel->deleteUserById();

        $userModel->rollback();
    }
}
