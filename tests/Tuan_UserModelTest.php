<?php

use PHPUnit\Framework\TestCase;

require_once "models/FactoryPattern.php";

class Tuan_UserModelTest extends TestCase
{

    /**
     * Test case Okie
     */
    //    public function testSumOk()
    //    {
    //        $factory = new FactoryPattern();
    //       $userModel = $factory->make('user');
    //       $a = 1;
    //       $b = 2;
    //       $expected = 3;
    //
    //       $actual = $userModel->sumb($a,$b);
    //
    //       $this->assertEquals($expected, $actual);
    //    }

    /**
     * Test case Not good
     */
    //   public function testSumNg()
    //    {
    //        $factory = new FactoryPattern();
    //        $userModel = $factory->make('user');
    //        $a = 1;
    //        $b = 2;
    //
    //        $actual = $userModel->sumb($a,$b);
    //
    //        if ($actual != 3) {
    //            $this->assertTrue(false);
    //        } else {
    //            $this->assertTrue(true);
    //        }
    //    }

    public  function testgetInstaceUserOk()
    {

        $userModel = UserModel::getInstance();
        $user = $userModel->findUserById(5);
        $expected = 'Anh Dev';
        $actual = $user[0]['fullname'];
        $this->assertEquals($expected, $actual);
    }

    public  function testgetInstaceUserisObject()
    {
        $userModel = UserModel::getInstance();
        if (is_object($userModel)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    public  function testGetInstanceOkCorrectInstance()
    {
        $userModel = UserModel::getInstance();
        if ($userModel instanceof  UserModel) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    // Auth
    public  function  testauthUserModelIsOk()
    {
        $userModel = UserModel::getInstance();
        $userModel->startTransaction();
        $input = [];
        $input['name'] = "user" . (intval($userModel->getTheID()) + 1);
        $input['password'] = '123456';
        $input['fullname'] = "tuandeptrai";
        $input['email'] = "katarina";
        $input['type'] = 'admin';
        $userModel->insertUser($input);
        $username = 'user' . $userModel->getTheID();
        $actual =  $userModel->auth($username, '123456')[0]['fullname'];
        $expected = 'tuandeptrai';
        $userModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public  function  testauthUserModelJustHaveUserName()
    {
        $userModel = UserModel::getInstance();
        $actual =  $userModel->auth('user2', null);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    public  function  testauthUserModelJustHavePassword()
    {
        $userModel = UserModel::getInstance();
        $actual =  $userModel->auth(null, '123456');
        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    public  function testauthUserModelUsernameNotRight()
    {
        $userModel = UserModel::getInstance();
        $actual =  $userModel->auth("abc", '123456');
        $expected = [];
        $this->assertEquals($expected, $actual);
    }


    public  function testauthUserModelPasswordNotRight()
    {
        $userModel = UserModel::getInstance();
        $actual =  $userModel->auth("user2", "abc");
        $expected = [];
        $this->assertEquals($expected, $actual);
    }
}
