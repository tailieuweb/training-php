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
    public function testGetInstance()
    {
        $user = new UserModel();
        $user = new UserModel();
        $actual = $user->getInstance();
        $actual2 = get_class($actual);
        // die();
        $expected = 'UserModel';
        $this->assertEquals($expected, $actual2);
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
  
  
        $expected = 'Not invalid';
        $actual = $UserModel->findUserById($id);
  
        $this->assertEquals($expected, $actual);
  
    }
    public function testFindUserByIdIsString()
    {
        $userModel = new UserModel();
        $userId = '123';
        $expected = 'Not invalid';
        $actual = $userModel->findUserById($userId);
        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case findUserById Null
     */
    public function testFindUserByIdNull() 
    {
        $UserModel = new UserModel();
        $id = '';
        $expected = 'Not invalid';
        $actual = $UserModel->findUserById($id);
  
        $this->assertEquals($expected, $actual);
  
    }
    public function testFindUserByIdIsNegativeNumber()
    {
        $userModel = new UserModel();
        $userId = -10;
        $expected = 'Not invalid';
        $actual = $userModel->findUserById($userId);
        $this->assertEquals($expected, $actual);
    }
    // Test trường hợp id là số thực
    public function testFindUserByIdIsDoubleNumber()
    {
        $userModel = new UserModel();
        $userId = 2.5;
        $expected = 'Not invalid';
        $actual = $userModel->findUserById($userId);
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case findUserById Object
     */
    public function testFindUserByIdObject() 
    {
      $userModel = new UserModel();
      $userId = new BankModel();
      $expected = 'Not invalid';
      $actual = $userModel->findUserById($userId);
      $this->assertEquals($expected, $actual);
    }
    // Test trường hợp id là boolean(true/false)
    public function testFindUserByIdIsBoolean()
    {
        $userModel = new UserModel();
        $userId = true;
        $actual = $userModel->findUserById($userId);
        if (empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test trường hợp id là mảng
    public function testFindUserByIdIsArray()
    {
        $userModel = new UserModel();
        $userId = null;
        $expected = 'Not invalid';
        $actual = $userModel->findUserById($userId);
        $this->assertEquals($expected, $actual);
    }
    // Test trường hợp id không tồn tại
    public function testFindUserByIdNotExist()
    {
        $userModel = new UserModel();
        $userId = 50;
        $user = $userModel->findUserById($userId);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test trường hợp id là kí tự
    public function testFindUserByIdIsCharacters()
    {
        $userModel = new UserModel();
        $userId = '@11';
        $expected = 'Not invalid';
        $actual = $userModel->findUserById($userId);
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
  // test function deleteUserById string
  public function testDeleteByIdString(){
   $UserModel = new UserModel();
   $idUser = 'luan';
   $deleteUserById = $UserModel->deleteUserById($idUser);
   
   if(empty($deleteUserById)){
       $this->assertFalse(false);
   }else{
       $this->assertTrue(True);
   }
}

// test function deleteUserById null
public function testDeleteByIdNull(){
   $UserModel = new UserModel();
   $idUser = null;
   $deleteUserById = $UserModel->deleteUserById($idUser);
   
   if(empty($deleteUserById)){
       $this->assertTrue(true);
   }else{
       $this->assertFalse(false);
   }
}

// test function deleteUserById array
public function testDeleteByIdArray(){
   $UserModel = new UserModel();
   $idUser = array(1,2,3);
   
   try{
       $UserModel->deleteUserById($idUser);
   }catch(Throwable $e){
       $this->assertTrue(True);
   }
}

// test function deleteUserById Object
public function testDeleteByIdObject(){
   $UserModel = new UserModel();
   $idUser = new stdClass();
   
   
   try{
       $UserModel->deleteUserById($idUser);
   }catch(Throwable $e){
       $this->assertTrue(True);
   }
   }
   public function testDeleteUserByIdGood(){
    
      $userModel = new UserModel();
      $idUser = '1';
      $user = $userModel->deleteUserById($idUser);
      if (empty($user)) {
          $this->assertTrue(true);
      } else {
          $this->assertTrue(false);
      }
  }
  // Test trường hợp id là số âm
  public function testDeleteUserByIdIsNegativeNumber()
  {
      $userModel = new UserModel();
      $idUser = -5;
      $user = $userModel->deleteUserById($idUser);
      if (empty($user)) {
          $this->assertTrue(true);
      } else {
          $this->assertTrue(false);
      }
  }
  // Test trường hợp id là số thực
  public function testDeleteUserByIdIsDoubleNumber()
  {
      $userModel = new UserModel();
      $idUser = 5.5;
      $user = $userModel->deleteUserById($idUser);
      if (empty($user)) {
          $this->assertTrue(true);
      } else {
          $this->assertTrue(false);
      }
  }
  // Test trường hợp id là boolean(true/false)
  public function testDeleteUserByIdIsBoolean()
  {
      $userModel = new UserModel();
      $idUser = true;
      $user = $userModel->deleteUserById($idUser);
      if (!empty($user)) {
          $this->assertTrue(true);
      } else {
          $this->assertTrue(false);
      }
  }
  // Test trường hợp id không tồn tại
  public function testDeleteUserByIdNotExist()
  {
      $userModel = new UserModel();
      $idUser = 100;
      $user = $userModel->deleteUserById($idUser);
      if (!empty($user)) {
          $this->assertTrue(true);
      } else {
          $this->assertTrue(false);
      }
  }
  // Test trường hợp id là kí tự
  public function testDeleteUserByIdIsCharacters()
  {
      $userModel = new UserModel();
      $idUser ='%%';
      $user = $userModel->deleteUserById($idUser);
      if (empty($user)) {
          $this->assertTrue(true);
      } else {
          $this->assertTrue(false);
      }
  }
}
   