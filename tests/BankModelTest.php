<?php
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{

    /**
     * Test case Okie
     */

    //auth
    public function testAuthGood(){
        //Vĩnh
        $bankModel = BankModel::getInstance();
        $username = "vinhvo";
        $password = "123456";
        $expected_name = "vinhvo";
        $user =  (array)$bankModel->auth($username,$password);
        $this->assertEquals($expected_name,$user[0]['name']);
        
    }
    public function testAuthNotGood(){
        //Vĩnh
        $bankModel = BankModel::getInstance();
        $username = "vinhvo";
        $password = "123457";
        $user = (array)$bankModel->auth($username,$password);
        if(empty($user)){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }
    public function testAuth_matchRegexGood(){
        //Vĩnh
        $username = "vinhvo";
        $password = "123456";
        $this->assertTrue(BankModel::matchRegexLogin($username,$password));
    }
    public function testAuth_matchRegexNotGood(){
        //Vĩnh
        $username = "Vinh*vo";
        $password = "123456";
        $this->assertFalse(BankModel::matchRegexLogin($username,$password));
    }
 

    //deleteUserById
    public function testDeleteUserByIdGood(){
        //Vĩnh
        $bankModel = BankModel::getInstance();
        $delete =  $bankModel->deleteUserById(1);
        $expected = true;
        $this->assertEquals($expected,$delete);
    }
    public function testDeleteUserByStr(){
        //Vĩnh
        $bankModel = BankModel::getInstance();
        $delete = $bankModel->deleteUserById('a');
        $expected = false;
        $this->assertEquals($expected,$delete);
    }

    //design patter test
    public function testSingletonBankModel(){
        $bankModel = BankModel::getInstance();
        $bankModel2 = BankModel::getInstance();
        
        $checkSingleton = $bankModel == $bankModel2;
        $expected = true;
        $this->assertEquals($expected,$checkSingleton);
    }
   
    public function testDeleteUserByNull(){
        //Vĩnh
        $bankModel = BankModel::getInstance();
        $delete = $bankModel->deleteUserById(NULL);
        $expected = false;
        $this->assertEquals($expected,$delete);
    }
  
}