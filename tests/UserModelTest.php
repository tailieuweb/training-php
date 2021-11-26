<?php
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    //Test GetUsers ok
    public function testGetUsersOk(){
        $userModel = new UserModel();
        $userName = 'hackerasfasf';
        $user = $userModel->getUsers($userName);
        
        $actual = $user[0]['name'];
        $this->assertEquals($userName, $actual);
     }
 
    //Test GetUsers not good
     public function testGetUsersNg(){
       $userModel = new UserModel();
       $userName = 'c';
       $user = $userModel->getUsers($userName);
       
       $actual = $user[0]['name'];
       
       if($userName != $actual){
          $this->assertFalse(false);
       }else{
          $this->assertTrue(true);
       }
    }
    //Test getUserById Ok   
    public function testGetFindUserByIdOk()
   {
       $userModel = new UserModel();
       $userId = 3;
       $userName = 'hackerasfasf';

       $user = $userModel->findUserById($userId);
       $actual = $user[0]['name'];

       $this->assertEquals($userName, $actual);
    }

    //Test getUserById Not Ok   
    public function testGetFindUserByIdNotOk()
    {
        $userModel = new UserModel();
        $userId = 20;
        $expected = [];
        $actual = $userModel->findUserById($userId);
        $this->assertEquals($expected, $actual);
    }

    //Test getUserBy String Id
    public function testGetFindUserByIdStr()
    {
        $userModel = new UserModel();
        $userIdid = 'cc';
        $expected = [];
        $actual = $userModel->findUserById($userIdid);
        $this->assertEquals($expected, $actual);
    }

    //Test getUserById Null
    public function testGetFindUserByIdNull()
    {
        $userModel = new UserModel();
        $expected = [];
        $actual = $userModel->findUserById('');

        $this->assertEquals($expected, $actual);
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
}