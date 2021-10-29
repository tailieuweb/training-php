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
       // var_dump($actual);die();
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
      //  var_dump($actual);die();
        if($actual == true){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }      
    }
    /**
     * Test case nhập user id không phải là kiểu int
     */
    public function testUpdateBankNg(){
        $bankModel = new BankModel();
        $bank = array(
            'id' => 23,
            'user_id' => 'm',
            'cost' => 5000
        ); 
        $actual = $bankModel->updateBank($bank);
        $actualBank = $bankModel->findBankById($bank['id']);
        $actualId = $actualBank[0]["user_id"];
        if($actual == true && $actualId == $bank['user_id']){
            $this->assertTrue(false);
        }else{
            $this->assertTrue(true);
        }   
    }
}