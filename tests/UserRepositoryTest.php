<?php

use PHPUnit\Framework\TestCase;

class UserRepositoryTest extends TestCase
{
     /**
     * Test _construct Function in UserRepository - 'Danh' do this
     */
    // Test case testConstruct
    public function testConstruct(){
        $repository = new UserRepository;
        $check= $repository->__construct();
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
        // Test case testConstructExpectedAndActual
    public function testConstructExpectedAndActual(){
        $repository = new UserRepository;
        $expected= $repository->__construct();
        $actual=false;
        if ($expected == false) {
            $this->assertEquals($expected, $actual);
        } else {
            return false;
        }
    }
}
