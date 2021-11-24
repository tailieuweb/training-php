<?php

use PHPUnit\Framework\TestCase;

class RepositoryTest extends TestCase
{
    /**
     * Test function getFullUser
     */
    public function testGetFullUserOk()
    {
        $user = new UserModel();
        $userId = 2;

        $expected = "test2";
        $actual = $user->findUserById($userId);
        $this->assertEquals($expected, $actual[0]['name']);
    }
}