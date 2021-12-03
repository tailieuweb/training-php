<?php
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    public function testDeleteBankByIdOK()
    {
        $bankModel = new BankModel();
        $id = 1;
        $findBank = $bankModel->findBankById($id);
        if (!empty($findBank)) {
            $delete =  $bankModel->deleteBankById($id);
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testDeleteBankByIdNG()
    {
        $bankModel = new BankModel();
        $id = 11111;
        $findBank = $bankModel->findBankById($id);
        if (!empty($findBank)) {
            $delete =  $bankModel->deleteBankById($id);
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    public function testUpdateBankOK(){
        $bankModel = new BankModel();
        $bank = array(  
            'id' => 6,        
            'user_id' => '1234',
            'cost' => '12344',
            
        );         
        $expected = true;
        $actual = $bankModel->updateBank($bank);
        $this->assertEquals($actual, $expected);   
    }
    // public function testGetBanksGood()
    // {
    //     $bankModel = new BankModel();
    //     $params['keyword']  = 11;
    //     $bank = $bankModel->getBanks($params);
    //     // var_dump($bank);
    //     // die();
    //     if (empty($bank[0])) {
    //         return $this->assertTrue(true);
    //     } else {
    //         return $this->assertTrue(false);
    //     }
    // }
    //
    public function testGetBanksNg()
    {
        $bankModel = new BankModel();
        $params['keyword']  = 1000;
        $bank = $bankModel->getBanks($params);
        if (empty($bank[0])) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // Test keyword là chuoi
    public function testGetBanksByIsString()
    {
        $bankModel = new BankModel();
        $params['keyword']  = '11';
        $bank = $bankModel->getBanks($params);
        if (empty($bank[0])) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // Test keyword là số âm
    // public function testGetBanksIsNegativeNum()
    // {
    //     $bankModel = new BankModel();
    //     $params['keyword']  = -11;
    //     $bank = $bankModel->getBanks($params);
    //     if (empty($bank[0])) {
    //         return $this->assertTrue(true);
    //     } else {
    //         return $this->assertTrue(false);
    //     }
    // }
    // Test keyword là số thuc
    // public function testGetBanksIsDouble()
    // {
    //     $bankModel = new BankModel();
    //     $params['keyword']  = 1.1;
    //     $bank = $bankModel->getBanks($params);
    //     if (empty($bank[0])) {
    //         return $this->assertTrue(true);
    //     } else {
    //         return $this->assertTrue(false);
    //     }
    // }
}
