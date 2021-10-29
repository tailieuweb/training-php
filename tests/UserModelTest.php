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
    * test sum Negative numbers. Good
    */
    function testSumNegNumOk() {
        $userModel = new UserModel();
        $a = -1;
        $b = -2;
        $expected = -3;
 
        $actual = $userModel->sumb($a,$b);
 
        $this->assertEquals($expected, $actual);
    }

    /**
    * test sum Negative numbers. Not good
    */
    function testSumNegNumNg() {
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
    * test sum Negative number with Positive integer. Good
    */
    function testSumNegNumWithPosIntOk() {
        $userModel = new UserModel();
        $a = -1;
        $b = 2;
        $expected = 1;
 
        $actual = $userModel->sumb($a,$b);
 
        $this->assertEquals($expected, $actual);
    }

    /**
    *test sum Negative number with Positive integer. Not Good
    */
    function testSumNegNumWithPosIntNg() {
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
    * test sum float numbers. Good
    */
    function testSumFloatNumbersOk() {
        $userModel = new UserModel();
        $a = 1.2;
        $b = 2.1;
        $expected = 3.3;
 
        $actual = $userModel->sumb($a,$b);
 
        $this->assertEquals($expected, $actual);
    }

    /**
    * * test sum float numbers. Not Good
    */
    function testSumFloatNumbersNg() {
        $userModel = new UserModel();
        $a = 1.2;
        $b = 2.1;

        $actual = $userModel->sumb($a,$b);
        
        if ($actual != 3.3) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

     /**
    * test sum number with string. Good
    */
    function testSumWithStringOk() {
        $userModel = new UserModel();
        $a = 1;
        $b = "3";
        $expected = "Error sum with string";
 
        $actual = $userModel->sumb($a,$b);
        $this->assertEquals($expected, $actual);
    }

    /**
    * test sum number with string. Not Good
    */
    function testSumWithStringNg() {
        $userModel = new UserModel();
        $a = 1;
        $b = "3";

        $actual = $userModel->sumb($a,$b);
        
        if ($actual != "Error sum with string") {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

     /**
    * test sum strings. Good
    */
    function testSumStringsOk() {
        $userModel = new UserModel();
        $a = "1";
        $b = "3";
        $expected = "Error sum with string";
 
        $actual = $userModel->sumb($a,$b);
        $this->assertEquals($expected, $actual);
    }

    /**
    * test sum strings. Not Good
    */
    function testSumStringsNg() {
        $userModel = new UserModel();
        $a = "1";
        $b = "3";

        $actual = $userModel->sumb($a,$b);
        
        if ($actual != "Error sum with string") {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
}