<?php
require_once './models/BankModel.php';
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
   public function testFindBankOk() {
      $BankModel = new BankModel();
      
      $id = 2;
      $expected = '1';
      
      $Bank = $BankModel->findBankById($id);        
      $this->assertEquals($expected, $Bank[0]['user_id']);    
   }
   public function testFindBankByIdNg() {
      $BankModel = new BankModel();
      
      $id = 999999;
           
      $Bank = $BankModel->findBankById($id);
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }     
   }
   public function testFindBankByIdNgAm() {
      $BankModel = new BankModel();
      
      $id = -999999;         
      
      $Bank = $BankModel->findBankById($id);
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }     
   }
   public function testFindBankByIdSoThuc() {
      $BankModel = new BankModel();
      
      $id = 11.22;
      
      $Bank = $BankModel->findBankById($id);
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testFindBankByIdSpecialCharacters() {
      $BankModel = new BankModel();
      
      $id = '[@$]';
      
      $Bank = $BankModel->findBankById($id);
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testFindBankByIdIsArray() {
      $BankModel = new BankModel();
      
      $id = [];
      
      $Bank = $BankModel->findBankById($id);
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testFindBankByIdStr() {
      $BankModel = new BankModel();
      
      $id = 'asdf';
      
      
      $expected = 'error';
      $actual = $BankModel->findBankById($id);
      
      $this->assertEquals($expected, $actual);   
   }
   
   
   public function testFindBankByIdNull() {
      $BankModel = new BankModel();
      $id = null;
      $expected = 'error';
      $actual = $BankModel->findBankById($id);
      $this->assertEquals($expected, $actual);   
   }
   
   public function testFindBankByIdObject() {
      $BankModel = new BankModel();    
      $id = new stdClass();
      $expected = 'error';
      $actual = $BankModel->findBankById($id);      
      $this->assertEquals($expected, $actual);      
   }
}