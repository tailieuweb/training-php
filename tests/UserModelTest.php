<?php
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{

    //______________________________________/** Test InsertUser_UserModel*/_______________________________________

      /**
     * Thêm user mới vào database
     */
    public function testInsertUserOk()
    {
        $userModel = new UserModel();
        $param = array(
            "id" => "1",
            "name" => "user1",
            "fullname" => "user1",
            "email" => "user1@gmail.com",
            "password" => "user1",
        );

        $actual = $userModel->insertUser($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
     /**
     * Thêm user mới bị trùng id
     */
    public function testInsertUserNgTrungId()
    {
        $userModel = new UserModel();
        $existing_id = $userModel->getID();

        $param = array(
            "id" => "1",
            "name" => "user1",
            "fullname" => "user1",
            "email" => "user1@gmail.com",
            "password" => "user1",
        );

        $userModel->insertUser($param);
        $actual = $userModel->getID();
        $expected = $existing_id + 1;

        print_r("\t=> The last ID before: " . $existing_id  . "\n");
        print_r("\t=> The last ID after: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
     /**
     * Add new user with empty string values.
     */
    public function testInsertUserNgEmptyStringValues()
    {
        $userModel = new UserModel();
        $param = array(
            "id" => "",
            "name" => "",
            "fullname" => "",
            "email" => "",
            "password" => "",
        );

        $actual = $userModel->insertUser($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
    /**
     * thêm người dùng mới với giá trị null
     */
    public function testInsertUserNgNullValues()
    {
        $userModel = new UserModel();

        $param = array(
            "id" => null,
            "name" => null,
            "fullname" => null,
            "email" => null,
            "password" => null,
        );

        $actual = $userModel->insertUser($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
     /**
     * thêm người dùng mới với giá trị là đối tượng
     */
    public function testInsertUserNgDt()
    {
        $userModel = new UserModel();
        $obj = new DtClass();

        $param = array(
            "id" => $obj,
            "name" => $obj,
            "fullname" => $obj,
            "email" => $obj,
            "password" => $obj,
        );

        $actual = $userModel->insertUser($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
    /**
     * thêm người dùng mới với giá trị boolean
     */
    public function testInsertUserNgBooleanValues()
    {
        $userModel = new UserModel();
        $boolean = true;

        $param = array(
            "id" => $boolean,
            "name" => $boolean,
            "fullname" => $boolean,
            "email" => $boolean,
            "password" => $boolean,
        );

        $actual = $userModel->insertUser($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
    /**
     * thêm người dùng mới với giá trị là mảng
     */
    public function testInsertUserNgArrayValues()
    {
        $userModel = new UserModel();

        $arr = [1, 2, 3];

        $param = array(
            "id" => $arr,
            "name" => $arr,
            "fullname" => $arr,
            "email" => $arr,
            "password" => $arr,
        );

        $actual = $userModel->insertUser($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }

    //______________________________________/** Test Update User */____________________________________________

    /**
     * Update user with null values
     */
    public function testUpdateUserNgNullValues()
    {
        $userModel = new UserModel();

        $param = array(
            "id" => null,
            "name" => "user1_update",
            "fullname" => "user1_update",
            "email" => "user1_update@gmail.com",
            "password" => "user1_update",
        );

        $actual = $userModel->updateUser($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
    /**
     * Update user 
     */
    public function testUpdateUserOk()
    {
        $userModel = new UserModel();

        $param = array(
            "id" => "1",
            "name" => "user1_update",
            "fullname" => "user1_update",
            "email" => "user1_update@gmail.com",
            "password" => "user1_update",
        );

        $actual = $userModel->updateUser($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
    /**
     * Update user with empty string values
     */
    public function testUpdateUserNgEmptyStringValues()
    {
        $userModel = new UserModel();

        $param = array(
            "id" => "",
            "name" => "",
            "fullname" => "user1_update",
            "email" => "user1_update@gmail.com",
            "password" => "user1_update",
        );

        $actual = $userModel->updateUser($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
    /**
     * Update user with boolean values
     */
    public function testUpdateUserNgBooleanValues()
    {
        $userModel = new UserModel();
        $boolean = true;

        $param = array(
            "id" => $boolean,
            "name" =>  $boolean,
            "fullname" => "user1_update",
            "email" => "user1_update@gmail.com",
            "password" => "user1_update",
        );

        $actual = $userModel->updateUser($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
    /**
     * Update user with array values
     */
    public function testUpdateUserNgArrayValues()
    {
        $userModel = new UserModel();
        $arr = [1, 2, 3];

        $param = array(
            "id" => $arr,
            "name" =>  $arr,
            "fullname" => "user1_update",
            "email" => "user1_update@gmail.com",
            "password" => "user1_update",
        );

        $actual = $userModel->updateUser($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
    /**
     * Update user with Object values
     */
    public function testUpdateUserNgObjectValues()
    {
        $userModel = new UserModel();
        $obj = new DtClass();

        $param = array(
            "id" => $obj,
            "name" =>  $obj,
            "fullname" => "user1_update",
            "email" => "user1_update@gmail.com",
            "password" => "user1_update",
        );

        $actual = $userModel->updateUser($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }

     /**
     * Update user with letter values
     */
    public function testUpdateUserNgletterValues()
    {
        $userModel = new UserModel();
        $letter = 'a';

        $param = array(
            "id" =>   $letter,
            "name" =>   $letter,
            "fullname" => "user1_update",
            "email" => "user1_update@gmail.com",
            "password" =>   $letter,
        );

        $actual = $userModel->updateUser($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }

}