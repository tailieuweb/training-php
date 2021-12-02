<?php
require_once './models/BankModel.php';
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
   public function testDeleteBankByIdOk() {

      $BankModel = new BankModel();
      
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
      
      
      $del = $BankModel->deleteBankById($id);
      
      if ($del==false) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }     
      }
   public function testDeleteBankByIdNgAm() {
      $BankModel = new BankModel();
      
      $id = -999999;         
      
      $Bank = $BankModel->deleteBankById($id);
      
      if ($Bank==false) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }     
   }
   public function testDeleteBankByIdSoThuc() {
      $BankModel = new BankModel();
      
      $id = 11.22;
      
      $Bank = $BankModel->deleteBankById($id);
      
      if ($Bank==false) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testDeleteBankByIdSpecialCharacters() {
      $BankModel = new BankModel();
      
      $id = '[@$]';
      
      $Bank = $BankModel->deleteBankById($id);
      
      if ($Bank==false) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testDeleteBankByIdIsArray() {
      $BankModel = new BankModel();
      
      $id = [];
      
      $Bank = $BankModel->deleteBankById($id);
      
      if ($Bank==false) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testDeleteBankByIdStr() {
      $BankModel = new BankModel();
      
      $id = 'asdf';
      
      
      $expected = false;
      $actual = $BankModel->deleteBankById($id);
      
      $this->assertEquals($expected, $actual);   
   }
   
   
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
   }
            
  
}