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
   /*
     * Test function: findUser()
     * Author: Long
     */
   //Test find user ok
   public function testFindUserOk()
   {
      $userModel = new UserModel();
      $keyword = 'test2';
      $actual = $userModel->findUser($keyword);
      var_dump($actual);
      die;
   }
}
