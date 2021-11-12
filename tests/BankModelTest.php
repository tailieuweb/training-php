<?php
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    // Test FindBankById
    public function testFindBankByIdOk(){
        $bankModel = new BankModel();
        $id  = 15;
        $expected = '388'; //Mong đợis
        $banks = $bankModel->findBankById($id);
        $actual = $banks[0]['cost']; //Thực tế

        $this->assertEquals($expected, $actual);
    }
    public function testFindBankByIdNotOk(){
        $bankModel = new BankModel();
        $id  = 1333;
        $actual = $bankModel->findBankById($id);
        $expected = [];
        // var_dump($bank);die();
        $this->assertEquals($expected, $actual);
       
    }
    public function testFindBankByIdStr() {
        $bankModel = new BankModel();
        $id = 'aa';
        $expected = [];
        $actual = $bankModel->findBankById($id);//actual
        // var_dump($bank);die();

        $this->assertEquals($expected, $actual);

    }
    public function testFindBankByIdNull() {
        $bankModel = new BankModel();
        $id = '';
        $expected = [];
        $actual = $bankModel->findBankById($id);

        $this->assertEquals($expected, $actual);

    }
    public function testFindBankByIdObjectOk(){
        $bankModel = new BankModel();
        $ob = (object)'15';
        $bank = array(
            'id' => $ob,
            'cost' => 388
        );        
        if(is_object($bank['id']) || is_object($bank['cost'])){          
            $bank['id'] = null;
            $bankModel->findBankById($bank);
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }   
    }


    //Test findBank
    public function testFindBankOk() {
        $bankModel = new BankModel();    
        $keyword = 6;
        $expected = array( '22233');
        $actual =  $bankModel->findBank($keyword);
        $this->assertEquals($actual[0],['user_id'],$expected);
    }
    // public function testFindBankNg() {
    //     $bankModel = new BankModel();
    //     $keyword = 999999;
    //     $bank = $bankModel->findBank($keyword);
    //     if (empty($bank)) {
    //         $this->assertTrue(true);
    //     } else {
    //         $this->assertTrue(false);
    //     }
    // }
    public function testFindBankNotOk(){
        $bankModel = new BankModel();
        $keyword  = 6;
        $bank = $bankModel->findBank($keyword);
        $expected = [];
        // var_dump($bank);die();
        $this->assertEquals($expected, $bank);
       
    }
    public function testFindBankStr() {
        $bankModel = new BankModel();
        $keyword = 'aa';
        $expected = [];
        $actual = $bankModel->findBank($keyword);//actual
        // var_dump($bank);die();

        $this->assertEquals($expected, $actual);

    }
    public function testFindBankNull() {
        $bankModel = new BankModel();
        $keyword = '';
        $expected = [];
        $actual = $bankModel->findBank($keyword);

        $this->assertEquals($expected, $actual);

    }
    public function testFindBankObjectOk(){
        $bankModel = new BankModel();
        $ob = (object)'2';
        $bank = array(
            'user_id' => $ob,
            'cost' => 388
        );        
        if(is_object($bank['user_id']) || is_object($bank['cost'])){          
            $bank['user_id'] = null;
            $bankModel->findBank($bank);
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }   
    }


    //Test GetBanks
    public function testGetBanks(){
        $bankModel = new BankModel();    
        $actual =  $bankModel->getBanks();
       
        if(!empty($actual)){          
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
public function testGetBanksFindNg(){
        $bankModel = new BankModel();      
        $bank = array(
            'keyword' => 388
        );
        $actual =  $bankModel->getBanks($bank);
        if(!empty($actual)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
        
    }

}