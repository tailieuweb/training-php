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

    /**
     * Test string
     */
    public function testString()
    {
        $userModel = new UserModel();
        $a = 'p';
        $b = 2;
        $expected = 'error';

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }


    /**
     * Test two string
     */
    public function testTwoString()
    {
        $userModel = new UserModel();
        $a = 'p';
        $b = 'ư';
        $expected = 'error';

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test findUserById
     */
    public function testFindUserById()
    {
        $userModel = new UserModel();
        $userID = '3';
        $actual = $userModel->findUserById($userID);
        if ($actual != null) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    //Test findUserById not good
    public function testFindUserByIdNg()
    {
        $userModel = new UserModel();
        $userID = 1;

        $actual = $userModel->findUserById($userID);

       if($actual != null){
           $this->assertTrue(false);
       }
       else{
            $this->assertTrue(true);
       }
    }

    //test findUserById with id is string
    public function testFindUserByIdStr(){
        $userModel = new UserModel();
        $userId = 'abc';
        $actual = $userModel->findUserById($userId);
        if ($actual != null) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
}
