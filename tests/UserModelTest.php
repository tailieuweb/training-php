<?php

use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{

    /**
     * Test case Okie
     */
    public function testSumOk()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 2;
        $expected = 3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    public function testSumBad()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 2;
        $expected = 3;

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

    public function testSumPositivevsNegative()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = -2;

        $actual = $userModel->sumb($a, $b);

        if ($actual != -1) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    public function testSumNegativevsNegative()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = -2;

        $actual = $userModel->sumb($a, $b);

        if ($actual != -3) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    public function testSumNumbervsString()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = '1';

        $actual = $userModel->sumb($a, $b);

        if ($actual == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    public function testSumStringvsString()
    {
        $userModel = new UserModel();
        $a = '1';
        $b = '1';

        $actual = $userModel->sumb($a, $b);

        if ($actual == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testSumIntegervsDouble()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 1.5;

        $actual = $userModel->sumb($a, $b);

        if ($actual != 2.5) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    
    
   // Huynh lam test findUserById
    // Test truong hop thanh cong
    public function testFindUserByIdOk()
    {
        $userModel = new UserModel();
        $idUser = 12;
        $expected = 'test1';
        $user = $userModel->findUserById($idUser);
        $actual = $user[0]['name'];
        $this->assertEquals($expected, $actual);
    }
    // Test truong hop sai
    public function testFindUserByIdNg()
    {
        $userModel = new UserModel();
        $userId = 222;
        $user = $userModel->findUserById($userId);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test truong hop id la chuoi
    public function testFindUserByIdIsString()
    {
        $userModel = new UserModel();
        $userId = '123';
        $expected = 'Not invalid';
        $actual = $userModel->findUserById($userId);
        $this->assertEquals($expected, $actual);
    }
    // Test trường hợp id là số âm
    public function testFindUserByIdIsNegativeNumber()
    {
        $userModel = new UserModel();
        $userId = -10;
        $expected = 'Not invalid';
        $actual = $userModel->findUserById($userId);
        $this->assertEquals($expected, $actual);
    }
    // Test trường hợp id là số thực
    public function testFindUserByIdIsDoubleNumber()
    {
        $userModel = new UserModel();
        $userId = 2.5;
        $expected = 'Not invalid';
        $actual = $userModel->findUserById($userId);
        $this->assertEquals($expected, $actual);
    }
    // Test trường hợp id là null
    public function testFindUserByIdIsNull()
    {
        $userModel = new UserModel();
        $userId = null;
        $expected = 'Not invalid';
        $actual = $userModel->findUserById($userId);
        $this->assertEquals($expected, $actual);
    }
    // Test trường hợp id là boolean(true/false)
    public function testFindUserByIdIsBoolean()
    {
        $userModel = new UserModel();
        $userId = true;
        $actual = $userModel->findUserById($userId);
        if (empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test trường hợp id là mảng
    public function testFindUserByIdIsArray()
    {
        $userModel = new UserModel();
        $userId = null;
        $expected = 'Not invalid';
        $actual = $userModel->findUserById($userId);
        $this->assertEquals($expected, $actual);
    }
    // Test trường hợp id là 1 object
    public function testFindUserByIdIsObject()
    {
        $userModel = new UserModel();
        $userId = new BankModel();
        $expected = 'Not invalid';
        $actual = $userModel->findUserById($userId);
        $this->assertEquals($expected, $actual);
    }
    // Test trường hợp id không tồn tại
    public function testFindUserByIdNotExist()
    {
        $userModel = new UserModel();
        $userId = 50;
        $user = $userModel->findUserById($userId);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test trường hợp id là kí tự
    public function testFindUserByIdIsCharacters()
    {
        $userModel = new UserModel();
        $userId = '@11';
        $expected = 'Not invalid';
        $actual = $userModel->findUserById($userId);
        $this->assertEquals($expected, $actual);
    }
    // End test findUserById
    // Huynh lam test cho function DeleteUserById
    // Test truong hop thanh cong
    public function testDeleteUserByIdOk()
    {
        $userModel = new UserModel();
        $idUser = 1;
        $user = $userModel->deleteUserById($idUser);
        if (!empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test truong hop sai
    public function testDeleteUserByIdNg()
    {
        $userModel = new UserModel();
        $idUser = 100;
        $user = $userModel->deleteUserById($idUser);
        if (!empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test truong hop id la chuoi
    public function testDeleteUserByIdIsString()
    {
        $userModel = new UserModel();
        $idUser = '1';
        $user = $userModel->deleteUserById($idUser);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test trường hợp id là số âm
    public function testDeleteUserByIdIsNegativeNumber()
    {
        $userModel = new UserModel();
        $idUser = -5;
        $user = $userModel->deleteUserById($idUser);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test trường hợp id là số thực
    public function testDeleteUserByIdIsDoubleNumber()
    {
        $userModel = new UserModel();
        $idUser = 5.5;
        $user = $userModel->deleteUserById($idUser);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test trường hợp id là null
    public function testDeleteUserByIdIsNull()
    {
        $userModel = new UserModel();
        $idUser = null;
        $user = $userModel->deleteUserById($idUser);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test trường hợp id là boolean(true/false)
    public function testDeleteUserByIdIsBoolean()
    {
        $userModel = new UserModel();
        $idUser = true;
        $user = $userModel->deleteUserById($idUser);
        if (!empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test trường hợp id là mảng
    public function testDeleteUserByIdIsArray()
    {
        $userModel = new UserModel();
        $idUser = [];
        $user = $userModel->deleteUserById($idUser);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test trường hợp id là 1 object
    public function testDeleteUserByIdIsObject()
    {
        $userModel = new UserModel();
        $idUser = new BankModel();
        $user = $userModel->deleteUserById($idUser);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test trường hợp id không tồn tại
    public function testDeleteUserByIdNotExist()
    {
        $userModel = new UserModel();
        $idUser = 100;
        $user = $userModel->deleteUserById($idUser);
        if (!empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test trường hợp id là kí tự
    public function testDeleteUserByIdIsCharacters()
    {
        $userModel = new UserModel();
        $idUser ='%%';
        $user = $userModel->deleteUserById($idUser);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // End test DeleteUserById
    // public function testAuthGood()
    // {
    //     $user = new UserModel();
    //     $username = 'huynh';
    //     $password = '123';
    //     $actual = $user->auth($username, $password);
    //     if (!empty($actual)) {
    //         return $this->assertTrue(true);
    //     }
    //     return $this->assertTrue(false);
    // }
    
    public function testUpdateUserGood()
    {
        $user = new UserModel();
        $input = array('id' => '15', 'name' => 'maihuynh', 'fullname' => 'huynh mai xuan', 'email' => 'example@gmail.com', 'type' => 'admin', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertFalse(true);
        }
    }
    public function testInsertUserGood()
    {
        $user = new UserModel();
        $input = array('name' => 'huynh', 'fullname' => 'mai xuan huynh', 'email' => 'example@gmail.com', 'type' => 'admin', 'password' => '1234');
        $actual = $user->insertUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertFalse(true);
        }
    }
    public function testGetInstance()
    {
        $user = new UserModel();
        $user = new UserModel();
        $actual = $user->getInstance();
        $actual2 = get_class($actual);
        // die();
        $expected = 'UserModel';
        $this->assertEquals($expected, $actual2);
    }
    
}
