<?php
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
   public function testAuthOk() {
      $userModel = new UserModel();
      $username = 'test2';
      $password = 'a';
      $mongDoiUsername = 'test2';
      
      $auth = $userModel->auth($username,$password);
      
      $this->assertEquals($mongDoiUsername, $auth[0]['name']);        
   }
   public function testAuthUserWr() {
      $userModel = new UserModel();
      $username = 'ádafsd';
      $password = 'a';
      
      $auth = $userModel->auth($username,$password);
      
      if ($auth=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }   
   public function testAuthPassWr() {
      $userModel = new UserModel();
      $username = 'test2';
      $password = 'aaaa';
      
      $auth = $userModel->auth($username,$password);
      
      if ($auth=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testAuthStr() {
      $userModel = new UserModel();
      $username = 'test2';
      $password = 'a';
      $mongDoiUsername = 'test2';
      
      $auth = $userModel->auth($username,$password);
      
      $this->assertEquals($mongDoiUsername, $auth[0]['name']);
      
   }
   public function testAuthUserNumber() {
      $userModel = new UserModel();
      $username = 111;
      $password = 'a';
      $mongDoiUsername = '111';
      
      $auth = $userModel->auth($username,$password);
      
      $this->assertEquals($mongDoiUsername, $auth[0]['name']);
      
   }
   public function testAuthPassNumber() {
      $userModel = new UserModel();
      $username = 'test7';
      $password = 111;
      $mongDoiUsername = 'test7';
      
      $auth = $userModel->auth($username,$password);
      
      $this->assertEquals($mongDoiUsername, $auth[0]['name']);
      
   }
   public function testAuthUserCharacterSpecial() {
      $userModel = new UserModel();
      $username = '[][]]';
      $password = 'asd';
      $auth = $userModel->auth($username,$password);
      if ($auth=='error') {
         $this->assertTrue(true);
         } else {
         $this->assertTrue(false);
         }        
   }
   public function testAuthPassCharacterSpecial() {
      $userModel = new UserModel();
      $username = 'test2';
      $password = '!@#$!@#$';
      $auth = $userModel->auth($username,$password);
      if ($auth=='error') {
         $this->assertTrue(true);
         } else {
         $this->assertTrue(false);
         }        
   }
   public function testAuthUserIsArray() {
      $userModel = new UserModel();
      $username = [];
      $password = 'aasd';
      
      $auth = $userModel->auth($username,$password);
      
      if ($auth=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testAuthPassIsArray() {
      $userModel = new UserModel();
      $username = 'test2';
      $password = [];
      
      $auth = $userModel->auth($username,$password);
      
      if ($auth=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }         
   public function testAuthUserNull() {
      $userModel = new UserModel();
      $username = null;
      $password = 'aaaa';
      
      $auth = $userModel->auth($username,$password);
      
      if ($auth=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testAuthPassNull() {
      $userModel = new UserModel();
      $username = 'test2';
      $password = null;
      
      $auth = $userModel->auth($username,$password);
      
      if ($auth=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
}