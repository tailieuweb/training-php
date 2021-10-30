<?php
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{

    /**
     * Test case Okie
     */
    public function testSumOk() {
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
     * Test case plus 2 negative numbers.
     */
    public function testSumNegativeNumber()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = -2;
        $expected = -3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case plus 1 negative number.
     */
    public function testSumAmDuong()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = 2;
        $expected = 1;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case plus 1 R number.
     */
    public function testSumRNumbers()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 2;
        $expected = 3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    /**
    * Test case plus str and number.
    */
    public function testSumStrAndNum()
    {
        $userModel = new UserModel();
        $a = "1";
        $b = 2;
      
        $expected = 3;
        $actual = $userModel->sumb($a, $b);
        $this->assertEquals($expected, $actual);
    }
    /**
    * Test case plus str and str.
    */
    public function testSumStrAndStr()
    {
        $userModel = new UserModel();
        $a = "1";
        $b = "2";
 
        $expected = 3;
        $actual = $userModel->sumb($a, $b);
        $this->assertEquals($expected, $actual);
    }
   /**
    * Test case convert String to number.
    */
    public function testConvertStrToNum(){
         $userModel = new UserModel();
         $input = "1";
         
         $expected = 1;
         $actual = $userModel->convertNumber($input);
         $this->assertEquals($expected, $actual);
    }
    /**
    * Test case convert String to number.
    */
    public function testConvertNumToNum(){
      $userModel = new UserModel();
      $input = 1;
      
      $expected = 1;
      $actual = $userModel->convertNumber($input);
      $this->assertEquals($expected, $actual);
 }
 public function testFindUserByIdOk() {
   $userModel = new UserModel();
   
   $id = 1;
   $mongDoiUsername = 'test1';
   
   $user = $userModel->findUserById($id);
   
   $this->assertEquals($mongDoiUsername, $user[0]['name']);
   
   }
   
   
   public function testFindUserByIdNg() {
   $userModel = new UserModel();
   
   $id = 999999;
   
   
   $user = $userModel->findUserById($id);
   
   if (empty($user)) {
   $this->assertTrue(true);
   } else {
   $this->assertTrue(false);
   }
   
   }
   
   public function testFindUserByIdStr() {
   $userModel = new UserModel();
   
   $id = 'test1';
   
   
   // $expected = 'error';
   $actual = $userModel->findUserById($id);
   if (empty($user)) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   
   }
   
   
   public function testFindUserByIdNull() {
   $userModel = new UserModel();
   $id = '';
   $expected = 'error';
   $actual = $userModel->findUserById($id);
   
   if (empty($user)) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   
   }
}
