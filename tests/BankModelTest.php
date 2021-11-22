<?php

use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    //Đặt tên function bắt đầu bằng test nha quý zị
    //Ví dụ: testFindUser()

    /**
     * Test function Insertbank()
     * Author: Ho Viet Long
     */

    //Test insertbank with valid input
    public function testInsertBank_OK()
    {
        $bankModel = new BankModel();
        $input = array(
            'user_id' => "4",
            'cost' => "1000",
        );
        //Execute test
        $bankModel->insertBank($input);
        //Actual
        $actual = $bankModel->findBankById(5);
        $this->assertEquals($actual[0]['cost'], $input['cost']);
    }
    //Test insertbank with valid input true
    public function testInsertBank_NG()
    {
        $bankModel = new BankModel();
        $input = array(
            'user_id' => "5",
            'cost' => "1000",
        );
        //Execute test
        $bankModel->insertBank($input);
        //Actual
        $actual = $bankModel->findBankById(6);
        ($actual[0]['cost'] == $input['cost']) ? $this->assertTrue(true) : $this->assertTrue(false);
    }
    //Test insert bank with user_id = null
    public function testInsertBankWithNullUserId_NG()
    {
        $bankModel = new BankModel();
        $input = array(
            'user_id' => null,
            'cost' => "1000",
        );
        //Execute test
        $bankModel->insertBank($input);
        //Actual
        // var_dump($actual); die;
        $actual = $bankModel->findBankById(7);
        ($actual[0]['user_id'] == 0) ? $this->assertTrue(true) : $this->assertTrue(false);
    }
    //Test insert bank with user_id is character
    public function testInsertBankWithUserIdIsCharacter_NG()
    {
        $bankModel = new BankModel();
        $input = array(
            'user_id' => "long",
            'cost' => "1000",
        );
        //Execute test
        $bankModel->insertBank($input);
        //Actual
        // var_dump($actual); die;
        $actual = $bankModel->findBankById(12);
        ($actual[0]['user_id'] != "long") ? $this->assertTrue(true) : $this->assertTrue(false);
    }
    //Test insert bank with cost = null
    public function testInsertBankWithNullCost_NG()
    {
        $bankModel = new BankModel();
        $input = array(
            'user_id' => 1,
            'cost' => null,
        );
        //Execute test
        $bankModel->insertBank($input);
        //Actual
        // var_dump($actual); die;
        $actual = $bankModel->findBankById(15);
        ($actual[0]['cost'] == 0) ? $this->assertTrue(true) : $this->assertTrue(false);
    }
    //Test insert bank with cost is character
    public function testInsertBankWithCostIsCharacter_NG()
    {
        $bankModel = new BankModel();
        $input = array(
            'user_id' => 1,
            'cost' => "long",
        );
        //Execute test
        $bankModel->insertBank($input);
        //Actual
        // var_dump($actual); die;
        $actual = $bankModel->findBankById(19);
        ($actual[0]['cost'] != "long") ? $this->assertTrue(true) : $this->assertTrue(false);
    }
    //Test insert bank with user_id & cost is character or string
    public function testInsertBankWithCharacterNg_NG()
    {
        $bankModel = new BankModel();
        $input = array(
            'user_id' => "long",
            'cost' => "long",
        );
        //Execute test
        $bankModel->insertBank($input);
        //Actual
        // var_dump($actual); die;
        $actual = $bankModel->findBankById(20);
        ($actual[0]['cost'] != "long" && $actual[0]['user_id'] != "long") ? $this->assertTrue(true) : $this->assertTrue(false);
    }
    //Test insert bank with user_id is array
    public function testInsertBankWithArrayUserId_NG()
    {
        $bankModel = new BankModel();
        $input = array(
            'user_id' => ["long", "kunz"],
            'cost' => "long",
        );
        //Execute test
        try {
            $bankModel->insertBank($input);
        } catch (Throwable $e) {
            // var_dump($e->getMessage()); die();
            $this->assertTrue(true);
        }
    }
    //Test insert bank with cost is array
    public function testInsertBankWithArrayCost_NG()
    {
        $bankModel = new BankModel();
        $input = array(
            'user_id' => 1,
            'cost' => ["long", "kunz"],
        );
        //Execute test
        try {
            $bankModel->insertBank($input);
        } catch (Throwable $e) {
            // var_dump($e->getMessage()); die();
            $this->assertTrue(true);
        }
    }
    //Test insert bank with user_id & cost is array
    public function testInsertBankWithArray_NG()
    {
        $bankModel = new BankModel();
        $input = array(
            'user_id' => ["long", "kunz"],
            'cost' => ["long", "kunz"],
        );

        //Execute test
        try {
            $bankModel->insertBank($input);
        } catch (Throwable $e) {
            // var_dump($e->getMessage()); die();
            $this->assertTrue(true);
        }
    }
    //Test insert user with user_id is object
    public function testInsertBankUserIdObj_NG()
    {
        $bankModel = new BankModel();
        $input = array(
            'user_id' => $bankModel,
            'cost' => 1000,
        );

        //Execute test
        try {
            $bankModel->insertBank($input);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
    }
    //Test insert user with cost is object
    public function testInsertBankCostObj_NG()
    {
        $bankModel = new BankModel();
        $input = array(
            'user_id' => "2",
            'cost' => $bankModel,
        );

        //Execute test
        try {
            $bankModel->insertBank($input);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
    }
    //Test insert user with user_id & cost is object
    public function testInsertBankObj_NG()
    {
        $bankModel = new BankModel();
        $input = array(
            'user_id' => $bankModel,
            'cost' => $bankModel,
        );
        //Execute test
        try {
            $bankModel->insertBank($input);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
    }
    //Test insert user with user_id is array & cost is object
    public function testInsertBankInput_NG()
    {
        $bankModel = new BankModel();
        $input = array(
            'user_id' => ["long,kunz"],
            'cost' => $bankModel,
        );
        //Execute test
        try {
            $bankModel->insertBank($input);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
    }
}
