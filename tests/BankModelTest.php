<?php

use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    //test testfindUser_id     
    public function testfindUser_idOk (){
        $bankmodel = new BankModel();
        $keys = "3";
        // $expected = "3";
        $actual = $bankmodel->findUserBankById($keys);

        if ($actual == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
       
    }

    public function testFindUser_idByIdF()
    {
        $bankmodel = new BankModel();
        $user_id = 999;
        $actual = $bankmodel->findUserBankById($user_id);

        if (empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    public function testFindUserById_KyTuF()
    {
        $bankmodel = new BankModel();
        $user_id = 'aaa';
        $actual = $bankmodel->findUserBankById($user_id);

        if (empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    public function testFindUserById_KyTuDacBiet()
    {
        $bankmodel = new BankModel();
        $user_id = '~~~!!!';
        $actual = $bankmodel->findUserBankById($user_id);

        if (empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    //test getBanks
    public function testGetBanksOk()
    {
        $BankModel = new BankModel();
    
        $count_array = 4;
        $actual = $BankModel->getBanks();
        
        $this->assertEquals($count_array,count($actual));
    }
    public function testGetBanksKeyWordOk()
    {
        $BankModel = new BankModel();
        $params= [];
        $params['keyword1'] = '3';
        $count_array = 4;
        $actual = $BankModel->getBanks( $params);
         
        $this->assertEquals($count_array,count($actual));
    }
    //test getBanks khi khong co du lieu oke
    public function testGetBanksKhongDuLieuOK()
    {
        $bankmodel = new BankModel();

        $actual = $bankmodel->getBanks();

        if ($actual != null) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
     //test getBanks khi khong co du lieu F
    public function testGetBanksKhongDuLieuF()
    {
        $bankmodel = new BankModel();
        $actual = null;
        $actual = $bankmodel->getBanks();

        if ($actual != null) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
     //test getBanks khi truyen vao chuoi rong oke
     public function testGetBanksChuoiRongOke()
     {
        $bankmodel = new BankModel();

        $keyword = array(
            'keyword' => null,
        );
        $actual = $bankmodel->getBanks($keyword);

        if ($actual != []) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
     }
     //test getBanks khi truyen vao chuoi rong F
     public function testGetBanksChuoiRongF()
     {
        $bankmodel = new BankModel();

        $keyword = array(
            'keyword' => 'cost',
            'keyword' => 'user_id'
        );
        $actual = $bankmodel->getBanks($keyword);

        if ($actual != []) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
     }
    
}
