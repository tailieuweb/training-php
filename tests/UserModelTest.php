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

       $actual = $userModel->sumb($a,$b);

       $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Not good
     */
    public function testSumDuong()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 2;

        $actual = $userModel->sumb($a,$b);

        if ($actual != 3) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
        /**
     * Test case Okie
     */
    public function testSumAm()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = -2;
        $expected = -3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Okie
     */
    public function testSumAmDuong()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = 2;
        $expected = 1;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Okie
     */
    public function testSumSoThuc()
    {
        $userModel = new UserModel();
        $a = 1.5;
        $b = 2.1;
        $expected = 3.6;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Okie
     */
    public function testSumSoChuoi()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = "2";
        $expected = 3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Okie
     */
    public function testSumChuoi()
    {
        $userModel = new UserModel();
        $a = "1";
        $b = "2";
        $expected = 3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
}