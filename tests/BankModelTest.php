<?php

use PHPUnit\Framework\TestCase;

require_once 'models/BankModel.php';
class BankModelTest extends TestCase
{
    /*testFindBankById*/
    public function testFindBankByIdOk()
    {
        $bankModel = new BankModel();

        $id = 1;
        $mongDoiUserID = '10';

        $bank = $bankModel->findBankById($id);

        $this->assertEquals($mongDoiUserID, $bank[0]['user_id']);
    }
    public function testFindBankByIdNg()
    {
        $bankModel = new BankModel();
        $id = 999999;
        $bank = $bankModel->findBankById($id);

        if (empty($bank)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testFindBankByIdStr()
    {
        $bankModel = new BankModel();
        $id = 'asdf';
        $expected = 'error';
        $actual = $bankModel->findBankById($id);

        $this->assertEquals($expected, $actual);
    }
    public function testFindUserByIdNull()
    {
        $bankModel = new BankModel();
        $id = '';
        $expected = 'error';
        $actual = $bankModel->findBankById($id);

        $this->assertEquals($expected, $actual);
    }			
    /*testInsertBank */
    public function testInsertBankOk()
    {
        $bankModel = new BankModel();
        $input = [
            'user_id' => '10',
            'cost' => '5000',
        ];
        $actual = $bankModel->insertBank($input);
        $this->assertEquals(true, $actual);
    }
    public function testInsertBankStr()
    {
        $bankModel = new BankModel();
        $input = [
            'user_id' => 'abc',
            'cost' => 'nam ngan',
        ];
        $actual = $bankModel->insertBank($input);
        $this->assertEquals(false, $actual);
    }
    public function testInsertBankNull()
    {
        $bankModel = new BankModel();
        $input = [
            'user_id' => null,
            'cost' => null,
        ];
        $actual = $bankModel->insertBank($input);
        $this->assertEquals(false, $actual);
    }
    public function testInsertBankEmpty()
    {
        $bankModel = new BankModel();
        $input = [
            'user_id' => '',
            'cost' => '',
        ];
        $actual = $bankModel->insertBank($input);
        $this->assertEquals(false, $actual);
    }
    public function testInsertBankObject()
    {
        $bankModel = new BankModel();
        $input = [
            'user_id' => new stdClass(),
            'cost' => new stdClass(),
        ];
        $actual = $bankModel->insertBank($input);
        $this->assertEquals(false, $actual);
    }
    public function testInsertBankTrueFalse()
    {
        $bankModel = new BankModel();
        $input = [
            'user_id' => true,
            'cost' => true,
        ];
        $actual = $bankModel->insertBank($input);
        $this->assertEquals(false, $actual);
    }
    /*testDeleteBankByID */
    public function testDeleteBankByIdOk()
    {
        $bankModel = new BankModel();
        $id = 42;
        $actual = $bankModel->deleteBankById($id);
        $this->assertEquals(true, $actual);
    }
    public function testDeleteBankByIdStr()
    {
        $bankModel = new BankModel();
        $id = 'ádsajdh';
        $actual = $bankModel->deleteBankById($id);
        $this->assertEquals(false, $actual);
    }
    public function testDeleteBankByIdNull()
    {
        $bankModel = new BankModel();
        $id = null;
        $actual = $bankModel->deleteBankById($id);
        $this->assertEquals(false, $actual);
    }
    public function testDeleteBankByIdEmpty()
    {
        $bankModel = new BankModel();
        $id = '';
        $actual = $bankModel->deleteBankById($id);
        $this->assertEquals(false, $actual);
    }
    /*testUpdateBank */
    public function testUpdateBankOk()
    {
        $bankModel = new BankModel();
        $input = [
            'id' => '11',
            'user_id' => '10',
            'cost' => '5000',
        ];
        $actual = $bankModel->updateBank($input);
        $this->assertEquals(true, $actual);
    }
    public function testUpdateBankStr()
    {
        $bankModel = new BankModel();
        $input = [
            'id' => '11',
            'user_id' => 'dsadasđ',
            'cost' => 'sdwdw',
        ];
        $actual = $bankModel->updateBank($input);
        $this->assertEquals(false, $actual);
    }
    public function testUpdateBankNull()
    {
        $bankModel = new BankModel();
        $input = [
            'id' => '11',
            'user_id' => null,
            'cost' => null,
        ];
        $actual = $bankModel->updateBank($input);
        $this->assertEquals(false, $actual);
    }
    public function testUpdateBankEmpty()
    {
        $bankModel = new BankModel();
        $input = [
            'id' => '11',
            'user_id' => '',
            'cost' => '',
        ];
        $actual = $bankModel->updateBank($input);
        $this->assertEquals(false, $actual);
    }
    public function testUpdateBankIdEmpty()
    {
        $bankModel = new BankModel();
        $input = [
            'id' => '',
            'user_id' => '10',
            'cost' => '5000',
        ];
        $actual = $bankModel->updateBank($input);
        $this->assertEquals(false, $actual);
    }
    public function testUpdateBankIdStr()
    {
        $bankModel = new BankModel();
        $input = [
            'id' => 'aaa',
            'user_id' => '10',
            'cost' => '5000',
        ];
        $actual = $bankModel->updateBank($input);
        $this->assertEquals(false, $actual);
    }
    public function testUpdateBankIdNull()
    {
        $bankModel = new BankModel();
        $input = [
            'id' => null,
            'user_id' => '10',
            'cost' => '5000',
        ];
        $actual = $bankModel->updateBank($input);
        $this->assertEquals(false, $actual);
    }
    public function testGetBankOk()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $user_id = '10';
        $actual = $bankModel->getBanks();
        $this->assertEquals($user_id, $actual[0]["user_id"]);

        $keyword = "10";
        $actual1 = $bankModel->getBanks(["keyword" => $keyword]);
        $this->assertEquals(strtolower($keyword), strtolower($actual1[0]["user_id"]));
    }
    public function testGetBankNull()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $param = null;
        $expected = "error";
        $actual = $bankModel->getBanks($param);
        $this->assertEquals($expected, $actual);
    }
    public function testGetBankEmpty()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $param = "";
        $expected = "error";
        $actual = $bankModel->getBanks($param);
        $this->assertEquals($expected, $actual);
    }
    public function testGetBankStr()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $param = "error";
        $expected = "error";
        $actual = $bankModel->getBanks($param);
        $this->assertEquals($expected, $actual);
    }
    public function testGetBankNE()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $param = 99;
        $expected = "error";
        $actual = $bankModel->getBanks($param);
        $this->assertEquals($expected, $actual);
    }
    public function testGetBankTrue()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $param = true;
        $expected = "error";
        $actual = $bankModel->getBanks($param);
        $this->assertEquals($expected, $actual);
    }
    public function testGetBankFalse()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $param = false;
        $expected = "error";
        $actual = $bankModel->getBanks($param);
        $this->assertEquals($expected, $actual);
    }
    public function testGetBankObject()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $param = new BankModel();
        $expected = "error";
        $actual = $bankModel->getBanks($param);
        $this->assertEquals($expected, $actual);
    }

    public function testGetBankKeywordEmpty()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $keyword = "";
        $actual1 = $bankModel->getBanks(["keyword" => $keyword]);
        $expected = $actual1;
        $this->assertEquals($expected, $actual1);
    }

    public function testGetBankKeywordNull()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $keyword = null;
        $actual = $bankModel->getBanks(["keyword" => $keyword]);
        $actual1 = $bankModel->getBanks();
        $this->assertEquals($actual1, $actual);
    }

    public function testGetBankKeywordInt()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $keyword = 10;
        $expected = "error";
        $actual1 = $bankModel->getBanks(["keyword" => $keyword]);
        $this->assertEquals($expected, $actual1);
    }
    public function testGetBankKeywordArray()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $keyword = [];
        $actual = $bankModel->getBanks(["keyword" => $keyword]);
        $actual1 = $bankModel->getBanks();
        $this->assertEquals($actual1, $actual);
    }
    public function testGetBankKeywordObject()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $keyword = new BankModel();
        $expected = "error";
        $actual = $bankModel->getBanks(["keyword" => $keyword]);
        $this->assertEquals($expected, $actual);
    }    


    public function testGetBankKeywordTrueFalse()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $keyword = true;
        $keyword1 = false;
        $expected = "error";
        if ($keyword) {
            $actual1 = $bankModel->getBanks(["keyword" => $keyword]);
            $this->assertEquals($expected, $actual1);
        } else {
            $actual1 = $bankModel->getBanks(["keyword" => $keyword1]);
            $this->assertEquals($expected, $actual1);
        }
    }
}
