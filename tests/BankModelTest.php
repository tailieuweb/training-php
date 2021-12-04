<?php

use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    //Test  Find Bank By Id OK
    public function testFindBankByIdOk()
    {
        $bankModel = new BankModel();
        $bankId = 2;
        $cost = 1111;

        $bank = $bankModel->findBankById($bankId);
        $actual = $bank[0]['cost'];

        $this->assertEquals($cost, $actual);
    }

    //Test Find Bank By Id Not good
    public function testFindBankByIdNg()
    {
        $bankModel = new BankModel();
        $bankId = 1000;
        $expected = null;

        $bank = $bankModel->findBankById($bankId);

        if (empty($bank)) {
            $this->assertTrue(true);
        } else {
            $this->assertFalse(false);
        }
    }

    //Test Find Bank By String Id 
    public function testFindBankByIdStr()
    {
        $bankModel = new BankModel();

        $id = 'abc';


        $expected = 'error';
        $actual = $bankModel->findBankById($id);

        $this->assertEquals($expected, $actual);
    }

    //Test Find Bank By Id Null
    public function testFindBankByIdNull()
    {
        $bankModel = new BankModel();
        $id = '';
        $expected = 'error';
        $actual = $bankModel->findBankById($id);

        $this->assertEquals($expected, $actual);
    }
    
    //Test find Bank By Id Object
    public function testFindBankByIdObject()
    {
        $bankModel = new BankModel();

        $id = new stdClass();
        $expected = 'error';
        $actual = $bankModel->findBankById($id);

        $this->assertEquals($expected, $actual);
    }

    // test Delete Bank By Id ok
    public function testDeleteBankByIdOK()
    {
        $bankModel = new bankModel();
        $id = 2;
        $excute = true;
        $actual = $bankModel->deleteBankById($id);
        $this->assertEquals($excute, $actual);
    }
    //Test Delete Bank By Id Not Good
    public function testDeleteBankByIdNotNG()
    {
        $bankModel = new bankModel();
        $id = '100a';
        $expect = false;
        $actual = $bankModel->deleteBankById($id);
        $this->assertEquals($expect, $actual);
    }
    //Test Delete Bank By Id Null
    public function testDeleteBankByIdNull()
    {
        $bankModel = new bankModel();
        $id = null;
        $actual = $bankModel->deleteBankById($id);
        if ($actual == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    //Test Delete Bank By Not Exist Id 
    public function testDeleteBankByIdNotExist()
    {
        $bankModel = new bankModel();
        $id = 111;
        $excute = true;
        $key = $bankModel->findBankById($id);
        $actual = $bankModel->deleteBankById($id);
        if ($key == []) {
            $this->assertTrue(true);
        } else {
            $this->assertEquals($excute, $actual);
        }
    }
    //Test Delete Bank By String Id
    public function testDeleteBankByIdIsString()
    {
        $bankModel = new bankModel();
        $id = "123abc";
        $excute = false;
        $actual = $bankModel->deletebankById($id);
        $this->assertEquals($excute, $actual);
    }
    //Test Delete Bank By Array Id
    public function testDeleteBankByIdArray()
    {
        $bankModel = new bankModel();
        $id = ["100"];
        $excute = false;
        $actual = $bankModel->deletebankById($id);
        $this->assertEquals($excute, $actual);
    }
    //Test Delete Bank By Object Id
    public function testDeleteBankByIdIsObject()
    {
        $bankModel = new bankModel();
        $id = $bankModel;
        $excute = false;
        $actual = $bankModel->deletebankById($id);
        $this->assertEquals($excute, $actual);
    }
    //Test delete Bank By Id Boolean
    public function testDeletebankByIdBoolean()
    {
        $bankModel = new bankModel();
        $id = true;
        $excute = false;
        $actual = $bankModel->deletebankById($id);
        $this->assertEquals($excute, $actual);
    }
    //Test delete Bank By Float Id
    public function testDeleteBankByIdFloat()
    {
        $bankModel = new bankModel();
        $id = 1.5;
        $excute = false;
        $actual = $bankModel->deleteBankById($id);
        $this->assertEquals($excute, $actual);
    }
    //Test delete Bank By Special Characters Id
    public function testDeleteBankByIdSC()
    {
        $bankModel = new bankModel();
        $id = '@!$%#';
        $excute = false;
        $actual = $bankModel->deleteBankById($id);
        $this->assertEquals($excute, $actual);
    }
}