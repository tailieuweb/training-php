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
    public function testFindUserByIdWithInteger()
    {
        $user = new UserModel();
        $id = '1';
        $expected = 'test1';
        $actual = $user->findUserById($id);
        $this->assertEquals($expected, $actual[0]['name']);
    }
    public function testFindUserByIdWithString()
    {
        $user = new UserModel();
        $id = 'hai';
        $actual = $user->findUserById($id);
        if ($actual == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testFindUserGoodWithString()
    {
        $user = new UserModel();
        $keys = "test1";
        // $expected = "";
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }


    // public function testAuthGood()
    // {
    //     $user = new UserModel();
    //     $username = 'chien';
    //     $password = '123';
    //     $actual = $user->auth($username, $password);
    //     if (!empty($actual)) {
    //         return $this->assertTrue(true);
    //     }
    //     return $this->assertTrue(false);
    // }
    public function testDeleteUserByIdGood()
    {
        $user = new UserModel();
        $id = '3';
        $actual = $user->deleteUserById($id);
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    public function testUpdateUserGood()
    {
        $user = new UserModel();
        $input = array('id' => '2', 'name' => 'test2', 'fullname' => 'nguyen Ngoc Chien', 'email' => 'example@gmail.com', 'type' => 'admin', 'password' => '123');
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
        $input = array('name' => 'gia nam', 'fullname' => 'nguyen Ngoc Chien', 'email' => 'example@gmail.com', 'type' => 'admin', 'password' => '123');
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

    // Chien lam test GetUsers
    public function testGetUsersGood()
    {
        $userModel = new UserModel();
        $keyword = 'test1';
        $expected = 'test1';
        $user = $userModel->getUsers($keyword);
        $actual = $user[0]['name'];
        $this->assertEquals($expected, $actual);
    }
    // Test trường hợp sai
    public function testGetUsersNg()
    {
        $userModel = new UserModel();
        $keyword = 'chien';
        $actual = $userModel->getUsers($keyword);
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // Test keyword là số
    public function testGetUsersByIsNum()
    {
        $userModel = new UserModel();
        $keyword = 12;
        $expected = 'test1';
        $user = $userModel->getUsers($keyword);
        $actual = $user[0]['name'];
        $this->assertEquals($expected, $actual);
    }
    // Test keyword là số âm
    public function testGetUsersIsNegativeNum()
    {
        $userModel = new UserModel();
        $keyword = -5;
        $expected = 'test1';
        $user = $userModel->getUsers($keyword);
        $actual = $user[0]['name'];
        $this->assertEquals($expected, $actual);
    }
    // Test keyword là số thuc
    public function testGetUsersIsDouble()
    {
        $userModel = new UserModel();
        $keyword = 10.5;
        $expected = 'test1';
        $user = $userModel->getUsers($keyword);
        $actual = $user[0]['name'];
        $this->assertEquals($expected, $actual);
    }
    // Test keyword là mảng
    public function testGetUsersIsArray()
    {
        $userModel = new UserModel();
        $keyword = ['chien'];
        $expected = 'test1';
        $user = $userModel->getUsers($keyword);
        $actual = $user[0]['name'];
        $this->assertEquals($expected, $actual);
    }
    // Test keyword là null
    public function testGetUsersIsNull()
    {
        $userModel = new UserModel();
        $keyword = null;
        $expected = 'test1';
        $user = $userModel->getUsers($keyword);
        $actual = $user[0]['name'];
        $this->assertEquals($expected, $actual);
    }
    // Test keyword là boolean(true/false)
    public function testGetUsersIsBoolean()
    {
        $userModel = new UserModel();
        $keyword = true;
        $user = $userModel->getUsers($keyword);
        if ($user != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // Test keyword không tồn tại
    public function testGetUsersIsNotExist()
    {
        $userModel = new UserModel();
        $keyword = 'chien';
        $user = $userModel->getUsers($keyword);
        if ($user != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // Test keyword có 1 khoảng trắng
    public function testGetUsersIsOneSpace()
    {
        $userModel = new UserModel();
        $keyword = 'gia nam';
        $user = $userModel->getUsers($keyword);
        if ($user != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // Test keyword có từ 2 khoảng trắng
    public function testGetUsersIsMoreSpace()
    {
        $userModel = new UserModel();
        $keyword = 'gia  nam';
        $user = $userModel->getUsers($keyword);
        if ($user != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // End chien lam
}
