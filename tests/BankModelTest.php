<?php
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{

    /**
     * Test case Okie
     */

    //auth
    public function testAuthGood(){
        $bankModel = BankModel::getInstance();
        $username = "vinhvo";
        $password = "123456";
        //Username chỉ là kí tự thường hoặc in hoa, không dấu, không kí tự đặc biệt
        $this->assertTrue(BaseModel::matchRegexLogin($username,$password));
        $user = $bankModel->auth($username,$password);
        if(!empty($user)){
            return true;
        }
        else{
            return false;
        }
    }

    public function testAuthNotGood(){
        $bankModel = BankModel::getInstance();
        $username = "vĩnh võ";
        $password = "123457";
        $this->assertFalse(BaseModel::matchRegexLogin($username,$password));
        $user = $bankModel->auth($username,$password);
        if(empty($user)){
            return true;
        }
        else{
            return false;
        }
    }

    //deleteUserById
    public function deleteUserByIdGood(){
        $bankModel = BankModel::getInstance();
        $id = 5;
        
    }
}