<?php
use PHPUnit\Framework\TestCase;

class MinhSang_BankModelTest extends TestCase
{
    //test findBankByID
    public function testFindBankByIdOK(){
         $bankModel = new BankModel();
         $Id = 1;
         $cost = 1111;

         $bank = $bankModel ->findBankById($Id);
         $actual = $bank[0]['cost'];

         $this->assertEquals($cost, $actual);
    }
    //test findBankByIDng
     public function testFindBankByIdNg(){
        $bankModel = new BankModel();
         $Id = -9999;

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
         $Id = ["aha","hello"];
         $bank = $bankModel ->findBankById($Id[0]);
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
        $id = -9999;
        $expected = true;
        $user = $bankModel->deleteBanksById($id);
        $actual = $user;
        $this->assertEquals($expected, $actual);
    }
    //test deleteBankByIdNull
    public function testDeleteBankByIdNull(){
        $bankModel = new BankModel();
        $id = null;
        $expected = false;
        $user = $bankModel->deleteBanksById($id);
        $actual = $user;
        $this->assertEquals($expected, $actual);
    }
    
    //test deleteBankByIdStr
    public function testDeleteBankByIdStr(){
        $bankModel = new BankModel();
        $id = "user1";
        $expected = false;
        $user = $bankModel->deleteBanksById($id);
        $actual = $user;
        $this->assertEquals($expected, $actual);
    }

    //test deleteBankByIdStr
    public function testDeleteBankByIdKey(){
        $bankModel = new BankModel();
        $id = "****";
        $expected = false;
        $user = $bankModel->deleteBanksById($id);
        $actual = $user;
        $this->assertEquals($expected, $actual);
    }

    public function testDeleteBankByIdNegative(){
        $bankModel = new BankModel();
        $id = -11;
        $expected = true;
        $user = $bankModel->deleteBanksById($id);
        $actual = $user;
        $this->assertEquals($expected, $actual);
    }
    
    

}