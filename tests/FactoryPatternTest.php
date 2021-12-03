<?php

use PHPUnit\Framework\TestCase;

class FactoryPatternTest extends TestCase
{
    /**
     * Test make user
     */
    public function testMakeUser()
    {
        $factoryPattern = new FactoryPattern();
        $user = 'user';
        $expteced = new UserModel();

        $actual =  $factoryPattern->make($user);

        $this->assertEquals($expteced, $actual);
    }

    /**
     * Test make bank
     */
    public function testMakeBank()
    {
        $factoryPattern = new FactoryPattern();
        $bank = 'bank';
        $expteced = new BankModel();

        $actual =  $factoryPattern->make($bank);

        $this->assertEquals($expteced, $actual);
    }

    /**
     * Test make string null
     */
    public function testMakeStringNull()
    {
        $factoryPattern = new FactoryPattern();
        $user = null;
        $expteced = null;

        $actual =  $factoryPattern->make($user);
        // var_dump($actual);die();

        $this->assertEquals($expteced, $actual);
    }

    /**
     * Test make string fase
     */
    public function testMakeStringFase()
    {
        $factoryPattern = new FactoryPattern();
        $user = 'ahwbsnd';
        $expteced = null;

        $actual =  $factoryPattern->make($user);

        $this->assertEquals($expteced, $actual);
    }

    /**
     * Test make num
     */
    public function testMakeNum()
    {
        $factoryPattern = new FactoryPattern();
        $user = 121;
        $expteced = null;

        $actual =  $factoryPattern->make($user);
        // var_dump($actual);die();

        $this->assertEquals($expteced, $actual);
    }

    /**
     * Test make boolean true
     */
    public function testMakeBooleanTrueUserModel()
    {
        $factoryPattern = new FactoryPattern();
        $user = true;
        $expteced = new UserModel();

        $actual =  $factoryPattern->make($user);
        // var_dump($actual);die();

        $this->assertEquals($expteced, $actual);
    }

    /**
     * Test make boolean true
     */
    public function testMakeBooleanTrueBankModel()
    {
        $factoryPattern = new FactoryPattern();
        $user = true;
        $expteced = new BankModel();

        $actual =  $factoryPattern->make($user);
        // var_dump($actual);die();

        $this->assertEquals($expteced, $actual);
    }

    /**
     * Test make boolean false
     */
    public function testMakeBooleanFalse()
    {
        $factoryPattern = new FactoryPattern();
        $user = false;
        $expteced = null;

        $actual =  $factoryPattern->make($user);
        // var_dump($actual);die();

        $this->assertEquals($expteced, $actual);
    }

    /**
     * Test make object UserModel
     */
    public function testMakeObjectUserModel()
    {
        $factoryPattern = new FactoryPattern();
        $user = new UserModel();
        $expteced = null;

        $actual =  $factoryPattern->make($user);
        // var_dump($actual);die();

        $this->assertEquals($expteced, $actual);
    }

    /**
     * Test make object BankModel
     */
    public function testMakeObjectBankModel()
    {
        $factoryPattern = new FactoryPattern();
        $user = new BankModel();
        $expteced = null;

        $actual =  $factoryPattern->make($user);
        // var_dump($actual);die();

        $this->assertEquals($expteced, $actual);
    }

    /**
     * Test make array
     */
    public function testMakeArray()
    {
        $factoryPattern = new FactoryPattern();
        $user = [1, 2, 3];
        $expteced = null;

        $actual =  $factoryPattern->make($user);
        // var_dump($actual);die();

        $this->assertEquals($expteced, $actual);
    }

    /**
     * Test make array
     */
    public function testMakeArrayNull()
    {
        $factoryPattern = new FactoryPattern();
        $user = [];
        $expteced = null;

        $actual =  $factoryPattern->make($user);
        // var_dump($actual);die();

        $this->assertEquals($expteced, $actual);
    }
}
