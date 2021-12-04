<?php

use phpDocumentor\Reflection\Types\Null_;
use PHPUnit\Framework\TestCase;

class NguyenKhacDanh_UserModelTest extends TestCase
{
    /**
     * Test DeleteUserById Function in UserModel - 'Danh' do this
     */
    // Test case testDeleteUserById
    public function testDeleteUserByIdOK()
    {
        $userModel = new UserModel();
        $id = -1;
        $userModel->insertUserWithId($id, 'Danh', 'Nguyen Khac Danh', 'nguyenkhacdanh@gmail.com', 'guest', '12345');
        $check = $userModel->deleteUserById($id);
        $findUser = $userModel->findUserById($id);
        if (
            $check == true &&
            $findUser == false
        ) {
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
    // Test case testDeleteUserArray
    public function testDeleteUserArray()
    {
        $userModel = new UserModel();
        $id = array();
        $check = $userModel->deleteUserById($id);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testDeleteUserIdFloat
    public function testDeleteUserIdFloat()
    {
        $userModel = new UserModel();
        $id = -1.5;
        $check = $userModel->deleteUserById($id);
        if ($check == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testDeleteUserBool
    public function testDeleteUserBool()
    {
        $userModel = new UserModel();
        $id = true;
        $check = $userModel->deleteUserById($id);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testDeleteUserObject
    public function testDeleteUserObject()
    {
        $userModel = new UserModel();
        $id = new UserModel;
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
     * Test getUser Function in UserModel - 'Danh' do this
     */
    // Test case testGetUsers
    public function testGetUsersOk()
    {
        $userModel = new UserModel;
        $id = -1;
        $userModel->insertUserWithId($id, 'Danh', 'Nguyen Khac Danh', 'nguyenkhacdanh@gmail.com', 'guest', '12345');
        $users = $userModel->getUsers();
        $check = count($users) > 0;
        $userModel->deleteUserById($id);
        if ($check == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        $userModel->deleteUserById($id);
    }
    // Test case testGetUsersByKey
    public function testGetUsersByKey()
    {
        $userModel = new UserModel;
        $id = -1;
        $params = [
            "keyword" => 'Danh'
        ];
        $userModel->insertUserWithId($id, 'Danh', 'Nguyen Khac Danh', 'nguyenkhacdanh@gmail.com', 'guest', '12345');
        $users = $userModel->getUsers($params);
        $check = count($users) > 0;
        $userModel->deleteUserById($id);
        if ($check == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testGetUsersByNumber
    public function testGetUsersByNumber()
    {

        $userModel = new UserModel;
        $id = -1;
        $params = [
            "keyword" => '1'
        ];
        $userModel->insertUserWithId($id, 'Danh1', 'Nguyen Khac Danh', 'nguyenkhacdanh@gmail.com', 'guest', '12345');
        $users = $userModel->getUsers($params);
        $check = count($users) > 0;
        $userModel->deleteUserById($id);
        if ($check == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testGetUsersByKeySpecial 
    public function testGetUsersByKeySpecial()
    {
        $userModel = new UserModel;
        $id = -1;
        $params = [
            "keyword" => '#%$%#$'
        ];
        $userModel->insertUserWithId($id, 'Danh', 'Nguyen Khac Danh', 'nguyenkhacdanh@gmail.com', 'guest', '12345');
        $users = $userModel->getUsers($params);
        $check = count($users) > 0;
        $userModel->deleteUserById($id);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testGetUsersByKeyArray 
    public function testGetUsersByKeyArray()
    {
        $userModel = new UserModel;
        $id = -1;
        $params = [
            "keyword" => array()
        ];
        $userModel->insertUserWithId($id, 'Danh', 'Nguyen Khac Danh', 'nguyenkhacdanh@gmail.com', 'guest', '12345');
        $users = $userModel->getUsers($params);
        $check = count($users) > 0;
        $userModel->deleteUserById($id);
        if ($check == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testGetUsersByKeyNull
    public function testGetUsersByKeyNull()
    {
        $userModel = new UserModel;
        $id = -1;
        $params = [
            "keyword" => null
        ];
        $userModel->insertUserWithId($id, 'Danh', 'Nguyen Khac Danh', 'nguyenkhacdanh@gmail.com', 'guest', '12345');
        $users = $userModel->getUsers($params);
        $check = count($users) > 0;
        $userModel->deleteUserById($id);
        if ($check == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testGetUsersByKeyNull
    public function testGetUsersByKeyObject()
    {
        $userModel = new UserModel;
        $id = -1;
        $params = [
            "keyword" => new UserRepository()
        ];
        $userModel->insertUserWithId($id, 'Danh', 'Nguyen Khac Danh', 'nguyenkhacdanh@gmail.com', 'guest', '12345');
        $users = $userModel->getUsers($params);
        $check = count($users) > 0;
        $userModel->deleteUserById($id);
        if ($check == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
}
