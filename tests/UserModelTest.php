<?php

use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{

    /**
     * 1) Test trường hợp cộng 2 số dương
     */
    public function testPositiveNumbers()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 2;
        $expected = 3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    /**
     * 2) Test trường hợp cộng 2 số âm
     */
    public function testNegativeNumbers()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = -2;
        $expected = -3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    /**
     * 3) Test trường hợp cộng 1 số âm 1 số dương
     */
    public function testNegaPosNumbers()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = 2;
        $expected = 1;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    /**
     * 4) Test trường hợp cộng 2 số thực dương
     */
    public function testPositiveRealNumbers()
    {
        $userModel = new UserModel();
        $a = 1.1;
        $b = 2.1;
        $expected = 3.2;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    /**
     * 5) Test trường hợp cộng 2 số thực âm
     */
    public function testNegativeRealNumbers()
    {
        $userModel = new UserModel();
        $a = -1.1;
        $b = -2.1;
        $expected = -3.2;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    /**
     * 6) Test trường hợp cộng 1 số thực âm và 1 số thực dương
     */
    public function testNegaPosRealNumbers()
    {
        $userModel = new UserModel();
        $a = -1.1;
        $b = 2.1;
        $expected = 1;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    /**
     * 7) Test trường hợp cộng chuỗi  và số
     */
    public function testStringsNumbers()
    {
        $userModel = new UserModel();
        $a = "Lap";
        $b = 2.1;
        $expected = "test error";

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    /**
     * 8) Test trường hợp cộng chuỗi và chuỗi
     */
    public function testStringsStrings()
    {
        $userModel = new UserModel();
        $a = "Tran Van";
        $b = "Lap";
        $expected = "test error";

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
}
