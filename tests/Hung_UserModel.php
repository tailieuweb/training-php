<?php

use PHPUnit\Framework\TestCase;

use function PHPSTORM_META\type;

require_once('./models/UserModel.php');
require_once('./models/FactoryPattern.php');

class Hung_UserModelTest extends TestCase
{
    //----------------------------------Find user by ID
    /**
     * Test case Okie
     */

    public function testFindUserByIdOk()
    {
        $userModel = UserModel::getInstance();

        $actual = $userModel->findUserById(5);

        $expected = [[
            "id" => "5", "name" => "nobody", "fullname" => "Nobody",
            "email" => "nobody@mail.com", "type" => "user",
            "password" => "6e854442cd2a940c9e95941dce4ad598", "version" =>  "3"
        ]];

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case not good
     */

    public function testfindUserByIdNG()
    {
        $userModel = UserModel::getInstance();

        $actual = $userModel->findUserById(-5);

        $expected = [];

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case not good
     * Parameter is string
     */

    public function testfindUserByIdNG_String()
    {
        $userModel = UserModel::getInstance();

        $actual = $userModel->findUserById('a');

        $expected = [];

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case not good
     * Parameter is object
     */

    public function testfindUserByIdNG_Obj()
    {
        $userModel = UserModel::getInstance();
        $obj = new stdClass();

        $actual = $userModel->findUserById($obj);

        $expected = [];

        return $this->assertEquals($expected, $actual);
    }
}
