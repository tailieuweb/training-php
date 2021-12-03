<?php

use phpDocumentor\Reflection\PseudoTypes\True_;
use PHPUnit\Framework\TestCase;

class BanksModelTest extends TestCase
{
    /**
     * Test insertBank
     */
    public function testInsertBankOk(){
        $bankModel = new BankModel();
        $input = [];
        $input['id'] = '1';
        $input['user_id'] = '1';
        $input['cost'] = '1111';

        $actual = $bankModel->insertBank($input);
        if ($actual != true) {
            $this->assertTrue(true);
        }else {
            $this->assertTrue(false);
        }
    }

    public function testInsertBankIdNg(){
        $bankModel = new BankModel();
        $input = [];
        $input['id'] = '1';
        $input['user_id'] = '';
        $input['cost'] = '';

        $actual = $bankModel->insertBank($input);
        if ($actual != true) {
            $this->assertTrue(true);
        }else {
            $this->assertTrue(false);
        }
    }

    //test testInsertBank with id
    //testInsertBankWithIdNull
    public function testInsertBankWithIdNull(){
        $bankModel = new BankModel();
        $input = [];
        $input['id'] = null;
        $input['user_id'] = '123';
        $input['cost'] = '123456';

        $actual = $bankModel->insertBank($input);
        if ($actual != true) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    //testInsertBankIdStr
    public function testInsertBankIdStr(){
        $bankModel = new BankModel();
        $input = [];
        $input['id'] = 'abcd';
        $input['user_id'] = '111';
        $input['cost'] = '123456';

        $actual = $bankModel->insertBank($input);
        if ($actual != true) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    //testInsertBank with user_id null
    public function testInsertBankWithUserIdNull(){
        $bankModel = new BankModel();
        $input = [];
        $input['id'] = '12';
        $input['user_id'] = null;
        $input['cost'] = '123456';

        $actual = $bankModel->insertBank($input);
        if ($actual != true) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    //testInsertBank with all null
    public function testInsertBankAllNull(){
        $bankModel = new BankModel();
        $input = [];
        $input['id'] = null;
        $input['user_id'] = null;
        $input['cost'] = null;

        $actual = $bankModel->insertBank($input);
        if ($actual != true) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    //Test getBanks
    public function testGetBanksOk(){
        $bankModel = new BankModel();
        $param['keyword'] = '1';
        $actual = $bankModel->getBanks($param);
        if ($actual != null) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    public function testGetBanksNull(){
        $bankModel = new BankModel();
        $actual = null;
        $actual = $bankModel->getBanks();
        if ($actual != null) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    
    public function testGetBanksNg(){
        $bankModel             = new BankModel();
        $param["keyword"] = "123";
        $actual           = $bankModel->getBanks($param);
        if ($actual != null) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
}
