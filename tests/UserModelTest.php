<?php
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
   public function testDeleteUserByIdOk() {

      $userModel = new UserModel();
      
      $id = 5;         
      
      $del = $userModel->deleteUserById($id);
      
      if ($del==true) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }                      
   }
   public function testDeleteUserByIdNg() {
      $userModel = new UserModel();
      
      $id = 999999;
      
      
      $del = $userModel->deleteUserById($id);
      
      if ($del==false) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }     
      }
   public function testDeleteUserByIdNgAm() {
      $userModel = new UserModel();
      
      $id = -999999;         
      
      $user = $userModel->deleteUserById($id);
      
      if ($user==false) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }     
   }
   public function testDeleteUserByIdSoThuc() {
      $userModel = new UserModel();
      
      $id = 11.22;
      
      $user = $userModel->deleteUserById($id);
      
      if ($user==false) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testDeleteUserByIdSpecialCharacters() {
      $userModel = new UserModel();
      
      $id = '[@$]';
      
      $user = $userModel->deleteUserById($id);
      
      if ($user==false) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testDeleteUserByIdIsArray() {
      $userModel = new UserModel();
      
      $id = [];
      
      $user = $userModel->deleteUserById($id);
      
      if ($user==false) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testDeleteUserByIdStr() {
      $userModel = new UserModel();
      
      $id = 'asdf';
      
      
      $expected = false;
      $actual = $userModel->deleteUserById($id);
      
      $this->assertEquals($expected, $actual);   
   }
   
   
   public function testDeleteUserByIdNull() {
      $userModel = new UserModel();
      $id = null;
      $expected = false;
      $actual = $userModel->deleteUserById($id);
      $this->assertEquals($expected, $actual);   
   }
   
   public function testDeleteUserByIdObject() {
      $userModel = new UserModel();    
      $id = new stdClass();
      $expected = false;
      $actual = $userModel->deleteUserById($id);      
      $this->assertEquals($expected, $actual);      
   }
}