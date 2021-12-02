<?php

use PHPUnit\Framework\TestCase;

class Phu_UserModelTest extends TestCase
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
    /**
     * Test case so am
     */
    public function testSumAm()
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
    /**
     * Test case am duong
     */
    public function testSumAD()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = 2;

        $actual = $userModel->sumb($a, $b);

        if ($actual != 1) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    /**
     * Test case so thuc
     */
    public function testSumSoThuc()
    {
        $userModel = new UserModel();
        $a = 3.2;
        $b = 1.2;

        $actual = $userModel->sumb($a, $b);

        if ($actual != 4.4) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    /**
     * Test case str
     */
    public function testStr()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 'a';

        $expected = 'error';
        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case strvsstr
     */
    public function testChuoivsChuoi()
    {
        $userModel = new UserModel();
        $a = 'bb';
        $b = 'aa';

        $expected = 'bbaa';
        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserOk()
    {
        $userModel = new UserModel();
        $user = array(
            'id' => 30,
            'name' => 'abcd',
            'fullname' => 'hoangphu',
            'type' => '0',
            'email' => 'hhhpppp@gmail.com',
            'password' => '1234567'
        );
        $actual = $userModel->updateUser($user);
        if ($actual == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testUpdateUserNull()
    {
        $userModel = new UserModel();
        $user = array(
            'id' => null,
            'name' => '',
            'fullname' => '',
            'type' => '',
            'email' => '',
            'password' => ''
        );
        $actual = $userModel->updateUser($user);
        if ($actual == false) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    public function testUpdateUser_idsai()
    {
        $userModel = new UserModel();
        $user = array(
            'id' => 4,
            'name' => 'abcd',
            'fullname' => 'hoangphu',
            'type' => 'admin',
            'email' => 'hhhpppp@gmail.com',
            'password' => '1234567'
        );
        $actual = $userModel->updateUser($user);
        if ($actual == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
}
