<?php

use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{

    /**
     * Test case Ok
     */
    public function testGetInstanceOk()
    {
        // Check if methods of object are able to use:
        $expected = 'array';
        $actual = gettype(UserModel::getInstance()->getUsers());

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Ok
     */
    public function testGetInstanceOkObject()
    {
        $expected = 'object';
        $actual = gettype(UserModel::getInstance());

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Ok
     */
    public function testGetInstanceOkCorrectInstance()
    {
        $expected = true;
        $actual = UserModel::getInstance() instanceof UserModel;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
}
