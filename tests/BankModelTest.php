<?php
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{

    /**
     * Test case Okie
     */
    public function testBankOk()
    {
       $userModel = new UserModel();
       $a = 1;
       $b = 2;
       $expected = 3;

       $actual = $userModel->sumb($a,$b);

       $this->assertEquals($expected, $actual);
    }
}