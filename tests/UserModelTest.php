<?php
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    //Test GetUsers ok
    public function testGetUsersOk(){
        $userModel = new UserModel();
        $userName = 'hackerasfasf';
        $user = $userModel->getusers($userName);
        
        $actual = $user[0]['name'];
        $this->assertEquals($userName, $actual);
     }
 
    //Test GetUsers not good
     public function testGetUsersNg(){
       $userModel = new UserModel();
       $userName = 'c';
       $user = $userModel->getusers($userName);
       
       $actual = $user[0]['name'];
       
       if($userName != $actual){
          $this->assertFalse(false);
       }else{
          $this->assertTrue(true);
       }
    }
    //Test GetUsers Double
    public function testGetUsersDouble()
    {
        $userModel = new UserModel();

        $params['keyword'] = 1.1;

        $User = $userModel->getUsers($params);

        if ($User == 'error') {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    //Test Get Users Special Character
    public function testGetUsersSpecialCharacters()
    {
        $userModel = new UserModel();

        $params['keyword'] = '[/**//#@^%$]';

        $User = $userModel->getUsers($params);

        if ($User == 'error') {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    //Test Get Users Is Array
    public function testGetUsersIsArray()
    {
        $userModel = new UserModel();

        $params['keyword'] = [];

        $User = $userModel->getUsers($params);

        if ($User == 'error') {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    //Test Get Users Is String
    public function testGetUsersStr()
    {
        $userModel = new UserModel();

        $params['keyword'] = 'abc';


        $expected = 'error';
        $actual = $userModel->getusers($params);

        $this->assertEquals($expected, $actual);
    }
    //Test Get Users Object
    public function testGetUsersObject()
    {
        $userModel = new UserModel();
        $params['keyword'] = new stdClass();
        $expected = 'error';
        $actual = $userModel->getUsers($params);
        $this->assertEquals($expected, $actual);
    }

    //Test get User By Id Ok
    public function testGetFindUserByIdOk()
   {
       $userModel = new UserModel();
       $userId = 3;
       $userName = 'hackerasfasf';

       $user = $userModel->findUserById($userId);
       $actual = $user[0]['name'];

       $this->assertEquals($userName, $actual);
    }

    //Test get User By Id Not Ok   
    public function testGetFindUserByIdNotOk()
    {
        $userModel = new UserModel();
        $userId = 20;
        $expected = [];
        $actual = $userModel->findUserById($userId);
        $this->assertEquals($expected, $actual);
    }

    //Test get User By String Id
    public function testGetFindUserByIdStr()
    {
        $userModel = new UserModel();
        $userIdid = 'cc';
        $expected = [];
        $actual = $userModel->findUserById($userIdid);
        $this->assertEquals($expected, $actual);
    }

    //Test get User By Id Null
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