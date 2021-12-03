<?php

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
            $this->assertTrue(false);
        }else {
            $this->assertTrue(true);
        }
    }

    public function testInsertBankIdNg(){
        $bankModel = new BankModel();
        $input = [];
        $input['id'] = '1';
        $input['user_id'] = '1';
        $input['cost'] = '1111';

        $actual = $bankModel->insertBank($input);
        if ($actual != true) {
            $this->assertTrue(false);
        }else {
            $this->assertTrue(true);
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
}
