<?php
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    public function testFindBankByIdOk(){
        $bankModel = new BankModel();
        $id  = 13;
        $cost = '500';
        $banks = $bankModel->findBankById($id);
        $actual = $banks[0]['cost'];

        $this->assertEquals($cost, $actual);
    }
    public function testFindBankByIdNotOk(){
        $bankModel = new BankModel();
        $id  = 1333;
        $bank = $bankModel->findBankById($id);
        $expected = [];
        // var_dump($bank);die();
        $this->assertEquals($expected, $bank);
       
    }
    public function testFindBankByIdStr() {
        $bankModel = new BankModel();
        $id = 'aa';
        $expected = [];
        $bank = $bankModel->findBankById($id);//actual
        // var_dump($bank);die();

        $this->assertEquals($expected, $bank);

    }
    public function testFindUserByIdNull() {
        $bankModel = new BankModel();
        $id = '';
        $expected = [];
        $actual = $bankModel->findBankById($id);

        $this->assertEquals($expected, $actual);

    }
    public function testFindBankByIdObject() {
        $bankModel = new BankModel();
        $id = new stdClass();
        $expected = 'error';
        $actual = $bankModel->findBankById($id);
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);

    }
    //test findBank
    
  
}