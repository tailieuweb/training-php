<?php
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
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
        $expected = "error";
        $actual1 = $bankModel->getBanks(["keyword" => $keyword]);
        $this->assertEquals($expected, $actual1);
    }

    public function testGetBankKeywordInt()
    {
        $bankModel = new BankModel();
        $keyword = 1;
        $expected = "error";
        $actual1 = $bankModel->getBanks(["keyword" => $keyword]);
        $this->assertEquals($expected, $actual1);
    }
    public function testGetBankKeywordArray()
    {
        $bankModel = new BankModel();
        $keyword = [];
        $expected = "error";
        $actual1 = $bankModel->getBanks(["keyword" => $keyword]);
        $this->assertEquals($expected, $actual1);
    }
    public function testGetBankKeywordObject()
    {
        $bankModel = new BankModel();
        $keyword = new BankModel();
        $expected = "error";
        $actual1 = $bankModel->getBanks(["keyword" => $keyword]);
        $this->assertEquals($expected, $actual1);
    }
    public function testGetBankKeywordTrueFalse()
    {
        $bankModel = new BankModel();
        $keyword = true;
        $keyword1 = true;
        $expected = "error";
        if($keyword){
            $actual1 = $bankModel->getBanks(["keyword" => $keyword]);
        }else
        {
            $actual1 = $bankModel->getBanks(["keyword" => $keyword1]);
        }
        $this->assertEquals($expected, $actual1);
    }
}
