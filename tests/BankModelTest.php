<?php
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    public function testKhangFindBankByIdOk(){
        $bankModel = new BankModel();
        $id  = 13;
        $cost = '500';
        $banks = $bankModel->findBankById($id);
        $actual = $banks[0]['cost'];

        $this->assertEquals($cost, $actual);
    }
}