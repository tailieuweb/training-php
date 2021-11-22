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
}
