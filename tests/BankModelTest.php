<?php
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertTrue;

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
        $expected = true; 
        $actual = $bankModel->insertBank($bank);
        $this->assertEquals($actual,$expected);   
    }
     /**
     * Test case nhập user id và cost không phải là kiểu int
     */
    public function testInsertBankStringNg(){
        $bankModel = new BankModel();
        $bank = array(
            'user_id' => 'v',
            'cost' => 4423
        ); 
         $bankModel->insertBank($bank);
        if(is_numeric($bank['user_id']) && is_numeric($bank['cost'])){          
            $this->assertTrue(false);
        }else{
            $this->assertTrue(true);
        }   
    }
    /**
     * Test case nhập user id và cost null
     */
    public function testInsertBankNullNg(){
        $bankModel = new BankModel();
        $bank = array(
            'user_id' => '',
            'cost' => 4423
        ); 
         $bankModel->insertBank($bank);
        if(empty($bank['user_id']) || empty($bank['cost'])){          
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }   
    }
    /**
     * Test case nhập user id hoặc cost là Object
     */
    public function testInsertBankObjectNg(){
        $bankModel = new BankModel();
        $ob = (object)'12';
        $bank = array(
            'user_id' => $ob,
            'cost' => 4423
        );        
        if(is_object($bank['user_id']) || is_object($bank['cost'])){          
            $bank['user_id'] = null;
            $bankModel->insertBank($bank);
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
            'id' => 72,
            'user_id' => 23,
            'cost' => 200
        ); 
        $expected = true;
        $actual = $bankModel->updateBank($bank);
        $this->assertEquals($actual, $expected);   
    }
    /**
     * Test case nhập user id và cost không phải là kiểu int
     */
    public function testUpdateBankNgString(){
        $bankModel = new BankModel();
        $bank = array(
            'id' => 73,
            'user_id' => 'm',
            'cost' => 'm'
        );
        $bankModel->updateBank($bank);
        if(is_numeric($bank['user_id']) == true && is_numeric($bank['cost']) == true){           
            $this->assertTrue(false);
        }else{
            $this->assertTrue(true);
        }   
    }
     /**
     * Test case nhập user id và cost rỗng
     */
    public function testUpdateBankNgEmpty(){
        $bankModel = new BankModel();
        $bank = array(
            'id' => 74,
            'user_id' => NULL,
            'cost' => NULL
        );
        $expected = true;
        $actual = $bankModel->updateBank($bank);
        $this->assertEquals($expected,$actual); 
        if(!empty($bank['user_id']) && !empty($bank['cost'])){           
            $this->assertTrue(false);
        }else{
            $this->assertTrue(true);
        }   
    }

    /**
     * Test case nhập user id và cost rỗng
     */
    public function testUpdateBankNgObject(){
        $bankModel = new BankModel();
        $ob = (object)'12';
        $bank = array(
            'id' => 74,
            'user_id' => $ob,
            'cost' => '4264'
        );
   
        if(is_object($bank['user_id']) || is_object($bank['cost'])){  
            $bank['user_id'] = null;
            $bankModel->updateBank($bank);
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }   
    }





     /**
     * Test case find user_id
     */
    public function testGetBanksFind(){
        $bankModel = new BankModel();      
        $bank = array(
            'keyword' => 1
        );
        $actual =  $bankModel->getBanks($bank);
        if(!empty($actual)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
        
    }
    /**
     * Test case find user_id not good
     */
    public function testGetBanksFindNg(){
        $bankModel = new BankModel();      
        $bank = array(
            'keyword' => 235
        );
        $actual =  $bankModel->getBanks($bank);
        if(!empty($actual)){
            $this->assertTrue(false);
        }else{
            $this->assertTrue(true);
        }
        
    }
    /**
     * Test case find user_id
     */
    public function testGetBanksUser(){
        $bankModel = new BankModel();    
        $actual =  $bankModel->getBanks();
       
        if(!empty($actual)){          
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
    // public function testGetBanksUserNg(){
    //     $bankModel = new BankModel();    
    //     $actual =  $bankModel->getBanks();
       
    //     if(!empty($actual)){          
    //         $this->assertTrue(false);
    //     }else{
    //         $this->assertTrue(true);
    //     }
    // }
}