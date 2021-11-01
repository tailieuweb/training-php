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
    $actual = 3;
    $this->assertEquals($expected, $actual);
  }
}
