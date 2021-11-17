<?php

use PHPUnit\Framework\TestCase;

class BankModelPhuTest extends TestCase
{
    //test testfindUser_id     
    public function testfindUser_idOk (){
        $user_id = new BankModel();
        $keys = "2";
        // $expected = "1";
        $actual = $user_id->findUser_id($keys);

        if(!empty($actual)){
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
       
    }

    public function testFindUserByIdF()
    {
        $userModel = new UserModel();
        $userId = 10;
        $expected = [];
        $actual = $userModel->findUserById($userId);
        $this->assertEquals($expected, $actual);
    }

    public function testFindUserById_KyTu()
    {
        $userModel = new UserModel();
        $userIdid = 'qwert';
        $expected = [];
        $actual = $userModel->findUserById($userIdid);
        $this->assertEquals($expected, $actual);
    }

    public function testFindUserById_KyTuDacBiet()
    {
        $userModel = new UserModel();
        $userIdid = '!!!!!';
        $expected = [];
        $actual = $userModel->findUserById($userIdid);
        $this->assertEquals($expected, $actual);
    }
    //test getBanks
    public function testGetBanksOk()
    {
        $BankModel = new BankModel();
    
        $count_array = 5;
        $actual = $BankModel->getBanks();
        
        $this->assertEquals($count_array,count($actual));
    }
    public function testGetBanksKeyWordOk()
    {
        $BankModel = new BankModel();
        $params= [];
        $params['keyword'] = 'a';
        $count_array = 1;
        $actual = $BankModel->getBanks( $params);
         
        $this->assertEquals($count_array,count($actual));
    }
}
