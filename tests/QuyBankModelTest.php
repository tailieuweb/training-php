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
    
    
}