<?php

use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    // ____________________________________________________________________________________________________
    /**
     * Test case:
     * Get id of latest inserted user.
     * Check if the result is valid version value.
     */
    public function testGetTheIdOk()
    {
        // $userModel = new UserModel();
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $actual = $userModel->getTheID();

        print_r("\t=> Actual: " . $actual . "\n");

        if (gettype($actual) == 'integer' && $actual > 0) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    /**
     * Test case:
     * Get id of latest inserted user.
     * Check if the result is correct.
     */
    public function testGetTheIdOkCorrectValue()
    {
        // $userModel = new UserModel();
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $list_of_users = $userModel->getUsers();
        $actual = $userModel->getTheID();
        $expected = -1;

        foreach ($list_of_users as $user) {
            if ($expected < $user['id']) {
                $expected = $user['id'];
            }
        }

        print_r("\t=> Expected: " . $expected . "\n");
        print_r("\t=> Actual: " . $actual . "\n");

        if ($actual == $expected) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    // ____________________________________________________________________________________________________
    /**
     * Test case:
     * Add new user to database.
     */
    public function testInsertUserOk()
    {
        // $userModel = new UserModel();
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

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

        $actual = $userModel->insertUser($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);

        // Rollback:
        if ($actual == $expected) {
            $last_uid = $userModel->getTheID();
            $userModel->deleteUserById($last_uid);
        }
    }

    /**
     * Test case:
     * Add new user to database with duplicate ID.
     * Expected result: The new user is inserted with different ID.
     */
    public function testInsertUserNgDuplicateId()
    {
        // $userModel = new UserModel();
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $existing_id = $userModel->getTheID();

        $param = array(
            "id" => $existing_id,
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
        $actual = $userModel->getTheID();
        $expected = $existing_id + 1;

        print_r("\t=> The last ID before: " . $existing_id  . "\n");
        print_r("\t=> The last ID after: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);

        // Rollback:
        if ($actual == $expected) {
            $last_uid = $userModel->getTheID();
            $userModel->deleteUserById($last_uid);
        }
    }

    /**
     * Test case:
     * Add new user to database with null values.
     */
    public function testInsertUserNgNull()
    {
        // $userModel = new UserModel();
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $param = array(
            "id" => "",
            "bank_id" => 0,
            "name" => null,
            "fullname" => "user99",
            "email" => "user99@mail.com",
            "type" => "user",
            "password" => "admin",
            "cost" => "0",
            "ver" => "",
            "submit" => "submit"
        );

        $actual = $userModel->insertUser($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case:
     * Add new user to database with empty string values.
     */
    public function testInsertUserNgEmptyString()
    {
        // $userModel = new UserModel();
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $param = array(
            "id" => "",
            "bank_id" => 0,
            "name" => "",
            "fullname" => "",
            "email" => "",
            "type" => "",
            "password" => "",
            "cost" => "0",
            "ver" => "",
            "submit" => "submit"
        );

        $actual = $userModel->insertUser($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case:
     * Add new user to database with with object values.
     */
    public function testInsertUserNgObject()
    {
        // $userModel = new UserModel();
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $obj = new stdClass();

        $param = array(
            "id" => "",
            "bank_id" => 0,
            "name" => $obj,
            "fullname" => $obj,
            "email" => $obj,
            "type" => $obj,
            "password" => $obj,
            "cost" => "0",
            "ver" => "",
            "submit" => "submit"
        );

        $actual = $userModel->insertUser($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case:
     * Add new user to database with with array values.
     */
    public function testInsertUserNgArray()
    {
        // $userModel = new UserModel();
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $arr = [1, 2, 3];

        $param = array(
            "id" => "",
            "bank_id" => 0,
            "name" => $arr,
            "fullname" => $arr,
            "email" => $arr,
            "type" => $arr,
            "password" => $arr,
            "cost" => "0",
            "ver" => "",
            "submit" => "submit"
        );

        $actual = $userModel->insertUser($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case:
     * Add new user to database with with boolean values.
     */
    public function testInsertUserNgBoolean()
    {
        // $userModel = new UserModel();
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $boolean = true;

        $param = array(
            "id" => "",
            "bank_id" => 0,
            "name" => $boolean,
            "fullname" => $boolean,
            "email" => $boolean,
            "type" => $boolean,
            "password" => $boolean,
            "cost" => "0",
            "ver" => "",
            "submit" => "submit"
        );

        $actual = $userModel->insertUser($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }


    // ____________________________________________________________________________________________________
    /**
     * Test case:
     * Update existing user in database with valid values.
     */
    public function testUpdateUserOk()
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
        $currentDataVerion = $userModel->getVersionByUserID($last_uid);

        $param = array(
            "id" => $last_uid,
            "bank_id" => "10",
            "name" => "user99_updated",
            "fullname" => "user99_updated",
            "email" => "user99_updated@mail.com",
            "type" => "user",
            "password" => "admin",
            "cost" => "111000",
            "ver" => $currentDataVerion,
            "submit" => "submit"
        );

        $actual = $userModel->updateUser($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);

        // Rollback:
        if ($actual == $expected) {
            $userModel->deleteUserById($last_uid);
        }
    }

    /**
     * Test case:
     * Update existing user in database with null values.
     */
    public function testUpdateUserNgNull()
    {
        // $userModel = new UserModel();
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $param = array(
            "id" => null,
            "bank_id" => "10",
            "name" => "user99999_updated",
            "fullname" => "user1_updated",
            "email" => "user1_updated@mail.com",
            "type" => "user",
            "password" => "admin",
            "cost" => "111000",
            "ver" => 99999,
            "submit" => "submit"
        );

        $actual = $userModel->updateUser($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case:
     * Update existing user in database with NaN values.
     */
    public function testUpdateUserNgNan()
    {
        // $userModel = new UserModel();
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $nan = 'e';

        $param = array(
            "id" => $nan,
            "bank_id" => "10",
            "name" => "user1_updated",
            "fullname" => "user1_updated",
            "email" => "user1_updated@mail.com",
            "type" => "user",
            "password" => "admin",
            "cost" => "111000",
            "ver" => $nan,
            "submit" => "submit"
        );

        $actual = $userModel->updateUser($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case:
     * Update existing user in database with empty string values.
     */
    public function testUpdateUserNgEmptyString()
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
        $currentDataVerion = $userModel->getVersionByUserID($last_uid);

        $param = array(
            "id" => $last_uid,
            "bank_id" => "10",
            "name" => "",
            "fullname" => "",
            "email" => "",
            "type" => "",
            "password" => "",
            "cost" => "",
            "ver" => $currentDataVerion,
            "submit" => "submit"
        );

        $actual = $userModel->updateUser($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);

        // Rollback:
        if ($last_uid > 0) {
            $userModel->deleteUserById($last_uid);
        }
    }

    /**
     * Test case:
     * Update existing user in database with object values.
     */
    public function testUpdateUserNgObject()
    {
        // $userModel = new UserModel();
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $obj = new stdClass();

        $param = array(
            "id" => $obj,
            "bank_id" => $obj,
            "name" => $obj,
            "fullname" => $obj,
            "email" => $obj,
            "type" => $obj,
            "password" => $obj,
            "cost" => $obj,
            "ver" => $obj,
            "submit" => "submit"
        );

        $actual = $userModel->updateUser($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case:
     * Update existing user in database with array values.
     */
    public function testUpdateUserNgArray()
    {
        // $userModel = new UserModel();
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $arr = [1, 2, 3];

        $param = array(
            "id" => $arr,
            "bank_id" => $arr,
            "name" => $arr,
            "fullname" => $arr,
            "email" => $arr,
            "type" => $arr,
            "password" => $arr,
            "cost" => $arr,
            "ver" => $arr,
            "submit" => "submit"
        );

        $actual = $userModel->updateUser($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case:
     * Update existing user in database with boolean values.
     */
    public function testUpdateUserNgBoolean()
    {
        // $userModel = new UserModel();
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $boolean = true;

        $param = array(
            "id" => $boolean,
            "bank_id" => $boolean,
            "name" => $boolean,
            "fullname" => $boolean,
            "email" => $boolean,
            "type" => $boolean,
            "password" => $boolean,
            "cost" => $boolean,
            "ver" => $boolean,
            "submit" => "submit"
        );

        $actual = $userModel->updateUser($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
}
