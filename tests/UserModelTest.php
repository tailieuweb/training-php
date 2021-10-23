<?php
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    public function testGetUserById(){
        $userModel = new UserModel();
        $expected = ["id"=>2];
        //$actual : ["id" => "2",.....]
        $actual = $userModel->findUserById(2);
        /*
            if ($expected["id"](2) === $actual["id"](?)) {
                return true
            } else {
                return false
            }
        */
        $this->assertEquals($expected["id"],$actual[0]["id"]);
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

        $actual = $userModel->sumb($a,$b);

        if ($actual != 3) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
}