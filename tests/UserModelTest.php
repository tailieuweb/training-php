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
    public function testStr()
    {
        $userModel = new UserModel();
        $a = 1;
        $b ='a';

        
        $expected = 'error';
        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    public function testFindUserByIdok()
    {
        $userModel = new UserModel();
        $userId = 2;
        $userName = 'test2'; 
        $user = $userModel->findUserById($userId);
        $actual = $user[0]['name'];
        $this->assertEquals($userName, $actual);

    }
    public function testGetUserok()
    {
        $userModel = new UserModel();
        $userId = 2;
        $userName = 'test2'; 
        $user = $userModel->getUsers($userId);
        $actual = $user[0]['name'];
        $this->assertEquals($userName, $actual);
        

    }
}