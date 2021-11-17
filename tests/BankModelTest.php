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
    public function testFindBankByIdObject(){
        $bankModel = new BankModel();
        $ob = (object)'1';     
        if(is_object($ob)){          
            $ob = '';
            $bankModel->findBankById($ob);
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }   
    }
    public function testFindBankByIdCharacters(){
        $bankModel = new BankModel();
        $cha = '/[0-9A-Za-z]/';
        $id = '%';     
        $bankModel->findBankById($id);
        if(!preg_match($cha, $id)){          
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }   
    }


    //Test findBank
    public function testFindBankOk() {
        $bankModel = new BankModel();    
        $id = 1;      
        $bank = $bankModel->findBank($id);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }

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
    public function testFindBankObject(){
        $bankModel = new BankModel();
        $ob = (object)'1';     
        if(is_object($ob)){          
            $ob = '';
            $bankModel->findBank($ob);
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }   
    }
    public function testFindBankCharacters(){
        $bankModel = new BankModel();
        $cha = '/[0-9A-Za-z]/';
        $keyword = '%';     
        $bankModel->findBank($keyword);
        if(!preg_match($cha, $keyword)){          
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
            'keyword' => 6
        );
        $actual =  $bankModel->getBanks($bank);
        if(!empty($actual)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
        
    }

}