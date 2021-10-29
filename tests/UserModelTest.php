<?php

use phpDocumentor\Reflection\Types\Object_;
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{

    /**
     * Test case Okie
     */
    public function testInsertUser()
    {
        $input = [
            'name' => 'ngo thanh thai 76',
            'password' => 'sahuynh1',
        ];

        $userModel = new UserModel();
        $actual = $userModel->insertUser($input);
        $expected = true;
        $this->assertEquals($actual, $expected);
    }
    public function testGetUser()
    {
        $userModel = new UserModel();
        $actual = $userModel->getUsers();
        if (is_array($actual)) {
            $actual = true;
        } else {
            $actual = false;
        }
        $expected = true;
        $this->assertEquals($actual, $expected);
    }
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
     * Test case Not good
     */
    public function testSumNg()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 2;

        $actual = $userModel->sumb($a, $b);

        if ($actual != 3) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
}
