<?php
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    //test findBankByID
    public function testFindBankByIdOK(){
         $bankModel = new BankModel();
         $Id = 1;
         $fullname = 'Nguyen A';

         $bank = $bankModel ->findBankById($Id);
         $actual = $bank[0]['fullname'];

         $this->assertEquals($fullname, $actual);
    }
    //test findBankByIDng
     public function testFindBankByIdNg(){
        $bankModel = new BankModel();
         $Id = 9999;

         $bank = $bankModel ->findBankById($Id);
         if(empty($bank)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    //test findBankByIdStr
    public function testFindBankByIdStr(){
        $bankModel = new BankModel();
         $Id = "adafa";

         $bank = $bankModel ->findBankById($Id);
         if(empty($bank)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    //test findBankById string empty
    public function testFindBankByIdStrEmpty(){
        $bankModel = new BankModel();
         $Id = "";

         $bank = $bankModel ->findBankById($Id);
         if(empty($bank)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    //test findBankByIdNull
    public function testFindBankByIdNull(){
        $bankModel = new BankModel();
         $Id = null;

         $bank = $bankModel ->findBankById($Id);
         if(empty($bank)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    //test findBankByIdArr
    public function testFindBankByIdArr(){
        $bankModel = new BankModel();
         $Id = [];

         $bank = $bankModel ->findBankById($Id);
         if(empty($bank)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    //test deletBankByIdOk
    public function testDeleteBankByIdOk(){
        $bankModel = new BankModel();
        $Id = 5;
        $excuted = true;
        $actual = $bankModel->deleteBanksById($Id);
        $this->assertEquals($excuted,$actual);
    }

    //test deleteBankByIdNg
    public function testDeleteBankByIdNg(){
        $bankModel = new BankModel();
        $Id = 999;
        //$excuted = false;
        $actual = $bankModel->deleteBanksById($Id);
        if(empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    //test deleteBankByIdNull
    public function testDeleteBankByIdNull(){
        $bankModel = new BankModel();
        $Id = null;
        //$excuted = true;
        $actual = $bankModel->deleteBanksById($Id);
        if(empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    
    //test deleteBankByIdStr
    public function testDeleteBankByIdStr(){
        $bankModel = new BankModel();
        $Id = "hellp";
        $actual = $bankModel->deleteBanksById($Id);
        if(empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    //test deleteBankByIdStr
    public function testDeleteBankByIdKey(){
        $bankModel = new BankModel();
        $Id = "****";
        $actual = $bankModel->deleteBanksById($Id);
        if(empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    
    

}