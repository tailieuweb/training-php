<?php

use PHPUnit\Framework\TestCase;

class BaseModelTest extends TestCase
{

    /**
     * Test case Ok
     */
    public function testQueryOk()
    {
        // $userModel = new UserModel();
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        // GET THE LAST ID:
        $last_uid = $userModel->getTheID();
        $list_of_users = $userModel->getUsers();

        $actual = $list_of_users[count($list_of_users) - 1]['id'];
        $expected = $last_uid;

        print_r("\t=> Actual: " . $actual . "\n");

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Ok
     */
    public function testDeleteOk()
    {
        // $userModel = new UserModel();
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        // Prepare:
        $param = array(
            "id" => "",
            "bank_id" => 0,
            "name" => "user99",
            "fullname" => "user99",
            "email" => "user99@mail.com",
            "type" => "user",
            "password" => "admin",
            "cost" => "0",
            "ver" => "",
            "submit" => "submit"
        );
        $userModel->insertUser($param);
        $last_uid = $userModel->getTheID();

        // Test:
        $actual = $userModel->deleteUserById($last_uid);
        $expected = 1;

        print_r("\t=> Actual: " . $actual . "\n");

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Not good
     */
    public function testDeleteNgNan()
    {
        // $userModel = new UserModel();
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        // GET THE LAST ID:
        $uid = 'e';

        $actual = $userModel->deleteUserById($uid) == true ? 'true' : 'false';
        $expected = 'false';

        print_r("\t=> Actual: " . $actual . "\n");

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Not good
     */
    public function testDeleteNgNull()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument');

        // $userModel = new UserModel();
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        // GET THE LAST ID:
        $uid = null;

        $userModel->deleteUserById($uid) == true ? 'true' : 'false';
    }

    /**
     * Test case Not good
     */
    public function testDeleteNgEmptyString()
    {
        // $userModel = new UserModel();
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        // GET THE LAST ID:
        $uid = '';

        $actual = $userModel->deleteUserById($uid) == true ? 'true' : 'false';
        $expected = 'false';

        print_r("\t=> Actual: " . $actual . "\n");

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Not good
     */
    public function testDeleteNgObject()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument');

        // $userModel = new UserModel();
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        // GET THE LAST ID:
        $uid = new stdClass();

        $userModel->deleteUserById($uid) == true ? 'true' : 'false';
    }

    /**
     * Test case Not good
     */
    public function testDeleteNgArray()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument');

        // $userModel = new UserModel();
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        // GET THE LAST ID:
        $uid = [1, 2, 3];

        $userModel->deleteUserById($uid) == true ? 'true' : 'false';
    }

    /**
     * Test case Not good
     */
    public function testDeleteNgBoolean()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument');

        // $userModel = new UserModel();
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        // GET THE LAST ID:
        $uid = true;

        $userModel->deleteUserById($uid) == true ? 'true' : 'false';
    }
}
