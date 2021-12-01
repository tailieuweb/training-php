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
    // test insert Bank null
    public function testInsertBanksNull()
    {
        $bankmodel = new BankModel();
        $banks = array(
            'id' =>[],
            'user_id' => '',
            'cost' => '',
            
        );
        $actual = $bankmodel->insertBank($banks);
        if ($actual == true) {
            $this->assertTrue(true);
        }else { 
            $this->assertTrue(false);
        }
    }
    // test insert Bank Not Good
    public function testInsertBanksNg()
    {
        $bankmodel = new BankModel();
        $banks = array(
            'id' =>6,
            'user_id' => '',
            'cost' => '',
            
        );
        $actual = $bankmodel->insertBank($banks);
        if ($actual == true) {
            $this->assertTrue(true);
        }else { 
            $this->assertTrue(false);
        }
    }
    // test insertBank Str
    public function testInsertBanksStr()
    {
        $bankmodel = new BankModel();
        $banks = array(
            'id' =>'asd',
            'user_id' => '',
            'cost' => '',
            
        );
        $actual = $bankmodel->insertBank($banks);
        if ($actual == true) {
            $this->assertTrue(true);
        }else { 
            $this->assertTrue(false);
        }
    }
    // test insertBank ky tu dat biet
    public function testInsertBanksStrDb()
    {
        $bankmodel = new BankModel();
        $banks = array(
            'id' =>'@#$%',
            'user_id' => '',
            'cost' => '',
            
        );
        $actual = $bankmodel->insertBank($banks);
        if ($actual == true) {
            $this->assertTrue(true);
        }else { 
            $this->assertTrue(false);
        }
    }
    
    
}
