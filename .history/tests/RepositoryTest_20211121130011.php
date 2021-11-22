<?php

use PHPUnit\Framework\TestCase;

class RepositoryTest extends TestCase
{
    /**
     * Test function getFullUser
     */
    public function testGetFullUserOk()
    {
        $repo = new Repository();

        $expected = "test2";
        $actual = $user->findUserById($userId);
        $this->assertEquals($expected, $actual[0]['name']);
    }
}