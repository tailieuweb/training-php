<?php

use PHPUnit\Framework\TestCase;

class CartModelTest extends TestCase
{
    public function testSumOk()
    {
        $cart = new cart();
        $a = 1;
        $b = 2;
        $expected = 3;

        $actual = $cart->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
}
