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

    public function testSumOkA()
    {
       $userModel = new UserModel();
       $a = 1;
       $b = "trang";
       $expected = "error";

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

    /**
     * Test find by user
     */
    public function  testFindUserByIdOk() {
        $userModel = new UserModel();
        $userId = 2;
        $expected = 'test2';

        $user = $userModel->findUserById($userId);
        $actual = $user[0]['name'];

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test find by IdNg
     */
    public function testFindUserByIdNg(){
        $userModel = new UserModel();
        $userId = 9999;

        $user = $userModel->findUserById($userId);

        if(empty($user)){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }
}