<?php
use PHPUnit\Framework\TestCase;

class Phu_FactoryPatternTest extends TestCase
{
    public function testGetInstanceOk()
    {   
        $factoryPattern = new FactoryPattern();
        $expected = FactoryPattern::getInstance();
        $actual = $factoryPattern->getInstance();
        $this->assertEquals($expected,$actual);
    }
     //kiểm tra getInstance Null
     public function testGetInstanceNull(){
        $factoryPattern = new FactoryPattern();
        $actual = $factoryPattern->getInstance();
        if($actual != null){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
    //kiểm tra getInstance Chuổi
    public function testGetInstanceStr(){
        $factoryPattern = new FactoryPattern();
        $expected = 'zxc';
        $actual = $factoryPattern->getInstance();
        if ($actual == $expected) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }   
    }
    //kiểm tra getInstance Chuổi ký tự đặc biệt
    public function testGetInstanceStrDb(){
        $factoryPattern = new FactoryPattern();
        $expected = '@$#^!%$^%';
        $actual = $factoryPattern->getInstance();
        if ($actual == $expected) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }   
    }
   //kiểm tra getInstance Not Good
    public function testGetInstanceNG() {
        $factoryPattern = new FactoryPattern();
        $expected = factoryPattern::getInstance();
        $actual = $factoryPattern->getInstance();
        if ($actual != $expected) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }   
    }
}