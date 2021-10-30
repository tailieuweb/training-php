<?php

use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{

    /**
     * Test case Sum Positive Number
     */
    public function testSumPositiveNumber()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 2;
        $expected = 3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Sum Negative Number
     */
    public function testSumNegativeNumber()
    {
        $userModel = new UserModel();
        $a = -3;
        $b = -2;
        $expected = -5;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Sum a Positive and a Negative Number
     */
    public function testSumPosiAndNegaNumber()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = 2;
        $expected = 1;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Sum Float Positive Number
     */
    public function testSumFloatPositiveNumber()
    {
        $userModel = new UserModel();
        $a = 1.3;
        $b = 2.4;
        $expected = 3.7;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Sum Negative Number
     */
    public function testSumFloatNegativeNumber()
    {
        $userModel = new UserModel();
        $a = -2.4;
        $b = -3.5;
        $expected = -5.9;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Sum a Positive and a Negative Number
     */
    public function testSumFloatPosiAndNegaNumber()
    {
        $userModel = new UserModel();
        $a = -1.3;
        $b = 2.4;
        $expected = 1.1;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Sum Number and String
     */
    public function testSumNumberAndString()
    {
        $userModel = new UserModel();
        $a = 'abc';
        $b = 2.4;
        $expected = 'error';

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Sum String and String
     */
    public function testSumStringAndString()
    {
        $userModel = new UserModel();
        $a = 'abc';
        $b = 'xyz';
        $expected = 'error';

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Not good
     */
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
     * Test case testUpdateUserOk
     */
    public function testUpdateUserOk()
    {
        $userModel = new UserModel();
        $id = -1;
        $userModel->deleteUserById($id);
        $userModel->insertUserWithId($id, "testName1", "testFullName", "testEmail", "testType", "testPassword");
        $user = $userModel->findUserById($id);
        $userVersion = $user[0]['version'];
        $input = [
            "id" => $id,
            "name" => "nameUpdate",
            "fullname" => "fullnameUpdate",
            "email" => "emailUpdate",
            "type" => "typeUpdate",
            "password" => "passwordUpdate",
            "version" => $userVersion
        ];
        $userUpdate = $userModel->updateUser($input);
        $check = false;
        if (
            $userUpdate->isSuccess == true &&
            $userUpdate->data == "Đã update thành công" &&
            $userUpdate->error == NULL
        ) {
            $check = true;
        }
        $actual = true;
        $this->assertEquals($check, $actual);
    }

    /**
     * Test case Not good
     */
    public function testUpdateUserNg()
    {
        $userModel = new UserModel();
        $id = -111;
        $input = [
            "id" => $id,
            "name" => "nameUpdate",
            "fullname" => "fullnameUpdate",
            "email" => "emailUpdate",
            "type" => "typeUpdate",
            "password" => "passwordUpdate",
            "version" => 1
        ];
        $userUpdate = $userModel->updateUser($input);
        if (
            $userUpdate->isSuccess == false &&
            $userUpdate->data == NULL &&
            $userUpdate->error == "Không tìm thấy id của user"
        ) {
            $check = true;
        }
        $actual = true;
        $this->assertEquals($check, $actual);
    }
}
