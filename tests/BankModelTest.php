<?php

use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    // Minh Tien
    //
    public function testGetBanksOk()
    {
        $BankModel = new BankModel();

        $expected = '2';

        $Bank = $BankModel->getBanks();
        $this->assertEquals($expected, $Bank[0]['user_id']);
    }
    //
    public function testGetBanksNg()
    {
        $BankModel = new BankModel();

        $params['keyword'] = 999999;

        $Bank = $BankModel->getBanks($params);

        if ($Bank == 'error') {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    //
    public function testGetBanksNgAm()
    {
        $BankModel = new BankModel();

        $params['keyword'] = -9;

        $Bank = $BankModel->getBanks($params);

        if ($Bank == 'error') {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    //
    public function testGetBanksDouble()
    {
        $BankModel = new BankModel();

        $params['keyword'] = 1.1;

        $Bank = $BankModel->getBanks($params);

        if ($Bank == 'error') {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    //
    public function testGetBanksSpecialCharacters()
    {
        $BankModel = new BankModel();

        $params['keyword'] = '[/**//#@^%$]';

        $Bank = $BankModel->getBanks($params);

        if ($Bank == 'error') {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    //
    public function testGetBanksIsArray()
    {
        $BankModel = new BankModel();

        $params['keyword'] = [];

        $Bank = $BankModel->getBanks($params);

        if ($Bank == 'error') {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    //
    public function testGetBanksStr()
    {
        $BankModel = new BankModel();

        $params['keyword'] = 'abc';


        $expected = 'error';
        $actual = $BankModel->getBanks($params);

        $this->assertEquals($expected, $actual);
    }

    public function testGetBanksObject()
    {
        $BankModel = new BankModel();
        $params['keyword'] = new stdClass();
        $expected = 'error';
        $actual = $BankModel->getBanks($params);
        $this->assertEquals($expected, $actual);
    }
}
