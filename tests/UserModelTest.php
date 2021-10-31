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
        // $expected = "LE VAN LAM";
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testGetUserGoodWithString()
    {
        $user = new UserModel();
        $params = [];
        $params['keyword'] = 'chien';
        // $expected = "LE VAN LAM";
        $actual = $user->getUsers($params);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testGetUserGoodWithNull()
    {
        $user = new UserModel();
        $keys = "";
        // $expected = "LE VAN LAM";
        $actual = $user->getUsers($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testAuthGood()
    {
        $user = new UserModel();
        $username = 'chien';
        $password = '123';
        $actual = $user->auth($username, $password);
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
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
        $input = array('id' => '2', 'name' => 'gia nam', 'fullname' => 'nguyen Ngoc Chien', 'email' => 'example@gmail.com', 'type' => 'admin', 'password' => '123');
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
}
