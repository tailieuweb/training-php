<?php
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
   public function testFindUserOk() {
      $userModel = new UserModel();
      $key = 'test2';
      $mongDoiUsername = 'test2';
      
      $user = $userModel->findUser($key);
      
      $this->assertEquals($mongDoiUsername, $user[0]['name']);
      
   }
   public function testFindUserNg() {
      $userModel = new UserModel();
      
      $key = 999999;
      
      $user = $userModel->findUser($key);
      
      if ($user=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testFindUserNgAm() {
      $userModel = new UserModel();
      
      $key = -999999;
      
      $user = $userModel->findUser($key);
      
      if ($user=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testFindUserSoThuc() {
      $userModel = new UserModel();
      
      $key = 11.22;
      
      $user = $userModel->findUser($key);
      
      if ($user=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testFindUserSpecialCharacters() {
      $userModel = new UserModel();
      
      $key = '[@$]';
      
      $user = $userModel->findUser($key);
      
      if ($user=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testFindUserIsArray() {
      $userModel = new UserModel();
      
      $key = [];
      
      $user = $userModel->findUser($key);
      
      if ($user=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testFindUserStr() {
      $userModel = new UserModel();
      
      $key = 'test7';
               
      $mongDoiUsername = 'test7';
      $user = $userModel->findUser($key);
      
      $this->assertEquals($mongDoiUsername, $user[0]['name']);   
   }
   public function testFindUserNull() {
      $userModel = new UserModel();
      
      $key = null;
               
      $user = $userModel->findUser($key);
      if ($user=='error') {
         $this->assertTrue(true);
         } else {
         $this->assertTrue(false);
         }
   }
   public function testFindUserObject() {
      $userModel = new UserModel();
      
      $key = new stdClass();
               
      $mongDoi = 'error';
      $user = $userModel->findUser($key);
      
      $this->assertEquals($mongDoi, $user);   
   }
}