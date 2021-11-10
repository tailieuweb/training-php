<?php

use phpDocumentor\Reflection\Types\Null_;
use phpDocumentor\Reflection\Types\Void_;
use PHPUnit\Framework\TestCase;


class UserModelTest extends TestCase
{
    public function setUp(): Void
    {
    }
    /**
     * Method: delete
     * case: 
     * + testDeleteByUserId: Ok everything
     * + testDeleteByUserIdDp: don't have pass parameter userId
     * + testDeleteByUserIdDe: userId doesn't exis 
     * 
     */
    // test case delete_user_by_id ok
    public function testDeleteByUserId($id = 2)
    {
        $userModel = new UserModel();
        $actual = $userModel->deleteUserById($id);
        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    // test case delete_user_by_id don't have param
    public function testDeleteByUserIdDp($id = "")
    {
        $userModel = new UserModel();
        $actual = $userModel->deleteUserById($id);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    // test case delete_user_by_id but id doesn't exis 
    public function testDeleteByUserIdDe($id = 22)
    {
        $userModel = new UserModel();
        $actual = $userModel->deleteUserById($id);
        $expected = "User doesn't exis";
        $this->assertEquals($expected, $actual);
    }



    /**
     * method: check user exist 
     * param: $id 
     * test case: 
     * + testCheckUserExistOk: user id exist in databse
     * + testCheckUserExistEmpty: param id is empty, return true is passed.
     * + testCheckUserExistString: param id is string, return false is passed
     * + testCheckUserExistEmptyString: param id is emptyString, return false is passed
     * + testCheckUserExistNull: param id is null, return false is passed
     * + testCheckUserExistNg: user id not exist in database
     */
    public function testCheckUserExistOk($id = 11)
    {
        $userModel = new UserModel();
        $actual = $userModel->checkUserExist($id);
        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    public function testCheckUserExistNg($id = 150)
    {
        $userModel = new UserModel();
        $actual = $userModel->checkUserExist($id);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    public function testCheckUserExistEmpty($id = [])
    {
        $userModel = new UserModel();
        $actual = $userModel->checkUserExist($id);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    public function testCheckUserExistString($id = "1234")
    {
        $userModel = new UserModel();
        $actual = $userModel->checkUserExist($id);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    public function testCheckUserExistEmptyString($id = "")
    {
        $userModel = new UserModel();
        $actual = $userModel->checkUserExist($id);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    public function testCheckUserExistNull($id = null)
    {
        $userModel = new UserModel();
        $actual = $userModel->checkUserExist($id);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }


    /**
     * Method: update user
     * param: $input 
     * test case: 
     * + testUpdateUserOk: update existing user in database
     * + testUpdateUserNotExist: update user don't exist in database
     * + testUpdateUserNull: update user with user id is null
     * + testUpdateUserEmptyString: update user with param is empty string
     * + testUpdateUserObject: update user with param is object built-in php
     * 
     */

    public function testUpdateUserOk()
    {
        $userModel = new UserModel();

        $param = array(
            "id" => 10,
            "name" => "teo10",
            "fullname" => "teo10 update",
            "email" => "teo10@mail.com",
            "type" => "user",
            "password" => "teo10",
            "submit" => "submit"
        );

        $actual = $userModel->updateUser($param);
        $expected = true;

        $this->assertEquals($expected, $actual);
    }

    public function testUpdateUserNotExist(){
        $userModel = new UserModel();

        $param = array(
            "id" => 150,
            "name" => "teo10",
            "fullname" => "teo10 update",
            "email" => "teo10@mail.com",
            "type" => "user",
            "password" => "teo10",
            "submit" => "submit"
        );

        $actual = $userModel->updateUser($param);
        $expected = "User not exist";

        $this->assertEquals($expected, $actual);
    }

    public function testUpdateUserNull()
    {
        $userModel = new UserModel();

        $param = array(
            "id" => null,
            "name" => "teo10",
            "fullname" => "teo10 update",
            "email" => "teo10@mail.com",
            "type" => "user",
            "password" => "teo10",
            "submit" => "submit"
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";

        print_r("\t=> Actual result: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }

    public function testUpdateUserEmptyString()
    {
        $userModel = new UserModel();

        $param = array(
            "id" => 13,
            "name" => "",
            "fullname" => "",
            "email" => "",
            "type" => "",
            "password" => "",
            "submit" => "submit"
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    public function testUpdateUserObject()
    {
        $userModel = new UserModel();

        $obj = new \stdClass;

        $param = array(
            "id" => $obj,
            "name" => $obj,
            "fullname" => $obj,
            "email" => $obj,
            "type" => $obj,
            "password" => $obj,
            "submit" => "submit"
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }
}
