<?php

use PHPUnit\Framework\TestCase;

class QuyBankModelTest extends TestCase
{
    
    // test insert Bank ok
    public function testInsertBanksOk()
    {
        $bankmodel = new BankModel();
        $banks = array(
            'id' => 2,
            'user_id' => '2',
            'cost' => '1111',
            
        );
        $actual = $bankmodel->insertBank($banks);
        if ($actual == true) {
            $this->assertTrue(true);
        }else { 
            $this->assertTrue(false);
        }
    }
    // insert Bank Not Good
    public function testInsertBankNg()
    {
        $bankModel = new BankModel();
        $input = [];
        $input['id'] = -999991;
        $input['user_id'] = '111';
        $input['cost'] = "12345";
        $actual = $bankModel->insertBank( $input);
        if($actual != true)
        {
            $this->assertTrue(false); 
        }
        else
        {
            $this->assertTrue(true); 
        }
    }

 
   // insert Bank Null
   public function testInsertBankNull()
   {
       $bankModel = new BankModel();
       $input = [];
       $input['id'] = null;
       $input['user_id'] = '111';
       $input['cost'] = "12345";
       $actual = $bankModel->insertBank( $input);
       if($actual != true)
       {
           $this->assertTrue(false); 
       }
       else
       {
           $this->assertTrue(true); 
       }
   }
    // test insertBank Str
    public function testInsertBanksStr()
    {
       $bankModel = new BankModel();
       $input = [];
       $input['id'] = 'abc';
       $input['user_id'] = '111';
       $input['cost'] = "12345";
       $actual = $bankModel->insertBank( $input);
       if($actual != true)
       {
           $this->assertTrue(false); 
       }
       else
       {
           $this->assertTrue(true); 
       }
   }
    // test insertBank ky tu dat biet
    public function testInsertBanksStrDb()
    {
        $bankModel = new BankModel();
       $input = [];
       $input['id'] = '&^%%%^%';
       $input['user_id'] = '33';
       $input['cost'] = "12345";
       $actual = $bankModel->insertBank( $input);
       if($actual != true)
       {
           $this->assertTrue(false); 
       }
       else
       {
           $this->assertTrue(true); 
       }
    }
    public function testGetInstanceOk()
    {   
        $bankModel = new BankModel();
        $expected = BankModel::getInstance();
        $actual = $bankModel->getInstance();
        $this->assertEquals($expected,$actual);
    }
     //kiểm tra getInstance Null
     public function testGetInstanceNull(){
        $bankModel = new BankModel();
        $actual = $bankModel->getInstance();
        if($actual != null){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
    //kiểm tra getInstance Chuổi
    public function testGetInstanceStr(){
        $bankModel = new BankModel();
        $expected = 'abc';
        $actual = $bankModel->getInstance();
        if ($actual == $expected) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }   
    }
    //kiểm tra getInstance Chuổi ký tự đặc biệt
    public function testGetInstanceStrDb(){
        $bankModel = new BankModel();
        $expected = '@$#^!%$^%';
        $actual = $bankModel->getInstance();
        if ($actual == $expected) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }   
    }
   //kiểm tra getInstance Not Good
    public function testGetInstanceNG() {
        $bankModel = new BankModel();
        $expected = BankModel::getInstance();
        $actual = $bankModel->getInstance();
        if ($actual != $expected) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }   
    }
    
    
}
