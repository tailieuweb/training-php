<?php

use PHPUnit\Framework\TestCase;

class LaiSuatTest extends TestCase
{
    /**
     * Test Case for cost function
     */
    public function testCostIsArray()
    {
        $bmd   = new BankModel();
        $lx = new LaiSuat();
        $lx->setBank($bmd);
        $banks = $lx->cost();
        $this->assertIsArray($banks);
        $this->assertEquals(6, count($banks));
    }
    public function testCostIsGuestOKValueInArray()
    {
        $bmd   = new BankModel();
        $excId = 6;
        $excName = "thien";
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
        $excId = 4;
        $excName = "thien";
        $excCost = 0;
        $excLaiXuat = 0;
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
                if ($act['SoDu'] != $excCost) {
                    $this->assertTrue(true);
                } else {
                    $this->assertTrue(false);
                }
                if ($act['LaiXuat'] != $excLaiXuat) {
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
    public function testTilePhanTramNGStr()
    {
        $bmd   = new BankModel();
        $lx = new LaiSuat();
        $lx->setBank($bmd);
        $expected = "0.3";

        $actual = $lx->tilephantram();

        $this->assertEquals($expected, $actual);
        if ($actual == $expected) {
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
}
