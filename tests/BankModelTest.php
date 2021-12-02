<?php
require_once './models/BankModel.php';
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
<<<<<<< HEAD
   public function testGetBanksOk() {
=======
   public function testFindBankOk() {
>>>>>>> 2-php-202109/2-groups/3-C/2-32-Tram-phpunit-FindBank
      $BankModel = new BankModel();
      $key = 2;
      $expected = 2;
      
<<<<<<< HEAD
      $expected = '1';
      
      $Bank = $BankModel->getBanks();        
      $this->assertEquals($expected, $Bank[1]['user_id']);    
   }
                  
   public function testGetBanksNg() {
      $BankModel = new BankModel();
      
      $params['keyword'] = 999999;
        
      $Bank = $BankModel->getBanks($params);
=======
      $Bank = $BankModel->findBank($key);
      
      $this->assertEquals($expected, $Bank[0]['user_id']);
      
   }
   public function testFindBankNg() {
      $BankModel = new BankModel();
      
      $key = 999999;
      
      $Bank = $BankModel->findBank($key);
>>>>>>> 2-php-202109/2-groups/3-C/2-32-Tram-phpunit-FindBank
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
<<<<<<< HEAD
   public function testGetBanksNgAm() {
      $BankModel = new BankModel();
      
      $params['keyword'] = -999999;
        
      $Bank = $BankModel->getBanks($params);
=======
   public function testFindBankNgAm() {
      $BankModel = new BankModel();
      
      $key = -999999;
      
      $Bank = $BankModel->findBank($key);
>>>>>>> 2-php-202109/2-groups/3-C/2-32-Tram-phpunit-FindBank
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
<<<<<<< HEAD
   public function testGetBanksSoThuc() {
      $BankModel = new BankModel();
      
      $params['keyword'] = 1.1;
        
      $Bank = $BankModel->getBanks($params);
=======
   public function testFindBankSoThuc() {
      $BankModel = new BankModel();
      
      $key = 11.22;
      
      $Bank = $BankModel->findBank($key);
>>>>>>> 2-php-202109/2-groups/3-C/2-32-Tram-phpunit-FindBank
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
<<<<<<< HEAD
   public function testGetBanksSpecialCharacters() {
      $BankModel = new BankModel();
      
      $params['keyword'] = '[@$]';
        
      $Bank = $BankModel->getBanks($params);
=======
   public function testFindBankSpecialCharacters() {
      $BankModel = new BankModel();
      
      $key = '[@$]';
      
      $Bank = $BankModel->findBank($key);
>>>>>>> 2-php-202109/2-groups/3-C/2-32-Tram-phpunit-FindBank
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
<<<<<<< HEAD
   public function testGetBanksIsArray() {
      $BankModel = new BankModel();
      
      $params['keyword'] = [];
      
      $Bank = $BankModel->getBanks($params);
=======
   public function testFindBankIsArray() {
      $BankModel = new BankModel();
      
      $key = [];
      
      $Bank = $BankModel->findBank($key);
>>>>>>> 2-php-202109/2-groups/3-C/2-32-Tram-phpunit-FindBank
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
<<<<<<< HEAD
   public function testGetBanksStr() {
      $BankModel = new BankModel();
      
      $params['keyword'] = 'asdf';
      
      
      $expected = 'error';
      $actual = $BankModel->getBanks($params);
=======
   public function testFindBankStr() {
      $BankModel = new BankModel();
      
      $key = '3';
               
      $expected = '3';
      $Bank = $BankModel->findBank($key);
>>>>>>> 2-php-202109/2-groups/3-C/2-32-Tram-phpunit-FindBank
      
      $this->assertEquals($expected, $Bank[0]['user_id']);   
   }
<<<<<<< HEAD
   
   
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
=======
   public function testFindBankNull() {
      $BankModel = new BankModel();
      
      $key = null;
               
      $Bank = $BankModel->findBank($key);
      if ($Bank=='error') {
         $this->assertTrue(true);
         } else {
         $this->assertTrue(false);
         }
   }
   public function testFindBankObject() {
      $BankModel = new BankModel();
      
      $key = new stdClass();
               
      $mongDoi = 'error';
      $Bank = $BankModel->findBank($key);
      
      $this->assertEquals($mongDoi, $Bank);   
>>>>>>> 2-php-202109/2-groups/3-C/2-32-Tram-phpunit-FindBank
   }
}