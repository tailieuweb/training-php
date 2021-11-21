<?php
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\equalTo;

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
    public function testGetID(){
        $userModel = new UserModel();
        $expected = 300;
        $actual = $userModel->getID();
        $this->assertEquals($expected, $actual[0]["id"]);
    }
    public function testGetIDNG(){
        $userModel = new UserModel();
        $expected = 30;
        $actual = $userModel->getID();
     //   var_dump($actual[0]["id"]);die();
        if($expected != $actual[0]["id"]){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
}