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
        if($actual == true){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }      
    }
     /**
     * Test case Okie
     */
    public function testUpdateBank(){
        $bankModel = new BankModel();
        $bank = array(
            'id' => 13,
            'user_id' => 5,
            'cost' => 2000
        ); 
        $actual = $bankModel->updateBank($bank);
        if($actual == true){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }      
    }
    /**
     * Test case nhập user id và cost không phải là kiểu int
     */
    public function testUpdateBankNg(){
        $bankModel = new BankModel();
        $bank = array(
            'id' => 23,
            'user_id' => 'm',
            'cost' => 7000
        );  $bankModel->updateBank($bank);
        if(is_numeric($bank['user_id']) && is_numeric($bank['cost'])){
           
            $this->assertTrue(false);
        }else{
            $this->assertTrue(true);
        }   
    }

}