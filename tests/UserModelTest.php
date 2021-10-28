<?php




use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{

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

        $expected = 3;

        $actual = $userModel->sumb($a, $b);


        $actual = $userModel->sumb($a,$b);


        if ($actual != 3) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    public function testTwoPositiveInt()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 2;
        $expected = 3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    public function testTwoNegativeInt()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = -2;
        $expected = -3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    public function testNegativePositiveInt()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = 2;
        $expected = 1;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    public function testSumFloat()
    {
        $userModel = new UserModel();
        $a = 1.5;
        $b = 2.33;
        $expected = 3.83;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    public function testSumPositiveFloat()
    {
        $userModel = new UserModel();
        $a = 1.5;
        $b = 2.33;
        $expected = 3.83;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    public function testSumNegativeFloat()
    {
        $userModel = new UserModel();
        $a = -1.5;
        $b = -2.33;
        $expected = -3.83;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    public function testNegativePositiveFloat()
    {
        $userModel = new UserModel();
        $a = -1.5;
        $b = 2.33;
        $expected = 0.83;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    // public function testStr()
    // {
    //     $userModel = new UserModel();
    //     $a = -1.5;
    //     $b = "1234123";
    //     $expected = false;
    //     $actual = $userModel->sumb($a, $b);

    //     $this->assertEquals($expected, $actual);
    // }
}
}

