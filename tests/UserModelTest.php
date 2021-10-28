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

    public function testSumStr(){
        $userModel = new UserModel();

        $a = 1;
        $b = "a";

        $userModel->sumb($a,$b);
        $this->assertTrue(true);
    }

    public function testFindUserByIdNotOk()
    {
        $userModel = new UserModel();
        $userID = 2;
        $user = $userModel->findUserById($userID);

        if(!empty($user)){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }

    public function testFindUserByIdOk()
    {
        $userModel = new UserModel();
        $userID = 2;
        $userName = 'test2';
        $user = $userModel->findUserById($userID);
        $actual = $user[0]['name'];
        $this->assertEquals($userName, $actual);
    }
}