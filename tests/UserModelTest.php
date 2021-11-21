<?php

use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{

    /**
     * Test case Not good
     */
    public function  testFindUserByIdNg()
    {
        $userModel = new UserModel();
        $userId = 999;
        $user = $userModel->findUserById($userId);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
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
    public function testSumOk2()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = -2;
        $expected = -3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    public function testSumOk3()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = 2;
        $expected = 1;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    public function testSumOk4()
    {
        $userModel = new UserModel();
        $a = 1.5;
        $b = 2.5;
        $expected = 4;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    public function testSumOk5()
    {
        $userModel = new UserModel();
        $a = -1.5;
        $b = -2.5;
        $expected = -4;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    public function testSumOk6()
    {
        $userModel = new UserModel();
        $a = -10;
        $b = 20;
        $expected = 10;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    public function testSumOk7()
    {
        $userModel = new UserModel();
        $a = -10;
        $b = '1';
        $expected = 'Invalid';

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    public function testSumOk8()
    {
        $userModel = new UserModel();
        $a = '-10';
        $b = '1';
        $expected = 'Invalid';

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }



    // public function testFindUserByIdOk()
    // {
    //     # code...
    //     $userModel = new UserModel();
    //     $userId = 5;
    //     $userName = 'Chanh';

    //     $expected = 'Invalid';
    //     $user = $userModel->findUserById($userId);
    //     $actual = $user[0]['name'];

    //     $this->assertEquals($userName, $actual);
    // }

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
}
