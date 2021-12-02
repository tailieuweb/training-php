<?php

use PHPUnit\Framework\TestCase;

class HaiBankModelTest extends TestCase
{
    // test testUpdateBankOk
    public function testUpdateBankOk()
    {
        $bankModel = new BankModel();
        $input = [
            'id' => '2',
            'user_id' => '2',
            'cost' => '1111',
        ];
        $actual = $bankModel->updateBank($input);
        $this->assertEquals(true, $actual);
    }
    // test testUpdateBankNg no good
    public function testUpdateBankNg()
    {
        $bankModel = new BankModel();
        $input = [
            'id' => '21222',
            'user_id' => 'shdhs',
            'cost' => 'ddddd',
        ];
        $actual = $bankModel->updateBank($input);
        $this->assertEquals(true, $actual);
    }
    // test testUpdateBankNull 
    public function testUpdateBankNull()
    {
        $bankModel = new BankModel();
        $input = [
            'id' => null,
            'user_id' => null,
            'cost' => null,
        ];
        $actual = $bankModel->updateBank($input);
        $this->assertEquals(false, $actual);
    }
    // test testUpdateBankStrdb 
    public function testUpdateBankStrdb()
    {
        $bankModel = new BankModel();
        $input = [
            'id' => '%!!#',
            'user_id' => '%!!##',
            'cost' => '%!!##',
        ];
        $actual = $bankModel->updateBank($input);
        $this->assertEquals(false, $actual);
    }
     // test testUpdateBankString chuổi 
     public function testUpdateBankString()
     {
         $bankModel = new BankModel();
         $input = [
             'id' => 'abc',
             'user_id' => 'acee',
             'cost' => 'wfwdwf',
         ];
         $actual = $bankModel->updateBank($input);
         $this->assertEquals(false, $actual);
     }
}
