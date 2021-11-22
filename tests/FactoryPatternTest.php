<?php

use PHPUnit\Framework\TestCase;

class FactoryPatternTest extends TestCase {
    /**
     * Test factory in user enforcement
     * NG1
     */
    public function  testFactoryUserNg1(){
        $factoryUser = new FactoryPattern();
        $count = "user";
        $actual = $factoryUser ->make($count,UserModel::getInstance());
        if($actual != true)
        {
            
            $this->assertTrue(false); 
        }
        else
        {
            $this->assertTrue(true); 
        }
    }
    /**
     * Test factory in bank enforcement
     * NG1
     */
    public function  testFactoryBankNg1(){
        $factoryUser = new FactoryPattern();
        $count = "bank";
        $actual = $factoryUser ->make($count,BankModel::getInstance());
        if($actual != true)
        {
            $this->assertTrue(false); 
        }
        else
        {
            $this->assertTrue(true); 
        }
    }
    public function testFactoryFailure()
    {
        $factoryUser = new FactoryPattern();
        $model = 2;
        // $exptected = 7;
        $actual = $factoryUser ->make($model);
        $this->assertEquals(count($actual));
    }
}
?>