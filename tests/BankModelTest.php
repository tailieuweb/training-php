<?php
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    public function testGetBankOk()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $user_id = '1';
        $actual = $bankModel->getBanks();
        $this->assertEquals($user_id, $actual[0]["user_id"]);
        
        $keyword = "1";
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
        $keyword = 1;
        $actual1 = $bankModel->getBanks(["keyword" => $keyword]);
        $this->assertEquals(strtolower($keyword), strtolower($actual1[0]["user_id"]));
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

    public function testGetBankKeywordTrueFalse()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $keyword = true;
        $keyword1 = false;
        if($keyword){
            $actual1 = $bankModel->getBanks(["keyword" => $keyword]);
            $this->assertEquals(strtolower($keyword), strtolower($actual1[0]["user_id"]));
        }else
        {
            $actual1 = $bankModel->getBanks(["keyword" => $keyword1]);
            $actual = $bankModel->getBanks();
            $this->assertEquals($actual, $actual1);
        }
    }
}
