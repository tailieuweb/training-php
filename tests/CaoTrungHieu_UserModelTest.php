<?php

use PHPUnit\Framework\TestCase;

class CaoTrungHieu_UserModelTest extends TestCase
{
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
        $expected = NULL;
        $this->assertEquals($expected, $actual);
    }
    // Test case decrypt ID With Id Positive Number
    public function testDecryptIdWithIdPositiveNumber()
    {
        $userModel = new UserModel();

        $id = 1;
        $actual = $userModel->decryptID($id);
        $expected = NULL;
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

        $id = NULL;
        $actual = $userModel->decryptID($id);
        $expected = NULL;
        $this->assertEquals($expected, $actual);
    }
    // Test case decrypt ID With Id Object
    public function testDecryptIdWithIdObject()
    {
        $userModel = new UserModel();

        $id = new ResultClass();
        $actual = $userModel->decryptID($id);
        $expected = NULL;
        $this->assertEquals($expected, $actual);
    }
    // Test case decrypt ID With Id Bool Type, value is True
    public function testDecryptIdWithIdTrue()
    {
        $userModel = new UserModel();

        $id = true;
        $actual = $userModel->decryptID($id);
        $expected = NULL;
        $this->assertEquals($expected, $actual);
    }
    // Test case decrypt ID With Id Bool Type, value is false
    public function testDecryptIdWithIdFalse()
    {
        $userModel = new UserModel();

        $id = false;
        $actual = $userModel->decryptID($id);
        $expected = NULL;
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
}
