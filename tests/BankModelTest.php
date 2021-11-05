<?php
use PHPUnit\Framework\TestCase;
require_once 'models/BankModel.php';
class BankModelTest extends TestCase
{
    /*testFindBankById*/
    public function testFindBankByIdOk() {				
        $bankModel = new BankModel();				
                        
        $id = 9;				
        $mongDoiUserID = '3';				
                        
        $bank = $bankModel->findBankById($id);				
                        
        $this->assertEquals($mongDoiUserID, $bank[0]['user_id']);				
                        
    }
    public function testFindBankByIdNg() {			
        $bankModel = new BankModel();		                   
            $id = 999999;			        
            $bank = $bankModel->findBankById($id);			
                        
            if (empty($bank)) {			
            $this->assertTrue(true);			
            } else {			
            $this->assertTrue(false);			
            }			             
     }
     public function testFindBankByIdStr() {			
        $bankModel = new BankModel();		 			      
        $id = 'asdf';			           
        $expected = 'error';			
        $actual = $bankModel->findBankById($id);				
                    
        $this->assertEquals($expected, $actual);			
                    
    }						
    public function testFindUserByIdNull() {			
        $bankModel = new BankModel();				
            $id = '';			
            $expected = 'error';			
            $actual = $bankModel->findBankById($id);			
                        
            $this->assertEquals($expected, $actual);			
                        
    }	
    // public function testFindUserByIdObject() {			
    //     $bankModel = new BankModel();				
                            
    //             $id = new stdClass();			
    //             $expected = 'error';			
    //             $actual = $userModel->findBankById($id);			
                            
    //             $this->assertEquals($expected, $actual);			
    // }					
    /*testInsertBank */
    public function testInsertBankOk(){
        $bankModel = new BankModel();
        $input = [
            'user_id' => '10',
            'cost' => '5000',
            ];
        $actual = $bankModel->insertBank($input);
        $this->assertEquals(true, $actual);
    } 
    public function testInsertBankStr(){
        $bankModel = new BankModel();
        $input = [
            'user_id' => 'abc',
            'cost' => 'nam ngan',
            ];
        $actual = $bankModel->insertBank($input);
        $this->assertEquals(false, $actual);
    } 
    public function testInsertBankNull(){
        $bankModel = new BankModel();
        $input = [
            'user_id' => '',
            'cost' => '',
            ];
        $actual = $bankModel->insertBank($input);
        $this->assertEquals(false, $actual);
    } 
    /*testDeleteBankByID */
    public function testDeleteBankByIdOk(){
        $bankModel = new BankModel();
        $id = 42;
        $actual = $bankModel->deleteBankById($id);
        $this->assertEquals(true, $actual);
    } 
    public function testDeleteBankByIdStr(){
        $bankModel = new BankModel();
        $id = 'ádsajdh';
        $actual = $bankModel->deleteBankById($id);
        $this->assertEquals(false, $actual);
    }
    public function testDeleteBankByIdNull(){
        $bankModel = new BankModel();
        $id = '';
        $actual = $bankModel->deleteBankById($id);
        $this->assertEquals(false, $actual);
    }  
    /*testUpdateBank */
    public function testUpdateBankOk(){
        $bankModel = new BankModel();
        $input = [
            'id' => '11',
            'user_id' => '10',
            'cost' => '5000',
            ];
        $actual = $bankModel->updateBank($input);
        $this->assertEquals(true, $actual);
    } 
    public function testUpdateBankStr(){
        $bankModel = new BankModel();
        $input = [
            'id' => '11',
            'user_id' => 'dsadasđ',
            'cost' => 'sdwdw',
            ];
        $actual = $bankModel->updateBank($input);
        $this->assertEquals(false, $actual);
    } 
    public function testUpdateBankNull(){
        $bankModel = new BankModel();
        $input = [
            'id' => '11',
            'user_id' => '',
            'cost' => '',
            ];
        $actual = $bankModel->updateBank($input);
        $this->assertEquals(false, $actual);
    } 
}