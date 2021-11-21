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

        $actual = $userModel->sumb(1, null);
        $this->assertEquals("Error", $actual);
    }

    public function testSumNg4()
    {
        $userModel = new UserModel();

        $actual = $userModel->sumb(null, null);
        $this->assertEquals("Error", $actual);
    }

    public function testSumNg5()
    {
        $userModel = new UserModel();

        $actual = $userModel->sumb(1, "");
        $this->assertEquals("Error", $actual);
    }

    public function testSumNg6()
    {
        $userModel = new UserModel();

        $actual = $userModel->sumb("", "");
        $this->assertEquals("Error", $actual);
    }

    public function testSumNg7()
    {
        $userModel = new UserModel();

        $actual = $userModel->sumb(1, array("Volvo", "BMW", "Toyota"));
        $this->assertEquals("Error", $actual);
    }

    public function testSumNg8()
    {
        $userModel = new UserModel();

        $actual = $userModel->sumb(array("Volvo", "BMW", "Toyota"), array("Volvo", "BMW", "Toyota"));
        $this->assertEquals("Error", $actual);
    }

    public function testSumNg9()
    {
        $userModel = new UserModel();

        $actual = $userModel->sumb(1, ["name" => "string"]);
        $this->assertEquals("Error", $actual);
    }

    public function testSumNg10()
    {
        $userModel = new UserModel();

        $actual = $userModel->sumb(["name" => "string"], ["name" => "string"]);
        $this->assertEquals("Error", $actual);
    }

    public function testSumNg11()
    {
        $userModel = new UserModel();

        $actual = $userModel->sumb(1, true);
        $this->assertEquals("Error", $actual);
    }

    public function testSumNg12()
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

        $actual = $userModel->auth("unknown-user", "123");
        $this->assertEquals(0, count($actual));
    }

    public function testAuthNg2()
    {
        $userModel = new UserModel();

        $actual = $userModel->auth("", "123");
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

        $actual = $userModel->auth(2, "123");
        $this->assertEquals("Error", $actual);
    }

    public function testAuthNg5()
    {
        $userModel = new UserModel();

        $actual = $userModel->auth(2.6, "123");
        $this->assertEquals("Error", $actual);
    }

    public function testAuthNg6()
    {
        $userModel = new UserModel();

        $actual = $userModel->auth(array("Volvo", "BMW", "Toyota"), "123");
        $this->assertEquals("Error", $actual);
    }

    public function testAuthNg7()
    {
        $userModel = new UserModel();

        $actual = $userModel->auth(["name" => "string"], "123");
        $this->assertEquals("Error", $actual);
    }

    public function testAuthNg8()
    {
        $userModel = new UserModel();

        $actual = $userModel->auth(true, "123");
        $this->assertEquals("Error", $actual);
    }

    public function testAuthNg9()
    {
        $userModel = new UserModel();

        $actual = $userModel->auth("tronghieu60s", "123456");
        $this->assertEquals(0, count($actual));
    }

    public function testAuthNg10()
    {
        $userModel = new UserModel();

        $actual = $userModel->auth("tronghieu60s", "");
        $this->assertEquals("Error", $actual);
    }

    public function testAuthNg11()
    {
        $userModel = new UserModel();

        $actual = $userModel->auth("tronghieu60s", null);
        $this->assertEquals("Error", $actual);
    }

    public function testAuthNg12()
    {
        $userModel = new UserModel();

        $actual = $userModel->auth("tronghieu60s", 2);
        $this->assertEquals("Error", $actual);
    }

    public function testAuthNg13()
    {
        $userModel = new UserModel();

        $actual = $userModel->auth("tronghieu60s", 2.56);
        $this->assertEquals("Error", $actual);
    }

    public function testAuthNg14()
    {
        $userModel = new UserModel();

        $actual = $userModel->auth("tronghieu60s", array("Volvo", "BMW", "Toyota"));
        $this->assertEquals("Error", $actual);
    }

    public function testAuthNg15()
    {
        $userModel = new UserModel();

        $actual = $userModel->auth("tronghieu60s", ["name" => "string"]);
        $this->assertEquals("Error", $actual);
    }

    public function testAuthNg16()
    {
        $userModel = new UserModel();

        $actual = $userModel->auth("tronghieu60s", true);
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
        $actual = $userModel->getUsers(["keyword" => $keyword]);
        $this->assertEquals(strtolower($keyword), strtolower($actual[0]["name"]));
    }

    public function testGetUsersByKeywordOk2()
    {
        $userModel = new UserModel();

        $keyword = "unknown-user";
        $actual = $userModel->getUsers(["keyword" => $keyword]);
        $this->assertEquals(0, count($actual));
    }

    public function testGetUsersByKeywordNg1()
    {
        $userModel = new UserModel();

        $keyword = 2;
        $actual = $userModel->getUsers(["keyword" => $keyword]);
        $this->assertEquals("Error", $actual);
    }

    public function testGetUsersByKeywordNg2()
    {
        $userModel = new UserModel();

        $keyword = array("Volvo", "BMW", "Toyota");
        $actual = $userModel->getUsers(["keyword" => $keyword]);
        $this->assertEquals("Error", $actual);
    }

    public function testGetUsersByKeywordNg3()
    {
        $userModel = new UserModel();

        $keyword = ["name" => "string"];
        $actual = $userModel->getUsers(["keyword" => $keyword]);
        $this->assertEquals("Error", $actual);
    }

    public function testGetUsersByKeywordNg4()
    {
        $userModel = new UserModel();

        $keyword = true;
        $actual = $userModel->getUsers(["keyword" => $keyword]);
        $this->assertEquals("Error", $actual);
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
        $input = "";

        $actual = $userModel->insertUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testInsertUserNg2()
    {
        $userModel = new UserModel();
        $input = null;

        $actual = $userModel->insertUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testInsertUserNg3()
    {
        $userModel = new UserModel();
        $input = 2;

        $actual = $userModel->insertUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testInsertUserNg4()
    {
        $userModel = new UserModel();
        $input = array("Volvo", "BMW", "Toyota");

        $actual = $userModel->insertUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testInsertUserNg5()
    {
        $userModel = new UserModel();
        $input = ["name" => "string"];

        $actual = $userModel->insertUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testInsertUserNg6()
    {
        $userModel = new UserModel();
        $input = true;

        $actual = $userModel->insertUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testInsertUserNg7()
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

    public function testInsertUserNg8()
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

    public function testInsertUserNg9()
    {
        $userModel = new UserModel();
        $input = [
            "name" => 2,
            "fullname" => 2,
            "email" => "tronghieu60s@gmail.com",
            "password" => "123",
            "type" => "admin",
        ];

        $actual = $userModel->insertUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testInsertUserNg10()
    {
        $userModel = new UserModel();
        $input = [
            "name" => array("Volvo", "BMW", "Toyota"),
            "fullname" => array("Volvo", "BMW", "Toyota"),
            "email" => "tronghieu60s@gmail.com",
            "password" => "123",
            "type" => "admin",
        ];

        $actual = $userModel->insertUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testInsertUserNg11()
    {
        $userModel = new UserModel();
        $input = [
            "name" => ["name" => "string"],
            "fullname" => ["fullname" => "string"],
            "email" => "tronghieu60s@gmail.com",
            "password" => "123",
            "type" => "admin",
        ];

        $actual = $userModel->insertUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testInsertUserNg12()
    {
        $userModel = new UserModel();
        $input = [
            "name" => true,
            "fullname" => false,
            "email" => "tronghieu60s@gmail.com",
            "password" => "123",
            "type" => "admin",
        ];

        $actual = $userModel->insertUser($input);
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
        $input = "";

        $actual = $userModel->updateUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testUpdateUserNg2()
    {
        $userModel = new UserModel();
        $input = null;

        $actual = $userModel->updateUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testUpdateUserNg3()
    {
        $userModel = new UserModel();
        $input = 2;

        $actual = $userModel->updateUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testUpdateUserNg4()
    {
        $userModel = new UserModel();
        $input = array("Volvo", "BMW", "Toyota");

        $actual = $userModel->updateUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testUpdateUserNg5()
    {
        $userModel = new UserModel();
        $input = ["name" => "string"];

        $actual = $userModel->updateUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testUpdateUserNg6()
    {
        $userModel = new UserModel();
        $input = true;

        $actual = $userModel->updateUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testUpdateUserNg7()
    {
        $userModel = new UserModel();
        $input = [
            "id" => "2",
            "name" => null,
            "fullname" => null,
            "email" => "tronghieu60s@gmail.com",
            "password" => "123",
            "type" => "admin",
        ];

        $actual = $userModel->updateUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testUpdateUserNg8()
    {
        $userModel = new UserModel();
        $input = [
            "id" => "2",
            "name" => 21,
            "fullname" => 31,
            "email" => "tronghieu60s@gmail.com",
            "password" => "123",
            "type" => "admin",
        ];

        $actual = $userModel->updateUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testUpdateUserNg9()
    {
        $userModel = new UserModel();
        $input = [
            "id" => "2",
            "name" => array("Volvo", "BMW", "Toyota"),
            "fullname" =>
            array("Volvo", "BMW", "Toyota"),
            "email" => "tronghieu60s@gmail.com",
            "password" => "123",
            "type" => "admin",
        ];

        $actual = $userModel->updateUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testUpdateUserNg10()
    {
        $userModel = new UserModel();
        $input = [
            "id" => "2",
            "name" => ["name" => "string"],
            "fullname" => ["fullname" => "string"],
            "email" => "tronghieu60s@gmail.com",
            "password" => "123",
            "type" => "admin",
        ];

        $actual = $userModel->updateUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testUpdateUserNg11()
    {
        $userModel = new UserModel();
        $input = [
            "id" => "2",
            "name" => true,
            "fullname" => false,
            "email" => "tronghieu60s@gmail.com",
            "password" => "123",
            "type" => "admin",
        ];

        $actual = $userModel->updateUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testUpdateUserNg12()
    {
        $userModel = new UserModel();
        $input = [
            "id" => "",
            "name" => "Hieu",
            "fullname" => "Naruto",
            "email" => "tronghieu60s@gmail.com",
            "password" => "123",
            "type" => "admin",
        ];

        $actual = $userModel->updateUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testUpdateUserNg13()
    {
        $userModel = new UserModel();
        $input = [
            "id" => null,
            "name" => "Hieu",
            "fullname" => "Naruto",
            "email" => "tronghieu60s@gmail.com",
            "password" => "123",
            "type" => "admin",
        ];

        $actual = $userModel->updateUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testUpdateUserNg14()
    {
        $userModel = new UserModel();
        $input = [
            "id" => 4,
            "name" => "Hieu",
            "fullname" => "Naruto",
            "email" => "tronghieu60s@gmail.com",
            "password" => "123",
            "type" => "admin",
        ];

        $actual = $userModel->updateUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testUpdateUserNg15()
    {
        $userModel = new UserModel();
        $input = [
            "id" => array("Volvo", "BMW", "Toyota"),
            "name" => "Hieu",
            "fullname" => "Naruto",
            "email" => "tronghieu60s@gmail.com",
            "password" => "123",
            "type" => "admin",
        ];

        $actual = $userModel->updateUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testUpdateUserNg16()
    {
        $userModel = new UserModel();
        $input = [
            "id" => ["id" => "string"],
            "name" => "Hieu",
            "fullname" => "Naruto",
            "email" => "tronghieu60s@gmail.com",
            "password" => "123",
            "type" => "admin",
        ];

        $actual = $userModel->updateUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testUpdateUserNg17()
    {
        $userModel = new UserModel();
        $input = [
            "id" => true,
            "name" => "Hieu",
            "fullname" => "Naruto",
            "email" => "tronghieu60s@gmail.com",
            "password" => "123",
            "type" => "admin",
        ];

        $actual = $userModel->updateUser($input);
        $this->assertEquals("Error", $actual);
    }
}
