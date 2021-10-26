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

    public function testSumNega(){
        $userModel = new UserModel();
        $a = -1;
        $b = -3;
        $expected = -4;

        $actual = $userModel->sumb($a,$b);

        $this->assertEquals($expected, $actual);
    }

    public function testSumAmDuong(){
        $userModel = new UserModel();
        $a = 5;
        $b = -3;

        $expected = 2;

        $actual = $userModel->sumb($a,$b);

        $this->assertEquals($expected, $actual);
    }

    public function testSumbRealNumber(){
        $userModel = new UserModel();
        $a = 5.4;
        $b = 3.0;

        $expected = 8.4;

        $actual = $userModel->sumb($a,$b);

        $this->assertEquals($expected, $actual);
    }

    public function testSumbRealNumberNega(){
        $userModel = new UserModel();
        $a = -2.8;
        $b = -3.2;

        $expected = -6.0;

        $actual = $userModel->sumb($a,$b);

        $this->assertEquals($expected, $actual);
    }

    public function testSumbRealNumberAmDuong(){
        $userModel = new UserModel();
        $a = -4.2;
        $b = 3.2;

        $expected = -1.0;

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

    public function testSumNegaNg()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = -3;

        $actual = $userModel->sumb($a,$b);

        if ($actual != -4) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    public function testSumAmDuongNg()
    {
        $userModel = new UserModel();
        $a = 5;
        $b = -3;

        $actual = $userModel->sumb($a,$b);

        if ($actual != 2) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    public function testSumRealNumberNg()
    {
        $userModel = new UserModel();
        $a = 5.4;
        $b = 3.0;

        $actual = $userModel->sumb($a,$b);

        if ($actual != 8.4) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    public function testSumRealNumberNegaNg()
    {
        $userModel = new UserModel();
        $a = -2.8;
        $b = -3.2;

        $actual = $userModel->sumb($a,$b);

        if ($actual != -6.0) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    public function testSumRealNumberAmDuongNg()
    {
        $userModel = new UserModel();
        $a = -4.2;
        $b = 3.2;

        $actual = $userModel->sumb($a,$b);

        if ($actual != -1.0) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
}