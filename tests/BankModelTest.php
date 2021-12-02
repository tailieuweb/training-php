<?php
require_once './models/BankModel.php';
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
   public function testFindBankOk() {
      $BankModel = new BankModel();
      $key = 2;
      $expected = 2;
      
      $Bank = $BankModel->findBank($key);
      
      $this->assertEquals($expected, $Bank[0]['user_id']);
      
   }
   public function testFindBankNg() {
      $BankModel = new BankModel();
      
      $key = 999999;
      
      $Bank = $BankModel->findBank($key);
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testFindBankNgAm() {
      $BankModel = new BankModel();
      
      $key = -999999;
      
      $Bank = $BankModel->findBank($key);
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testFindBankSoThuc() {
      $BankModel = new BankModel();
      
      $key = 11.22;
      
      $Bank = $BankModel->findBank($key);
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testFindBankSpecialCharacters() {
      $BankModel = new BankModel();
      
      $key = '[@$]';
      
      $Bank = $BankModel->findBank($key);
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testFindBankIsArray() {
      $BankModel = new BankModel();
      
      $key = [];
      
      $Bank = $BankModel->findBank($key);
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testFindBankStr() {
      $BankModel = new BankModel();
      
      $key = '3';
               
      $expected = '3';
      $Bank = $BankModel->findBank($key);
      
      $this->assertEquals($expected, $Bank[0]['user_id']);   
   }
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
   }
}