<?php
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
   public function testGetUsersOk() {
      $userModel = new UserModel();
      
      $mongDoiUsername = 'test2';
      
      $user = $userModel->getUsers();        
      $this->assertEquals($mongDoiUsername, $user[0]['name']);    
   }
                  
   public function testGetUsersNg() {
      $userModel = new UserModel();
      
      $params['keyword'] = 999999;
        
      $user = $userModel->getUsers($params);
      
      if ($user=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }     
   }
   public function testGetUsersNgAm() {
      $userModel = new UserModel();
      
      $params['keyword'] = -999999;
        
      $user = $userModel->getUsers($params);
      
      if ($user=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }     
   }
   public function testGetUsersSoThuc() {
      $userModel = new UserModel();
      
      $params['keyword'] = 1.1;
        
      $user = $userModel->getUsers($params);
      
      if ($user=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testGetUsersSpecialCharacters() {
      $userModel = new UserModel();
      
      $params['keyword'] = '[@$]';
        
      $user = $userModel->getUsers($params);
      
      if ($user=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testGetUsersIsArray() {
      $userModel = new UserModel();
      
      $params['keyword'] = [];
      
      $user = $userModel->getUsers($params);
      
      if ($user=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testGetUsersStr() {
      $userModel = new UserModel();
      
      $params['keyword'] = 'asdf';
      
      
      $expected = 'error';
      $actual = $userModel->getUsers($params);
      
      $this->assertEquals($expected, $actual);   
   }
   
   
   public function testGetUsersNull() {
      $userModel = new UserModel();
      $params['keyword'] = null;
      $expected = 'test2';
      
      $user = $userModel->getUsers($params);        
      $this->assertEquals($expected, $user[0]['name']);   
   }
   
   public function testGetUsersObject() {
      $userModel = new UserModel();    
      $params['keyword'] = new stdClass();
      $expected = 'error';
      $actual = $userModel->getUsers($params);      
      $this->assertEquals($expected, $actual);      
   }
}