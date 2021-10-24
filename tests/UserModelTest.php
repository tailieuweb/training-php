<?php

use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{

    /**
     * Test case Okie
     */
    public function testSumOk()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 2;
        $expected = 3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Not good
     */
    public function testSumNg()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 2;

        $actual = $userModel->sumb($a, $b);

        if ($actual != 3) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    public function testSumPositivevsNegative()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = -2;

        $actual = $userModel->sumb($a, $b);

        if ($actual != -1) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    public function testSumNumbervsString()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = '1';

        $actual = $userModel->sumb($a, $b);

        if ($actual == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    public function testSumStringvsString()
    {
        $userModel = new UserModel();
        $a = '1';
        $b = '1';

        $actual = $userModel->sumb($a, $b);

        if ($actual == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testSumIntegervsDouble()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 1.5;

        $actual = $userModel->sumb($a, $b);

        if ($actual != 2.5) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
}
