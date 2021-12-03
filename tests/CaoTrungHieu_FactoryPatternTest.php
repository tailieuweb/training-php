<?php
use PHPUnit\Framework\TestCase;

class CaoTrungHieu_FactoryPatternTest extends TestCase
{
    /**
     * Test make function, 'Hiếu Cao' do this 
     * */
    // Test case make with param is 'user' String
    public function testMakeClassUserModel()
    {
        $factoryPattern = new FactoryPattern();
        $userModel = $factoryPattern->make('user');
        $expected = true;
        $actual = is_object($userModel) && get_class($userModel) == 'UserModel';

        $this->assertEquals($expected, $actual);
    }
    // Test case make with param is 'bank' String
    public function testMakeClassBankModel()
    {
        $factoryPattern = new FactoryPattern();
        $bankModel = $factoryPattern->make('bank');
        $expected = true;
        $actual = is_object($bankModel) && get_class($bankModel) == 'BankModel';

        $this->assertEquals($expected, $actual);
    }
    // Test case make with param is 'user-repository' String
    public function testMakeClassUserRepository()
    {
        $factoryPattern = new FactoryPattern();
        $UserRepository = $factoryPattern->make('user-repository');
        $expected = true;
        $actual = is_object($UserRepository) && get_class($UserRepository) == 'UserRepository';

        $this->assertEquals($expected, $actual);
    }
    // Test case make with param is not a class name string
    public function testMakeWithParamIsNotClassName()
    {
        $factoryPattern = new FactoryPattern();
        $actual = $factoryPattern->make('not-a-class-name');
        $expected = NULL;

        $this->assertEquals($expected, $actual);
    }
    // Test case make with param NULL
    public function testMakeWithParamNull()
    {
        $factoryPattern = new FactoryPattern();
        $param = NULL;
        $actual = $factoryPattern->make($param);
        $expected = NULL;

        $this->assertEquals($expected, $actual);
    }
    // Test case make with param is positive number
    public function testMakeWithParamIsPositiveNumber()
    {
        $factoryPattern = new FactoryPattern();
        $param = 1;
        $actual = $factoryPattern->make($param);
        $expected = NULL;

        $this->assertEquals($expected, $actual);
    }
    // Test case make with param is negative number
    public function testMakeWithParamIsNegativeNumber()
    {
        $factoryPattern = new FactoryPattern();
        $param = -1;
        $actual = $factoryPattern->make($param);
        $expected = NULL;

        $this->assertEquals($expected, $actual);
    }
    // Test case make with param is a object
    public function testMakeWithParamObject()
    {
        $factoryPattern = new FactoryPattern();
        $param = new ResultClass();
        $actual = $factoryPattern->make($param);
        $expected = NULL;

        $this->assertEquals($expected, $actual);
    }
    // Test case make with param is bool type, value is true
    public function testMakeWithParamTrue()
    {
        $factoryPattern = new FactoryPattern();
        $param = true;
        $actual = $factoryPattern->make($param);
        $expected = NULL;

        $this->assertEquals($expected, $actual);
    }
    // Test case make with param is bool type, value is false
    public function testMakeWithParamFalse()
    {
        $factoryPattern = new FactoryPattern();
        $param = false;
        $actual = $factoryPattern->make($param);
        $expected = NULL;

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test getInstance function, 'Hiếu Cao' do this 
     * */
    // Test case getInstance Good
    public function testGetInstanceGood()
    {
        $factoryPatterSingleton = FactoryPattern::getInstance();
        $normalFactoryPatter = new FactoryPattern();

        $this->assertEquals($factoryPatterSingleton, $normalFactoryPatter);
    }
    // Test case getInstance Not Good
    public function testGetInstanceNg()
    {
        $factoryPatterSingleton = FactoryPattern::getInstance();
        $this->assertFalse(!is_object($factoryPatterSingleton) ||
            !get_class($factoryPatterSingleton) == 'FactoryPattern');
    }
}
