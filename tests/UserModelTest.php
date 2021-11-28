<?php

use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{

    public function testSumOk1()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $actual = $userModel->sumb(1, 2);
        $this->assertEquals(3, $actual);
    }

    public function testSumOk2()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $actual = $userModel->sumb(-1, -2);
        $this->assertEquals(-3, $actual);
    }

    public function testSumOk3()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $actual = $userModel->sumb(1, -2);
        $this->assertEquals(-1, $actual);
    }

    public function testSumOk4()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $actual = $userModel->sumb(2.1, 2.3);
        $this->assertEquals(4.4, $actual);
    }

    public function testSumNg1()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $actual = $userModel->sumb(1, "aaa");
        $this->assertEquals("Error", $actual);
    }

    public function testSumNg2()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $actual = $userModel->sumb("aaa", "bbb");
        $this->assertEquals("Error", $actual);
    }

    public function testSumNg3()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $actual = $userModel->sumb(1, null);
        $this->assertEquals("Error", $actual);
    }

    public function testSumNg4()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $actual = $userModel->sumb(null, null);
        $this->assertEquals("Error", $actual);
    }

    public function testSumNg5()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $actual = $userModel->sumb(1, "");
        $this->assertEquals("Error", $actual);
    }

    public function testSumNg6()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $actual = $userModel->sumb("", "");
        $this->assertEquals("Error", $actual);
    }

    public function testSumNg7()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $actual = $userModel->sumb(1, array("Volvo", "BMW", "Toyota"));
        $this->assertEquals("Error", $actual);
    }

    public function testSumNg8()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $actual = $userModel->sumb(array("Volvo", "BMW", "Toyota"), array("Volvo", "BMW", "Toyota"));
        $this->assertEquals("Error", $actual);
    }

    public function testSumNg9()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $actual = $userModel->sumb(1, ["name" => "string"]);
        $this->assertEquals("Error", $actual);
    }

    public function testSumNg10()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $actual = $userModel->sumb(["name" => "string"], ["name" => "string"]);
        $this->assertEquals("Error", $actual);
    }

    public function testSumNg11()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $actual = $userModel->sumb(1, true);
        $this->assertEquals("Error", $actual);
    }

    public function testSumNg12()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $actual = $userModel->sumb(true, false);
        $this->assertEquals("Error", $actual);
    }

    public function testAuthOk()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

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
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $actual = $userModel->auth("unknown-user", "123");
        $this->assertEquals(0, count($actual));
    }

    public function testAuthNg2()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $actual = $userModel->auth("", "123");
        $this->assertEquals("Error", $actual);
    }

    public function testAuthNg3()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $actual = $userModel->auth(null, "123");
        $this->assertEquals("Error", $actual);
    }

    public function testAuthNg4()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $actual = $userModel->auth(2, "123");
        $this->assertEquals("Error", $actual);
    }

    public function testAuthNg5()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $actual = $userModel->auth(2.6, "123");
        $this->assertEquals("Error", $actual);
    }

    public function testAuthNg6()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $actual = $userModel->auth(array("Volvo", "BMW", "Toyota"), "123");
        $this->assertEquals("Error", $actual);
    }

    public function testAuthNg7()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $actual = $userModel->auth(["name" => "string"], "123");
        $this->assertEquals("Error", $actual);
    }

    public function testAuthNg8()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $actual = $userModel->auth(true, "123");
        $this->assertEquals("Error", $actual);
    }

    public function testAuthNg9()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $actual = $userModel->auth("tronghieu60s", "123456");
        $this->assertEquals(0, count($actual));
    }

    public function testAuthNg10()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $actual = $userModel->auth("tronghieu60s", "");
        $this->assertEquals("Error", $actual);
    }

    public function testAuthNg11()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $actual = $userModel->auth("tronghieu60s", null);
        $this->assertEquals("Error", $actual);
    }

    public function testAuthNg12()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $actual = $userModel->auth("tronghieu60s", 2);
        $this->assertEquals("Error", $actual);
    }

    public function testAuthNg13()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $actual = $userModel->auth("tronghieu60s", 2.56);
        $this->assertEquals("Error", $actual);
    }

    public function testAuthNg14()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $actual = $userModel->auth("tronghieu60s", array("Volvo", "BMW", "Toyota"));
        $this->assertEquals("Error", $actual);
    }

    public function testAuthNg15()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $actual = $userModel->auth("tronghieu60s", ["name" => "string"]);
        $this->assertEquals("Error", $actual);
    }

    public function testAuthNg16()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $actual = $userModel->auth("tronghieu60s", true);
        $this->assertEquals("Error", $actual);
    }

    public function testGetUsersOk()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

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
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

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
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $keyword = "unknown-user";
        $actual = $userModel->getUsers(["keyword" => $keyword]);
        $this->assertEquals(0, count($actual));
    }

    public function testGetUsersByKeywordNg1()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $keyword = 2;
        $actual = $userModel->getUsers(["keyword" => $keyword]);
        $this->assertEquals("Error", $actual);
    }

    public function testGetUsersByKeywordNg2()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $keyword = array("Volvo", "BMW", "Toyota");
        $actual = $userModel->getUsers(["keyword" => $keyword]);
        $this->assertEquals("Error", $actual);
    }

    public function testGetUsersByKeywordNg3()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $keyword = ["name" => "string"];
        $actual = $userModel->getUsers(["keyword" => $keyword]);
        $this->assertEquals("Error", $actual);
    }

    public function testGetUsersByKeywordNg4()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $keyword = true;
        $actual = $userModel->getUsers(["keyword" => $keyword]);
        $this->assertEquals("Error", $actual);
    }

    public function testInsertUserOk()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
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
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $input = "";

        $actual = $userModel->insertUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testInsertUserNg2()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $input = null;

        $actual = $userModel->insertUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testInsertUserNg3()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $input = 2;

        $actual = $userModel->insertUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testInsertUserNg4()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $input = array("Volvo", "BMW", "Toyota");

        $actual = $userModel->insertUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testInsertUserNg5()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $input = ["name" => "string"];

        $actual = $userModel->insertUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testInsertUserNg6()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $input = true;

        $actual = $userModel->insertUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testInsertUserNg7()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
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
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
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
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
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
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
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
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
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
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
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
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
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
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
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
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $input = "";

        $actual = $userModel->updateUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testUpdateUserNg2()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $input = null;

        $actual = $userModel->updateUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testUpdateUserNg3()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $input = 2;

        $actual = $userModel->updateUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testUpdateUserNg4()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $input = array("Volvo", "BMW", "Toyota");

        $actual = $userModel->updateUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testUpdateUserNg5()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $input = ["name" => "string"];

        $actual = $userModel->updateUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testUpdateUserNg6()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $input = true;

        $actual = $userModel->updateUser($input);
        $this->assertEquals("Error", $actual);
    }

    public function testUpdateUserNg7()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
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
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
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
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
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
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
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
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
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
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
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
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
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
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
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
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
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
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
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
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
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
    public function testDeleteUserByIdOk()
    {
        $userModel = new UserModel();
        $id = 12;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals(true, $actual);
    }
    public function testDeleteUserByIdStr()
    {
        $userModel = new UserModel();
        $id = 'Hen';
        $expected = "error";
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteUserEmpty()
    {
        $userModel = new UserModel();
        $id = "";
        $expected = "error";
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteUserNull()
    {
        $userModel = new UserModel();
        $id = null;
        $expected = "error";
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteUserByIdNE()
    {
        $userModel = new UserModel();
        $id = 99;
        $user = $userModel->findUserById($id);
        $expected = null;
        if ($user) {
            $expected = false;
        } else {
            $expected = true;
        }
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteUserByArray()
    {
        $userModel = new UserModel();
        $id = [];
        $expected = "error";
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteUserByObject()
    {
        $userModel = new UserModel();
        $id = new UserModel();;
        $expected = "error";
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($expected, $actual);
    }

    // public function testFindUserOk()
    // {
    //     $userModel = new UserModel();
    //     $keyword = "H";
    //     $actual1 = $userModel->findUser($keyword);
    //     $this->assertEquals(strtolower($keyword), strtolower($actual1['name']['email']));
    // }

    public function testFindUserByIdOk()
    {
        $userModel = new UserModel();

        $id = 9;
        $MDUsername = 'Hen';

        $user = $userModel->findUserById($id);

        $this->assertEquals($MDUsername, $user[0]['name']);
    }
    public function testFindUserByIdNE()
    {
        $userModel = new UserModel();

        $id = 10;


        $user = $userModel->findUserById($id);

        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    public function testFindUserByIdStr()
    {
        $userModel = new UserModel();

        $id = 'Hen';
        $expected = 'error';
        $actual = $userModel->findUserById($id);

        $this->assertEquals($expected, $actual);
    }
    public function testFindUserByIdEmpty()
    {
        $userModel = new UserModel();
        $id = '';
        $expected = 'error';
        $actual = $userModel->findUserById($id);

        $this->assertEquals($expected, $actual);
    }
    public function testFindUserByIdNull()
    {
        $userModel = new UserModel();
        $id = null;
        $expected = 'error';
        $actual = $userModel->findUserById($id);

        $this->assertEquals($expected, $actual);
    }

    public function testFindUserByIdObject()
    {
        $userModel = new UserModel();

        $id = new stdClass();
        $expected = 'error';
        $actual = $userModel->findUserById($id);

        $this->assertEquals($expected, $actual);
    }
    public function testFindUserByIdArray()
    {
        $userModel = new UserModel();

        $id = [];
        $expected = 'error';
        $actual = $userModel->findUserById($id);

        $this->assertEquals($expected, $actual);
    }
}
