<?php
use PHPUnit\Framework\TestCase;
require_once './models/FactoryPattern.php';


class Liem_BankModel_2 extends TestCase
{
    # deleteBankByUserId
    /**
     * Test executing deleteBankByUserId succeed
     */
    public function testBankByUserIdOk()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $bankModel->startTransaction();
        $userId = 1;

        $expected = true;
        $actual = $bankModel->deleteBankByUserId($userId);
        $bankModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testUserIdParamIsStringNg()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $userId = "aaa";

        $actual = $bankModel->deleteBankByUserId($userId);

        if($actual == 'Param invalid') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }
    public function testUserIdParamIsNullNg()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $userId = null;

        $actual = $bankModel->deleteBankByUserId($userId);

        if($actual == 'Param invalid') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }
    public function testUserIdParamIsArrayNg()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $userId = array();

        $actual = $bankModel->deleteBankByUserId($userId);

        if($actual == 'Param invalid') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }
    public function testUserIdParamIsObjectNg()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $userId = (object) array();

        $actual = $bankModel->deleteBankByUserId($userId);

        if($actual == 'Param invalid') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    public function testUserIdParamIsBoolNg()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $userId = false;

        $actual = $bankModel->deleteBankByUserId($userId);

        if($actual == 'Param invalid') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }
}

?>