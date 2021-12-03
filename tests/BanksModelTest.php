<?php

use PHPUnit\Framework\TestCase;

class BanksModelTest extends TestCase
{
    /**
     * Test findBankById have bank
     */
    public function testFindBanksByIdHaveBank()
    {
        $bankModel = new BankModel();
        $bankID = 4;
        $cost = 1111;

        $bank = $bankModel->findBankById($bankID);
        $actual = $bank[0]['cost'];

        $this->assertEquals($cost, $actual);
    }

    /**
     * Test findBankById have not bank
     */
    public function testFindBankrByIdHaveNotUser()
    {
        $userModel = new BankModel();
        $bankID = 2;
        $expected = [];

        $bank = $userModel->findBankById($bankID);
        $actual = $bank;

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test findBankById not good
     */
    public function testFindBankrByIdNg()
    {
        $userModel = new BankModel();
        $bankID = 10;

        $bank = $userModel->findBankById($bankID);

        if (empty($bank)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test findUserById string
     */
    public function testFindBankrByIdString()
    {
        $userModel = new BankModel();
        $bankID = 'a';
        $expected = [];

        $bank = $userModel->findBankById($bankID);
        $actual = $bank;

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test findUserById foat
     */
    public function testFindBankrByIdFoat()
    {
        $userModel = new BankModel();
        $bankID = 1.213;
        $expected = [];

        $bank = $userModel->findBankById($bankID);
        $actual = $bank;

        $this->assertEquals($expected, $actual);
    }


    /**
     * Test DeleteBankbyID have id
     */
    public function testDeleteBanksByIdHaveId()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $bankID = 4;
        $expected = true;

        $actual = $bankModel->deleteBankById($bankID);
        // var_dump($bank); die();
        $bankModel->rollBack();
        $this->assertEquals($expected, $actual);
    }

    /**
     * Test DeleteBankbyID have not id
     */
    public function testDeleteBanksByIdHaveNotId()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $bankID = 999;
        $expected = false;

        $actual = $bankModel->deleteBankById($bankID);
        // var_dump($bank); die();
        $bankModel->rollBack();
        $this->assertEquals($expected, $actual);
    }

    /**
     * Test DeleteBankbyID float
     */
    public function testDeleteBanksByIdFloat()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $bankID = 8.2516;
        $expected = false;

        $actual = $bankModel->deleteBankById($bankID);
        // var_dump($bank); die();
        $bankModel->rollBack();
        $this->assertEquals($expected, $actual);
    }

    /**
     * Test DeleteBankbyID null
     */
    public function testDeleteBanksByNull()
    {
        $bankModel = new BankModel();
        // $bankModel->startTransaction();
        $bankID = null;
        $expected = false;

        $actual = $bankModel->deleteBankById($bankID);
        // var_dump($bank); die();
        // $bankModel->rollBack();
        $this->assertEquals($expected, $actual);
    }

    /**
     * Test DeleteBankbyID string
     */
    public function testDeleteBanksByString()
    {
        $bankModel = new BankModel();
        // $bankModel->startTransaction();
        $bankID = 'phuc';
        $expected = false;

        $actual = $bankModel->deleteBankById($bankID);
        // var_dump($expected); die();
        // $bankModel->rollBack();
        $this->assertEquals($expected, $actual);
    }

    /**
     * Test DeleteBankbyID bool fase
     */
    public function testDeleteBanksByBoolFase()
    {
        $bankModel = new BankModel();
        // $bankModel->startTransaction();
        $bankID = false;
        $expected = false;

        $actual = $bankModel->deleteBankById($bankID);
        // var_dump($actual); die();
        // // $bankModel->rollBack();
        $this->assertEquals($expected, $actual);
    }

    /**
     * Test DeleteBankbyID bool true
     */
    public function testDeleteBanksByBoolTrue()
    {
        $bankModel = new BankModel();
        // $bankModel->startTransaction();
        $bankID = true;
        $expected = false;

        $actual = $bankModel->deleteBankById($bankID);
        // var_dump($actual); die();
        // // $bankModel->rollBack();
        $this->assertEquals($expected, $actual);
    }

    /**
     * Test DeleteBankbyID object
     */
    public function testDeleteBanksByObject()
    {
        $bankModel = new BankModel();
        // $bankModel->startTransaction();
        $bankID = new UserModel();
        $expected = false;

        $actual = $bankModel->deleteBankById($bankID);
        // var_dump($actual); die();
        // $bankModel->rollBack();
        $this->assertEquals($expected, $actual);
    }

    /**
     * Test DeleteBankbyID array
     */
    public function testDeleteBanksByArray()
    {
        $bankModel = new BankModel();
        // $bankModel->startTransaction();
        $bankID = [1, 3, 'phuc'];
        $expected = false;

        $actual = $bankModel->deleteBankById($bankID);
        // var_dump($actual); die();
        // $bankModel->rollBack();
        $this->assertEquals($expected, $actual);
    }

    /**
     * Test DeleteBankbyID array null
     */
    public function testDeleteBanksByArrayNull()
    {
        $bankModel = new BankModel();
        // $bankModel->startTransaction();
        $bankID = [];
        $expected = false;

        $actual = $bankModel->deleteBankById($bankID);
        // var_dump($actual); die();
        // $bankModel->rollBack();
        $this->assertEquals($expected, $actual);
    }

    /**
     * Test UpdateBank have id
     */
    public function testUpdateBankHaveId()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $bankID = 4;
        $input = [
            "id" => $bankID,
            "user_id" => 2,
            "cost" => 404
        ];
        $expected = true;

        $actual = $bankModel->updateBank($input);
        // var_dump($actual); die();
        $bankModel->rollBack();
        $this->assertEquals($expected, $actual);
    }

    /**
     * Test UpdateBank have not id
     */
    public function testUpdateBankHaveNotId()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $bankID = 999;
        $input = [
            "id" => $bankID,
            "user_id" => 2,
            "cost" => 404
        ];
        $expected = false;

        $actual = $bankModel->updateBank($input);
        $bankModel->rollBack();
        // var_dump($actual); die();
        $this->assertEquals($expected, $actual);
    }

    /**
     * Test UpdateBankId string
     */
    public function testUpdateBankString()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $bankID = 'phuc';
        $input = [
            "id" => $bankID,
            "user_id" => 2,
            "cost" => 404
        ];
        $expected = false;

        $actual = $bankModel->updateBank($input);
        $bankModel->rollBack();
        // var_dump($actual); die();
        $this->assertEquals($expected, $actual);
    }

    /**
     * Test UpdateBankId null
     */
    public function testUpdateBankNull()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $bankID = null;
        $input = [
            "id" => $bankID,
            "user_id" => 2,
            "cost" => 404
        ];
        $expected = false;

        $actual = $bankModel->updateBank($input);
        // var_dump($actual); die();
        $bankModel->rollBack();
        $this->assertEquals($expected, $actual);
    }

    /**
     * Test UpdateBankId float
     */
    public function testUpdateBankFloatId()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $bankID = 2.12331;
        $input = [
            "id" => $bankID,
            "user_id" => 2,
            "cost" => 404
        ];
        $expected = false;

        $actual = $bankModel->updateBank($input);
        // var_dump($actual); die();
        $bankModel->rollBack();
        $this->assertEquals($expected, $actual);
    }

    /**
     * Test UpdateBankId bool true
     */
    public function testUpdateBankIdBoolTrue()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $bankID = true;
        $input = [
            "id" => $bankID,
            "user_id" => 2,
            "cost" => 404
        ];
        $expected = false;

        $actual = $bankModel->updateBank($input);
        // var_dump($actual); die();
        $bankModel->rollBack();
        $this->assertEquals($expected, $actual);
    }

    /**
     * Test UpdateBankId bool false
     */
    public function testUpdateBankIdBoolFalse()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $bankID = false;
        $input = [
            "id" => $bankID,
            "user_id" => 2,
            "cost" => 404
        ];
        $expected = false;

        $actual = $bankModel->updateBank($input);
        // var_dump($actual); die();
        $bankModel->rollBack();
        $this->assertEquals($expected, $actual);
    }

    /**
     * Test UpdateBankId object
     */
    public function testUpdateBankIdObject()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $bankID = new UserModel();
        $input = [
            "id" => $bankID,
            "user_id" => 2,
            "cost" => 404
        ];
        $expected = false;

        $actual = $bankModel->updateBank($input);
        // var_dump($actual);die();
        $bankModel->rollBack();
        $this->assertEquals($expected, $actual);
    }

    /**
     * Test UpdateBankId array
     */
    public function testUpdateBankIdArray()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $bankID = [2, 'phuc'];
        $input = [
            "id" => $bankID,
            "user_id" => 2,
            "cost" => 404
        ];
        $expected = false;

        $actual = $bankModel->updateBank($input);
        // var_dump($actual);die();
        $bankModel->rollBack();
        $this->assertEquals($expected, $actual);
    }
}
