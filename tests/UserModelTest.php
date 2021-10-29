<?php

use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    public function testFindUserByIdOk(){
        $userModel = new UserModel();
        $userId = 18;
        $userName = 'admin';

        $user = $userModel->findUserById($userId);
        $actual = $user[0]['name'];

        $this->assertEquals($userName,$actual);

    }
    public function testFindUserByIdNg(){
        $userModel = new UserModel();
        $userId = 9999;
        $userName = 'asdf';

        $user = $userModel->findUserById($userId);
        
        if(empty($user)){
            
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }

    }
    public function testSumOk()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 2;
        $expected = 3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    public function testSumNg()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 2;
        $expected = 3;

        $actual = $userModel->sumb($a, $b);
        if ($actual != 3) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    public function testTwoPositiveInt()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 2;
        $expected = 3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    public function testTwoNegativeInt()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = -2;
        $expected = -3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    public function testNegativePositiveInt()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = 2;
        $expected = 1;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    public function testSumFloat()
    {
        $userModel = new UserModel();
        $a = 1.5;
        $b = 2.33;
        $expected = 3.83;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    public function testSumPositiveFloat()
    {
        $userModel = new UserModel();
        $a = 1.5;
        $b = 2.33;
        $expected = 3.83;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    public function testSumNegativeFloat()
    {
        $userModel = new UserModel();
        $a = -1.5;
        $b = -2.33;
        $expected = -3.83;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    public function testNegativePositiveFloat()
    {
        $userModel = new UserModel();
        $a = -1.5;
        $b = 2.33;
        $expected = 0.83;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
}