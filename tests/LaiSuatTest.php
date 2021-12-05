<?php

use PHPUnit\Framework\TestCase;

class LaiSuatTest extends TestCase
{
    /**
     * Test Case for cost function
     */
    public function testCostOKIsArray()
    {
        $bmd   = new BankModel();
        $lx = new LaiSuat();
        $lx->setBank($bmd);
        $banks = $lx->cost();
        $this->assertIsArray($banks);
        $this->assertEquals(2, count($banks));
    }
    public function testCostNGIsString()
    {
        $bmd   = new BankModel();
        $lx = new LaiSuat();
        $lx->setBank($bmd);
        $banks = $lx->cost();
        $exceptions = "This is array";
        if ($banks != $exceptions) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testCostNGIsNumber()
    {
        $bmd   = new BankModel();
        $lx = new LaiSuat();
        $lx->setBank($bmd);
        $banks = $lx->cost();
        $exceptions = 123;
        if ($banks != $exceptions) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testCostIsGuestOKValueInArray()
    {
        $bmd   = new BankModel();
        $excId = 2;
        $excName = "123";
        $excCost = 0;
        $excLaiXuat = 0;
        $lx = new LaiSuat();
        $lx->setBank($bmd);
        $actBanks = $lx->cost();
        foreach ($actBanks as $act) {
            if ($act['id'] == $excId) {
                $this->assertEquals($excName, $act['name']);
                $this->assertEquals($excCost, $act['SoDu']);
                $this->assertEquals($excLaiXuat, $act['LaiXuat']);
            }
        }
    }
    public function testCostIsGuestNGValueInArray()
    {
        $bmd   = new BankModel();
        $excId = 1;
        $excName = "345";
        $lx = new LaiSuat();
        $lx->setBank($bmd);
        $actBanks = $lx->cost();
        foreach ($actBanks as $act) {
            if ($act['id'] == $excId) {
                if ($act['name'] != $excName) {
                    $this->assertTrue(true);
                } else {
                    $this->assertTrue(false);
                }
            }
        }
        // $this->assertEquals(6, count($banks));
    }
    /**
    * Test Case for tilephantram function
    */
    //ok
    public function testTilePhanTramOK()
    {
        $bmd   = new BankModel();
        $lx = new LaiSuat();
        $lx->setBank($bmd);
        $expected = 0.3;

        $actual = $lx->tilephantram();

        $this->assertEquals($expected, $actual);
    }
    public function testTilePhanTramNG()
    {
        $bmd   = new BankModel();
        $lx = new LaiSuat();
        $lx->setBank($bmd);
        $expected = 0.4;

        $actual = $lx->tilephantram();

        if ($actual != $expected) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testTilePhanTramNGNegative()
    {
        $bmd   = new BankModel();
        $lx = new LaiSuat();
        $lx->setBank($bmd);
        $expected = -0.3;

        $actual = $lx->tilephantram();

        if ($actual != $expected) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    
    public function testTilePhanTramOKIsFloat()
    {
        $bmd   = new BankModel();
        $lx = new LaiSuat();
        $lx->setBank($bmd);
        $expected = 0.3;

        $actual = $lx->tilephantram();
        $this->assertIsFloat($actual);
    }

    public function testTilePhanTramNGIsInt()
    {
        $bmd   = new BankModel();
        $lx = new LaiSuat();
        $lx->setBank($bmd);
        $expected = 0.3;

        $actual = $lx->tilephantram();
        $this->assertIsNotInt($actual);
    }
    
    public function testTilePhanTramNGIsString()
    {
        $bmd   = new BankModel();
        $lx = new LaiSuat();
        $lx->setBank($bmd);
        $expected = -0.3;

        $actual = $lx->tilephantram();

        $this->assertIsNotString($actual);

    }
    
    public function testTilePhanTramNGIsArray()
    {
        $bmd   = new BankModel();
        $lx = new LaiSuat();
        $lx->setBank($bmd);
        $expected = -0.3;

        $actual = $lx->tilephantram();

        $this->assertIsNotArray($actual);
    }
}
