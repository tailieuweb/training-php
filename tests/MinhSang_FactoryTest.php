<?php
use PHPUnit\Framework\TestCase;

require_once('./models/FactoryPattern.php');

class MinhSang_FactoryTest extends TestCase
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

        $actual = $factory->make('notuser');
        $expected = false;

        return $this->assertEquals($expected, $actual);
    }

    //test make bank ok
    public function testMakeBankOk()
    {
        $factory = new FactoryPattern();

        $actual = $factory->make('bank');

        return $this->assertEquals(BankModel::getInstance(), $actual);
    }

    //test make bank not good
    public function testMakeBankNg()
    {
        $factory = new FactoryPattern();

        $actual = $factory->make('notBank');
        $expected = false;

        return $this->assertEquals($expected, $actual);
    }

    //test make is null
    public function testMakeIsNull()
    {
        $factory = new FactoryPattern();
        $actual = $factory->make(null);
        $expected = null;

        return $this->assertEquals($expected, $actual);
    }

    //test make is null
    public function testMakeIsNumber()
    {
        $factory = new FactoryPattern();
        $actual = $factory->make(12345);
        $expected = false;

        return $this->assertEquals($expected, $actual);
    }
    //test make is null
    public function testMakeIsString()
    {
        $factory = new FactoryPattern();
        $actual = $factory->make("notfound");
        $expected = false;

        return $this->assertEquals($expected, $actual);
    }
    //test make is null
    public function testMakeIsArray()
    {
        $factory = new FactoryPattern();
        $actual = $factory->make(['id','name']);
        $expected = false;

        return $this->assertEquals($expected, $actual);
    }
}
?>