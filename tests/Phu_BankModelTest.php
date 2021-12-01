<?php

use PHPUnit\Framework\TestCase;

class Phu_BankModelTest extends TestCase
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
        $params['keyword']  = '3';
        $expected = '3';
        $bank = $BankModel->getBanks($params);
        $actual = $bank[0]['user_id'];
        $this->assertEquals($expected, $actual);
    }

    //test getbanks not good
    public function testGetBanksNg()
    {
        $BankModel = new BankModel();
        $params['keyword']  = '99999';
        $bank = $BankModel->getBanks($params);
        if (empty($bank[0])) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
     //test getBanks khi khong co du lieu 
    public function testGetBanksKhongDuLieu()
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
     //test getBanks khi truyen vao chuoi rong
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
    
}
