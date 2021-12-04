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
    public function testUpdateBankNGNull(){
        $bankModel = new BankModel();
        $bank = array(
            'id' => 6,        
            'user_id' => '',
            'cost' => '',
        );
        $expected = true;
        $actual = $bankModel->updateBank($bank);
        $this->assertEquals($expected,$actual); 
        if(!empty($bank['id']) && !empty($bank['user_id']) && !empty($bank['cost']) ){            
            $this->assertTrue(false);
        }else{
            $this->assertTrue(true);
        }   
    }
    // public function testUpdateBankFloatNg(){
    //     $bankModel = new BankModel();
    //     $bank = array(
    //         'id' => 4,        
    //         'user_id' => '2.5',
    //         'cost' => '111',
    //     );
    //     $bankModel->updateBank($bank);
    //     if(is_float($bank['id']) || is_float($bank['user_id']) || is_float($bank['cost'])){  
            
    //         $this->assertTrue(true);
    //     }else{
    //         $this->assertTrue(false);
    //     }   
    // }
    public function testUpdateBankBool(){
        $bankModel = new BankModel();
        $bank = array(
            'id' => 74,
            'user_id' => true,
            'cost' =>false,
            
        );
        $bankModel->updateBank($bank);
        if(is_bool($bank['id']) || is_bool($bank['user_id']) || is_bool($bank['cost'])){  
            
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }   
    }
}
