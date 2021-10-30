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

    public function testSumOkam()
    {
       $userModel = new UserModel();
       $a = -1;
       $b = -2;
       $expected = -3;

       $actual = $userModel->sumb($a,$b);

       $this->assertEquals($expected, $actual);
    }

    public function testSumOkad()
    {
       $userModel = new UserModel();
       $a = -1;
       $b = 2;
       $expected = 1;

       $actual = $userModel->sumb($a,$b);

       $this->assertEquals($expected, $actual);
    }

    public function testSumOkDouble()
    {
       $userModel = new UserModel();
       $a = 1.5;
       $b = 2.5;
       $expected = 4;

       $actual = $userModel->sumb($a,$b);

       $this->assertEquals($expected, $actual);
    }

    public function testStr()
    {
       $userModel = new UserModel();
       $a = 1;
       $b = 'a';
       $expected = 'error';

       $actual = $userModel->sumb($a,$b);

       $this->assertEquals($expected, $actual);
    }

    public function testString()
    {
       $userModel = new UserModel();
       $a = 'a';
       $b = 'b';
       $expected = 'error';

       $actual = $userModel->sumb($a,$b);

       $this->assertEquals($expected, $actual);
    }

    //Test function insertUser OK
    public function testInsertUserOk()
    {
      $userModel = new UserModel();
      $input['name'] = 'le';
      $input['password']  = '1234';
      $input['fullname'] = 'lenguyentan';
      $input['email'] = 'tanle123@gmail.com';
      $input['type'] = 'admin';
      $userModel->insertUser($input);
      $ex = $userModel->findUserById(6);
      $expected = $input['name']['password']['fullname']['email']['type'];
      $actual = $ex[0]['name']['password']['fullname']['email']['type'];
      $this->assertEquals($expected, $actual);
    }

    //Test function insertUser not good
    public function testInsertUserNg()
    {
      $userModel = new UserModel();
      $input['name'] = 'tanle';
      $input['password']  = '12345';
      $input['fullname'] = 'nguyentanle';
      $input['email'] = 'tanle@gmail.com';
      $input['type'] = 'user';
      
      $user = $userModel->insertUser($input);
      $expected = $userModel->findUserById(6);
      if($expected != null){
         $this->assertTrue(true);
      }
      else{
         $this->assertFalse(false);
      }
    }
    
    //Test function getInstance
    public function testGetInstanceUser()
    {
        $this->assertInstanceOf('UserModel', UserModel::getInstance());
    }
}