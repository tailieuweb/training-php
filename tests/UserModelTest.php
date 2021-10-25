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

    public  function  testCong2SoAm()
    {
        $userModel = new UserModel();
        $a = -5;
        $b = -5;
        $expected = -10;

        $actual = $userModel->sumb($a,$b);

        $this->assertEquals($expected, $actual);


    }


    public  function  testCong1Amva1Duong()
    {
        $userModel = new UserModel();
        $a = -8;
        $b = 5;
        $expected = -3;

        $actual = $userModel->sumb($a,$b);

        $this->assertEquals($expected, $actual);


    }


    public  function  testCong2sothucDuong()
    {
        $userModel = new UserModel();
        $a = 5.3;
        $b = 8.5;
        $expected = 13.8;

        $actual = $userModel->sumb($a,$b);

        $this->assertEquals($expected, $actual);
    }


    public  function  testCong2sothucAm()
    {
        $userModel = new UserModel();
        $a = -5.3;
        $b = -8.5;
        $expected = -13.8;

        $actual = $userModel->sumb($a,$b);

        $this->assertEquals($expected, $actual);
    }

    public  function  testCongchuoivaso(){
        $userModel = new UserModel();
        $a = 'abc';
        $b = 8;
        $expected = 'error';

        $actual = $userModel->sumb($a,$b);
        $this->assertEquals($expected, $actual);

    }

    public  function  testCongchuoivachuoi(){
        $userModel = new UserModel();
        $a = 'abc';
        $b = 'xyz';
        $expected = 'abcxyz';

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
}