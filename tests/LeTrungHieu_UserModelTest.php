<?php

use phpDocumentor\Reflection\Types\Null_;
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    /**
     * Test findUserById Hieu-Le
     */
    // Test findUserById ok
    public function testFindUserByIdOk()
    {
        $userModel = new UserModel();
        $userId = -1;

        $userModel->startTransaction();

        $userModel->insertUserWithId($userId, "A", "Nguyen Van A", "nguyenvana@gmail.com", "admin", "123456");
        $findUser = $userModel->findUserById($userId);

        $userModel->rollBack();

        $this->assertTrue($findUser != false &&
            $findUser["id"] == $userId &&
            $findUser["name"] == "A" &&
            $findUser["fullname"] == "Nguyen Van A" &&
            $findUser["email"] == "nguyenvana@gmail.com" &&
            $findUser["type"] == "admin" &&
            $findUser["password"] == md5("123456"));
    }
    // Test findUserById Float
    public function testFindUserByIdFloat()
    {
        $userModel = new UserModel();
        $userId = -1.1;

        $userModel->startTransaction();

        $findUser = $userModel->findUserById($userId);

        $userModel->rollBack();
        $this->assertTrue($findUser ? false : true);
    }
    // Test findUserById String
    public function testFindUserByIdString()
    {
        $userModel = new UserModel();
        $userId = "aa";

        $userModel->startTransaction();

        $findUser = $userModel->findUserById($userId);

        $userModel->rollBack();
        $this->assertTrue($findUser ? false : true);
    }
    // Test findUserById Null
    public function testFindUserByIdNull()
    {
        $userModel = new UserModel();
        $userId = Null;

        $userModel->startTransaction();

        $findUser = $userModel->findUserById($userId);

        $userModel->rollBack();
        $this->assertTrue($findUser ? false : true);
    }
    // Test findUserById Object
    public function testFindUserByIdObject()
    {
        $userModel = new UserModel();
        $userId = new UserModel();

        $userModel->startTransaction();

        $findUser = $userModel->findUserById($userId);

        $userModel->rollBack();
        $this->assertTrue($findUser ? false : true);
    }
    // Test findUserById bool true
    public function testFindUserByIdBoolTrue()
    {
        $userModel = new UserModel();
        $userId = true;

        $userModel->startTransaction();

        $findUser = $userModel->findUserById($userId);

        $userModel->rollBack();
        $this->assertTrue($findUser ? false : true);
    }
    // Test findUserById bool false
    public function testFindUserByIdBoolFalse()
    {
        $userModel = new UserModel();
        $userId = false;

        $userModel->startTransaction();

        $findUser = $userModel->findUserById($userId);

        $userModel->rollBack();
        $this->assertTrue($findUser ? false : true);
    }
    // Test findUserById bool Array
    public function testFindUserByIdArray()
    {
        $userModel = new UserModel();
        $userId = [1,2,3];

        $userModel->startTransaction();

        $findUser = $userModel->findUserById($userId);

        $userModel->rollBack();
        $this->assertTrue($findUser ? false : true);
    }
}