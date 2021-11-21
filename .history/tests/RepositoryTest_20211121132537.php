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

        $user_id = 2;

        $expected = "test2";
        $actual = $repo->getFullUser($user_id);
        $this->assertEquals($expected, $actual[0]['name']);
    }
    /**
     * Test function getFullUser
     * Id not exist
     */
    public function testGetFullUserIdNotExist()
    {
        $repo = new Repository();
        $user_id = 1;

        $actual = $repo->getFullUser($user_id);
        var_dump($actual);die();
        if(!empty($actual)){
            $this->assertTrue(true);
        }
        $this->assertTrue(false);
    }
}