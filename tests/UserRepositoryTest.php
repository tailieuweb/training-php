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
                is_null($user["cost"])
            ) {
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

    /**
     * Test insertUser function, 'Hiếu Cao' do this 
     * */
    // Test case insert User Ok
    public function testInsertUserOk()
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
        $insertUser = $userRepository->insertUser($input);
        $listUser = $userRepository->getUsersWithBank();
        // Roll back
        $userModel->rollBack();
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
        $expected = true;
        $actual = $insertUser && $checkUserExist;
        $this->assertEquals($expected, $actual);
    }
    // Test case insert User With name is Positive Number
    public function testInsertUserWithNameIsPositiveNumber()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => 1,
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $insertUser = $userRepository->insertUser($input);
        $listUser = $userRepository->getUsersWithBank();
        // Roll back
        $userModel->rollBack();
        $checkUserExist = false;
        foreach ($listUser as $user) {
            if ($user["name"] == 1) {
                $checkUserExist = true;
                break;
            }
        }
        $expected = true;
        $actual = $insertUser && $checkUserExist;
        $this->assertEquals($expected, $actual);
    }
    // Test case insert User With name is Negative Number
    public function testInsertUserWithNameIsNegativeNumber()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => -1,
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $insertUser = $userRepository->insertUser($input);
        $listUser = $userRepository->getUsersWithBank();
        // Roll back
        $userModel->rollBack();
        $checkUserExist = false;
        foreach ($listUser as $user) {
            if ($user["name"] == -1) {
                $checkUserExist = true;
                break;
            }
        }
        $expected = true;
        $actual = $insertUser && $checkUserExist;
        $this->assertEquals($expected, $actual);
    }
    // Test case insert User With name Null
    public function testInsertUserWithNameIsNull()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => NULL,
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $insertUser = $userRepository->insertUser($input);
        // Roll back
        $userModel->rollBack();
        $expected = false;
        $actual = $insertUser;
        $this->assertEquals($expected, $actual);
    }
    // Test case insert User With name is object
    public function testInsertUserWithNameIsObject()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $result = new ResultClass();
        $input = [
            "name" => $result,
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $insertUser = $userRepository->insertUser($input);
        // Roll back
        $userModel->rollBack();
        $expected = false;
        $actual = $insertUser;
        $this->assertEquals($expected, $actual);
    }
    // Test case insert User With name is bool type, value is true
    public function testInsertUserWithNameTrue()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => true,
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $insertUser = $userRepository->insertUser($input);
        // Roll back
        $userModel->rollBack();
        $expected = false;
        $actual = $insertUser;
        $this->assertEquals($expected, $actual);
    }
    // Test case insert User With name is bool type, value is false
    public function testInsertUserWithNameFalse()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => false,
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $insertUser = $userRepository->insertUser($input);
        // Roll back
        $userModel->rollBack();
        $expected = false;
        $actual = $insertUser;
        $this->assertEquals($expected, $actual);
    }
    // Test case insert User With Fullname is Positive Number
    public function testInsertUserWithFullnameIsPositiveNumber()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => 'testName',
            "fullname" => 1,
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $insertUser = $userRepository->insertUser($input);
        $listUser = $userRepository->getUsersWithBank();
        // Roll back
        $userModel->rollBack();
        $checkUserExist = false;
        foreach ($listUser as $user) {
            if ($user["fullname"] == 1) {
                $checkUserExist = true;
                break;
            }
        }
        $expected = true;
        $actual = $insertUser && $checkUserExist;
        $this->assertEquals($expected, $actual);
    }
    // Test case insert User With fullname is Negative Number
    public function testInsertUserWithFullnameIsNegativeNumber()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => 'testName',
            "fullname" => -1,
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $insertUser = $userRepository->insertUser($input);
        $listUser = $userRepository->getUsersWithBank();
        // Roll back
        $userModel->rollBack();
        $checkUserExist = false;
        foreach ($listUser as $user) {
            if ($user["fullname"] == -1) {
                $checkUserExist = true;
                break;
            }
        }
        $expected = true;
        $actual = $insertUser && $checkUserExist;
        $this->assertEquals($expected, $actual);
    }
    // Test case insert User With fullname Null
    public function testInsertUserWithFullnameIsNull()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => 'testName',
            "fullname" => NULL,
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $insertUser = $userRepository->insertUser($input);
        // Roll back
        $userModel->rollBack();
        $expected = false;
        $actual = $insertUser;
        $this->assertEquals($expected, $actual);
    }
    // Test case insert User With fullname is object
    public function testInsertUserWithFullnameIsObject()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $result = new ResultClass();
        $input = [
            "name" => 'testName',
            "fullname" => $result,
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $insertUser = $userRepository->insertUser($input);
        // Roll back
        $userModel->rollBack();
        $expected = false;
        $actual = $insertUser;
        $this->assertEquals($expected, $actual);
    }
    // Test case insert User With fullname is bool type, value is true
    public function testInsertUserWithFullnameTrue()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => 'testName',
            "fullname" => true,
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $insertUser = $userRepository->insertUser($input);
        // Roll back
        $userModel->rollBack();
        $expected = false;
        $actual = $insertUser;
        $this->assertEquals($expected, $actual);
    }
    // Test case insert User With fullname is bool type, value is false
    public function testInsertUserWithFullnameFalse()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => 'testName',
            "fullname" => false,
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $insertUser = $userRepository->insertUser($input);
        // Roll back
        $userModel->rollBack();
        $expected = false;
        $actual = $insertUser;
        $this->assertEquals($expected, $actual);
    }
    // Test case insert User With Email is not email style
    public function testInsertUserWithEmailIsNotEmailStyle()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => 'testName',
            "fullname" => 'testFullname',
            "email" => 'testUserEmailGmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $insertUser = $userRepository->insertUser($input);
        // Roll back
        $userModel->rollBack();
        $expected = false;
        $actual = $insertUser;
        $this->assertEquals($expected, $actual);
    }
    // Test case insert User With Email is Positive Number
    public function testInsertUserWithEmailIsPositiveNumber()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => 'testName',
            "fullname" => 'testFullname',
            "email" => 1,
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $insertUser = $userRepository->insertUser($input);
        // Roll back
        $userModel->rollBack();
        $expected = false;
        $actual = $insertUser;
        $this->assertEquals($expected, $actual);
    }
    // Test case insert User With email is Negative Number
    public function testInsertUserWithEmailIsNegativeNumber()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => 'testName',
            "fullname" => 'testFullname',
            "email" => -1,
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $insertUser = $userRepository->insertUser($input);
        // Roll back
        $userModel->rollBack();
        $expected = false;
        $actual = $insertUser;
        $this->assertEquals($expected, $actual);
    }
    // Test case insert User With email Null
    public function testInsertUserWithEmailIsNull()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => 'testName',
            "fullname" => 'testFullname',
            "email" => NULL,
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $insertUser = $userRepository->insertUser($input);
        // Roll back
        $userModel->rollBack();
        $expected = false;
        $actual = $insertUser;
        $this->assertEquals($expected, $actual);
    }
    // Test case insert User With Email is object
    public function testInsertUserWithEmailIsObject()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $result = new ResultClass();
        $input = [
            "name" => 'testName',
            "fullname" => 'testFullname',
            "email" => $result,
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $insertUser = $userRepository->insertUser($input);
        // Roll back
        $userModel->rollBack();
        $expected = false;
        $actual = $insertUser;
        $this->assertEquals($expected, $actual);
    }
    // Test case insert User With email is bool type, value is true
    public function testInsertUserWithEmailTrue()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => 'testName',
            "fullname" => 'testFullname',
            "email" => true,
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $insertUser = $userRepository->insertUser($input);
        // Roll back
        $userModel->rollBack();
        $expected = false;
        $actual = $insertUser;
        $this->assertEquals($expected, $actual);
    }
    // Test case insert User With email is bool type, value is false
    public function testInsertUserWithEmailFalse()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => 'testName',
            "fullname" => 'testFullname',
            "email" => false,
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $insertUser = $userRepository->insertUser($input);
        // Roll back
        $userModel->rollBack();
        $expected = false;
        $actual = $insertUser;
        $this->assertEquals($expected, $actual);
    }
    // Test case insert User With type is Positive Number
    public function testInsertUserWithTypeIsPositiveNumber()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => 'testName',
            "fullname" => 'testFullname',
            "email" => 'testUserEmail@gmail.com',
            "type" => 1,
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $insertUser = $userRepository->insertUser($input);
        $listUser = $userRepository->getUsersWithBank();
        // Roll back
        $userModel->rollBack();
        $checkUserExist = false;
        foreach ($listUser as $user) {
            if ($user["type"] == 1) {
                $checkUserExist = true;
                break;
            }
        }
        $expected = true;
        $actual = $insertUser && $checkUserExist;
        $this->assertEquals($expected, $actual);
    }
    // Test case insert User With type is Negative Number
    public function testInsertUserWithTypeIsNegativeNumber()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => 'testName',
            "fullname" => 'testFullname',
            "email" => 'testUserEmail@gmail.com',
            "type" => -1,
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $insertUser = $userRepository->insertUser($input);
        $listUser = $userRepository->getUsersWithBank();
        // Roll back
        $userModel->rollBack();
        $checkUserExist = false;
        foreach ($listUser as $user) {
            if ($user["type"] == -1) {
                $checkUserExist = true;
                break;
            }
        }
        $expected = true;
        $actual = $insertUser && $checkUserExist;
        $this->assertEquals($expected, $actual);
    }
    // Test case insert User With Type Null
    public function testInsertUserWithTypeIsNull()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => 'testName',
            "fullname" => 'testFullname',
            "email" => 'testUserEmail@gmail.com',
            "type" => NULL,
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $insertUser = $userRepository->insertUser($input);
        // Roll back
        $userModel->rollBack();
        $expected = false;
        $actual = $insertUser;
        $this->assertEquals($expected, $actual);
    }
    // Test case insert User With type is object
    public function testInsertUserWithTypeIsObject()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $result = new ResultClass();
        $input = [
            "name" => 'testName',
            "fullname" => 'testFullname',
            "email" => 'testUserEmail@gmail.com',
            "type" => $result,
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $insertUser = $userRepository->insertUser($input);
        // Roll back
        $userModel->rollBack();
        $expected = false;
        $actual = $insertUser;
        $this->assertEquals($expected, $actual);
    }
    // Test case insert User With type is bool type, value is true
    public function testInsertUserWithTypeTrue()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => 'testName',
            "fullname" => 'testFullname',
            "email" => 'testUserEmail@gmail.com',
            "type" => true,
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $insertUser = $userRepository->insertUser($input);
        // Roll back
        $userModel->rollBack();
        $expected = false;
        $actual = $insertUser;
        $this->assertEquals($expected, $actual);
    }
    // Test case insert User With type is bool type, value is false
    public function testInsertUserWithTypeFalse()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => 'testName',
            "fullname" => 'testFullname',
            "email" => 'testUserEmail@gmail.com',
            "type" => false,
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $insertUser = $userRepository->insertUser($input);
        // Roll back
        $userModel->rollBack();
        $expected = false;
        $actual = $insertUser;
        $this->assertEquals($expected, $actual);
    }
    // Test case insert User With password is Positive Number
    public function testInsertUserWithPasswordIsPositiveNumber()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => 'testName',
            "fullname" => 'testFullname',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 1
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $insertUser = $userRepository->insertUser($input);
        $listUser = $userRepository->getUsersWithBank();
        // Roll back
        $userModel->rollBack();
        $checkUserExist = false;
        foreach ($listUser as $user) {
            if ($user["password"] == md5('1')) {
                $checkUserExist = true;
                break;
            }
        }
        $expected = true;
        $actual = $insertUser && $checkUserExist;
        $this->assertEquals($expected, $actual);
    }
    // Test case insert User With password is Negative Number
    public function testInsertUserWithPasswordIsNegativeNumber()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => 'testName',
            "fullname" => 'testFullname',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => -1
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $insertUser = $userRepository->insertUser($input);
        $listUser = $userRepository->getUsersWithBank();
        // Roll back
        $userModel->rollBack();
        $checkUserExist = false;
        foreach ($listUser as $user) {
            if ($user["password"] == md5('-1')) {
                $checkUserExist = true;
                break;
            }
        }
        $expected = true;
        $actual = $insertUser && $checkUserExist;
        $this->assertEquals($expected, $actual);
    }
    // Test case insert User With Password Null
    public function testInsertUserWithPasswordIsNull()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => 'testName',
            "fullname" => 'testFullname',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => NULL
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $insertUser = $userRepository->insertUser($input);
        // Roll back
        $userModel->rollBack();
        $expected = false;
        $actual = $insertUser;
        $this->assertEquals($expected, $actual);
    }
    // Test case insert User With password is object
    public function testInsertUserWithPasswordIsObject()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $result = new ResultClass();
        $input = [
            "name" => 'testName',
            "fullname" => 'testFullname',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => $result
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $insertUser = $userRepository->insertUser($input);
        // Roll back
        $userModel->rollBack();
        $expected = false;
        $actual = $insertUser;
        $this->assertEquals($expected, $actual);
    }
    // Test case insert User With password is bool type, value is true
    public function testInsertUserWithPasswordTrue()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => 'testName',
            "fullname" => 'testFullname',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => true
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $insertUser = $userRepository->insertUser($input);
        // Roll back
        $userModel->rollBack();
        $expected = false;
        $actual = $insertUser;
        $this->assertEquals($expected, $actual);
    }
    // Test case insert User With password is bool type, value is false
    public function testInsertUserWithPasswordFalse()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $input = [
            "name" => 'testName',
            "fullname" => 'testFullname',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => false
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $insertUser = $userRepository->insertUser($input);
        // Roll back
        $userModel->rollBack();
        $expected = false;
        $actual = $insertUser;
        $this->assertEquals($expected, $actual);
    }
}
