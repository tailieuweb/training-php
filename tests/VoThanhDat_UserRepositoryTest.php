<?php

use PHPUnit\Framework\TestCase;

class VoThanhDat_UserRepositoryTest extends TestCase
{
    /**
     * Test getInstance function, 'Dattt' do this 
     * */

    // Test case getInstance Good
    public function testGetInstanceGood()
    {
        $userRepository = UserRepository::getInstance();
        $userRepository1 = UserRepository::getInstance();

        $expected = true;
        $actual = is_object($userRepository) &&
            get_class($userRepository) == 'UserRepository' &&
            $userRepository === $userRepository1;

        $this->assertEquals($expected, $actual);
    }
    // Test case getInstance Not Good
    public function testGetInstanceNg()
    {
        $userRepository = UserRepository::getInstance();

        $expected = false;
        $actual = !is_object($userRepository) ||
            !get_class($userRepository) == 'UserRepository';

        $this->assertEquals($expected, $actual);
    }
}