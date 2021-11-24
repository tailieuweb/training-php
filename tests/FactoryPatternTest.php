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
    //kiểm tra giá trị rông thì sẽ báo sai
    public function  testFactoryBankNgFull1(){
        $factoryUser = new FactoryPattern();
        $count = " ";
        $actual = $factoryUser ->make($count);
        if(empty($actual)){
            return $this -> assertTrue(true);
        }
        else{
            return $this -> assertTrue(false);
        }
    }
    //kiểm tra giá trị khác rông thì sẽ báo đúng
    public function  testFactoryBankNgFull2(){
        $factoryUser = new FactoryPattern();
        $count = "user";
        $actual = $factoryUser ->make($count);
        if(!empty($actual)){
            return $this -> assertTrue(true);
        }
        else{
            return $this -> assertTrue(false);
        }
    }
}
?>