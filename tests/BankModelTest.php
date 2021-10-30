<?php
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    public function testKhangFindBankByIdOk(){
        $bankModel = new BankModel();
        $bankId  = 1;
        $bank = 'DAB';
        $banks = $bankModel->findBankById($bankId);
        $actual = $banks[0]['bank'];

        $this->assertEquals($bank, $actual);
    }
}