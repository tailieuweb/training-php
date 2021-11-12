<?php

use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{

    public function testSumOk1()
    {
        $userModel = new UserModel();

        $actual = $userModel->sumb(1, 2);
        $this->assertEquals(3, $actual);
    }

    public function testSumOk2()
    {
        $userModel = new UserModel();

        $actual = $userModel->sumb(-1, -2);
        $this->assertEquals(-3, $actual);
    }

    public function testSumOk3()
    {
        $userModel = new UserModel();

        $actual = $userModel->sumb(1, -2);
        $this->assertEquals(-1, $actual);
    }

    public function testSumOk4()
    {
        $userModel = new UserModel();

        $actual = $userModel->sumb(2.1, 2.3);
        $this->assertEquals(4.4, $actual);
    }

    public function testSumNg1()
    {
        $userModel = new UserModel();

        $actual = $userModel->sumb(1, "aaa");
        $this->assertEquals("Error", $actual);
    }

    public function testSumNg2()
    {
        $userModel = new UserModel();

        $actual = $userModel->sumb("aaa", "bbb");
        $this->assertEquals("Error", $actual);
    }

    public function testSumNg3()
    {
        $userModel = new UserModel();

        $actual = $userModel->sumb(1, true);
        $this->assertEquals("Error", $actual);
    }

    public function testSumNg4()
    {
        $userModel = new UserModel();

        $actual = $userModel->sumb(true, false);
        $this->assertEquals("Error", $actual);
    }

    public function testAuthOk()
    {
        $userModel = new UserModel();

        // create user
        $userModel->insertUser([
            "name" => "tronghieu60s",
            "fullname" => "Hieu",
            "email" => "tronghieu60s@gmail.com",
            "password" => "123",
            "type" => "admin",
        ]);

        $actual = $userModel->auth("tronghieu60s", "123");
        $this->assertEquals("tronghieu60s", $actual[0]['name']);
    }

    public function testAuthNg1()
    {
        $userModel = new UserModel();

        $actual = $userModel->auth("", "123");
        $this->assertEquals("Error", $actual);
    }

    public function testAuthNg2()
    {
        $userModel = new UserModel();

        $actual = $userModel->auth("", "");
        $this->assertEquals("Error", $actual);
    }

    public function testAuthNg3()
    {
        $userModel = new UserModel();

        $actual = $userModel->auth(null, "123");
        $this->assertEquals("Error", $actual);
    }

    public function testAuthNg4()
    {
        $userModel = new UserModel();

        $actual = $userModel->auth(null, null);
        $this->assertEquals("Error", $actual);
    }

    public function testGetUsersOk()
    {
        $userModel = new UserModel();

        // create user
        $userModel->insertUser([
            "name" => "tronghieu60s",
            "fullname" => "Hieu",
            "email" => "tronghieu60s@gmail.com",
            "password" => "123",
            "type" => "admin",
        ]);

        $actual = $userModel->getUsers();
        $this->assertEquals("tronghieu60s", $actual[count($actual) - 1]["name"]);
    }

    public function testGetUsersByKeywordOk1()
    {
        $userModel = new UserModel();

        // create user
        $userModel->insertUser([
            "name" => "tronghieu60s",
            "fullname" => "Hieu",
            "email" => "tronghieu60s@gmail.com",
            "password" => "123",
            "type" => "admin",
        ]);

        $keyword = "tronghieu60s";
        $actual2 = $userModel->getUsers(["keyword" => $keyword]);
        $this->assertEquals(strtolower($keyword), strtolower($actual2[0]["name"]));
    }

    public function testGetUsersByKeywordOk2()
    {
        $userModel = new UserModel();

        $keyword = "ahdweiurbvmaorjeurndksakdoaew";
        $actual2 = $userModel->getUsers(["keyword" => $keyword]);
        $this->assertEquals(0, count($actual2));
    }

    public function testInsertUserOk()
    {
        $userModel = new UserModel();
        $input = [
            "name" => "Hieu",
            "fullname" => "Hieu",
            "email" => "tronghieu60s@gmail.com",
            "password" => "123",
            "type" => "admin",
        ];

        $actual = $userModel->insertUser($input);
        $this->assertTrue($actual);
    }

    public function testInsertUserNg1()
    {
        $userModel = new UserModel();
        $input = [
            "name" => "",
            "fullname" => "",
            "email" => "tronghieu60s@gmail.com",
            "password" => "123",
            "type" => "admin",
        ];

        $actual = $userModel->insertUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testInsertUserNg2()
    {
        $userModel = new UserModel();
        $input = [
            "name" => null,
            "fullname" => null,
            "email" => "tronghieu60s@gmail.com",
            "password" => "123",
            "type" => "admin",
        ];

        $actual = $userModel->insertUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testInsertUserNg3()
    {
        $userModel = new UserModel();

        $actual = $userModel->insertUser(null);
        $this->assertEquals("Error", $actual);
    }

    public function testUpdateUserOk1()
    {
        $userModel = new UserModel();
        $input = [
            "id" => "2",
            "name" => "Hieu",
            "fullname" => "Naruto",
            "email" => "tronghieu60s@gmail.com",
            "password" => "123",
            "type" => "admin",
        ];

        $actual = $userModel->updateUser($input);
        $this->assertTrue($actual);
    }

    public function testUpdateUserOk2()
    {
        $userModel = new UserModel();
        $input = [
            "id" => "2",
            "name" => "",
            "fullname" => "",
            "email" => "tronghieu60s@gmail.com",
            "password" => "123",
            "type" => "admin",
        ];

        $actual = $userModel->updateUser($input);
        $this->assertTrue($actual);
    }

    public function testUpdateUserNg1()
    {
        $userModel = new UserModel();
        $input = [
            "id" => "",
            "name" => "Hieu",
            "fullname" => "Hieu",
            "email" => "tronghieu60s@gmail.com",
            "password" => "123",
            "type" => "admin",
        ];

        $actual = $userModel->updateUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testUpdateUserNg2()
    {
        $userModel = new UserModel();
        $input = [
            "id" => null,
            "name" => "Hieu",
            "fullname" => "Hieu",
            "email" => "tronghieu60s@gmail.com",
            "password" => "123",
            "type" => "admin",
        ];

        $actual = $userModel->updateUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testUpdateUserNg3()
    {
        $userModel = new UserModel();
        $input = [
            "id" => "2",
            "name" => null,
            "fullname" =>  null,
            "email" => "tronghieu60s@gmail.com",
            "password" => "123",
            "type" => "admin",
        ];

        $actual = $userModel->updateUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testUpdateUserNg4()
    {
        $userModel = new UserModel();

        $actual = $userModel->updateUser(null);
        $this->assertEquals("Error", $actual);
    }
}
