<?php
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase{
    /**
     * Test case Okie
     */
    public function testInsertBankOk(){
        $bankModel = new BankModel();
        $bank = array(
            'user_id' => 1,
            'cost' => 2000
        ); 
        $actual = $bankModel->insertBank($bank);
        //var_dump($actual);die();
        if($actual == true){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }      
    }
}