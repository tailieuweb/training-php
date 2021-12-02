<?php
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
   public function testFindUserByIdOk() {
      $userModel = new UserModel();
      
      $id = 2;
      $mongDoiUsername = 'test2';
      
      $user = $userModel->findUserById($id);        
      $this->assertEquals($mongDoiUsername, $user[0]['name']);    
   }
            
   public function testFindUserByIdNg() {
      $userModel = new UserModel();
      
      $id = 999999;
           
      $user = $userModel->findUserById($id);
      
      if ($user=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }     
   }
   public function testFindUserByIdNgAm() {
      $userModel = new UserModel();
      
      $id = -999999;         
      
      $user = $userModel->findUserById($id);
      
      if ($user=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }     
   }
   public function testFindUserByIdSoThuc() {
      $userModel = new UserModel();
      
      $id = 11.22;
      
      $user = $userModel->findUserById($id);
      
      if ($user=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testFindUserByIdSpecialCharacters() {
      $userModel = new UserModel();
      
      $id = '[@$]';
      
      $user = $userModel->findUserById($id);
      
      if ($user=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testFindUserByIdIsArray() {
      $userModel = new UserModel();
      
      $id = [];
      
      $user = $userModel->findUserById($id);
      
      if ($user=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testFindUserByIdStr() {
      $userModel = new UserModel();
      
      $id = 'asdf';
      
      
      $expected = 'error';
      $actual = $userModel->findUserById($id);
      
      $this->assertEquals($expected, $actual);   
   }
   
   
   public function testFindUserByIdNull() {
      $userModel = new UserModel();
      $id = null;
      $expected = 'error';
      $actual = $userModel->findUserById($id);
      $this->assertEquals($expected, $actual);   
   }
   
   public function testFindUserByIdObject() {
      $userModel = new UserModel();    
      $id = new stdClass();
      $expected = 'error';
      $actual = $userModel->findUserById($id);      
      $this->assertEquals($expected, $actual);      
   }
}