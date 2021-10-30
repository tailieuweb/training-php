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

    public function testSumAm()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = -2;
        $expected = -3;
        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    public function testSumSoThuc()
    {
        $userModel = new UserModel();
        $a = -1.3;
        $b = -2.3;
        $expected = -3.6;
        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    public function testSumChuoiVaSo()
    {
        $userModel = new UserModel();
        $a = 'a';
        $b = -2.3;
        $expected = 'error';
        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    public function testSumChuoiVaChuoi()
    {
        $userModel = new UserModel();
        $a = 'a';
        $b = 'b';
        $expected = 'error';
        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
}
