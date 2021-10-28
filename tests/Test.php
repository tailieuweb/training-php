<?php
use PHPUnit\Framework\TestCase;

class Test extends TestCase
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
    public function testSumOk2()
    {
       $userModel = new UserModel();
       $a = 1;
       $b = 2;
       $expected = 3;

       $actual = $userModel->sumb($a,$b);

       $this->assertEquals(3, $actual);
    }
    public function testTinhTong(){
        $userModel = new UserModel();
        $a = 1;
        $b = 2;
        $expected = 3;
    
 
        $this->assertEquals(3, 3);
    }
}