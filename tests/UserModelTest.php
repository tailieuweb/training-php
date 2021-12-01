<?php

use phpDocumentor\Reflection\Types\Null_;
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    /**
     * Test sum function in User Model, all member do this 
     * */
    // Test case Sum Positive Number
    public function testSumPositiveNumber()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 2;
        $expected = 3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    // Test case Sum Negative Number
    public function testSumNegativeNumber()
    {
        $userModel = new UserModel();
        $a = -3;
        $b = -2;
        $expected = -5;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    // Test case Sum a Positive and a Negative Number
    public function testSumPosiAndNegaNumber()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = 2;
        $expected = 1;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    // Test case Sum Float Positive Number
    public function testSumFloatPositiveNumber()
    {
        $userModel = new UserModel();
        $a = 1.3;
        $b = 2.4;
        $expected = 3.7;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    // Test case Sum Negative Number
    public function testSumFloatNegativeNumber()
    {
        $userModel = new UserModel();
        $a = -2.4;
        $b = -3.5;
        $expected = -5.9;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    // Test case Sum a Positive and a Negative Number
    public function testSumFloatPosiAndNegaNumber()
    {
        $userModel = new UserModel();
        $a = -1.3;
        $b = 2.4;
        $expected = 1.1;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    // Test case Sum Number and String
    public function testSumNumberAndString()
    {
        $userModel = new UserModel();
        $a = 'abc';
        $b = 2.4;
        $expected = 'error';

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    // Test case Sum String and String
    public function testSumStringAndString()
    {
        $userModel = new UserModel();
        $a = 'abc';
        $b = 'xyz';
        $expected = 'error';

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    // Test case Not good
    public function testSumNg()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 2;

        $actual = $userModel->sumb($a, $b);

        if ($actual != 3) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    /**
     * Test DeleteUserById Function in UserModel - 'Danh' do this
     */
    // Test case testDeleteUserById
    public function testDeleteUserByIdOK()
    {
        $userModel = new UserModel();
        $id = -1;
        $userModel->insertUserWithId($id, 'Danh', 'Nguyen Khac Danh', 'nguyenkhacdanh@gmail.com', 'guest', '12345');
        $check = $userModel->deleteUserById($id);
        $findUser = $userModel->findUserById($id);
        if (
            $check == true &&
            $findUser == false
        ) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testDeleteUserByNg
    public function testDeleteUserByIdNg()
    {
        $userModel = new UserModel();
        $id = "a";
        $check = $userModel->deleteUserById($id);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testDeleteUserNotId
    public function testDeleteUserNotId()
    {
        $userModel = new UserModel();
        $id = "";
        $check = $userModel->deleteUserById($id);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testDeleteUserBool
    public function testDeleteUserBool()
    {
        $userModel = new UserModel();
        $id = true;
        $check = $userModel->deleteUserById($id);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testDeleteUserObject
    public function testDeleteUserObject()
    {
        $userModel = new UserModel();
        $id = new UserModel;
        $check = $userModel->deleteUserById($id);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testDeleteUserExpectedandActual
    public function testDeleteUserExpectedandActual()
    {
        $userModel = new UserModel();
        $id = -1;
        $expected = $userModel->deleteUserById($id);
        $actual = true;
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test getUser Function in UserModel - 'Danh' do this
     */
    // Test case testGetUsers
    public function testGetUsersOk()
    {
        $userModel = new UserModel;
        $id = -1;
        $userModel->insertUserWithId($id, 'Danh', 'Nguyen Khac Danh', 'nguyenkhacdanh@gmail.com', 'guest', '12345');
        $users= $userModel->getUsers();
        $check = count($users)> 0;
        $userModel->deleteUserById($id);
        if ($check == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        $userModel->deleteUserById($id);
    }
// Test case testGetUsersByKey
public function testGetUsersByKey()
{
    $userModel = new UserModel;
    $id = -1;
    $params=[
        "keyword"=> 'Danh'
    ];
    $userModel->insertUserWithId($id, 'Danh', 'Nguyen Khac Danh', 'nguyenkhacdanh@gmail.com', 'guest', '12345');
    $users= $userModel->getUsers($params);
    $check = count($users)> 0;
    $userModel->deleteUserById($id);
    if ($check == true) {
        $this->assertTrue(true);
    } else {
        $this->assertTrue(false);
    }
}
// Test case testGetUsersByNumber
public function testGetUsersByNumber()
{
    
    $userModel = new UserModel;
    $id = -1;
    $params=[
        "keyword"=> '1'
    ];
    $userModel->insertUserWithId($id, 'Danh1', 'Nguyen Khac Danh', 'nguyenkhacdanh@gmail.com', 'guest', '12345');
    $users= $userModel->getUsers($params);
    $check = count($users)> 0;
    $userModel->deleteUserById($id);
    if ($check == true) {
        $this->assertTrue(true);
    } else {
        $this->assertTrue(false);
    }
}
// Test case testGetUsersByKeySpecial 
public function testGetUsersByKeySpecial()
{
    $userModel = new UserModel;
    $id = -1;
    $params=[
        "keyword"=> '#%$%#$'
    ];
    $userModel->insertUserWithId($id, 'Danh', 'Nguyen Khac Danh', 'nguyenkhacdanh@gmail.com', 'guest', '12345');
    $users= $userModel->getUsers($params);
    $check = count($users)> 0;
    $userModel->deleteUserById($id);
    if ($check == false) {
        $this->assertTrue(true);
    } else {
        $this->assertTrue(false);
    }
}
// Test case testGetUsersByKeyNull
public function testGetUsersByKeyNull()
{
    $userModel = new UserModel;
    $id = -1;
    $params=[
        "keyword"=> ''
    ];
    $userModel->insertUserWithId($id, 'Danh', 'Nguyen Khac Danh', 'nguyenkhacdanh@gmail.com', 'guest', '12345');
    $users= $userModel->getUsers($params);
    $check = count($users)> 0;
    $userModel->deleteUserById($id);
    if ($check == true) {
        $this->assertTrue(true);
    } else {
        $this->assertTrue(false);
    }
}
 /**
     * Test decryptID function, 'Hiếu Cao' do this
     * */
    // Test case decrypt ID With Id Properly Encrypted
    public function testDecryptIdWithIdProperlyEncrypted()
    {
        $userModel = new UserModel();
        $md5Id = md5('1TeamJ-TDC');
        $checkUser = $userModel->insertUserWithId(1, 'testName', 'testFullName', 'testEmail@gmail.com', 'testType', 'testPassword');
        $expected = 1;
        $actual = $userModel->decryptID($md5Id);
        // Delete new User if it can be insert (Not delete if that user was exist before)
        if ($checkUser) {
            $userModel->deleteUserById($md5Id);
        }

        $this->assertEquals($expected, $actual);
    }
    // Test case decrypt ID With Id Properly Not Encrypted
    public function testDecryptIdWithIdProperlyNotEncrypted()
    {
        $userModel = new UserModel();

        $md5Id = md5('abc');
        $actual = $userModel->decryptID($md5Id);
        $expected = null;
        $this->assertEquals($expected, $actual);
    }
    // Test case decrypt ID With Id Positive Number
    public function testDecryptIdWithIdPositiveNumber()
    {
        $userModel = new UserModel();

        $id = 1;
        $actual = $userModel->decryptID($id);
        $expected = null;
        $this->assertEquals($expected, $actual);
    }
    // Test case decrypt ID With Id Negative Number
    public function testDecryptIdWithIdNegativeNumber()
    {
        $userModel = new UserModel();

        $id = -1;
        $actual = $userModel->decryptID($id);
        $expected = -1;
        $this->assertEquals($expected, $actual);
    }
    // Test case decrypt ID With Id Null
    public function testDecryptIdWithIdNull()
    {
        $userModel = new UserModel();

        $id = null;
        $actual = $userModel->decryptID($id);
        $expected = null;
        $this->assertEquals($expected, $actual);
    }
    // Test case decrypt ID With Id Object
    public function testDecryptIdWithIdObject()
    {
        $userModel = new UserModel();

        $id = new ResultClass();
        $actual = $userModel->decryptID($id);
        $expected = null;
        $this->assertEquals($expected, $actual);
    }
    // Test case decrypt ID With Id Bool Type, value is True
    public function testDecryptIdWithIdTrueBoolType()
    {
        $userModel = new UserModel();

        $id = true;
        $actual = $userModel->decryptID($id);
        $expected = null;
        $this->assertEquals($expected, $actual);
    }
    // Test case decrypt ID With Id Bool Type, value is false
    public function testDecryptIdWithIdTrueFalseType()
    {
        $userModel = new UserModel();

        $id = false;
        $actual = $userModel->decryptID($id);
        $expected = null;
        $this->assertEquals($expected, $actual);
    }

    /**
     * Test getInstance function, 'Hiếu Cao' do this
     * */
    // Test case getInstance Good
    public function testGetInstanceGood()
    {
        $userModelSingleton = UserModel::getInstance();
        $userModelSingleton2 = UserModel::getInstance();

        $expected = true;
        $actual = is_object($userModelSingleton) &&
        get_class($userModelSingleton) == 'UserModel' &&
            $userModelSingleton === $userModelSingleton2;

        $this->assertEquals($expected, $actual);
    }
    // Test case getInstance Not Good
    public function testGetInstanceNg()
    {
        $userModelSingleton = UserModel::getInstance();

        $expected = false;
        $actual = !is_object($userModelSingleton) ||
        !get_class($userModelSingleton) == 'UserModel';

        $this->assertEquals($expected, $actual);
    }

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
        $userId = 1.1;

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