<?php
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    // test deleteUserById truyền vào đúng id
    public function testDeleteUserByIdOK()
    {
        $userModel = new UserModel();
        $id = 2;
        $excute = true;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($excute, $actual);
    }
    //test deleteUserById truyền vào sai id
    public function testDeleteUserByIdNotOK()
    {
        $userModel = new UserModel();
        $id = '111a';
        $expect = false;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($expect, $actual);
    }
    //test deleteUserById id bằng null
    public function testDeleteUserByIdNull()
    {
        $userModel = new UserModel();
        $id = null;
        $actual = $userModel->deleteUserById($id);
        if ($actual == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    //test deleteUserById id không tồn tại trong database
    public function testDeleteUserByIdDoseNotExist()
    {
        $userModel = new UserModel();
        $id = 111;
        $excute = true;
        $key = $userModel->findUserById($id);
        $actual = $userModel->deleteUserById($id);
        if ($key == []) {
            $this->assertTrue(true);
        } else {
            $this->assertEquals($excute, $actual);
        }
    }
    //test deleteUserById id là kiểu chuỗi
    public function testDeleteUserByIdIsString()
    {
        $userModel = new UserModel();
        $id = "123abc";
        $excute = false;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($excute, $actual);
    }
    //test deleteUserById id là kiểu mảng
    public function testDeleteUserByIdIsArray()
    {
        $userModel = new UserModel();
        $id = ["100"];
        $excute = false;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($excute, $actual);
    }
    //test deleteUserById id là kiểu object
    public function testDeleteUserByIdIsObject()
    {
        $userModel = new UserModel();
        $id = $userModel;
        $excute = false;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($excute, $actual);
    }
    //test deleteUserById id là kiểu boolean
    public function testDeleteUserByIdIsBoolean()
    {
        $userModel = new UserModel();
        $id = true;
        $excute = false;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($excute, $actual);
    }
    //test deleteUserById id là kiểu số thực
    public function testDeleteUserByIdIsFloat()
    {
        $userModel = new UserModel();
        $id = 1.5;
        $excute = false;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($excute, $actual);
    }
    //test deleteUserById id là kiểu kí tự đặc biệt
    public function testDeleteUserByIdIsCharacters()
    {
        $userModel = new UserModel();
        $id = '@!$%#';
        $excute = false;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser đúng
    public function testInsertUserOK()
    {
        $userModel = new UserModel();
        $input = array(
            'name' => 'luan',
            'password' => '12345',
            'fullname' => 'abc',
            'email' => 'luan@gmail.com',
            'type' => 'User'
        );
        $excute = true;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser name null
    public function testInsertUserNameNull()
    {
        $userModel = new UserModel();
        $input = array(
            'name' => '',
            'password' => '12345',
            'fullname' => 'abc',
            'email' => 'luan@gmail.com',
            'type' => 'User'
        );
        $excute = true;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser password null
    public function testInsertUserPassNull()
    {
        $userModel = new UserModel();
        $input = array(
            'name' => 'luan',
            'password' => '',
            'fullname' => 'abc',
            'email' => 'luan@gmail.com',
            'type' => 'User'
        );
        $excute = true;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser fullname null
    public function testInsertUserFullNameNull()
    {
        $userModel = new UserModel();
        $input = array(
            'name' => 'luan',
            'password' => '12345',
            'fullname' => '',
            'email' => 'luan@gmail.com',
            'type' => 'User'
        );
        $excute = true;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser email null
    public function testInsertUserEmailNull()
    {
        $userModel = new UserModel();
        $input = array(
            'name' => 'luan',
            'password' => '12345',
            'fullname' => 'abc',
            'email' => '',
            'type' => 'User'
        );
        $excute = true;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    
}