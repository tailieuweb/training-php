<?php
use PHPUnit\Framework\TestCase;
require_once './models/FactoryPattern.php';

class FactoryPatternTest extends TestCase
{
    //Đặt tên function bắt đầu bằng test nha quý zị
    //Ví dụ: testFindUser()

    /*
     * Test function: make()
     * Author: Quyen
     */

     // test function make('user') in FactoryPattern
    public function testFactoryPatternUser(){
        $factoryPattern = new FactoryPattern();
        $userModel = new UserModel();

        $factory = $factoryPattern->make('user');

        $expected = $userModel;
        $actual = $factory;

        $this->assertEquals($expected,$actual);
    }
    
    // test function make('bank') in FactoryPattern
    public function testFactoryPatternBank(){
        $factoryPattern = new FactoryPattern();
        $bankModel = new BankModel();

        $factory = $factoryPattern->make('bank');

        $expected = $bankModel;
        $actual = $factory;

        $this->assertEquals($expected,$actual);
    }

    // test function make ok
    public function testMakeOk(){
        $factoryPattern = new FactoryPattern();
        $userModel = new UserModel();
        $bankModel = new BankModel();
        
        $user = 'user';
        $bank = 'bank';

        if($factoryPattern->make($user) == $userModel && $factoryPattern->make($bank) == $bankModel){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }

    // test function make not good
    public function testMakeNg(){
        $factoryPattern = new FactoryPattern();
        $userModel = new UserModel();
        $bankModel = new BankModel();
        
        $user = 'user';
        $bank = 'bank';

        if($factoryPattern->make($user) != $userModel && $factoryPattern->make($bank) != $bankModel){
            $this->assertFalse(false);
        }else{
            $this->assertTrue(true);
        }
    }

    // test function make number
    public function testMakeNumber(){
        $factoryPattern = new FactoryPattern();
        $text = 123;
        $expected = Null;
        
        $actual = $factoryPattern->make($text);
        
        $this->assertEquals($expected, $actual);
    }

    // test function make null
    public function testMakeNull(){
        $factoryPattern = new FactoryPattern();
        $text = null;
        $expected = null;
        
        $actual = $factoryPattern->make($text);

        $this->assertEquals($expected, $actual);
    }

    // test function make string
    public function testMakeStringIsEmpty(){
        $factoryPattern = new FactoryPattern();
        $text = " ";
        $expected = Null;
        
        $actual = $factoryPattern->make($text);
        
        $this->assertEquals($expected, $actual);
    }

    // test function make array
    public function testMakeArray(){
        $factoryPattern = new FactoryPattern();
        $text = array();
        $expected = Null;
        
        $actual = $factoryPattern->make($text);
        
        $this->assertEquals($expected, $actual);
    }

    // test function make object
    public function testMakeObject(){
        $factoryPattern = new FactoryPattern();
        $text = new stdClass();
        $expected = Null;
        
        $actual = $factoryPattern->make($text);
        
        $this->assertEquals($expected, $actual);
    }
}