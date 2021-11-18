<?php
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    //Tim id tại ví trí đầu tiên
    public function testFindBankbyIdOk()
    {
        $bankModel = new BankModel();
        $bankId = 1;
        $bankCost = '11';
        $bank = $bankModel->findBankById($bankId);
       
        $actual = $bank[0]['cost'];
        $this->assertEquals($bankCost, $actual);
    }

    
}