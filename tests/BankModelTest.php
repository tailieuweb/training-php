<?php
require_once './models/BankModel.php';
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
<<<<<<< HEAD
<<<<<<< HEAD
   public function testGetBanksOk() {
=======
   public function testFindBankOk() {
>>>>>>> 2-php-202109/2-groups/3-C/2-32-Tram-phpunit-FindBank
=======
   public function testDeleteBankByIdOk() {

>>>>>>> 2-php-202109/2-groups/3-C/2-32-Tram-phpunit-DeleteBank
      $BankModel = new BankModel();
      $key = 2;
      $expected = 2;
      
<<<<<<< HEAD
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
=======
      $id = 5;         
      
      $Bank = $BankModel->deleteBankById($id);
      
      if ($Bank=='success') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }            
   }
   public function testDeleteBankByIdNg() {
      $BankModel = new BankModel();
      
      $id = 999999;
>>>>>>> 2-php-202109/2-groups/3-C/2-32-Tram-phpunit-DeleteBank
      
      
      $del = $BankModel->deleteBankById($id);
      
      if ($del==false) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
<<<<<<< HEAD
      }
   }
<<<<<<< HEAD
   public function testGetBanksNgAm() {
=======
      }     
      }
   public function testDeleteBankByIdNgAm() {
>>>>>>> 2-php-202109/2-groups/3-C/2-32-Tram-phpunit-DeleteBank
      $BankModel = new BankModel();
      
      $params['keyword'] = -999999;
        
      $Bank = $BankModel->getBanks($params);
=======
   public function testFindBankNgAm() {
      $BankModel = new BankModel();
      
<<<<<<< HEAD
      $key = -999999;
      
      $Bank = $BankModel->findBank($key);
>>>>>>> 2-php-202109/2-groups/3-C/2-32-Tram-phpunit-FindBank
=======
      $Bank = $BankModel->deleteBankById($id);
>>>>>>> 2-php-202109/2-groups/3-C/2-32-Tram-phpunit-DeleteBank
      
      if ($Bank==false) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
<<<<<<< HEAD
<<<<<<< HEAD
   public function testGetBanksSoThuc() {
      $BankModel = new BankModel();
      
      $params['keyword'] = 1.1;
        
      $Bank = $BankModel->getBanks($params);
=======
   public function testFindBankSoThuc() {
=======
   public function testDeleteBankByIdSoThuc() {
>>>>>>> 2-php-202109/2-groups/3-C/2-32-Tram-phpunit-DeleteBank
      $BankModel = new BankModel();
      
      $key = 11.22;
      
<<<<<<< HEAD
      $Bank = $BankModel->findBank($key);
>>>>>>> 2-php-202109/2-groups/3-C/2-32-Tram-phpunit-FindBank
=======
      $Bank = $BankModel->deleteBankById($id);
>>>>>>> 2-php-202109/2-groups/3-C/2-32-Tram-phpunit-DeleteBank
      
      if ($Bank==false) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
<<<<<<< HEAD
<<<<<<< HEAD
   public function testGetBanksSpecialCharacters() {
=======
   public function testDeleteBankByIdSpecialCharacters() {
>>>>>>> 2-php-202109/2-groups/3-C/2-32-Tram-phpunit-DeleteBank
      $BankModel = new BankModel();
      
      $params['keyword'] = '[@$]';
        
      $Bank = $BankModel->getBanks($params);
=======
   public function testFindBankSpecialCharacters() {
      $BankModel = new BankModel();
      
      $key = '[@$]';
      
<<<<<<< HEAD
      $Bank = $BankModel->findBank($key);
>>>>>>> 2-php-202109/2-groups/3-C/2-32-Tram-phpunit-FindBank
=======
      $Bank = $BankModel->deleteBankById($id);
>>>>>>> 2-php-202109/2-groups/3-C/2-32-Tram-phpunit-DeleteBank
      
      if ($Bank==false) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
<<<<<<< HEAD
<<<<<<< HEAD
   public function testGetBanksIsArray() {
=======
   public function testDeleteBankByIdIsArray() {
>>>>>>> 2-php-202109/2-groups/3-C/2-32-Tram-phpunit-DeleteBank
      $BankModel = new BankModel();
      
      $params['keyword'] = [];
      
<<<<<<< HEAD
      $Bank = $BankModel->getBanks($params);
=======
   public function testFindBankIsArray() {
      $BankModel = new BankModel();
      
      $key = [];
      
      $Bank = $BankModel->findBank($key);
>>>>>>> 2-php-202109/2-groups/3-C/2-32-Tram-phpunit-FindBank
=======
      $Bank = $BankModel->deleteBankById($id);
>>>>>>> 2-php-202109/2-groups/3-C/2-32-Tram-phpunit-DeleteBank
      
      if ($Bank==false) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
<<<<<<< HEAD
<<<<<<< HEAD
   public function testGetBanksStr() {
=======
   public function testDeleteBankByIdStr() {
>>>>>>> 2-php-202109/2-groups/3-C/2-32-Tram-phpunit-DeleteBank
      $BankModel = new BankModel();
      
      $params['keyword'] = 'asdf';
      
      
<<<<<<< HEAD
      $expected = 'error';
      $actual = $BankModel->getBanks($params);
=======
   public function testFindBankStr() {
      $BankModel = new BankModel();
      
      $key = '3';
               
      $expected = '3';
      $Bank = $BankModel->findBank($key);
>>>>>>> 2-php-202109/2-groups/3-C/2-32-Tram-phpunit-FindBank
=======
      $expected = false;
      $actual = $BankModel->deleteBankById($id);
>>>>>>> 2-php-202109/2-groups/3-C/2-32-Tram-phpunit-DeleteBank
      
      $this->assertEquals($expected, $Bank[0]['user_id']);   
   }
<<<<<<< HEAD
   
   
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
=======
   public function testDeleteBankByIdNull() {
      $BankModel = new BankModel();
      $id = null;
      $expected = false;
      $actual = $BankModel->deleteBankById($id);
      $this->assertEquals($expected, $actual);   
   }
   
   public function testDeleteBankByIdObject() {
      $BankModel = new BankModel();    
      $id = new stdClass();
      $expected = false;
      $actual = $BankModel->deleteBankById($id);      
>>>>>>> 2-php-202109/2-groups/3-C/2-32-Tram-phpunit-DeleteBank
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