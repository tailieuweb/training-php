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

       $actual = $userModel->sumb($a,$b);

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

        $actual = $userModel->sumb($a,$b);

        if ($actual != 3) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    public function testFindUserbyIdOk()
    {
        $userModel = new UserModel();
        $userId = 1;
        $userName = 'abc';
        $user = $userModel->findUserById($userId);
       
        $actual = $user[0]['name'];
        $this->assertEquals($userName, $actual);
    }
    public function testAuthOk()
    {
        $userModel = new UserModel();
        $userName = 'abc';
        $userPassword = '123';
        $user = $userModel->auth($userName);

        $actual = $user[4]['passsword'];
        $this->assertEquals($userPassword, $actual);
    }
}