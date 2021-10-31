<?php
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    /**
     * Test case  findBankById OK
     */
    public function testFindBankByIdOk()
    {
        $bankModel = new BankModel();
        $bankId = 2;
        $cost = 11;

        $bank = $bankModel->findBankById($bankId);
        $actual = $bank[0]['cost'];

        $this->assertEquals($cost, $actual);
    }

     /**
     * Test case findUserById Not good
     */
    public function testFindBankByIdNg()
    {
        $bankModel = new BankModel();
        $bankId = 9999;
        $expected = null;

        $bank = $bankModel->findBankById($bankId);

        if(empty($bank)){
            $this->assertTrue(true);
        }
        else{
            $this->assertFalse(false);
        }
    }

    public function testFindBankByIdStr() 
    {
        $bankModel = new BankModel();
  
        $id = 'abc';
  
  
        $expected = 'error';
        $actual = $bankModel->findBankById($id);
  
        $this->assertEquals($expected, $actual);
  
    }

    public function testFindBankByIdNull() 
    {
        $bankModel = new BankModel();
        $id = '';
        $expected = 'error';
        $actual = $bankModel->findBankById($id);
  
        $this->assertEquals($expected, $actual);
  
    }

    public function testFindBankByIdObject() 
    {
        $bankModel = new BankModel();
  
        $id = new stdClass();
        $expected = 'error';
        $actual = $bankModel->findBankById($id);
  
        $this->assertEquals($expected, $actual);
    }
}