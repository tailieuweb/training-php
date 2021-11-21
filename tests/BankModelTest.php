<?php

use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{

    /**
     * Test case Ok
     */
    public function testGetInstanceOk()
    {   
       
        $banModel = new BankModel();

        // su dung gettype de kiem tra tra ve tring
        $bank = $banModel->getInstance()->getBanks();
        $actual = gettype($bank);
        $expected = 'array';
        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Ok
     */
    public function testGetInstanceOkObject()
    {
        $banModel = new BankModel();

        $bank = $banModel->getInstance();
        $actual = gettype($bank);
        // var_dump($actual);die();
        $expected = 'object';

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Ok
     */
    public function testGetInstanceOkBool()
    {
        $banModel = new BankModel();
        $bank = $banModel->getInstance();
        // Kiem tra doi tuong tra ve TRUE/FALSE
        $actual = $bank instanceof BankModel;
        // var_dump($actual).die();
        $expected = true;
        
        $this->assertEquals($expected, $actual);
    }
}