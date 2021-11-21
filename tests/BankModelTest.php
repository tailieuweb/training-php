<?php
require_once "models/BankModel.php";

use phpDocumentor\Reflection\Types\Object_;
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    //Test findUserById
    public function testFindBankByIdOk()
    {
        $bankModel = new BankModel();

        $id = md5(78 . "chuyen-de-web-1");
        $expected  = '123';
        $bank = $bankModel->findBankById($id);
        $this->assertEquals($expected, $bank[0]['user_id']);
    }
    public function testFindBankByIdNotExist()
    {
        $bankModel = new BankModel();
        $id = md5(9999 . "chuyen-de-web-1");
        $bank = $bankModel->findBankById($id);
        if (empty($bank)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testFindBankByIdString()
    {
        $bankModel = new BankModel();

        $id = md5("qwe" . "chuyen-de-web-1");
        $expected = false;
        $actual = $bankModel->findBankById($id);
        $this->assertEquals($expected, $actual);
    }
    public function testFindBankByIdEmpty()
    {
        $bankModel = new BankModel();
        $id = md5("" . "chuyen-de-web-1");
        $expected = false;
        $actual = $bankModel->findBankById($id);
        $this->assertEquals($expected, $actual);
    }
    public function testFindBankByIdObject()
    {
        $bankModel = new BankModel();
        $id = new stdClass();
        $expected = false;
        $actual = $bankModel->findBankById($id);
        $this->assertEquals($expected, $actual);
    }
    public function testFindBankByIdBool()
    {
        $bankModel = new BankModel();
        $id = true;
        $expected = false;
        $actual = $bankModel->findBankById($id);
        $this->assertEquals($expected, $actual);
    }
    public function testFindUserByIdDouble()
    {
        $bankModel = new BankModel();
        $id = md5(78.000000 . "chuyen-de-web-1");
        $actual = $bankModel->findBankById($id);
        if (!empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testFindBankByIdNull()
    {
        $bankModel = new BankModel();
        $id = null;
        $expected = false;
        $actual = $bankModel->findBankById($id);
        $this->assertEquals($expected, $actual);
    }
    public function testFindBankByIdStringValueNumber()
    {
        $bankModel = new BankModel();
        $id = md5('78' . 'chuyen-de-web-1');
        $actual = $bankModel->findBankById($id);
        if (!empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testFindBankdByIdNegative()
    {
        $bankModel = new BankModel();
        $id = md5(-124 . "chuyen-de-web-1");
        $expected = false;
        $actual = $bankModel->findBankById($id);
        $this->assertEquals($expected, $actual);
    }
    public function testFindBankByIdArray()
    {
        $bankModel = new BankModel();
        $id = ['id' => 78];
        $expected = false;
        $actual = $bankModel->findBankById($id);
        $this->assertEquals($expected, $actual);
    }
    //Insert Banks 
    public function testInsertBanksOk()
    {
        $data = [
            'user_id' => '123',
            'cost' => '30000'
        ];
        $bankModel = new BankModel();
        $actual = $bankModel->insertBanks($data);
        $expected = true;
        $this->assertEquals($expected, $actual);
    }
    public function testInsertBanksDataEmpty()
    {
        $data = [];
        $bankModel = new BankModel();
        $actual = $bankModel->insertBanks($data);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    public function testInsertBanksDataNull()
    {
        $data = null;
        $bankModel = new BankModel();
        $actual = $bankModel->insertBanks($data);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    public function testInsertBanksDataBool()
    {
        $data = true;
        $bankModel = new BankModel();
        $actual = $bankModel->insertBanks($data);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    public function testInsertBanksDataObject()
    {
        $data = new stdClass();
        $bankModel = new BankModel();
        $actual = $bankModel->insertBanks($data);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    public function testInsertBanksDataString()
    {
        $data = 'user_id : 123';
        $bankModel = new BankModel();
        $actual = $bankModel->insertBanks($data);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    public function testInsertBanksDataNumber()
    {
        $data = 123123;
        $bankModel = new BankModel();
        $actual = $bankModel->insertBanks($data);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    public function testInsertBanksDataNegative()
    {
        $data = -123;
        $bankModel = new BankModel();
        $actual = $bankModel->insertBanks($data);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    public function testInsertBanksDataStringValueNumber()
    {
        $data = '123';
        $bankModel = new BankModel();
        $actual = $bankModel->insertBanks($data);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    public function testInsertBanksDataNotFieldUserId()
    {
        $data = [
            'cost' => 30000,
        ];
        $bankModel = new BankModel();
        $actual = $bankModel->insertBanks($data);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    public function testInsertBanksDataNotFieldCost()
    {
        $data = [
            'user_id' => 123,
        ];
        $bankModel = new BankModel();
        $actual = $bankModel->insertBanks($data);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    //Data User_id
    public function testInsertBanksDataFieldUserIdObject()
    {
        $data = [
            'user_id' => new stdClass(),
            'cost' => 400
        ];
        $bankModel = new BankModel();
        $actual = $bankModel->insertBanks($data);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    public function testInsertBanksDataFieldUserIdArray()
    {
        $array = [
            'user_id' => 123
        ];
        $data = [
            'user_id' => $array,
            'cost' => 400
        ];
        $bankModel = new BankModel();
        $actual = $bankModel->insertBanks($data);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    public function testInsertBanksDataFieldUserIdNull()
    {
        $data = [
            'user_id' => null,
            'cost' => '400'
        ];
        $bankModel = new BankModel();
        $actual = $bankModel->insertBanks($data);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    public function testInsertBanksDataFieldUserIdNagative()
    {
        $data = [
            'user_id' => '-123',
            'cost' => '400'
        ];
        $bankModel = new BankModel();
        $actual = $bankModel->insertBanks($data);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    public function testInsertBanksDataFieldUserIdNumber()
    {
        $data = [
            'user_id' => 123,
            'cost' => '400'
        ];
        $bankModel = new BankModel();
        $actual = $bankModel->insertBanks($data);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    //Data cost 
    public function testInsertBanksDataFieldCostObject()
    {
        $data = [
            'user_id' => '123',
            'cost' => new stdClass()
        ];
        $bankModel = new BankModel();
        $actual = $bankModel->insertBanks($data);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    public function testInsertBanksDataFieldCostArray()
    {
        $array = [
            'cost' => '123123123'
        ];
        $data = [
            'user_id' => '123',
            'cost' => $array
        ];
        $bankModel = new BankModel();
        $actual = $bankModel->insertBanks($data);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    public function testInsertBanksDataFieldCostNull()
    {
        $data = [
            'user_id' => '123',
            'cost' => null
        ];
        $bankModel = new BankModel();
        $actual = $bankModel->insertBanks($data);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    public function testInsertBanksDataFieldCostNagative()
    {
        $data = [
            'user_id' => '123',
            'cost' => '-400'
        ];
        $bankModel = new BankModel();
        $actual = $bankModel->insertBanks($data);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    public function testInsertBanksDataFieldCostNumber()
    {
        $data = [
            'user_id' => '123',
            'cost' => 400
        ];
        $bankModel = new BankModel();
        $actual = $bankModel->insertBanks($data);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }
}
