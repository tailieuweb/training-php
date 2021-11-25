<?php
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    //Tim id tại vị có id hợp lệ
    public function testFindBankbyIdOk()
    {
        $bankModel = new BankModel();
        $bankId = 1;
        $bankCost = '11';
        $bank = $bankModel->findBankById($bankId);
       
        $actual = $bank[0]['cost'];
        $this->assertEquals($bankCost, $actual);
    }
    //Tim id tại vị có id không hợp lệ
    public function testFindBankByIdNG(){
        $bankModel = new BankModel();
        $id  = 1000000;
        $actual = $bankModel->findBankById($id);
        $expected = [];
       
        $this->assertEquals($expected, $actual);
       
    }
}