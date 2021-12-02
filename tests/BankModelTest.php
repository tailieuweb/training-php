<?php
require_once './models/BankModel.php';
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
   public function testGetBanksOk() {
      $BankModel = new BankModel();
      
      $expected = '1';
      
      $Bank = $BankModel->getBanks();        
      $this->assertEquals($expected, $Bank[1]['user_id']);    
   }
                  
   public function testGetBanksNg() {
      $BankModel = new BankModel();
      
      $params['keyword'] = 999999;
        
      $Bank = $BankModel->getBanks($params);
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }     
   }
   public function testGetBanksNgAm() {
      $BankModel = new BankModel();
      
      $params['keyword'] = -999999;
        
      $Bank = $BankModel->getBanks($params);
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }     
   }
   public function testGetBanksSoThuc() {
      $BankModel = new BankModel();
      
      $params['keyword'] = 1.1;
        
      $Bank = $BankModel->getBanks($params);
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testGetBanksSpecialCharacters() {
      $BankModel = new BankModel();
      
      $params['keyword'] = '[@$]';
        
      $Bank = $BankModel->getBanks($params);
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testGetBanksIsArray() {
      $BankModel = new BankModel();
      
      $params['keyword'] = [];
      
      $Bank = $BankModel->getBanks($params);
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testGetBanksStr() {
      $BankModel = new BankModel();
      
      $params['keyword'] = 'asdf';
      
      
      $expected = 'error';
      $actual = $BankModel->getBanks($params);
      
      $this->assertEquals($expected, $actual);   
   }
   
   
   public function testGetBanksNull() {
      $BankModel = new BankModel();
      $params['keyword'] = null;
      $expected = '1';
      
      $Bank = $BankModel->getBanks($params);        
      $this->assertEquals($expected, $Bank[0]['user_id']);   
   }
   
   public function testGetBanksObject() {
      $BankModel = new BankModel();    
      $params['keyword'] = new stdClass();
      $expected = 'error';
      $actual = $BankModel->getBanks($params);      
      $this->assertEquals($expected, $actual);      
   }
            
  
}