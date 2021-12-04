<?php

use PHPUnit\Framework\TestCase;

require_once('./models/FactoryPattern.php');

class TestFactoryPattern extends TestCase
{
    //test make user ok
    public function testMakeUserOk()
    {
        $factory = new FactoryPattern();

        $actual = $factory->make('user');

        return $this->assertEquals(UserModel::getInstance(), $actual);
    }
    //test make user ng
    public function testMakeUserNg()
    {
        $factory = new FactoryPattern();

        $actual = $factory->make('bank');

        return $this->assertEquals(UserModel::getInstance(), $actual);
    }
    //test make bank ok
    public function testMakeBankOk()
    {
        $factory = new FactoryPattern();

        $actual = $factory->make('bank');

        return $this->assertEquals(BankModel::getInstance(), $actual);
    }
    //test make bank ng
    public function testMakeBankNg()
    {
        $factory = new FactoryPattern();

        $actual = $factory->make('user');

        return $this->assertEquals(BankModel::getInstance(), $actual);
    }
    //test make is null
    public function testMakeIsNull()
    {
        $factory = new FactoryPattern();
        $actual = $factory->make(null);
        $expected = null;

        return $this->assertEquals($expected, $actual);
    }
    //test make is string
    public function testMakeIsString()
    {
        $factory = new FactoryPattern();

        $actual = $factory->make('quanajkdhakhd');
        $expected = null;

        return $this->assertEquals($expected, $actual);
    }
    //test make is number
    public function testMakeIsNumber()
    {
        $factory = new FactoryPattern();

        $actual = $factory->make('165425165');
        $expected = null;

        return $this->assertEquals($expected, $actual);
    }
    //test make is object
    public function testMakeIsObject()
    {
        $factory = new FactoryPattern();

        $actual = $factory->make(new FactoryPattern());
        $expected = null;

        return $this->assertEquals($expected, $actual);
    }
    //test make is array
    public function testMakeIsArray()
    {
        $factory = new FactoryPattern();

        $actual = $factory->make([]);
        $expected = null;

        return $this->assertEquals($expected, $actual);
    }
    //test make is float
    public function testMakeIsFloat()
    {
        $factory = new FactoryPattern();

        $actual = $factory->make(1.22222);
        $expected = null;

        return $this->assertEquals($expected, $actual);
    }
}