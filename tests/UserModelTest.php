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
<<<<<<< HEAD
    /*
     * Test function: getUsers()
     * Author: Quyen
     */
    
   // test function testGetUsers ok
    public function testGetUsersOk(){
       $userModel = new UserModel();
       $userName = 'Quyen';
       $user = $userModel->getUsers($userName);
       
       $actual = $user[5]['name'];
       $this->assertEquals($userName, $actual);
    }

   //  test function testGetUsers not good
    public function testGetUsersNg(){
      $userModel = new UserModel();
      $userName = 'Quyen';
      $user = $userModel->getUsers($userName);
      
      $actual = $user[5]['name'];
      
      if($userName != $actual){
         $this->assertFalse(false);
      }else{
         $this->assertTrue(true);
      }
   }
    
   //  test function getUsers when search ok
    public function testGetUsersWhenSearchOk(){
       $userModel = new UserModel();
       $param['keyword'] = 'Quyen';

       $user = $userModel->getUsers($param);
       if(empty($user)){
          $this->assertTrue(true);
       }else{
          $this->assertFalse(false);
       }
    }
    
    //  test function getUsers when search not good
    public function testGetUsersWhenSearchNg(){
      $userModel = new UserModel();
      $param['keyword'] = 'Quyen';

      $user = $userModel->getUsers($param);
      if(empty($user) != $param){
         $this->assertFalse(false);
      }else{
         $this->assertTrue(true);
      }
   }

   // test function getUsers when search number
   public function testGetUsersWhenSearchNum(){
      $userModel = new UserModel();
      $param['keyword'] = 123;

      $user = $userModel->getUsers($param);
      if(empty($user) == $param){
         $this->assertTrue(true);
      }else{
         $this->assertFalse(false);
      }
   }

   // test function getUsers when search null
   public function testGetUsersWhenSearchNull(){
      $userModel = new UserModel();
      $param['keyword'] = Null;

      $user = $userModel->getUsers($param);
      if(empty($user) == $param){
         $this->assertTrue(true);
      }else{
         $this->assertFalse(false);
      }
   }
=======

    /**
     * Test case insertUser OK
     */
    public function testInsertUserOk()
    {
      $userModel = new UserModel();
      $userId = 6;
      $input['name'] = 'le';
      $input['password']  = '1234';
      $input['fullname'] = 'lenguyentan';
      $input['email'] = 'tanle123@gmail.com';
      $input['type'] = 'admin';
      $userModel->insertUser($input);
      $expected = $userModel->findUserById($userId);
      $actual = $expected[4]['name']['password']['fullname']['email']['type'];
      //var_dump($actual); die();
      $this->assertEquals($input['name']['password']['fullname']['email']['type'], $actual);
    }

   /**
     * Test case insertUser Not good
     */
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
>>>>>>> 1-php-202109/2-groups/9-I/master-phpunit
}