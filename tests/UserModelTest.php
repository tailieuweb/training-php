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
        $id = '6';
        $expected = 'test2';
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
    /* ***************************
    Start Test function FindUser
    ***************************** */
    public function testFindUserGoodWithName()
    {
        $user = new UserModel();
        $keys = "test2";
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserGoodWithEmail()
    {
        $user = new UserModel();
        $keys = "example@gmail.com";
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithNull()
    {
        $user = new UserModel();
        $keys = "";
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    public function testFindUserWithNameNotExit()
    {
        $user = new UserModel();
        $keys = "abc";
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    public function testFindUserWithEmailNotExit()
    {
        $user = new UserModel();
        $keys = "abc@gmail.com";
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    public function testFindUserWithNumber()
    {
        $user = new UserModel();
        $keys = "1";
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithSpecialSign()
    {
        $user = new UserModel();
        $keys = "%em#@";
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    /* ***************************
    End Test function FindUser
    ***************************** */
    public function testGetUserGoodWithString()
    {
        $user = new UserModel();
        $params = [];
        $params['keyword'] = 'nam';
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
        $username = 'thanh nhu';
        $password = '1234';
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
    /* ***************************
    Start Test function UpdateUser
    ***************************** */
    public function testUpdateUserGood()
    {
        $user = new UserModel();
        $input = array('id' => '2', 'name' => 'gia nam', 'fullname' => 'nguyen gia name', 'email' => 'example@gmail.com', 'type' => 'admin', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertFalse(true);
        }
    }
    public function testUpdateUserWithNotId()
    {
        $user = new UserModel();
        $input = array('id' => '', 'name' => 'gia nam', 'fullname' => 'nguyen gia name', 'email' => 'example@gmail.com', 'type' => 'admin', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != true) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithNameNull()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => '', 'fullname' => 'nguyen gia name', 'email' => 'example@gmail.com', 'type' => 'admin', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithFullNameNull()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'test3', 'fullname' => '', 'email' => 'example@gmail.com', 'type' => 'admin', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithEmailNull()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'test3', 'fullname' => '', 'email' => '', 'type' => 'admin', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithPasswordNull()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'test3', 'fullname' => 'nguyen gia han', 'email' => 'example@gmail.com', 'type' => 'admin', 'password' => '');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithTypeNull()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'test3', 'fullname' => 'nguyen gia han', 'email' => 'example@gmail.com', 'type' => '', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithTypeDifferenceFormat()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'test3', 'fullname' => 'nguyen gia han', 'email' => 'example@gmail.com', 'type' => 'guest', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithEmailDifferenceFormat()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'test3', 'fullname' => 'nguyen gia han', 'email' => 'example#nam.ul', 'type' => 'guest', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithNameDifferenceFormat()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'test3@$', 'fullname' => 'nguyen gia han', 'email' => 'example#nam.ul', 'type' => 'guest', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithFullNameDifferenceFormat()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'test3', 'fullname' => 'nguyen gia han#%', 'email' => 'example#nam.ul', 'type' => 'guest', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithSameEmail()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'test3', 'fullname' => 'nguyen gia han#%', 'email' => 'example@gmail.com', 'type' => 'guest', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    /* ***************************
    End Test function UpdateUser
    ***************************** */
    public function testInsertUserGood()
    {
        $user = new UserModel();
        $input = array('name' => 'gia nam', 'fullname' => 'nguyen gia name', 'email' => 'example@gmail.com', 'type' => 'admin', 'password' => '1234');
        $actual = $user->insertUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertFalse(true);
        }
    }
    public function testGetInstanceNull()
    {
        $user = new UserModel();
        $actual = $user->getInstance();
        $actual2 = get_class($actual);
        $expected = 'UserModel';
        $this->assertEquals($expected, $actual2);
    }
    public function testGetInstanceNotNull()
    {
        $user = new UserModel();
        $user1 = new UserModel();
        $user->getInstance();
        $actual = $user1->getInstance();
        $actual2 = get_class($actual);
        $expected = 'UserModel';
        $this->assertEquals($expected, $actual2);
    }
}
