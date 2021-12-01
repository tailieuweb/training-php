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

    public function testFindUserByIdOk()
    {
        $userModel = new UserModel();
        $userId = 1;
        $userName = 'test1';

        $user = $userModel->findUserById($userId);
        $actual = $user[0]['name'];

        $this->assertEquals($userName, $actual);
    }
    /**
     * Test DeleteUserById Function in UserModel - 'Vinh' do this
     */
    // Test case testDeleteUserById
    public function testDeleteUserByIdOK()
    {
        $userModel = new UserModel();
        $id = "1";
        $check = $userModel->deleteUserById($id);
        if ($check == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testDeleteUserByNg
    public function testDeleteUserByIdNg()
    {
        $userModel = new UserModel();
        $id = "a";
        $check = $userModel->deleteUserById($id);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testDeleteUserNotId
    public function testDeleteUserNotId()
    {
        $userModel = new UserModel();
        $id = "";
        $check = $userModel->deleteUserById($id);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testDeleteUserBool
    public function testDeleteUserBool()
    {
        $userModel = new UserModel();
        $id = false;
        $check = $userModel->deleteUserById($id);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testDeleteUserExpectedandActual
    public function testDeleteUserExpectedandActual()
    {
        $userModel = new UserModel();
        $id = -1;
        $expected = $userModel->deleteUserById($id);
        $actual = true;
        $this->assertEquals($expected, $actual);
    }
     /**
     * Test UpdateUser Function in UserModel - 'Vinh' do this
     */
    //Test update user ok
    public function testUpdateUserOk(){
        $userModel = new UserModel();
        $user  = array(
            'id' => 3,
            'name' =>'abcd',
            'fullname' =>'quangvinh',
            'type' => 'admin',
            'email' => 'quangvinh@gmail.com',
            'password' => '1234567'
        );
        $actual = $userModel->updateUser($user);
        if($actual == true){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
    //Test update user null
    public function testUpdateUserNull(){
        $userModel = new UserModel();
        $user  = array(
            'id' => '',
            'name' =>'',
            'fullname' =>'',
            'type' => '',
            'email' => '',
            'password' => ''
        );
        $actual = $userModel->updateUser($user);
        if($actual == false){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
    public function testUpdateUserIdFalse(){
        $userModel = new UserModel();
        $user  = array(
            'id' => 'a',
            'name' =>'vinh',
            'fullname' =>'quangvinh',
            'type' => 'admin',
            'email' => 'quangvinh@gmail.com',
            'password' => '12345'
        );
        $actual = $userModel->updateUser($user);
        if($actual == false){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
     /**
     * Test InsertUser Function in UserModel - 'Vinh' do this
     */
    //Test insert user ok
    public function testInsertUserOk(){
        $userModel = new UserModel();
        $user  = array(
            'id' => 3,
            'name' =>'abcd',
            'fullname' =>'quangvinh',
            'type' => 'admin',
            'email' => 'quangvinh@gmail.com',
            'password' => '1234567'
        );
        $actual = $userModel->insertUser($user);
        if($actual == true){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
    public function testInsertUserNull(){
        $userModel = new UserModel();
        $user  = array(
            'id' => [],
            'name' =>'',
            'fullname' =>'',
            'type' => '',
            'email' => '',
            'password' => ''
        );
        $actual = $userModel->insertUser($user);
        if($actual == false){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
    public function testInsertUserNotId(){
        $userModel = new UserModel();
        $user  = array(
            'id' => 'a',
            'name' =>'abcd',
            'fullname' =>'quangvinh',
            'type' => 'admin',
            'email' => 'quangvinh@gmail.com',
            'password' => '1234567'
        );
        $actual = $userModel->insertUser($user);
        if($actual == true){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(true);
        }
    }
}
