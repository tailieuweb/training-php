<?php

use PHPUnit\Framework\TestCase;

use function PHPSTORM_META\type;

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

    /**
     * Test case sum negative
     */
    public function testSumNeg()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = -1;
        $expected = -2;
        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case sum negative and positive
     */
    public function testSumPosNeg()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = 4;
        $expected = 3;
        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case sum real positive
     */
    public function testSumRPos()
    {
        $userModel = new UserModel();
        $a = 1.2;
        $b = 4.5;
        $expected = 5.7;
        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case sum real negative
     */
    public function testSumRNeg()
    {
        $userModel = new UserModel();
        $a = -1.2;
        $b = -4.5;
        $expected = -5.7;
        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case sum real negative and positive
     */
    public function testSumRNegPos()
    {
        $userModel = new UserModel();
        $a = -1.2;
        $b = 4.5;
        $expected = 3.3;
        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case sum string and string
     */
//    public function testSumStr()
//    {
//        $userModel = new UserModel();
//        $a = "a";
//        $b = "b";
//        $expected = TypeError;
//        $actual = $userModel->sumb($a, $b);
//
//        $this->assertEquals($expected, $actual);
//    }
}
