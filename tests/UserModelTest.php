<?php
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{

    /**
     * Test case Okie
     */
    public function testSumOk()
    {
       $UserModel = new UserModel();
       $a = 1;
       $b = 2;
       $expected = 3;

       $actual = $UserModel->sumb($a,$b);

       $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Not good
     */
    public function testSumNg()
    {
        $UserModel = new UserModel();
        $a = 1;
        $b = 2;

        $actual = $UserModel->sumb($a,$b);

        if ($actual != 3) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    public function testSumOkam()
    {
       $UserModel = new UserModel();
       $a = -1;
       $b = -2;
       $expected = -3;

       $actual = $UserModel->sumb($a,$b);

       $this->assertEquals($expected, $actual);
    }

    public function testSumOkad()
    {
       $UserModel = new UserModel();
       $a = -1;
       $b = 2;
       $expected = 1;

       $actual = $UserModel->sumb($a,$b);

       $this->assertEquals($expected, $actual);
    }

    public function testSumOkDouble()
    {
       $UserModel = new UserModel();
       $a = 1.5;
       $b = 2.5;
       $expected = 4;

       $actual = $UserModel->sumb($a,$b);

       $this->assertEquals($expected, $actual);
    }

    public function testStr()
    {
       $UserModel = new UserModel();
       $a = 1;
       $b = 'a';
       $expected = 'error';

       $actual = $UserModel->sumb($a,$b);

       $this->assertEquals($expected, $actual);
    }

    public function testString()
    {
       $UserModel = new UserModel();
       $a = 'a';
       $b = 'b';
       $expected = 'error';

       $actual = $UserModel->sumb($a,$b);

       $this->assertEquals($expected, $actual);
    }
    /*******************/
    
    /**
     * Test case getInstance
     */
    public function testGetInstanceUser()
    {
        $this->assertInstanceOf('UserModel', UserModel::getInstance());
    }
    /**
     * Test case FindUserById
    */
    /**
     * Test case  findUserById OK
     */
    public function testFindUserByIdOk()
    {
        $UserModel = new UserModel();
        $UserId = 2;
        $UserName = 'test2';

        $User = $UserModel->findUserById($UserId);
        $actual = $User[0]['name'];

        $this->assertEquals($UserName, $actual);
    }

    /**
     * Test case findUserById Not good
     */
    public function testFindUserByIdNg()
    {
      $UserModel = new UserModel();
      $UserId = 2222;
      $expected = null;

      $User = $UserModel->findUserById($UserId);

      if(empty($User)){
         $this->assertTrue(true);
      }
      else{
         $this->assertFalse(false);
      }
    }
    /**
     * Test case findUserById String
     */
    public function testFindUserByIdStr() 
    {
        $UserModel = new UserModel();
  
        $id = 'abc';
  
  
        $expected = 'error';
        $actual = $UserModel->findUserById($id);
  
        $this->assertEquals($expected, $actual);
  
    }

    /**
     * Test case findUserById Null
     */
    public function testFindUserByIdNull() 
    {
        $UserModel = new UserModel();
        $id = '';
        $expected = 'error';
        $actual = $UserModel->findUserById($id);
  
        $this->assertEquals($expected, $actual);
  
    }

    /**
     * Test case findUserById Object
     */
    public function testFindUserByIdObject() 
    {
        $UserModel = new UserModel();
  
        $id = new stdClass();
        $expected = 'error';
        $actual = $UserModel->findUserById($id);
  
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case DeleteUserById
     * 
    */
    /**
     * Test case deleteUserByIdOk
     */
    public function testDeleteUserByIdOk(){
      $UserModel = new UserModel();
      $UserId = 4;
      $deleteUserById = $UserModel->deleteUserById($UserId);

      if(empty($deleteUserById)){
          $this->assertTrue(true);
       }else{
          $this->assertFalse(false);
       }
  }

  // test function deleteUserById not good
  public function testDeleteUserByIdNg(){
      $UserModel = new UserModel();
      $UserId = 4;
      $deleteUserkById = $UserModel->deleteUserById($UserId);

      if(empty($deleteUserById) != 4){
          $this->assertFalse(false);
       }else{
          $this->assertTrue(true);
       }
  }
}