<?php

use phpDocumentor\Reflection\Types\Null_;
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    /**
     * Test getInstance function, 'Dattt' do this 
     * */

    // Test case Check Email Exist Good 

    public function testCheckEmailExistGood()
    {
        $userModel = new UserModel();
        $email = 'vothanhdat123123@gmail.com';
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];
        $userModel->startTransaction();
        $userModel->insertUser($input);
        $actual = $userModel->checkEmailExist($email);
        $userModel->rollBack();

        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    // Test case Check Email Exist Not Good 

    public function testCheckEmailExistNg()
    {
        $userModel = new UserModel();
        $email = 'testcheckEemailexistng@gmail.com';

        $actual = $userModel->checkEmailExist($email);

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Check Email Exist Not String

    public function testCheckEmailExistNotString()
    {
        $userModel = new UserModel();
        $email = 123;

        $actual = $userModel->checkEmailExist($email);

        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    // Test case Check Email Exist is Object

    public function testCheckEmailExistIsObject()
    {
        $userModel = new UserModel();
        $email = [
            "email" => "abc@gmail.com"
        ];

        $actual = $userModel->checkEmailExist($email);

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Check Email Exist is Bool

    public function testCheckEmailExistIsBool()
    {
        $userModel = new UserModel();
        $email = true;

        $actual = $userModel->checkEmailExist($email);

        $expected = false;
        $this->assertEquals($expected, $actual);
    }


    // Test case Check Email Exist is Null

    public function testCheckEmailExistIsNull()
    {
        $userModel = new UserModel();
        $email = "";

        $actual = $userModel->checkEmailExist($email);

        $expected = false;
        $this->assertEquals($expected, $actual);
    }


    // Test case Check Email Exist is Special

    public function testCheckEmailExistIsSpecial()
    {
        $userModel = new UserModel();
        $email = "!@@$%^!%$@^";

        $actual = $userModel->checkEmailExist($email);

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Check Email Style Good 

    public function testCheckEmailStyleGood()
    {
        $userModel = new UserModel();
        $email = 'vothanhdat123123@gmail.com';

        $actual = $userModel->checkEmailStyle($email);


        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    // Test case Check Email Style Not Good 

    public function testCheckEmailStyleNg()
    {
        $userModel = new UserModel();
        $email = 'testcheckEemailexistng@gmail.com123';

        $actual = $userModel->checkEmailStyle($email);

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Check Email Style Not String

    public function testCheckEmailStyleNotString()
    {
        $userModel = new UserModel();
        $email = 123;

        $actual = $userModel->checkEmailStyle($email);

        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    // Test case Check Email Style is Object

    public function testCheckEmailStyleIsObject()
    {
        $userModel = new UserModel();
        $email = [
            "email" => "abc@gmail.com"
        ];

        $actual = $userModel->checkEmailStyle($email);

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Check Email Style is Bool

    public function testCheckEmailStyleIsBool()
    {
        $userModel = new UserModel();
        $email = true;

        $actual = $userModel->checkEmailStyle($email);

        $expected = false;
        $this->assertEquals($expected, $actual);
    }


    // Test case Check Email Style is Null

    public function testCheckEmailStyleIsNull()
    {
        $userModel = new UserModel();
        $email = "";

        $actual = $userModel->checkEmailStyle($email);

        $expected = false;
        $this->assertEquals($expected, $actual);
    }


    // Test case Check Email Style is Special

    public function testCheckEmailStyleIsSpecial()
    {
        $userModel = new UserModel();
        $email = "!@@$%^!%$@^";

        $actual = $userModel->checkEmailStyle($email);

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Find User By Email Good 

    public function testFindUserByEmailGood()
    {
        $userModel = new UserModel();
        $email = 'vothanhdat123123@gmail.com';
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];
        $userModel->startTransaction();
        $userModel->insertUser($input);
        $actual = $userModel->findUserByEmail($email);
        $userModel->rollBack();

        $expected = $email;
        $this->assertEquals($expected, $actual['email']);
    }

    // Test case Find User By Email Not Good 

    public function testFindUserByEmailNg()
    {
        $userModel = new UserModel();
        $email = 'vothanhdat123123@gmail.com';
        $emailFail = 'vothanhdat@gmail.com';
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];
        $userModel->startTransaction();
        $userModel->insertUser($input);
        $actual = $userModel->findUserByEmail($emailFail);
        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Find User By Email Is Number
    public function testFindUserByEmailIsNumber()
    {
        $userModel = new UserModel();
        $email = 'vothanhdat123123@gmail.com';
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];
        $userModel->startTransaction();
        $userModel->insertUser($input);
        $actual = $userModel->findUserByEmail(123);
        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    // Test case Find User By Email Is Object
    public function testFindUserByEmailIsObject()
    {
        $userModel = new UserModel();
        $email = 'vothanhdat123123@gmail.com';
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];
        $object = [
            'email' => "vothanhdat123123@gmail.com",
        ];
        $userModel->startTransaction();
        $userModel->insertUser($input);
        $actual = $userModel->findUserByEmail($object);
        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    // Test case Find User By Email Is Bool
    public function testFindUserByEmailIsBool()
    {
        $userModel = new UserModel();
        $email = 'vothanhdat123123@gmail.com';
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];

        $userModel->startTransaction();
        $userModel->insertUser($input);
        $actual = $userModel->findUserByEmail(true);
        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    // Test case Find User By Email Is Null
    public function testFindUserByEmailIsNull()
    {
        $userModel = new UserModel();
        $email = 'vothanhdat123123@gmail.com';
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];

        $userModel->startTransaction();
        $userModel->insertUser($input);
        $actual = $userModel->findUserByEmail(null);
        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    // Test case Find User By Email Is Special
    public function testFindUserByEmailIsSpecial()
    {
        $userModel = new UserModel();
        $email = 'vothanhdat123123@gmail.com';
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];

        $userModel->startTransaction();
        $userModel->insertUser($input);
        $actual = $userModel->findUserByEmail("!@^$!@^%");
        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////
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
        $users = $userModel->getUsers();
        $check = count($users) > 0;
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
        $params = [
            "keyword" => 'Danh'
        ];
        $userModel->insertUserWithId($id, 'Danh', 'Nguyen Khac Danh', 'nguyenkhacdanh@gmail.com', 'guest', '12345');
        $users = $userModel->getUsers($params);
        $check = count($users) > 0;
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
        $params = [
            "keyword" => '1'
        ];
        $userModel->insertUserWithId($id, 'Danh1', 'Nguyen Khac Danh', 'nguyenkhacdanh@gmail.com', 'guest', '12345');
        $users = $userModel->getUsers($params);
        $check = count($users) > 0;
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
        $params = [
            "keyword" => '#%$%#$'
        ];
        $userModel->insertUserWithId($id, 'Danh', 'Nguyen Khac Danh', 'nguyenkhacdanh@gmail.com', 'guest', '12345');
        $users = $userModel->getUsers($params);
        $check = count($users) > 0;
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
        $params = [
            "keyword" => ''
        ];
        $userModel->insertUserWithId($id, 'Danh', 'Nguyen Khac Danh', 'nguyenkhacdanh@gmail.com', 'guest', '12345');
        $users = $userModel->getUsers($params);
        $check = count($users) > 0;
        $userModel->deleteUserById($id);
        if ($check == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
}