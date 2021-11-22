<?php

use PHPUnit\Framework\TestCase;

class UserRepositoryTest extends TestCase
{
    /**
     * Test getUsersWithBank function, 'Hiếu Cao' do this 
     * */
    // Test case get all user with bank Ok
    public function testGetAllUserWithBankOk()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUser($input);
        $listUser = $userRepository->getUsersWithBank();
        $checkUserExist = false;
        foreach ($listUser as $user) {
            if (
                $user["name"] == 'testName' &&
                $user["fullname"] == "testFullName" &&
                $user["email"] == "testUserEmail@gmail.com" &&
                $user["type"] == 'testType' &&
                $user["password"] == md5('testPassword') &&
                $user["cost"] == 1000
            ) {
                $checkUserExist = true;
                break;
            }
        }
        // Roll back
        $userModel->rollBack();
        $expected = true;
        $actual = $checkUserExist;
        $this->assertEquals($expected, $actual);
    }
    // Test case get list user by keyword Ok
    public function testGetListUserByKeywordOk()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $keyword = 'test';
        $param = [
            'keyword' => $keyword
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUser($input);
        $listUser = $userRepository->getUsersWithBank($param);
        $check = true;
        foreach ($listUser as $user) {
            if (
                strpos(strtolower($user["name"]), $keyword) === false &&
                strpos(strtolower($user["fullname"]), $keyword) === false &&
                strpos(strtolower($user["email"]), $keyword) === false
            ) {
                $check = false;
                break;
            }
        }
        // Roll back
        $userModel->rollBack();
        $expected = true;
        $actual = $check;
        $this->assertEquals($expected, $actual);
    }
    // Test case get list user by keyword Is Positive Number
    public function testGetListUserByKeywordIsPositiveNumber()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => 'testName1',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $keyword = 1;
        $param = [
            'keyword' => $keyword
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUser($input);
        $listUser = $userRepository->getUsersWithBank($param);
        $check = true;
        foreach ($listUser as $user) {
            if (
                strpos(strtolower($user["name"]), $keyword) === false &&
                strpos(strtolower($user["fullname"]), $keyword) === false &&
                strpos(strtolower($user["email"]), $keyword) === false
            ) {
                $check = false;
                break;
            }
        }
        // Roll back
        $userModel->rollBack();
        $expected = true;
        $actual = $check;
        $this->assertEquals($expected, $actual);
    }
    // Test case get list user by keyword Is Negative Number
    public function testGetListUserByKeywordIsNegativeNumber()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => 'testName-1',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $keyword = -1;
        $param = [
            'keyword' => $keyword
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUser($input);
        $listUser = $userRepository->getUsersWithBank($param);
        $check = true;
        foreach ($listUser as $user) {
            if (
                strpos(strtolower($user["name"]), $keyword) === false &&
                strpos(strtolower($user["fullname"]), $keyword) === false &&
                strpos(strtolower($user["email"]), $keyword) === false
            ) {
                $check = false;
                break;
            }
        }
        // Roll back
        $userModel->rollBack();
        $expected = true;
        $actual = $check;
        $this->assertEquals($expected, $actual);
    }
    // Test case get list user by keyword Null
    public function testGetListUserByKeywordNull()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $keyword = NULL;
        $param = [
            'keyword' => $keyword
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUser($input);
        $listUser = $userRepository->getUsersWithBank($param);
        $checkUserExist = false;
        foreach ($listUser as $user) {
            if (
                $user["name"] == 'testName' &&
                $user["fullname"] == "testFullName" &&
                $user["email"] == "testUserEmail@gmail.com" &&
                $user["type"] == 'testType' &&
                $user["password"] == md5('testPassword') &&
                $user["cost"] == 1000
            ) {
                $checkUserExist = true;
                break;
            }
        }
        // Roll back
        $userModel->rollBack();
        $expected = true;
        $actual = $checkUserExist;
        $this->assertEquals($expected, $actual);
    }
    // Test case get list user by keyword Is Bool type, value is true
    public function testGetListUserByKeywordTrue()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $keyword = true;
        $param = [
            'keyword' => $keyword
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUser($input);
        $listUser = $userRepository->getUsersWithBank($param);
        $checkUserExist = false;
        foreach ($listUser as $user) {
            if (
                $user["name"] == 'testName' &&
                $user["fullname"] == "testFullName" &&
                $user["email"] == "testUserEmail@gmail.com" &&
                $user["type"] == 'testType' &&
                $user["password"] == md5('testPassword') &&
                $user["cost"] == 1000
            ) {
                $checkUserExist = true;
                break;
            }
        }
        // Roll back
        $userModel->rollBack();
        $expected = true;
        $actual = $checkUserExist;
        $this->assertEquals($expected, $actual);
    }
    // Test case get list user by keyword Is Bool type, value is false
    public function testGetListUserByKeywordFalse()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $keyword = false;
        $param = [
            'keyword' => $keyword
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUser($input);
        $listUser = $userRepository->getUsersWithBank($param);
        $checkUserExist = false;
        foreach ($listUser as $user) {
            if (
                $user["name"] == 'testName' &&
                $user["fullname"] == "testFullName" &&
                $user["email"] == "testUserEmail@gmail.com" &&
                $user["type"] == 'testType' &&
                $user["password"] == md5('testPassword') &&
                $user["cost"] == 1000
            ) {
                $checkUserExist = true;
                break;
            }
        }
        // Roll back
        $userModel->rollBack();
        $expected = true;
        $actual = $checkUserExist;
        $this->assertEquals($expected, $actual);
    }
    // Test case get list user by keyword is object type
    public function testGetListUserByKeywordObject()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $keyword = new ResultClass();
        $param = [
            'keyword' => $keyword
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUser($input);
        $listUser = $userRepository->getUsersWithBank($param);
        $checkUserExist = false;
        foreach ($listUser as $user) {
            if (
                $user["name"] == 'testName' &&
                $user["fullname"] == "testFullName" &&
                $user["email"] == "testUserEmail@gmail.com" &&
                $user["type"] == 'testType' &&
                $user["password"] == md5('testPassword') &&
                $user["cost"] == 1000
            ) {
                $checkUserExist = true;
                break;
            }
        }
        // Roll back
        $userModel->rollBack();
        $expected = true;
        $actual = $checkUserExist;
        $this->assertEquals($expected, $actual);
    }
    // Test case get all user with user not have bank
    public function testGetAllUserWithUserNotHaveBank()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $userModel->startTransaction();
        // Delete Bank for user -1
        $bankModel->deleteBankByUserId(-1);
        // Insert New User With Bank
        $userModel->insertUserWithId(
            -1,
            'testName',
            'testFullname',
            'testEmail@gmail.com',
            'testType',
            'testPassword'
        );
        $listUser = $userRepository->getUsersWithBank();
        // Roll back
        $userModel->rollBack();
        $check = false;
        foreach ($listUser as $user) {
            if ($user["id"] == -1 && is_null($user["cost"])) {
                $check = true;
                break;
            }
        }
        if ($check) {
            $this->assertTrue(true);
        } else {
            $this->assertFalse(true);
        }
    }
    // Test case get all user by keyword with user not have bank
    public function testGetAllUserByKeywordWithUserNotHaveBank()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $param = [
            'keyword' => 'test'
        ];
        $userModel->startTransaction();
        // Delete Bank for user -1
        $bankModel->deleteBankByUserId(-1);
        // Insert New User With Bank
        $userModel->insertUserWithId(
            -1,
            'testName',
            'testFullName',
            'testEmail@gmail.com',
            'testType',
            'testPassword'
        );
        $listUser = $userRepository->getUsersWithBank($param);
        // Roll back
        $userModel->rollBack();
        $check = false;
        foreach ($listUser as $user) {
            if (
            $user["id"] == -1 && 
            $user["name"] == 'testName' &&
            $user["fullname"] == "testFullName" &&
            $user["email"] == "testEmail@gmail.com" &&
            $user["type"] == 'testType' &&
            $user["password"] == md5('testPassword') &&
            is_null($user["cost"])) {
                $check = true;
                break;
            }
        }
        if ($check) {
            $this->assertTrue(true);
        } else {
            $this->assertFalse(true);
        }
    }
}
