<?php

use PHPUnit\Framework\TestCase;

require_once 'models/BankModel.php';
class BankModelTest extends TestCase
{
    /*testFindBankById*/
    public function testFindBankByIdOk()
    {
        $bankModel = new BankModel();

        $id = 9;
        $mongDoiUserID = '3';

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
    // public function testFindUserByIdObject() {			
    //     $bankModel = new BankModel();				

    //             $id = new stdClass();			
    //             $expected = 'error';			
    //             $actual = $userModel->findBankById($id);			

    //             $this->assertEquals($expected, $actual);			
    // }					
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
        $bankModel = new BankModel();
        $user_id = '1';
        $actual = $bankModel->getBanks();
        $this->assertEquals($user_id, $actual[0]["user_id"]);

        $keyword = "1";
        $actual1 = $bankModel->getBanks(["keyword" => $keyword]);
        $this->assertEquals(strtolower($keyword), strtolower($actual1[0]["user_id"]));
    }
    public function testGetBankNull()
    {
        $bankModel = new BankModel();
        $param = null;
        $expected = "error";
        $actual = $bankModel->getBanks($param);
        $this->assertEquals($expected, $actual);
    }
    public function testGetBankEmpty()
    {
        $bankModel = new BankModel();
        $param = "";
        $expected = "error";
        $actual = $bankModel->getBanks($param);
        $this->assertEquals($expected, $actual);
    }
    public function testGetBankStr()
    {
        $bankModel = new BankModel();
        $param = "error";
        $expected = "error";
        $actual = $bankModel->getBanks($param);
        $this->assertEquals($expected, $actual);
    }
    public function testGetBankNE()
    {
        $bankModel = new BankModel();
        $param = 99;
        $expected = "error";
        $actual = $bankModel->getBanks($param);
        $this->assertEquals($expected, $actual);
    }
    public function testGetBankTrue()
    {
        $bankModel = new BankModel();
        $param = true;
        $expected = "error";
        $actual = $bankModel->getBanks($param);
        $this->assertEquals($expected, $actual);
    }
    public function testGetBankFalse()
    {
        $bankModel = new BankModel();
        $param = false;
        $expected = "error";
        $actual = $bankModel->getBanks($param);
        $this->assertEquals($expected, $actual);
    }
    public function testGetBankObject()
    {
        $bankModel = new BankModel();
        $param = new BankModel();
        $expected = "error";
        $actual = $bankModel->getBanks($param);
        $this->assertEquals($expected, $actual);
    }

    public function testGetBankKeywordEmpty()
    {
        $bankModel = new BankModel();
        $keyword = "";
        $actual1 = $bankModel->getBanks(["keyword" => $keyword]);
        $expected = $actual1;
        $this->assertEquals($expected, $actual1);
    }

    public function testGetBankKeywordNull()
    {
        $bankModel = new BankModel();
        $keyword = null;
        $actual = $bankModel->getBanks(["keyword" => $keyword]);
        $actual1 = $bankModel->getBanks();
        $this->assertEquals($actual1, $actual);
    }

    public function testGetBankKeywordInt()
    {
        $bankModel = new BankModel();
        $keyword = 1;
        $actual1 = $bankModel->getBanks(["keyword" => $keyword]);
        $this->assertEquals(strtolower($keyword), strtolower($actual1[0]["user_id"]));
    }
    public function testGetBankKeywordArray()
    {
        $bankModel = new BankModel();
        $keyword = [];
        $actual = $bankModel->getBanks(["keyword" => $keyword]);
        $actual1 = $bankModel->getBanks();
        $this->assertEquals($actual1, $actual);
    }

    public function testGetBankKeywordTrueFalse()
    {
        $bankModel = new BankModel();
        $keyword = true;
        $keyword1 = false;
        if ($keyword) {
            $actual1 = $bankModel->getBanks(["keyword" => $keyword]);
            $this->assertEquals(strtolower($keyword), strtolower($actual1[0]["user_id"]));
        } else {
            $actual1 = $bankModel->getBanks(["keyword" => $keyword1]);
            $actual = $bankModel->getBanks();
            $this->assertEquals($actual, $actual1);
        }
    }
}
