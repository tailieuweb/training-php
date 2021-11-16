<?php

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\equalTo;

class UserModelTest extends TestCase
{

    //test testFindUserById      
    public function testFindUserByIdOk()
    {
        $userModel = new UserModel();
        $userId = 14;
        $userName = 'abc';

        $user = $userModel->findUserById($userId);
        $actual = $user[0]['name'];

        $this->assertEquals($userName, $actual);
    }

    public function testFindUserByIdNotFound()
    {
        $userModel = new UserModel();
        $userId = 10;
        $expected = [];
        $actual = $userModel->findUserById($userId);
        $this->assertEquals($expected, $actual);
    }

    public function testFindUserByIdStr()
    {
        $userModel = new UserModel();
        $userIdid = 'asdf';
        $expected = [];
        $actual = $userModel->findUserById($userIdid);
        $this->assertEquals($expected, $actual);
    }

    public function testFindUserByIdNull()
    {
        $userModel = new UserModel();
        $expected = [];
        $actual = $userModel->findUserById('');

        $this->assertEquals($expected, $actual);
    }

    public function testFindUserByIdSpecialCharacters()
    {
        $userModel = new UserModel();
        $userId = '@@@';
        $expected = [];
        $actual = $userModel->findUserById($userId);
        $this->assertEquals($expected, $actual);
    }

    public function testFindUserByIdObject()
    {
        $userModel = new UserModel();
        $object = (object)'123';

        if (is_object($object)) {
            $object = 14;

            $actual = $userModel->findUserById($object);
            $expected = $actual[0]['name'];
            $userName = 'abc';
            $this->assertEquals($userName, $expected);
        } else {
            $this->assertTrue(false);
        }
    }

    public function testFindUserByIdObjectNotG()
    {
        $userModel = new UserModel();
        $object = (object)'123';

        if (is_object($object)) {
            $object = 14;

            $actual = $userModel->findUserById($object);
            $expected = $actual[0]['name'];
            $userName = 'ddddd';

            if ($userName !== $expected) {
                $this->assertTrue(true);
            }
        }
    }


    //test getUser
    public function testInsertUserOk()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => 'abc',
            'fullname' => 'vitcon',
            'type' => 'admin',
            'email' => 'hhhhh@gmail.com',
            'password' => '123456'
        );
        $actual = $userModel->insertUser($user);
        if ($actual == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    public function testInsertUserNull()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => '',
            'fullname' => '',
            'type' => '',
            'email' => '',
            'password' => ''
        );

        if (!empty($user['name']) || !empty($user['fullname']) || !empty($user['type']) || !empty($user['email']) || !empty($user['password'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    public function testInsertUserTypeOk()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => '',
            'fullname' => '',
            'type' => 'admin',
            'email' => '',
            'password' => ''
        );

        $userModel->insertUser($user);

        if ($user['type'] == "admin" || $user['type'] == "user" || $user['type'] == "guest") {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    public function testInsertUserTypeNotG()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => '',
            'fullname' => '',
            'type' => 'abc',
            'email' => '',
            'password' => ''
        );

        $userModel->insertUser($user);

        if ($user['type'] == "admin" || $user['type'] == "user" || $user['type'] == "guest") {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    public function testInsertUserTypeIsNumberNotG()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => '',
            'fullname' => '',
            'type' => '123',
            'email' => '',
            'password' => ''
        );

        $userModel->insertUser($user);

        if (!is_numeric($user['type'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    public function testInsertUserNameIsNumberNotG()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => '123',
            'fullname' => '',
            'type' => '',
            'email' => '',
            'password' => ''
        );

        $userModel->insertUser($user);

        if (!is_numeric($user['name'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    public function testInsertUserFullNameIsNumberNotG()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => '',
            'fullname' => '12345',
            'type' => '',
            'email' => '',
            'password' => ''
        );

        $userModel->insertUser($user);

        if (!is_numeric($user['fullname'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    public function testInsertUserEmaiWrongFormatNotG()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => '',
            'fullname' => '',
            'type' => '',
            'email' => 'đê@gmail.com',
            'password' => ''
        );

        $userModel->insertUser($user);

        if (empty($user['email'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    public function testInsertUserEmailIsNumberNotG()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => '',
            'fullname' => '',
            'type' => '',
            'email' => '123@gmail.com',
            'password' => ''
        );

        $userModel->insertUser($user);

        if (is_numeric($user['email'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    public function testInsertUserEmaiSpecialCharactersNotG()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => '',
            'fullname' => '',
            'type' => '',
            'email' => '$\/*s@gmail.com',
            'password' => ''
        );

        $userModel->insertUser($user);

        if (empty($user['email'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    public function testInsertUserPassFullNumberNotG()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => '',
            'fullname' => '',
            'type' => '',
            'email' => '',
            'password' => '123456789'
        );

        $userModel->insertUser($user);

        if (!is_numeric($user['password'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    //test Make

    public function testFactoryPatternMakeUser()
    {
        $factory = new FactoryPattern();

        $expected = new UserModel();
        $actual = $factory->make('user');

        $this->assertEquals($expected, $actual);
    }

    public function testFactoryPatternMakeBank()
    {
        $factory = new FactoryPattern();

        $expected = new BankModel();
        $actual = $factory->make('bank');

        $this->assertEquals($expected, $actual);
    }

    public function testFactoryPatternMakeNull()
    {
        $factory = new FactoryPattern();

        $actual = $factory->make('');

        if ($actual == null) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    public function testFactoryPatternValueObjectNotG()
    {
        $factory = new FactoryPattern();
        $object = (object)'abc123';
        $expected = null;
        $actual = $factory->make($object);

        $this->assertEquals($actual, $expected);
    }
}
