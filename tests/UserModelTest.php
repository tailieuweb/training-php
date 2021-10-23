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
    public function testSumNg()
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
     * Test case so am
     */
    public function testSumAm()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = -2;

        $actual = $userModel->sumb($a,$b);

        if ($actual != -3) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
       /**
     * Test case am duong
     */
    public function testSumAD()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = 2;

        $actual = $userModel->sumb($a,$b);

        if ($actual != 1) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
       /**
     * Test case so thuc
     */
    public function testSumSoThuc()
    {
        $userModel = new UserModel();
        $a = 3.2;
        $b = 1.2;

        $actual = $userModel->sumb($a,$b);

        if ($actual != 4.4) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
       /**
     * Test case chuoi va so
     */
    public function testSumChuoivsSo()
    {
        $userModel = new UserModel();
        $a = "dd";
        $b = 1;

        $actual = $userModel->sumb($a,$b);

        if ($actual != "dd1") {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
       /**
     * Test case str
     */
    public function testStr()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = "aa";

        $expected = 'error';
        $actual = $userModel->sumb($a, $b);
        
        $this->assertEquals($expected, $actual);
    }
    
}