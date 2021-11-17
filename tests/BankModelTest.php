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
     * Test case nhập user id và cost là không phải kiểu int
     */
    public function testInsertBankStringNg(){
        $bankModel = new BankModel();
        $bank = array(
            'user_id' => 'vv',
            'cost' => '#$'
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
        $ob = new DateTime;
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
     * Test case nhập user id hoặc cost là Object
     */
    public function testInsertBankBooltNg(){
        $bankModel = new BankModel();
        $bank = array(
            'user_id' => true,
            'cost' => 4423
        );        
           $bankModel->insertBank($bank);
        if(is_bool($bank['user_id']) || is_bool($bank['cost'])){          
         
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }   
    }

    /**
     * Test case nhập user id hoặc cost là Object
     */
    public function testInsertBankDoubleNg(){
        $bankModel = new BankModel();
        $bank = array(
            'user_id' => 12.23,
            'cost' => 4423
        );        
           $bankModel->insertBank($bank);
        if(is_double($bank['user_id']) || is_double($bank['cost'])){          
         
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }   
    }

    /**
     * Test case nhập user id hoặc cost là Object
     */
    public function testInsertSpecialcharactersNg(){
        $bankModel = new BankModel();
        $pattern = '/[0-9]/';
        $bank = array(
            'user_id' => '@$@$',
            'cost' => 4423
        );        
           $bankModel->insertBank($bank);
        if(!preg_match($pattern, $bank['user_id'])){          
         
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
    public function testUpdateBankNgNull(){
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
    public function testUpdateBankObjectNg(){
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
     * Test case nhập user id và cost rỗng
     */
    public function testUpdateBankBoolNg(){
        $bankModel = new BankModel();
        $bank = array(
            'id' => 74,
            'user_id' => true,
            'cost' => '4264'
        );
        $bankModel->updateBank($bank);
        if(is_bool($bank['user_id']) || is_bool($bank['cost'])){  
            
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }   
    }

    /**
     * Test case nhập user id và cost rỗng
     */
    public function testUpdateBankDoubleNg(){
        $bankModel = new BankModel();
        $bank = array(
            'id' => 74,
            'user_id' => 23.55,
            'cost' => '4264'
        );
        $bankModel->updateBank($bank);
        if(is_double($bank['user_id']) || is_double($bank['cost'])){  
            
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }   
    }

    /**
     * Test case nhập user id và cost rỗng
     */
    public function testUpdateBankSpecialcharactersNg(){
        $bankModel = new BankModel();
        $pattern = '/[0-9]/';
        $bank = array(
            'id' => 74,
            'user_id' => '@%@%#',
            'cost' => '4264'
        );
        $bankModel->updateBank($bank);
        if(!preg_match($pattern, $bank['user_id'])){  
            
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }   
    }

}