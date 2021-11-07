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
        $a = 1;
        $b = 2;
        $expected = 3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }


    /**
     * Test case Not good
     */
    public function testSumNg()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 2;

        $actual = $userModel->sumb($a, $b);

        if ($actual != 3) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }


    /**
     * Test case:
     * String and number.
     */
    public function testSum_StringAndNum()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 'a';

        $expected = 'NaN exception!';
        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }


    /**
     * Test case:
     * String and string.
     */
    public function testSum_StringAndString()
    {
        $userModel = new UserModel();
        $a = 'a';
        $b = 'b';

        $expected = 'NaN exception!';
        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }


    /**
     * Test case:
     * Floating point numbers.
     */
    public function testSum_FloatingPointNumbers()
    {
        $userModel = new UserModel();
        $a = 2.3;
        $b = 3.5;

        $expected = 5.8;
        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }


    // ____________________________________________________________________________________________________
    /**
     * Test case:
     * Get id of latest inserted user.
     * Check if the result is valid number.
     */
    public function testGetTheIdOk()
    {
        $userModel = new UserModel();

        $actual = $userModel->getTheID();

        print_r("\t=> Actual result: " . $actual . "\n");

        if (gettype($actual) == 'integer' && $actual > 0) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }


    // ____________________________________________________________________________________________________
    /**
     * Test case:
     * Add new user to database.
     */
    public function testInsertUserOk()
    {
        $userModel = new UserModel();

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

        print_r("\t=> Actual result: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }


    // ____________________________________________________________________________________________________
    /**
     * Test case:
     * Update existing user in database with valid values.
     */
    public function testUpdateUserOk()
    {
        $userModel = new UserModel();

        $currentDataVerion = $userModel->getVersionByUserID(1);

        $param = array(
            "id" => "1",
            "bank_id" => "10",
            "name" => "user1_updated",
            "fullname" => "user1_updated",
            "email" => "user1_updated@mail.com",
            "type" => "user",
            "password" => "admin",
            "cost" => "111000",
            "ver" => $currentDataVerion,
            "submit" => "submit"
        );

        $actual = $userModel->updateUser($param);
        $expected = 1;

        print_r("\t=> Actual result: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case:
     * Update existing user in database with null values.
     */
    public function testUpdateUserNgNull()
    {
        $userModel = new UserModel();

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

        print_r("\t=> Actual result: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case:
     * Update existing user in database with NaN values.
     */
    public function testUpdateUserNgNan()
    {
        $userModel = new UserModel();

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

        print_r("\t=> Actual result: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case:
     * Update existing user in database with empty string values.
     */
    public function testUpdateUserNgEmptyString()
    {
        $userModel = new UserModel();

        $currentDataVerion = $userModel->getVersionByUserID(1);

        $param = array(
            "id" => "1",
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

        print_r("\t=> Actual result: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case:
     * Update existing user in database with object values.
     */
    public function testUpdateUserNgObject()
    {
        $userModel = new UserModel();

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

        print_r("\t=> Actual result: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
}
