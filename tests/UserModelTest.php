<?php

use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{

    /**
     * Test case Okie
     */
    public function testSumOk()
    {
        $userModel = new UserModel();

        $actual = $userModel->sumb(1, 2);
        $this->assertEquals(3, $actual);

        $actual = $userModel->sumb(-1, -2);
        $this->assertEquals(-3, $actual);

        $actual = $userModel->sumb(1, -2);
        $this->assertEquals(-1, $actual);

        $actual = $userModel->sumb(2.1, 2.3);
        $this->assertEquals(4.4, $actual);
    }

    /**
     * Test case Not good
     */
    public function testSumNg()
    {
        $userModel = new UserModel();

        $actual = $userModel->sumb(1, "aaa");
        $this->assertEquals("Error", $actual);

        $actual = $userModel->sumb("aaa", "bbb");
        $this->assertEquals("Error", $actual);

        $actual = $userModel->sumb(1, true);
        $this->assertEquals("Error", $actual);

        $actual = $userModel->sumb(true, false);
        $this->assertEquals("Error", $actual);
    }


    public function testSumGetUsersOk()
    {
        $userModel = new UserModel();

        // truncate
        $userModel->truncateUsers();

        // create user
        $userModel->insertUser([
            "name" => "tronghieu60s", "fullname" => "Hieu", "email" => "tronghieu60s@gmail.com", "password" => "123", "type" => "admin",
        ]);

        $actual = $userModel->getUsers();
        $this->assertEquals("tronghieu60s", $actual[0]["name"]);

        $keyword = "tronghieu60s";
        $actual2 = $userModel->getUsers(["keyword" => $keyword]);
        $this->assertEquals(strtolower($keyword), strtolower($actual2[0]["name"]));
    }

    public function testSumInsertUserOk()
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
        $this->assertIsBool($actual);
    }

    public function testSumInsertUserNg()
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
        $this->assertEquals($actual, "Error");
    }

    public function testSumUpdateUserOk()
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
        $this->assertIsBool($actual);
    }

    public function testSumUpdateUserNg()
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
        $this->assertEquals($actual, "Error");
    }
}
