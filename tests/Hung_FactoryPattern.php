<?php

use PHPUnit\Framework\TestCase;

require_once('./models/UserModel.php');
require_once('./models/FactoryPattern.php');
require_once('./models/BankModel.php');
require_once('./repositories/UserRepository.php');

class Hung_FactoryPatternTest extends TestCase
{
    //----------------------------------make function
    /**
     * Test case Okie
     * Parameter is string 'user'
     */

    public function testMakeOk_User()
    {
        $factory = new FactoryPattern();

        $actual = $factory->make('user');

        return $this->assertEquals(UserModel::getInstance(), $actual);
    }

    /**
     * Test case Okie
     * Parameter is string 'bank'
     */

    public function testMakeOk_Bank()
    {
        $factory = new FactoryPattern();

        $actual = $factory->make('bank');

        return $this->assertEquals(BankModel::getInstance(), $actual);
    }

    /**
     * Test case Okie
     * Parameter is string 'UserRepository'
     */

    public function testMakeOk_UserRepository()
    {
        $factory = new FactoryPattern();

        $actual = $factory->make('UserRepository');

        return $this->assertEquals(UserRepository::getInstance(), $actual);
    }

    /**
     * Test case Not Good
     * Parameter is integer
     */

    public function testMakeNG_Integer()
    {
        $factory = new FactoryPattern();
        $actual = $factory->make(1);
        $expected = null;

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Not Good
     * Parameter is float
     */

    public function testMakeNG_FloatPointNumber()
    {
        $factory = new FactoryPattern();
        $actual = $factory->make(1.999);
        $expected = null;

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Not Good
     * Parameter is string but it's isn't one of user, bank, UserRepository
     */

    public function testMakeNG_String()
    {
        $factory = new FactoryPattern();
        $actual = $factory->make('aaaa');
        $expected = null;

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Not Good
     * Parameter is array
     */

    public function testMakeNG_Array()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument');

        $factory = new FactoryPattern();
        $factory->make([]);
    }

    /**
     * Test case Not Good
     * Parameter is an object
     */

    public function testMakeNG_Object()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument');

        $factory = new FactoryPattern();
        $factory->make(new stdClass);
    }

    /**
     * Test case Not Good
     * Parameter is null
     */

    public function testMakeNG_Null()
    {
        $this->expectException(ArgumentCountError::class);
        $this->expectExceptionMessage('Too few argument');

        $factory = new FactoryPattern();
        $factory->make(null);
    }

    /**
     * Test case Not Good
     * Parameter is boolean
     */

    public function testMakeNG_Bool()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument');

        $factory = new FactoryPattern();
        $factory->make(true);
    }

    /**
     * Test case Not Good
     * There is no parameters
     */

    public function testMakeNG_NoParams()
    {
        $this->expectException(ArgumentCountError::class);
        $this->expectExceptionMessage('Too few argument');

        $factory = new FactoryPattern();
        $factory->make();
    }
}
