<?php
use PHPUnit\Framework\TestCase;
require_once './models/FactoryPattern.php';


class Liem_BankModel extends TestCase
{
    # getBankModelByUserId

     /**
     * Test return data is array object
     */
    public function testReturnArrayObjectOk()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $expected = array();

        $actual = $bankModel->getBankAccountByUserID(1);

        $this->assertEquals(is_array($expected), is_array($actual));
    }

    /**
     * Test param id is string
     */
    public function testIdParamIsStringNg()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');

        $actual = $bankModel->getBankAccountByUserID("abc");

        if($actual == "Invalid value") {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test param id is null
     */
    public function testIdParamIsNullNg()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');

        $actual = $bankModel->getBankAccountByUserID(null);

        if($actual == "Invalid value") {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        } 
    }

    /**
     * Test param id is bool
     */
    public function testIdParamIsBoolNg()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');

        $actual = $bankModel->getBankAccountByUserID(true);

        if($actual == "Invalid value") {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test param id is array
     */
    public function testIdParamIsArrayNg()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $actual = $bankModel->getBankAccountByUserID(array());

        if($actual == "Invalid value") {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
  
    }

    /**
     * Test param id is object
     */
    public function testIdParamIsObjectNg()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $actual = $bankModel->getBankAccountByUserID((object)array());

        if($actual == "Invalid value") {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    # InsertBankInfo

    /**
     * Test function insert bank info
     */
    public function testInsertBankInfoOk()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $bankModel->startTransaction();
        // Set params
        $input['user_id'] = 1;
        $input['cost'] = 100000;

        $expected = true;
        $actual = $bankModel->InsertBankInfo($input);
        $bankModel->rollback();

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test param user id is string
     */
    public function testUserIdParamIsStringNg()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        // set params
        $input['user_id'] = "abc";
        $input['cost'] = 100000;

        $actual = $bankModel->InsertBankInfo($input);

        if($actual == "User id param invalid") {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }


    /**
     * Test param user id is null
     */
    public function testUserIdParamIsNullNg()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        // set params
        $input['user_id'] = null;
        $input['cost'] = 100000;

        $actual = $bankModel->InsertBankInfo($input);

        if($actual == "User id param invalid") {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        } 
    }

    /**
     * Test param user id is bool
     */
    public function testUserIdParamIsBoolNg()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        // set params
        $input['user_id'] = true;
        $input['cost'] = 100000;

        $actual = $bankModel->InsertBankInfo($input);

        if($actual == "User id param invalid") {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test param user id is array
     */
    public function testUserIdParamIsArrayNg()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        // set params
        $input['user_id'] = array();
        $input['cost'] = 100000;

        $actual = $bankModel->InsertBankInfo($input);

        if($actual == "User id param invalid") {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test param user id is object
     */
    public function testUserIdParamIsObjectNg()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        // set params
        $input['user_id'] = (object) array();
        $input['cost'] = 100000;

        $actual = $bankModel->InsertBankInfo($input);

        if($actual == "User id param invalid") {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test param cost is string
     */
    public function testCostParamIsStringNg()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        // set params
        $input['user_id'] = 1;
        $input['cost'] = "abc";

        $actual = $bankModel->InsertBankInfo($input);

        if($actual == "Cost param invalid") {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test param cost is null
     */
    public function testCostParamIsNullNg()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        // set params
        $input['user_id'] = 1;
        $input['cost'] = null;

        $actual = $bankModel->InsertBankInfo($input);

        if($actual == "Cost param invalid") {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test param cost is bool
     */
    public function testCostParamIsBoolNg()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        // set params
        $input['user_id'] = 1;
        $input['cost'] = true;

        $actual = $bankModel->InsertBankInfo($input);

        if($actual == "Cost param invalid") {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test param cost is array
     */
    public function testCostParamIsArrayNg()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        // set params
        $input['user_id'] = 1;
        $input['cost'] = array();

        $actual = $bankModel->InsertBankInfo($input);

        if($actual == "Cost param invalid") {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test param cost is object
     */
    public function testCostParamIsObjectNg()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        // set params
        $input['user_id'] = 1;
        $input['cost'] = (object) array();

        $actual = $bankModel->InsertBankInfo($input);

        if($actual == true) {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }

    }

}