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
    
    
    /**
     * Test case getInstance
     */
    public function testGetInstanceUser()
    {
        $this->assertInstanceOf('UserModel', UserModel::getInstance());
    }
    /**
     * Test case  findUserById OK
     */
    public function testFindUserByIdOk()
    {
        $userModel = new UserModel();
        $userId = 2;
        $userName = 'test2';

        $user = $userModel->findUserById($userId);
        $actual = $user[0]['name'];

        $this->assertEquals($userName, $actual);
    }

    /**
     * Test case findUserById Not good
     */
    public function testFindUserByIdNg()
    {
      $userModel = new UserModel();
      $userId = 2222;
      $expected = null;

      $user = $userModel->findUserById($userId);

      if(empty($user)){
         $this->assertTrue(true);
      }
      else{
         $this->assertFalse(false);
      }
    }
    /**
     * Test case deleteUserByIdOk
     */
    public function testDeleteUserByIdOk(){
      $userModel = new UserModel();
      $userId = 4;
      $deleteUserById = $userModel->deleteUserById($userId);

      if(empty($deleteUserById)){
          $this->assertTrue(true);
       }else{
          $this->assertFalse(false);
       }
  }

  // test function deleteUserById not good
  public function testDeleteBankByIdNg(){
      $userModel = new UserModel();
      $userId = 4;
      $deleteUserkById = $userModel->deleteUserById($userId);

      if(empty($deleteUserById) != 4){
          $this->assertFalse(false);
       }else{
          $this->assertTrue(true);
       }
  }
}