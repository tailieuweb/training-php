<?php

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
<<<<<<< HEAD
=======
        var_dump($findUser);
>>>>>>> 1-php-202109/2-groups/10-J/master-phpunit
        if (
            $check == true &&
            count($findUser) == 0
        ) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testDeleteUserById1 Just Check
<<<<<<< HEAD
    public function testDeleteUserById1()
=======
    public function testDeleteUserByIdNg()
>>>>>>> 1-php-202109/2-groups/10-J/master-phpunit
    {
        $userModel = new UserModel();
        $id = -1;
        $userModel->insertUserWithId($id, 'Danh', 'Nguyen Khac Danh', 'nguyenkhacdanh@gmail.com', 'guest', '12345');
        $check = $userModel->deleteUserById($id);
        if (
            $check == true
        ) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test updateUser Function in UserModel - 'Lập' do this
     */
    // Test case testUpdateUserOk
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
    // Test case testUpdateUserNg Not good
    public function testUpdateUserNg()
    {
        $userModel = new UserModel();
        $id = "abc";
        $input = [
            "id" => $id
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

    /**
     * Test auth Function in UserModel - 'Lập' do this
     */
    // Test case testUpdateUserNg Not good
    public function testAuthOk()
    {
        $userModel = new UserModel();
        $id = -1;
        $password = "lap";
        $name = "Lap";
        $userModel->deleteUserById($id);
        $userModel->insertUserWithId($id, $name, "testFullName", "testEmail", "testType", $password);
        $auth = $userModel->auth($name, $password);
        $check = false;
        if (!empty($auth)) {
            if (
                isset($auth[0]['name']) &&
                isset($auth[0]['password'])
            ) {
                if (
                    $auth[0]['name'] == $name &&
                    $auth[0]['password'] == md5($password)
                ) {
                    $check = true;
                }
            }
        }
        $actual = true;
        $this->assertEquals($check, $actual);
    }
    // Test case testUpdateUserNg Not good
    public function testAuthNg()
    {
        $userModel = new UserModel();
        $password = md5("lap1");
        $name = "Lap1";
        $auth = $userModel->auth($name, $password);
        $check = false;
        if (!empty($auth)) {
            if (
                isset($auth[0]['name']) &&
                isset($auth[0]['password'])
            ) {
                if (
                    $auth[0]['name'] == $name &&
                    $auth[0]['password'] == md5($password)
                ) {
                    $check = true;
                }
            }
        }
        $actual = false;
        $this->assertEquals($check, $actual);
    }

    /**
     * Test insertUserWithId Function in UserModel - 'Lập' do this
     */
    // Test case insertUserWithIdOk 
    public function testInsertUserWithIdOk()
    {
        $userModel = new UserModel();
        $id = -1;
        $password = "lap";
        $name = "Lap";
        $userModel->deleteUserById($id);
        $userModel->insertUserWithId($id, $name, "testFullName", "testEmail", "testType", $password);
        $result =  $userModel->findUserById($id);
        $mongDoiName = 'Lap';
        $this->assertEquals($mongDoiName, $result[0]['name']);
    }
    // Test case insertUserWithIdNg Not good
    public function testInsertUserWithIdNg()
    {
        $userModel = new UserModel();
        $id = -99999;
        $password = "lap";
        $name = "Lap";
        $userModel->deleteUserById($id);
        $result =  $userModel->insertUserWithId($id, $name, "testFullName", "testEmail", "testType", $password);
        $check = false;
        $this->assertEquals($check, $result);
    }
    // Test case testInsertUserWithIdStr
    public function testInsertUserWithIdStr()
    {
        $userModel = new UserModel();
        $id = "abc";
        $password = "lap";
        $name = "Lap";
        $userModel->deleteUserById($id);
        $result =  $userModel->insertUserWithId($id, $name, "testFullName", "testEmail", "testType", $password);
        if (empty($result)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testInsertUserWithIdNull
    public function testInsertUserWithIdNull()
    {
        $userModel = new UserModel();
        $id = null;
        $password = "lap";
        $name = "Lap";
        $userModel->deleteUserById($id);
        $result =  $userModel->insertUserWithId($id, $name, "testFullName", "testEmail", "testType", $password);
        if (empty($result)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testInsertUserWithIdObject
    public function testInsertUserWithIdObject()
    {
        $userModel = new UserModel();
        $id = new ResultClass();
        $password = "lap";
        $name = "Lap";
        $userModel->deleteUserById($id);
        $result =  $userModel->insertUserWithId($id, $name, "testFullName", "testEmail", "testType", $password);
        if (empty($result)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
}
