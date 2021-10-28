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
     * Test case: String and number.
     */
    public function testSum_StringAndNum()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 'a';

        $expected = 'NaN exception!';
        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case: String and string.
     */
    public function testSum_StringAndString()
    {
        $userModel = new UserModel();
        $a = 'a';
        $b = 'b';

        $expected = 'NaN exception!';
        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case: Floating point numbers.
     */
    public function testSum_FloatingPointNumbers()
    {
        $userModel = new UserModel();
        $a = 2.3;
        $b = 3.5;

        $expected = 5.8;
        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
} 
