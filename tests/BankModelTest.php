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
        $actual = $bankModel->findBankById(8);
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
        $actual = $bankModel->findBankById(9);
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
        $actual = $bankModel->findBankById(10);
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
        $actual = $bankModel->findBankById(11);
        ($actual[0]['cost'] != "long" && $actual[0]['user_id'] != "long") ? $this->assertTrue(true) : $this->assertTrue(false);
    }

    //Test insert user with user_id is float & cost valid
    public function testInsertBankUserFloatCostValid_NG()
    {
        $bankModel = new BankModel();
        $input = array(
            'user_id' => 3.14,
            'cost' => 123,
        );
        //Execute test

        $bankModel->insertBank($input);

        //Actual
        $actual = $bankModel->findBankById(12);
        $this->assertEquals(3, $actual[0]['user_id']);
    }

    //Test insert user with user_id is float & cost is object
    public function testInsertBankUserValidCostFloat_NG()
    {
        $bankModel = new BankModel();
        $input = array(
            'user_id' => 3,
            'cost' => 123.5,
        );
        //Execute test

        $bankModel->insertBank($input);

        //Actual
        $actual = $bankModel->findBankById(13);
        $this->assertEquals(123.5, $actual[0]['cost']);
    }
    //Test insert user with user_id  & cost is float
    public function testInsertBankFloat_NG()
    {
        $bankModel = new BankModel();
        $input = array(
            'user_id' => 3.8,
            'cost' => 123.5,
        );
        //Execute test

        $bankModel->insertBank($input);

        //Actual
        $actual = $bankModel->findBankById(14);
        $this->assertEquals(123.5, $actual[0]['cost']);
    }
    //Test insert bank with negative number user id & cost
    public function testInsertBankNegative_NG()
    {
        $bankModel = new BankModel();
        $input = array(
            'user_id' => -5,
            'cost' => -100,
        );
        //Execute test

        $bankModel->insertBank($input);

        //Actual
        $actual = $bankModel->findBankById(15);
        $this->assertEquals(-100, $actual[0]['cost']);
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
    //Test insert user with user_id is float & cost is object
    public function testInsertBankUserFloat_NG()
    {
        $bankModel = new BankModel();
        $input = array(
            'user_id' => 3.14,
            'cost' => $bankModel,
        );
        //Execute test
        try {
            $bankModel->insertBank($input);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
    }
    //Test insert user with boolean
    public function testInsertBankBoolean_NG()
    {
        $bankModel = new BankModel();
        $input = array(
            'user_id' => true,
            'cost' => true,
        );
        //Execute test
        $bankModel->insertBank($input);
        $actual = $bankModel->findBankById(450);
        $this->assertEquals(array(),$actual);
    }
}
