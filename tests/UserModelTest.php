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

   public function testSumOkam()
   {
      $userModel = new UserModel();
      $a = -1;
      $b = -2;
      $expected = -3;

      $actual = $userModel->sumb($a, $b);

      $this->assertEquals($expected, $actual);
   }

   public function testSumOkad()
   {
      $userModel = new UserModel();
      $a = -1;
      $b = 2;
      $expected = 1;

      $actual = $userModel->sumb($a, $b);

      $this->assertEquals($expected, $actual);
   }

   public function testSumOkDouble()
   {
      $userModel = new UserModel();
      $a = 1.5;
      $b = 2.5;
      $expected = 4;

      $actual = $userModel->sumb($a, $b);

      $this->assertEquals($expected, $actual);
   }

   public function testStr()
   {
      $userModel = new UserModel();
      $a = 1;
      $b = 'a';
      $expected = 'error';

      $actual = $userModel->sumb($a, $b);

      $this->assertEquals($expected, $actual);
   }

   public function testString()
   {
      $userModel = new UserModel();
      $a = 'a';
      $b = 'b';
      $expected = 'error';

      $actual = $userModel->sumb($a, $b);

      $this->assertEquals($expected, $actual);
   }
   /***************************************************************/
   /*
     * Test function: findUser()
     * Author: Long
     */
   //Test find user with valid keyword & return 1 result
   public function testFindUserValid_OK()
   {
      $userModel = new UserModel();
      $keyword = 'test1';
      $actual = $userModel->findUser($keyword);
      // var_dump($actual); die;
      $this->assertEquals($keyword, $actual[0]['name']);
   }
   //Test find user with valid keyword true & return 1 result
   public function testFindUserValid_NG()
   {
      $userModel = new UserModel();
      $keyword = 'test1';
      $actual = $userModel->findUser($keyword);

      if ($actual[0]['name'] != $keyword) {
         $this->assertTrue(false);
      } else {
         $this->assertTrue(true);
      }
   }
   //Test find user with invalid keyword 
   public function testFindUserInvalid_NG()
   {
      $userModel = new UserModel();
      $keyword = 'test5';
      $actual = $userModel->findUser($keyword);
      if ($actual == null) {
         $this->assertTrue(true);
      } else {
         $this->assertTrue(false);
      }
   }
   //Test find user with valid keyword & return multi result 
   public function testFindUserMultiResult_NG()
   {
      $userModel = new UserModel();
      $keyword = 'test';
      $actual = $userModel->findUser($keyword);
      // var_dump($actual); die;
      if ($actual[0]['name'] == 'test1' && $actual[1]['name'] == 'test3') {
         $this->assertTrue(true);
      } else {
         $this->assertTrue(false);
      }
   }
   //Test find user with null input
   public function testFindUserNull_OK()
   {
      $userModel = new UserModel();
      $keyword = null;
      $actual = $userModel->findUser($keyword);
      // var_dump($actual); die;
      $this->assertEquals($actual[0]['id'], "1");
   }
   //Test find user with keyword is array
   public function testFindUserArray_NG()
   {
      $userModel = new UserModel();
      $keyword = ["long", "kunz"];
      try {
         $userModel->findUser($keyword);
      } catch (Throwable $e) {
         $this->assertTrue(true);
      }
   }
   //Test find user with keyword is object
   public function testFindUserObj_NG()
   {
      $userModel = new UserModel();
      $keyword = $userModel;
      try {
         $userModel->findUser($keyword);
      } catch (Throwable $e) {
         $this->assertTrue(true);
      }
   }
}
