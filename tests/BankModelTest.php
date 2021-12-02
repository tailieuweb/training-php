<?php
require_once './models/BankModel.php';
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
<<<<<<< HEAD
   public function testFindBankOk() {
=======
   public function testDeleteBankByIdOk() {

>>>>>>> origin/2-php-202109/2-groups/3-C/2-32-Tram-phpunit-DeleteBank
      $BankModel = new BankModel();
      $key = 2;
      $expected = 2;
      
<<<<<<< HEAD
      $Bank = $BankModel->findBank($key);
      
      $this->assertEquals($expected, $Bank[0]['user_id']);
      
   }
   public function testFindBankNg() {
      $BankModel = new BankModel();
      
      $key = 999999;
      
      $Bank = $BankModel->findBank($key);
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
>>>>>>> origin/2-php-202109/2-groups/3-C/2-32-Tram-phpunit-DeleteBank
      
      
      $del = $BankModel->deleteBankById($id);
      
      if ($del==false) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
<<<<<<< HEAD
      }
   }
   public function testFindBankNgAm() {
=======
      }     
      }
   public function testDeleteBankByIdNgAm() {
>>>>>>> origin/2-php-202109/2-groups/3-C/2-32-Tram-phpunit-DeleteBank
      $BankModel = new BankModel();
      
      $key = -999999;
      
<<<<<<< HEAD
      $Bank = $BankModel->findBank($key);
=======
      $Bank = $BankModel->deleteBankById($id);
>>>>>>> origin/2-php-202109/2-groups/3-C/2-32-Tram-phpunit-DeleteBank
      
      if ($Bank==false) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
<<<<<<< HEAD
   public function testFindBankSoThuc() {
=======
   public function testDeleteBankByIdSoThuc() {
>>>>>>> origin/2-php-202109/2-groups/3-C/2-32-Tram-phpunit-DeleteBank
      $BankModel = new BankModel();
      
      $key = 11.22;
      
<<<<<<< HEAD
      $Bank = $BankModel->findBank($key);
=======
      $Bank = $BankModel->deleteBankById($id);
>>>>>>> origin/2-php-202109/2-groups/3-C/2-32-Tram-phpunit-DeleteBank
      
      if ($Bank==false) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
<<<<<<< HEAD
   public function testFindBankSpecialCharacters() {
=======
   public function testDeleteBankByIdSpecialCharacters() {
>>>>>>> origin/2-php-202109/2-groups/3-C/2-32-Tram-phpunit-DeleteBank
      $BankModel = new BankModel();
      
      $key = '[@$]';
      
<<<<<<< HEAD
      $Bank = $BankModel->findBank($key);
=======
      $Bank = $BankModel->deleteBankById($id);
>>>>>>> origin/2-php-202109/2-groups/3-C/2-32-Tram-phpunit-DeleteBank
      
      if ($Bank==false) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
<<<<<<< HEAD
   public function testFindBankIsArray() {
=======
   public function testDeleteBankByIdIsArray() {
>>>>>>> origin/2-php-202109/2-groups/3-C/2-32-Tram-phpunit-DeleteBank
      $BankModel = new BankModel();
      
      $key = [];
      
<<<<<<< HEAD
      $Bank = $BankModel->findBank($key);
=======
      $Bank = $BankModel->deleteBankById($id);
>>>>>>> origin/2-php-202109/2-groups/3-C/2-32-Tram-phpunit-DeleteBank
      
      if ($Bank==false) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
<<<<<<< HEAD
   public function testFindBankStr() {
      $BankModel = new BankModel();
      
      $key = '3';
               
      $expected = '3';
      $Bank = $BankModel->findBank($key);
=======
   public function testDeleteBankByIdStr() {
      $BankModel = new BankModel();
      
      $id = 'asdf';
      
      
      $expected = false;
      $actual = $BankModel->deleteBankById($id);
>>>>>>> origin/2-php-202109/2-groups/3-C/2-32-Tram-phpunit-DeleteBank
      
      $this->assertEquals($expected, $Bank[0]['user_id']);   
   }
<<<<<<< HEAD
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
      $this->assertEquals($expected, $actual);      
>>>>>>> origin/2-php-202109/2-groups/3-C/2-32-Tram-phpunit-DeleteBank
   }
}