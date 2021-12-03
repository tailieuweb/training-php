<?php
use PHPUnit\Framework\TestCase;

class CaoTrungHieu_UserRepositoryTest extends TestCase
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

    /**
     * Test updateUserWithBank function, 'Hiếu Cao' do this 
     * */
    // Test case update User With Bank Ok
    public function testUpdateUserWithBankOk()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'testNewType',
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => $userVersion
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        $userAfterUpdate = $userRepository->findById($userId);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == true &&
                $userUpdate->data == "Update Bank and User Success" &&
                $userUpdate->error == NULL &&
                $userAfterUpdate['name'] == 'testNewName' &&
                $userAfterUpdate['fullname'] == 'testNewFullName' &&
                $userAfterUpdate['email'] == 'testNewUserEmail@gmail.com' &&
                $userAfterUpdate['type'] == 'testNewType' &&
                $userAfterUpdate['password'] == md5('testNewPassword') &&
                $userAfterUpdate['cost'] == 123 &&
                $userAfterUpdate['version'] == $userVersion + 1

        );
    }
    // Test case update User With Bank With Id Float
    public function testUpdateUserWithBankWithIdFloat()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = 1.23;
        $userModel->startTransaction();
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'testNewType',
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => 1
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == "Không tìm thấy id của user"
        );
    }
    // Test case update User With Bank With Id String
    public function testUpdateUserWithBankWithIdString()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = 'abc';
        $userModel->startTransaction();
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'testNewType',
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => 1
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == "Không tìm thấy id của user"
        );
    }
    // Test case update User With Bank With Id Null
    public function testUpdateUserWithBankWithIdNull()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = NULL;
        $userModel->startTransaction();
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'testNewType',
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => 1
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == "Thông tin nhập vào không đúng !!"
        );
    }
    // Test case update User With Bank With Id Object
    public function testUpdateUserWithBankWithIdObject()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = new ResultClass();
        $userModel->startTransaction();
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'testNewType',
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => 1
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == "Thông tin nhập vào không đúng !!"
        );
    }
    // Test case update User With Bank With Id is bool type, value is true
    public function testUpdateUserWithBankWithIdTrue()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = true;
        $userModel->startTransaction();
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'testNewType',
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => 1
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == "Thông tin nhập vào không đúng !!"
        );
    }
    // Test case update User With Bank With Id is bool type, value is false
    public function testUpdateUserWithBankWithIdFalse()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = false;
        $userModel->startTransaction();
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'testNewType',
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => 1
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == "Thông tin nhập vào không đúng !!"
        );
    }
    // Test case update User With Bank With Name is Integer Number
    public function testUpdateUserWithNameIntegerNumber()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userNameUpdate = 123;
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => $userNameUpdate,
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'testNewType',
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => $userVersion
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        $userAfterUpdate = $userRepository->findById($userId);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == true &&
                $userUpdate->data == "Update Bank and User Success" &&
                $userUpdate->error == NULL &&
                $userAfterUpdate['name'] == $userNameUpdate &&
                $userAfterUpdate['version'] == $userVersion + 1

        );
    }
    // Test case update User With Bank With Name is Float Number
    public function testUpdateUserWithNameFloatNumber()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userNameUpdate = 1.23;
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => $userNameUpdate,
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'testNewType',
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => $userVersion
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        $userAfterUpdate = $userRepository->findById($userId);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == true &&
                $userUpdate->data == "Update Bank and User Success" &&
                $userUpdate->error == NULL &&
                $userAfterUpdate['name'] == $userNameUpdate &&
                $userAfterUpdate['version'] == $userVersion + 1

        );
    }
    // Test case update User With Bank With Name Null
    public function testUpdateUserWithNameNull()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userNameUpdate = NULL;
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => $userNameUpdate,
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'testNewType',
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => $userVersion
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == "Thông tin nhập vào không đúng !!"

        );
    }
    // Test case update User With Bank With Name Object
    public function testUpdateUserWithNameObject()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userNameUpdate = new ResultClass();
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => $userNameUpdate,
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'testNewType',
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => $userVersion
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == "Thông tin nhập vào không đúng !!"

        );
    }
    // Test case update User With Bank With Name is bool type, value is true
    public function testUpdateUserWithNameTrue()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userNameUpdate = true;
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => $userNameUpdate,
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'testNewType',
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => $userVersion
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == "Thông tin nhập vào không đúng !!"

        );
    }
    // Test case update User With Bank With Name is bool type, value is false
    public function testUpdateUserWithNameFalse()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userNameUpdate = false;
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => $userNameUpdate,
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'testNewType',
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => $userVersion
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == "Thông tin nhập vào không đúng !!"

        );
    }
    // Test case update User With Bank With FullName is Integer Number
    public function testUpdateUserWithFullNameIntegerNumber()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userFullNameUpdate = 123;
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => 'newName',
            "fullname" => $userFullNameUpdate,
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'testNewType',
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => $userVersion
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        $userAfterUpdate = $userRepository->findById($userId);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == true &&
                $userUpdate->data == "Update Bank and User Success" &&
                $userUpdate->error == NULL &&
                $userAfterUpdate['fullname'] == $userFullNameUpdate &&
                $userAfterUpdate['version'] == $userVersion + 1

        );
    }
    // Test case update User With Bank With FullName is Float Number
    public function testUpdateUserWithFullNameFloatNumber()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userFullNameUpdate = 1.23;
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => 'newName',
            "fullname" => $userFullNameUpdate,
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'testNewType',
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => $userVersion
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        $userAfterUpdate = $userRepository->findById($userId);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == true &&
                $userUpdate->data == "Update Bank and User Success" &&
                $userUpdate->error == NULL &&
                $userAfterUpdate['fullname'] == $userFullNameUpdate &&
                $userAfterUpdate['version'] == $userVersion + 1

        );
    }
    // Test case update User With Bank With FullName Null
    public function testUpdateUserWithFullNameNull()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userFullNameUpdate = NULL;
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => 'userName',
            "fullname" => $userFullNameUpdate,
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'testNewType',
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => $userVersion
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == "Thông tin nhập vào không đúng !!"

        );
    }
    // Test case update User With Bank With FullName Object
    public function testUpdateUserWithFullNameObject()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userFullNameUpdate = new ResultClass();
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => 'userName',
            "fullname" => $userFullNameUpdate,
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'testNewType',
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => $userVersion
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == "Thông tin nhập vào không đúng !!"

        );
    }
    // Test case update User With Bank With FullName is bool type, value is true
    public function testUpdateUserWithFullNameTrue()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userFullNameUpdate = true;
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => 'userName',
            "fullname" => $userFullNameUpdate,
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'testNewType',
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => $userVersion
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == "Thông tin nhập vào không đúng !!"

        );
    }
    // Test case update User With Bank With FullName is bool type, value is true
    public function testUpdateUserWithFullNameFalse()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userFullNameUpdate = false;
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => 'userName',
            "fullname" => $userFullNameUpdate,
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'testNewType',
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => $userVersion
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == "Thông tin nhập vào không đúng !!"

        );
    }
    // Test case update User With Bank With Email Wrong at email type
    public function testUpdateUserWithEmailWrongAtEmailType()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userEmail = 'This is not Email Type';

        $userModel->startTransaction();
        // Insert New User With Bank
        $inputUpdate = [
            "id" => $userId,
            "name" => 'userName',
            "fullname" => 'fullname',
            "email" => $userEmail,
            "type" => 'testNewType',
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => 1
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == "Thông tin nhập vào không đúng !!"

        );
    }
    // Test case update User With Bank With Email is Integer
    public function testUpdateUserWithEmailInteger()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userEmail = 1;

        $userModel->startTransaction();
        // Insert New User With Bank
        $inputUpdate = [
            "id" => $userId,
            "name" => 'userName',
            "fullname" => 'fullname',
            "email" => $userEmail,
            "type" => 'testNewType',
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => 1
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == "Thông tin nhập vào không đúng !!"

        );
    }
    // Test case update User With Bank With Email is Float
    public function testUpdateUserWithEmailFloat()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userEmail = 1.23;

        $userModel->startTransaction();
        // Insert New User With Bank
        $inputUpdate = [
            "id" => $userId,
            "name" => 'userName',
            "fullname" => 'fullname',
            "email" => $userEmail,
            "type" => 'testNewType',
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => 1
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == "Thông tin nhập vào không đúng !!"

        );
    }
    // Test case update User With Bank With Email is Null
    public function testUpdateUserWithEmailNull()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userEmail = NULL;

        $userModel->startTransaction();
        // Insert New User With Bank
        $inputUpdate = [
            "id" => $userId,
            "name" => 'userName',
            "fullname" => 'fullname',
            "email" => $userEmail,
            "type" => 'testNewType',
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => 1
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == "Thông tin nhập vào không đúng !!"

        );
    }
    // Test case update User With Bank With Email is Object
    public function testUpdateUserWithEmailObject()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userEmail = new ResultClass();

        $userModel->startTransaction();
        // Insert New User With Bank
        $inputUpdate = [
            "id" => $userId,
            "name" => 'userName',
            "fullname" => 'fullname',
            "email" => $userEmail,
            "type" => 'testNewType',
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => 1
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == "Thông tin nhập vào không đúng !!"

        );
    }
    // Test case update User With Bank With Email is bool type, value is true
    public function testUpdateUserWithEmailTrue()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userEmail = true;

        $userModel->startTransaction();
        // Insert New User With Bank
        $inputUpdate = [
            "id" => $userId,
            "name" => 'userName',
            "fullname" => 'fullname',
            "email" => $userEmail,
            "type" => 'testNewType',
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => 1
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == "Thông tin nhập vào không đúng !!"

        );
    }
    // Test case update User With Bank With Email is bool type, value is false
    public function testUpdateUserWithEmailFalse()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userEmail = false;

        $userModel->startTransaction();
        // Insert New User With Bank
        $inputUpdate = [
            "id" => $userId,
            "name" => 'userName',
            "fullname" => 'fullname',
            "email" => $userEmail,
            "type" => 'testNewType',
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => 1
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == "Thông tin nhập vào không đúng !!"

        );
    }
    // Test case update User With Bank With Email is array
    public function testUpdateUserWithEmailArray()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userEmail = [1, 2, 3];

        $userModel->startTransaction();
        // Insert New User With Bank
        $inputUpdate = [
            "id" => $userId,
            "name" => 'userName',
            "fullname" => 'fullname',
            "email" => $userEmail,
            "type" => 'testNewType',
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => 1
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == "Thông tin nhập vào không đúng !!"

        );
    }
    // Test case update User With Type is Integer
    public function testUpdateUserWithTypeInteger()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userType = 1;
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => $userType,
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => $userVersion
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        $userAfterUpdate = $userRepository->findById($userId);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == true &&
                $userUpdate->data == "Update Bank and User Success" &&
                $userUpdate->error == NULL &&
                $userAfterUpdate['name'] == 'testNewName' &&
                $userAfterUpdate['fullname'] == 'testNewFullName' &&
                $userAfterUpdate['email'] == 'testNewUserEmail@gmail.com' &&
                $userAfterUpdate['type'] == $userType &&
                $userAfterUpdate['password'] == md5('testNewPassword') &&
                $userAfterUpdate['cost'] == 123 &&
                $userAfterUpdate['version'] == $userVersion + 1

        );
    }
    // Test case update User With Type is Float Number
    public function testUpdateUserWithTypeFloat()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userType = 1.23;
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => $userType,
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => $userVersion
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        $userAfterUpdate = $userRepository->findById($userId);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == true &&
                $userUpdate->data == "Update Bank and User Success" &&
                $userUpdate->error == NULL &&
                $userAfterUpdate['name'] == 'testNewName' &&
                $userAfterUpdate['fullname'] == 'testNewFullName' &&
                $userAfterUpdate['email'] == 'testNewUserEmail@gmail.com' &&
                $userAfterUpdate['type'] == $userType &&
                $userAfterUpdate['password'] == md5('testNewPassword') &&
                $userAfterUpdate['cost'] == 123 &&
                $userAfterUpdate['version'] == $userVersion + 1

        );
    }
    // Test case update User With Type is String
    public function testUpdateUserWithTypeString()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userType = 'This is string';
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => $userType,
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => $userVersion
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        $userAfterUpdate = $userRepository->findById($userId);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == true &&
                $userUpdate->data == "Update Bank and User Success" &&
                $userUpdate->error == NULL &&
                $userAfterUpdate['name'] == 'testNewName' &&
                $userAfterUpdate['fullname'] == 'testNewFullName' &&
                $userAfterUpdate['email'] == 'testNewUserEmail@gmail.com' &&
                $userAfterUpdate['type'] == $userType &&
                $userAfterUpdate['password'] == md5('testNewPassword') &&
                $userAfterUpdate['cost'] == 123 &&
                $userAfterUpdate['version'] == $userVersion + 1

        );
    }
    // Test case update User With Type is Null
    public function testUpdateUserWithTypeNull()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userType = NULL;
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => $userType,
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => 1
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == "Thông tin nhập vào không đúng !!"

        );
    }
    // Test case update User With Type is Object
    public function testUpdateUserWithTypeObject()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userType = new ResultClass();
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => $userType,
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => 1
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == "Thông tin nhập vào không đúng !!"

        );
    }
    // Test case update User With Type is Bool type, value is True
    public function testUpdateUserWithTypeTrue()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userType = true;
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => $userType,
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => 1
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == "Thông tin nhập vào không đúng !!"
        );
    }
    // Test case update User With Type is Bool type, value is false
    public function testUpdateUserWithTypeFalse()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userType = false;
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => $userType,
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => 1
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == "Thông tin nhập vào không đúng !!"
        );
    }
    // Test case update User With Type is array
    public function testUpdateUserWithTypeArray()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userType = [1, 2, 3];
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => $userType,
            "password" => 'testNewPassword',
            "cost" => 123,
            "version" => 1
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == "Thông tin nhập vào không đúng !!"
        );
    }
    // Test case update User With Password is Integer
    public function testUpdateUserWithPasswordInteger()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userPassword = 1;
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'newType',
            "password" => $userPassword,
            "cost" => 123,
            "version" => $userVersion
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        $userAfterUpdate = $userRepository->findById($userId);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == true &&
                $userUpdate->data == "Update Bank and User Success" &&
                $userUpdate->error == NULL &&
                $userAfterUpdate['name'] == 'testNewName' &&
                $userAfterUpdate['fullname'] == 'testNewFullName' &&
                $userAfterUpdate['email'] == 'testNewUserEmail@gmail.com' &&
                $userAfterUpdate['type'] == 'newType' &&
                $userAfterUpdate['password'] == md5($userPassword) &&
                $userAfterUpdate['cost'] == 123 &&
                $userAfterUpdate['version'] == $userVersion + 1

        );
    }
    // Test case update User With Password is Float Number
    public function testUpdateUserWithPasswordFloat()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userPassword = 1.23;
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'newType',
            "password" => $userPassword,
            "cost" => 123,
            "version" => $userVersion
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        $userAfterUpdate = $userRepository->findById($userId);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == true &&
                $userUpdate->data == "Update Bank and User Success" &&
                $userUpdate->error == NULL &&
                $userAfterUpdate['name'] == 'testNewName' &&
                $userAfterUpdate['fullname'] == 'testNewFullName' &&
                $userAfterUpdate['email'] == 'testNewUserEmail@gmail.com' &&
                $userAfterUpdate['type'] == 'newType' &&
                $userAfterUpdate['password'] == md5($userPassword) &&
                $userAfterUpdate['cost'] == 123 &&
                $userAfterUpdate['version'] == $userVersion + 1

        );
    }
    // Test case update User With Password is String
    public function testUpdateUserWithPasswordString()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userPassword = 'This is string';
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'newType',
            "password" => $userPassword,
            "cost" => 123,
            "version" => $userVersion
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        $userAfterUpdate = $userRepository->findById($userId);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == true &&
                $userUpdate->data == "Update Bank and User Success" &&
                $userUpdate->error == NULL &&
                $userAfterUpdate['name'] == 'testNewName' &&
                $userAfterUpdate['fullname'] == 'testNewFullName' &&
                $userAfterUpdate['email'] == 'testNewUserEmail@gmail.com' &&
                $userAfterUpdate['type'] == 'newType' &&
                $userAfterUpdate['password'] == md5($userPassword) &&
                $userAfterUpdate['cost'] == 123 &&
                $userAfterUpdate['version'] == $userVersion + 1

        );
    }
    // Test case update User With Password is NULL
    public function testUpdateUserWithPasswordNull()
    {
        $userRepository = new UserRepository();
        $userId = -1;
        $userPassword = NULL;
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'newType',
            "password" => $userPassword,
            "cost" => 123,
            "version" => 1
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == "Thông tin nhập vào không đúng !!"
        );
    }
    // Test case update User With Password is Object
    public function testUpdateUserWithPasswordObject()
    {
        $userRepository = new UserRepository();
        $userId = -1;
        $userPassword = new ResultClass();
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'newType',
            "password" => $userPassword,
            "cost" => 123,
            "version" => 1
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == "Thông tin nhập vào không đúng !!"
        );
    }
    // Test case update User With Password is bool type, value is true
    public function testUpdateUserWithPasswordTrue()
    {
        $userRepository = new UserRepository();
        $userId = -1;
        $userPassword = true;
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'newType',
            "password" => $userPassword,
            "cost" => 123,
            "version" => 1
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == "Thông tin nhập vào không đúng !!"
        );
    }
    // Test case update User With Password is bool type, value is false
    public function testUpdateUserWithPasswordFalse()
    {
        $userRepository = new UserRepository();
        $userId = -1;
        $userPassword = false;
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'newType',
            "password" => $userPassword,
            "cost" => 123,
            "version" => 1
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == "Thông tin nhập vào không đúng !!"
        );
    }
    // Test case update User With Password is array
    public function testUpdateUserWithPasswordArray()
    {
        $userRepository = new UserRepository();
        $userId = -1;
        $userPassword = [1, 2, 3];
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'newType',
            "password" => $userPassword,
            "cost" => 123,
            "version" => 1
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == "Thông tin nhập vào không đúng !!"
        );
    }
    // Test case update User With Cost is Integer
    public function testUpdateUserWithCostInteger()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userCost = 100;
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'newType',
            "password" => 'newPassword',
            "cost" => $userCost,
            "version" => $userVersion
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        $userAfterUpdate = $userRepository->findById($userId);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == true &&
                $userUpdate->data == "Update Bank and User Success" &&
                $userUpdate->error == NULL &&
                $userAfterUpdate['name'] == 'testNewName' &&
                $userAfterUpdate['fullname'] == 'testNewFullName' &&
                $userAfterUpdate['email'] == 'testNewUserEmail@gmail.com' &&
                $userAfterUpdate['type'] == 'newType' &&
                $userAfterUpdate['password'] == md5('newPassword') &&
                $userAfterUpdate['cost'] == $userCost &&
                $userAfterUpdate['version'] == $userVersion + 1

        );
    }
    // Test case update User With Cost is Float
    public function testUpdateUserWithCostFloat()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userCost = 1.23;
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'newType',
            "password" => 'newPassword',
            "cost" => $userCost,
            "version" => $userVersion
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        $userAfterUpdate = $userRepository->findById($userId);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == true &&
                $userUpdate->data == "Update Bank and User Success" &&
                $userUpdate->error == NULL &&
                $userAfterUpdate['name'] == 'testNewName' &&
                $userAfterUpdate['fullname'] == 'testNewFullName' &&
                $userAfterUpdate['email'] == 'testNewUserEmail@gmail.com' &&
                $userAfterUpdate['type'] == 'newType' &&
                $userAfterUpdate['password'] == md5('newPassword') &&
                $userAfterUpdate['cost'] == $userCost &&
                $userAfterUpdate['version'] == $userVersion + 1

        );
    }
    // Test case update User With Cost is String
    public function testUpdateUserWithCostString()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userCost = 'This is string';
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'newType',
            "password" => 'newPassword',
            "cost" => $userCost,
            "version" => $userVersion
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        $userAfterUpdate = $userRepository->findById($userId);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == 'Update Bank False' &&
                $userAfterUpdate['id'] == $userId &&
                $userAfterUpdate['name'] == 'testNewName' &&
                $userAfterUpdate['fullname'] == 'testNewFullName' &&
                $userAfterUpdate['email'] == 'testNewUserEmail@gmail.com' &&
                $userAfterUpdate['type'] == 'newType' &&
                $userAfterUpdate['password'] == md5('newPassword') &&
                $userAfterUpdate['cost'] == 1000 &&
                $userAfterUpdate['version'] == $userVersion + 1

        );
    }
    // Test case update User With Cost is Null
    public function testUpdateUserWithCostNull()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userCost = NULL;
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'newType',
            "password" => 'newPassword',
            "cost" => $userCost,
            "version" => $userVersion
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        $userAfterUpdate = $userRepository->findById($userId);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == 'Update Bank False' &&
                $userAfterUpdate['id'] == $userId &&
                $userAfterUpdate['name'] == 'testNewName' &&
                $userAfterUpdate['fullname'] == 'testNewFullName' &&
                $userAfterUpdate['email'] == 'testNewUserEmail@gmail.com' &&
                $userAfterUpdate['type'] == 'newType' &&
                $userAfterUpdate['password'] == md5('newPassword') &&
                $userAfterUpdate['cost'] == 1000 &&
                $userAfterUpdate['version'] == $userVersion + 1

        );
    }
    // Test case update User With Cost is Object
    public function testUpdateUserWithCostObject()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userCost = new ResultClass();
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'newType',
            "password" => 'newPassword',
            "cost" => $userCost,
            "version" => $userVersion
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        $userAfterUpdate = $userRepository->findById($userId);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == 'Update Bank False' &&
                $userAfterUpdate['id'] == $userId &&
                $userAfterUpdate['name'] == 'testNewName' &&
                $userAfterUpdate['fullname'] == 'testNewFullName' &&
                $userAfterUpdate['email'] == 'testNewUserEmail@gmail.com' &&
                $userAfterUpdate['type'] == 'newType' &&
                $userAfterUpdate['password'] == md5('newPassword') &&
                $userAfterUpdate['cost'] == 1000 &&
                $userAfterUpdate['version'] == $userVersion + 1

        );
    }
    // Test case update User With Cost is Bool type, value is true
    public function testUpdateUserWithCostTrue()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userCost = true;
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'newType',
            "password" => 'newPassword',
            "cost" => $userCost,
            "version" => $userVersion
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        $userAfterUpdate = $userRepository->findById($userId);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == 'Update Bank False' &&
                $userAfterUpdate['id'] == $userId &&
                $userAfterUpdate['name'] == 'testNewName' &&
                $userAfterUpdate['fullname'] == 'testNewFullName' &&
                $userAfterUpdate['email'] == 'testNewUserEmail@gmail.com' &&
                $userAfterUpdate['type'] == 'newType' &&
                $userAfterUpdate['password'] == md5('newPassword') &&
                $userAfterUpdate['cost'] == 1000 &&
                $userAfterUpdate['version'] == $userVersion + 1

        );
    }
    // Test case update User With Cost is Bool type, value is false
    public function testUpdateUserWithCostFalse()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userCost = false;
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'newType',
            "password" => 'newPassword',
            "cost" => $userCost,
            "version" => $userVersion
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        $userAfterUpdate = $userRepository->findById($userId);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == 'Update Bank False' &&
                $userAfterUpdate['id'] == $userId &&
                $userAfterUpdate['name'] == 'testNewName' &&
                $userAfterUpdate['fullname'] == 'testNewFullName' &&
                $userAfterUpdate['email'] == 'testNewUserEmail@gmail.com' &&
                $userAfterUpdate['type'] == 'newType' &&
                $userAfterUpdate['password'] == md5('newPassword') &&
                $userAfterUpdate['cost'] == 1000 &&
                $userAfterUpdate['version'] == $userVersion + 1

        );
    }
    // Test case update User With Cost is Array
    public function testUpdateUserWithCostArray()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userCost = [1, 2, 3];
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'newType',
            "password" => 'newPassword',
            "cost" => $userCost,
            "version" => $userVersion
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        $userAfterUpdate = $userRepository->findById($userId);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == 'Update Bank False' &&
                $userAfterUpdate['id'] == $userId &&
                $userAfterUpdate['name'] == 'testNewName' &&
                $userAfterUpdate['fullname'] == 'testNewFullName' &&
                $userAfterUpdate['email'] == 'testNewUserEmail@gmail.com' &&
                $userAfterUpdate['type'] == 'newType' &&
                $userAfterUpdate['password'] == md5('newPassword') &&
                $userAfterUpdate['cost'] == 1000 &&
                $userAfterUpdate['version'] == $userVersion + 1

        );
    }
    // Test case update User With Version is Integer and Wrong at Version of User
    public function testUpdateUserWithVersionIntButWrongAtVersionUser()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userVersionUpdate = 9999;
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'newType',
            "password" => 'newPassword',
            "cost" => 123,
            "version" => $userVersionUpdate
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        $userAfterUpdate = $userRepository->findById($userId);
        // Roll back
        $userModel->rollBack();
        // var_dump($userAfterUpdate);die();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == 'Dữ liệu đã được cập nhật trước đó! Xin hãy reload lại trang' &&
                $userAfterUpdate['id'] == $userId &&
                $userAfterUpdate['name'] == "testName" &&
                $userAfterUpdate['fullname'] == "testFullName" &&
                $userAfterUpdate['email'] == "testUserEmail@gmail.com" &&
                $userAfterUpdate['type'] == "testType" &&
                $userAfterUpdate['password'] == md5('testPassword') &&
                $userAfterUpdate['cost'] == 1000 &&
                $userAfterUpdate['version'] == $userVersion

        );
    }
    // Test case update User With Version is Float
    public function testUpdateUserWithVersionFloat()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userVersionUpdate = 1.23;
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'newType',
            "password" => 'newPassword',
            "cost" => 123,
            "version" => $userVersionUpdate
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        $userAfterUpdate = $userRepository->findById($userId);
        // Roll back
        $userModel->rollBack();
        // var_dump($userAfterUpdate);die();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == 'Dữ liệu đã được cập nhật trước đó! Xin hãy reload lại trang' &&
                $userAfterUpdate['id'] == $userId &&
                $userAfterUpdate['name'] == "testName" &&
                $userAfterUpdate['fullname'] == "testFullName" &&
                $userAfterUpdate['email'] == "testUserEmail@gmail.com" &&
                $userAfterUpdate['type'] == "testType" &&
                $userAfterUpdate['password'] == md5('testPassword') &&
                $userAfterUpdate['cost'] == 1000 &&
                $userAfterUpdate['version'] == $userVersion

        );
    }
    // Test case update User With Version is String
    public function testUpdateUserWithVersionString()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userVersionUpdate = 'This is String';
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'newType',
            "password" => 'newPassword',
            "cost" => 123,
            "version" => $userVersionUpdate
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        $userAfterUpdate = $userRepository->findById($userId);
        // Roll back
        $userModel->rollBack();
        // var_dump($userAfterUpdate);die();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == 'Dữ liệu đã được cập nhật trước đó! Xin hãy reload lại trang' &&
                $userAfterUpdate['id'] == $userId &&
                $userAfterUpdate['name'] == "testName" &&
                $userAfterUpdate['fullname'] == "testFullName" &&
                $userAfterUpdate['email'] == "testUserEmail@gmail.com" &&
                $userAfterUpdate['type'] == "testType" &&
                $userAfterUpdate['password'] == md5('testPassword') &&
                $userAfterUpdate['cost'] == 1000 &&
                $userAfterUpdate['version'] == $userVersion

        );
    }
    // Test case update User With Version is Null
    public function testUpdateUserWithVersionNull()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userVersionUpdate = NULL;
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'newType',
            "password" => 'newPassword',
            "cost" => 123,
            "version" => $userVersionUpdate
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        $userAfterUpdate = $userRepository->findById($userId);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == 'Thông tin nhập vào không đúng !!' &&
                $userAfterUpdate['id'] == $userId &&
                $userAfterUpdate['name'] == "testName" &&
                $userAfterUpdate['fullname'] == "testFullName" &&
                $userAfterUpdate['email'] == "testUserEmail@gmail.com" &&
                $userAfterUpdate['type'] == "testType" &&
                $userAfterUpdate['password'] == md5('testPassword') &&
                $userAfterUpdate['cost'] == 1000 &&
                $userAfterUpdate['version'] == $userVersion

        );
    }
    // Test case update User With Version is Object
    public function testUpdateUserWithVersionObject()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userVersionUpdate = new ResultClass();
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'newType',
            "password" => 'newPassword',
            "cost" => 123,
            "version" => $userVersionUpdate
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        $userAfterUpdate = $userRepository->findById($userId);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == 'Thông tin nhập vào không đúng !!' &&
                $userAfterUpdate['id'] == $userId &&
                $userAfterUpdate['name'] == "testName" &&
                $userAfterUpdate['fullname'] == "testFullName" &&
                $userAfterUpdate['email'] == "testUserEmail@gmail.com" &&
                $userAfterUpdate['type'] == "testType" &&
                $userAfterUpdate['password'] == md5('testPassword') &&
                $userAfterUpdate['cost'] == 1000 &&
                $userAfterUpdate['version'] == $userVersion

        );
    }
    // Test case update User With Version is bool type,value is true
    public function testUpdateUserWithVersionTrue()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userVersionUpdate = true;
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'newType',
            "password" => 'newPassword',
            "cost" => 123,
            "version" => $userVersionUpdate
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        $userAfterUpdate = $userRepository->findById($userId);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == 'Thông tin nhập vào không đúng !!' &&
                $userAfterUpdate['id'] == $userId &&
                $userAfterUpdate['name'] == "testName" &&
                $userAfterUpdate['fullname'] == "testFullName" &&
                $userAfterUpdate['email'] == "testUserEmail@gmail.com" &&
                $userAfterUpdate['type'] == "testType" &&
                $userAfterUpdate['password'] == md5('testPassword') &&
                $userAfterUpdate['cost'] == 1000 &&
                $userAfterUpdate['version'] == $userVersion

        );
    }
    // Test case update User With Version is bool type,value is false
    public function testUpdateUserWithVersionFalse()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userVersionUpdate = false;
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'newType',
            "password" => 'newPassword',
            "cost" => 123,
            "version" => $userVersionUpdate
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        $userAfterUpdate = $userRepository->findById($userId);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == 'Thông tin nhập vào không đúng !!' &&
                $userAfterUpdate['id'] == $userId &&
                $userAfterUpdate['name'] == "testName" &&
                $userAfterUpdate['fullname'] == "testFullName" &&
                $userAfterUpdate['email'] == "testUserEmail@gmail.com" &&
                $userAfterUpdate['type'] == "testType" &&
                $userAfterUpdate['password'] == md5('testPassword') &&
                $userAfterUpdate['cost'] == 1000 &&
                $userAfterUpdate['version'] == $userVersion

        );
    }
    // Test case update User With Version is array
    public function testUpdateUserWithVersionArray()
    {
        $userRepository = new UserRepository();
        $userModel = new UserModel();
        $userId = -1;
        $userVersionUpdate = [1, 2, 3];
        $inputInsert = [
            "id" => $userId,
            "name" => 'testName',
            "fullname" => 'testFullName',
            "email" => 'testUserEmail@gmail.com',
            "type" => 'testType',
            "password" => 'testPassword'
        ];
        $userModel->startTransaction();
        // Insert New User With Bank
        $userRepository->insertUserWithId($inputInsert);
        $userVersion = $userRepository->findById($userId)['version'];
        $inputUpdate = [
            "id" => $userId,
            "name" => 'testNewName',
            "fullname" => 'testNewFullName',
            "email" => 'testNewUserEmail@gmail.com',
            "type" => 'newType',
            "password" => 'newPassword',
            "cost" => 123,
            "version" => $userVersionUpdate
        ];
        $userUpdate = $userRepository->updateUserWithBank($inputUpdate);
        $userAfterUpdate = $userRepository->findById($userId);
        // Roll back
        $userModel->rollBack();
        $this->assertTrue(
            $userUpdate->isSuccess == false &&
                $userUpdate->data == NULL &&
                $userUpdate->error == 'Thông tin nhập vào không đúng !!' &&
                $userAfterUpdate['id'] == $userId &&
                $userAfterUpdate['name'] == "testName" &&
                $userAfterUpdate['fullname'] == "testFullName" &&
                $userAfterUpdate['email'] == "testUserEmail@gmail.com" &&
                $userAfterUpdate['type'] == "testType" &&
                $userAfterUpdate['password'] == md5('testPassword') &&
                $userAfterUpdate['cost'] == 1000 &&
                $userAfterUpdate['version'] == $userVersion

        );
    }
}
