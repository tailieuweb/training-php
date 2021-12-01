<?php

use PHPUnit\Framework\TestCase;

class QuyUserModelTest extends TestCase
{

    /**
     * Test case Okie
     */
    public function testGetUsersGood()
    {
        $userModel = new UserModel();
        $params['keyword']  = 'hackerasfasf';
        $expected = 'hackerasfasf';
        $user = $userModel->getUsers($params);
        $actual = $user[0]['name'];
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Not good
     */
    public function testGetUsersNg()
    {
        $userModel = new UserModel();
        $params['keyword']  = 'qhuh';
        $user = $userModel->getUsers($params);
        if (empty($user[0])) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
   
    /**
     * Test keyword là null
     */
    public function testGetUsersNull()
    {
        $userModel = new UserModel();
        $params['keyword']  = null;
        $expected = 'test2';
        $user = $userModel->getUsers($params);
        $actual = $user[0]['name'];
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test keyword bang gia tri dung hoac sai[boolean(true/false)]
     */
    public function testGetUsersBoolean()
    {
        $userModel = new UserModel();
        $params['keyword']  = true;
        $expected = "Sang111";
        $user = $userModel->getUsers($params);
        $actual = $user[0]['name'];
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test keyword bang ky tu dac biet
     */
    public function testGetUsersKyTuDb()
    {
        $userModel = new UserModel();
        $params['keyword']  = '#$$@';
        $user = $userModel->getUsers($params);
        if (empty($user[0])) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    
    /**
     * Test keyword là mang Array
     */
    public function testGetUsersArray()
    {
        $userModel = new UserModel();
        $params['keyword'] = [];
        $expected =[];
        $actual = $userModel->getUsers($params);
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test keyword là object
     */

    public function testGetUsersObject()
    {
        $userModel = new UserModel();
        $params['keyword'] = new UserModel();
        $expected = 'Invalid';
        $actual = $userModel->getUsers($params);
        $this->assertEquals($expected, $actual);
    }
}
