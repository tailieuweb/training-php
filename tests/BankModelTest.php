<?php
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    /*
    File: BankModel.
    Id: 01
    Function: findBankInfoById($id).
    Desc: Test get bank by bank id is OK
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoByIdOk()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make("bank");
        $expected = [
            [
                'id' => '1',
                'user_id' => '1',
                'cost' => '1111',
            ]
        ];

        $actual = $bankModel->find(1);
        $this->assertEquals(
            $expected,
            $actual,
            "Expected and actual not equals"
        );
    }

    /*
    File: BankModel.
    Id: 02
    Function: findBankInfoById($id).
    Desc: Test get bank by bank id with input is negative number
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoById_WithInputIs_NGN()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make("bank");

        $actual = $bankModel->find(-1);
        $this->assertEmpty(
            $actual,
            "actual is not empty"
        );
    }

    /*
    File: BankModel
    Id: 03
    Function: findBankInfoById($id).
    Desc: Test get bank by bank id with input is string
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoById_WithInputIs_String()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make("bank");
        $expected = [
            [
                'id' => '1',
                'user_id' => '1',
                'cost' => '1111',
            ]
        ];

        $actual = $bankModel->find("1");
        $this->assertEquals(
            $expected,
            $actual,
            "Expected and actual not equals"
        );
    }

    /*
    File: BankModel
    Id: 04
    Function: findBankInfoById($id).
    Desc: Test get bank by bank id with input is obj
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoById_WithInputIs_Obj()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make("bank");
        $id = new stdClass();

        $actual = $bankModel->find($id);
        $this->assertEmpty(
            $actual,
            "actual is not empty"
        );
    }

    /*
    File: BankModel
    Id: 05
    Function: findBankInfoById($id).
    Desc: Test get bank by bank id with input is null
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoById_WithInputIs_Null()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make("bank");
        $id = null;

        $actual = $bankModel->find($id);
        $this->assertEmpty(
            $actual,
            "actual is not empty"
        );
    }

    /*
    File: BankModel
    Id: 06
    Function: findBankInfoById($id).
    Desc: Test get bank by bank id with input is array
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoById_WithInputIs_Arr()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make("bank");
        $id = ["id" => 1];

        $actual = $bankModel->find($id);
        $this->assertEmpty(
            $actual,
            "actual is empty"
        );
    }

    /*
    File: BankModel
    Id: 07
    Function: findBankInfoById($id).
    Desc: Test get bank by bank id with input is not exist
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoById_WithInputIs_NotExist()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make("bank");

        $actual = $bankModel->find(100);
        $this->assertEmpty(
            $actual,
            "actual is empty"
        );
    }

     /*
    File: BankModel
    Id: 07
    Function: findBankInfoById($id).
    Desc: Test get bank by bank id with input type not integer
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoById_WithInputIs_NotIntegerType()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make("bank");

        $actual = $bankModel->find(1.2);
        $this->assertEmpty(
            $actual,
            "actual is empty"
        );
    }

      /*
    File: BankModel
    Id: 07
    Function: findBankInfoById($id).
    Desc: Test get bank by bank id with input is boolean
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoById_WithInputIs_Boolean()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make("bank");

        $actual = $bankModel->find(true);
        $this->assertEmpty(
            $actual,
            "actual is empty"
        );
    }

    /*
    File: BankModel.
    Id: 08
    Function: findBankInfoById($id).
    Desc: Test if input is special characters -> unaffected to data of another(user) model 
    Status: OK
    Author: Phuong Nguyen.
    */
    public function testFindBankByID_SpecialChars_AffectedToAnotherModel()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $bankModel = $factory->make("bank");


        $id = '1";TRUNCATE user;##';
        $action = $bankModel->find($id);

        //Array
        $actual = $userModel->read();
        $this->assertNotEmpty(
            $actual[0],
            "actual is empty"
        );
    }


    /*
    File: BankModel.
    Id: 09
    Function: findBankInfoByUserID($user_id).
    Desc: Test get bank by user id is OK
    Author: Phuong Nguyen.
    */
    public function findBankInfoByUserIDOk()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make("bank");
        $expected = [
            [
                'id' => '1',
                'user_id' => '1',
                'cost' => '1111',
            ]
        ];

        $actual = $bankModel->findByUserId(1);
        $this->assertEquals(
            $expected,
            $actual,
            "Expected and actual not equals"
        );
    }

    /*
    File: BankModel.
    Id: 10
    Function: findBankInfoByUserID($user_id).
    Desc: Test get bank by user id with input (user_id) is negative number
    Author: Phuong Nguyen.
    */
    public function testfindBankInfoByUserID_WithInputIs_NGN()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make("bank");

        $actual = $bankModel->findByUserId(-1);
        $this->assertEmpty(
            $actual,
            "actual is not empty"
        );
    }

    /*
    File: BankModel.
    Id: 11
    Function: findBankInfoByUserID($user_id).
    Desc: Test get bank by user id with input (user_id) is string
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoByUserId_WithInputIs_String()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make("bank");
        $expected = [
            [
                'id' => '1',
                'user_id' => '1',
                'cost' => '1111',
            ]
        ];

        $actual = $bankModel->findByUserId("1");
        $this->assertEquals(
            $expected,
            $actual,
            "Expected and actual not equals"
        );
    }

    /*
    File: BankModel.
    Id: 12
    Function: findBankInfoByUserID($user_id).
    Desc: Test get bank by user id with input (user_id) is obj
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoByUserId_WithInputIs_Obj()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make("bank");
        $id = new stdClass();

        $actual = $bankModel->findByUserId($id);
        $this->assertEmpty(
            $actual,
            "actual is not empty"
        );
    }

    /*
    File: BankModel.
    Id: 13
    Function: findBankInfoByUserID($user_id).
    Desc: Test get bank by user id with input (user_id) is null
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoByUserId_WithInputIs_Null()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make("bank");
        $id = null;

        $actual = $bankModel->findByUserId($id);
        $this->assertEmpty(
            $actual,
            "actual is not empty"
        );
    }

    /*
    File: BankModel.
    Id: 14
    Function: findBankInfoByUserID($user_id).
    Desc: Test get bank by user id with input (user_id) is array
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoByUserId_WithInputIs_Arr()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make("bank");
        $id = ["id" => 1];

        $actual = $bankModel->findByUserId($id);
        $this->assertEmpty(
            $actual,
            "actual is empty"
        );
    }

    /*
    File: BankModel.
    Id: 13
    Function: findBankInfoByUserID($user_id).
    Desc: Test get bank by user id with input (user_id) not exists
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoByUserId_WithInputIs_NotExist()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make("bank");

        $actual = $bankModel->findByUserId(100);
        $this->assertEmpty(
            $actual,
            "actual is empty"
        );
    }

       /*
    File: BankModel
    Id: 07
    Function: findBankInfoByUserID($user_id).
    Desc: Test get bank by user id with input type not integer
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoByUserId_WithInputIs_NotIntegerType()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make("bank");

        $actual = $bankModel->findByUserId(1.2);
        $this->assertEmpty(
            $actual,
            "actual is empty"
        );
    }

      /*
    File: BankModel
    Id: 07
    Function:findBankInfoByUserID($user_id).
    Desc: Test get bank by user id with input is boolean
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoByUserId_WithInputIs_Boolean()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make("bank");

        $actual = $bankModel->findByUserId(true);
        $this->assertEmpty(
            $actual,
            "actual is empty"
        );
    }

    /*
    File: BankModel.
    Id: 14
    Function: findBankInfoByUserId($id).
    Desc: Test if input is special characters -> unaffected to data of another(user) model 
    Status: OK
    Author: Phuong Nguyen.
    */
    public function testFindBankByUserID_SpecialChars_AffectedToAnotherModel()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $bankModel = $factory->make("bank");


        $id = '1";TRUNCATE user;##';
        $action = $bankModel->findByUserId($id);

        //Array
        $actual = $userModel->read();
        $this->assertNotEmpty(
            $actual[0],
            "actual is empty"
        );
    }
}
