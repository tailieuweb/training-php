<?php
use PHPUnit\Framework\TestCase;
require_once './models/FactoryPattern.php';

class Liem_UserModel extends TestCase
{
    # getUsers()

    /**
     * Test get users success
     */
    public function testGetUsersOk()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        // Param keyword
        $params['keyword'] = 'a';
        
        $expected = array();

        $actual = $userModel->getUsers($params);

        $this->assertEquals($expected, $actual);   
    }

    /**
     * Test Keyword param is null
     */
    public function testKeywordParamIsNullNg()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        // Param keyword
        $params['keyword'] = null;

        $actual = $userModel->getUsers($params);

        if($actual == "Keyword param invalid") {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test Keyword param is bool
     */
    public function testKeywordParamIsBoolNg()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
         // Param keyword
         $params['keyword'] = true;

        $actual = $userModel->getUsers($params);

        if($actual == "Keyword param invalid") {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test Keyword param is array
     */
    public function testKeywordParamIsArrayNg()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
         // Param keyword
         $params['keyword'] = array();

        $actual = $userModel->getUsers($params);

        if($actual == "Keyword param invalid") {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test Keyword param is object
     */
    public function testKeywordParamIsObjectNg()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
         // Param keyword
         $params['keyword'] = (object)array();

        $actual = $userModel->getUsers($params);

        if($actual == "Keyword param invalid") {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }


}