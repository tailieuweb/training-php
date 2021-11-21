<?php
use PHPUnit\Framework\TestCase;

class GetlastIdTest extends TestCase
{
    /**
     * Test case Okie
     */
    public function testGetLastIdOk() {
        $userModel = new UserModel();
        $expected = '50';

        $user = $userModel->getLastID();
        $actual = $user[0]["MAX(id)"];
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Okie
     */
    public function  testGetLastIdNullOk() {
        $userModel = new UserModel();
        $expected = null;

        $user = $userModel->getLastID();
        $actual = $user[0]["MAX(id)"];
        $this->assertEquals($expected, $actual);
       
    }
     /**
     * Test case Not good
     */
    public function  testGetLastIdNg() {
        $userModel = new UserModel();

        $user = $userModel->getLastID();
        // var_dump($user[0]["MAX(id)"]);die();
        if(isset($user[0]["MAX(id)"])) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test case Okie
     */
    // public function testSumOk()
    // {
    //    $userModel = new UserModel();
    //    $a = 1;
    //    $b = 2;
    //    $expected = 3;

    //    $actual = $userModel->sumb($a,$b);

    //    $this->assertEquals($expected, $actual);
    // }

    /**
     * Test case Not good
     */
    // public function testSumNg()
    // {
    //     $userModel = new UserModel();
    //     $a = 1;
    //     $b = 2;

    //     $actual = $userModel->sumb($a,$b);

    //     if ($actual != 3) {
    //         $this->assertTrue(false);
    //     } else {
    //         $this->assertTrue(true);
    //     }
    // }
}