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
        $input = [];
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = 3;
        $excute = true;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser name null
    public function testInsertUserNameNull()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = null;
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = 3;
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser password null
    public function testInsertUserPassNull()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = "luan";
        $input['password'] = null;
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = 3;
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser fullname null
    public function testInsertUserFullNameNull()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = null;
        $input['email'] = "luan@gmail.com";
        $input['type'] = 3;
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser email null
    public function testInsertUserEmailNull()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = null;
        $input['type'] = 3;
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser name là chuỗi
    public function testInsertUserNameStr()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = 3;
        $excute = true;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser name là số
    public function testInsertUserNameNumber()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = 123;
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser name là số thực
    public function testInsertUserNameFloat()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = 12.3;
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser name là mảng
    public function testInsertUserNameArr()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = [];
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser name là kí tự đặc biệt
    public function testInsertUserNameCharacters()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = '@#$%%^';
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser name là đối tượng
    public function testInsertUserNameObject()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $input = [];
        $input['name'] = $bankModel;
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser name là boolen
    public function testInsertUserNameBoolen()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = true;
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser name không có dữ liệu
    public function testInsertUserNameNoData()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = "";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser password là số
    public function testInsertUserPassNumber()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = 123;
        $input['password'] = 12345;
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser password là chuỗi
    public function testInsertUserPassStr()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = "luan";
        $input['password'] = "abc";
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = 3;
        $excute = true;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser password là số thực
    public function testInsertUserPassFloat()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = "luan";
        $input['password'] = 1234.5;
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser password là mảng
    public function testInsertUserPassArr()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = "luan";
        $input['password'] = [];
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser password là kí tự đặc biệt
    public function testInsertUserPassCharacters()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = "luan";
        $input['password'] = '@#$%';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser password là đối tượng
    public function testInsertUserPassObject()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $input = [];
        $input['name'] = "luan";
        $input['password'] = $bankModel;
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser password là boolen
    public function testInsertUserPassBoolen()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = "luan";
        $input['password'] = true;
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser password không có dữ liệu
    public function testInsertUserPassNoData()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = "luan";
        $input['password'] = "";
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser fullname là chuỗi
    public function testInsertUserFullNameStr()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = 3;
        $excute = true;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser fullname là số
    public function testInsertUserFullNameNumber()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = "abc";
        $input['password'] = '12345';
        $input['fullname'] = 123;
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser fullname là số thực
    public function testInsertUserFullNameFloat()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = "abc";
        $input['password'] = '12345';
        $input['fullname'] = 12.3;
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser fullname là mảng
    public function testInsertUserFullNameArr()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = "abc";
        $input['password'] = '12345';
        $input['fullname'] = [];
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser fullname là kí tự đặc biệt
    public function testInsertUserFullNameCharacters()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = "abc";
        $input['password'] = '12345';
        $input['fullname'] = '!@#$%';
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser fullname là đối tượng
    public function testInsertUserFullNameObject()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $input = [];
        $input['name'] = "abc";
        $input['password'] = '12345';
        $input['fullname'] = $bankModel;
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser fullname là boolen
    public function testInsertUserFullNameBoolen()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = "abc";
        $input['password'] = '12345';
        $input['fullname'] = true;
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser fullname không có dữ liệu
    public function testInsertUserFullNameNoData()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = "abc";
        $input['password'] = '12345';
        $input['fullname'] = "";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser Email là chuỗi
    public function testInsertUserEmailStr()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = 3;
        $excute = true;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser Email là số
    public function testInsertUserEmailNumber()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = "abc";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = 123;
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser Email là số thực
    public function testInsertUserEmailFloat()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = "abc";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = 11.1;
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser Email là mảng
    public function testInsertUserEmailArr()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = "abc";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = [];
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser Email là kí tự đặc biệt
    public function testInsertUserEmailCharacters()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = "abc";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = '@#$!';
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser Email là đối tượng
    public function testInsertUserEmailObject()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $input = [];
        $input['name'] = "abc";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = $bankModel;
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser Email là boolen
    public function testInsertUserEmailBoolen()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = "abc";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = true;
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser Email không có dữ liệu
    public function testInsertUserEmailNoData()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = "abc";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser type là chuỗi
    public function testInsertUserTypeStr()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser type là số
    public function testInsertUserTypeNumber()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = 3;
        $excute = true;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser type là số thực
    public function testInsertUserTypeFloat()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = 2.1;
        $excute = true;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser type là mảng
    public function testInsertUserTypeArr()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = [];
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser type là kí tự đặc biệt
    public function testInsertUserTypeCharacters()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '@#$';
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser type là đối tượng
    public function testInsertUserTypeObject()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $input = [];
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = $bankModel;
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser type là boolen
    public function testInsertUserTypeBoolen()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = true;
        $excute = true;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test insertUser Email không có dữ liệu
    public function testInsertUserTypeNoData()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = "";
        $excute = false;
        $actual = $userModel->insertUser($input);
        $this->assertEquals($excute, $actual);
    }

    //test UpdateUser đúng
    public function testUpdateUserOK()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = 3;
        $excute = true;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
     //test UpdateUser id null
     public function testUpdateUserIdNull()
     {
         $userModel = new UserModel();
         $input = [];
         $input['id'] = null;
         $input['name'] = "luan";
         $input['password'] = '12345';
         $input['fullname'] = "abc";
         $input['email'] = "luan@gmail.com";
         $input['type'] = 3;
         $excute = false;
         $actual = $userModel->updateUser($input);
         $this->assertEquals($excute, $actual);
     }
    //test UpdateUser name null
    public function testUpdateUserNameNull()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = null;
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = 3;
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser password null
    public function testUpdateUserPassNull()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "luan";
        $input['password'] = null;
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = 3;
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser fullname null
    public function testUpdateUserFullNameNull()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = null;
        $input['email'] = "luan@gmail.com";
        $input['type'] = 3;
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser email null
    public function testUpdateUserEmailNull()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = null;
        $input['type'] = 3;
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    } 
    //test updateUser name là chuỗi
    public function testUpdateUserNameStr()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = 3;
        $excute = true;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser name là số
    public function testUpdateUserNameNumber()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = 123;
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser name là số thực
    public function testUpdateUserNameFloat()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = 12.3;
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser name là mảng
    public function testUpdateUserNameArr()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = [];
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser name là kí tự đặc biệt
    public function testUpdateUserNameCharacters()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = '@#$%%^';
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser name là đối tượng
    public function testUpdateUserNameObject()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = $bankModel;
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser name là boolen
    public function testUpdateUserNameBoolen()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = true;
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser name không có dữ liệu
    public function testUpdateUserNameNoData()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser password là số
    public function testUpdateUserPassNumber()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = 123;
        $input['password'] = 12345;
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser password là chuỗi
    public function testUpdateUserPassStr()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "luan";
        $input['password'] = "abc";
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = 3;
        $excute = true;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser password là số thực
    public function testUpdateUserPassFloat()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "luan";
        $input['password'] = 1234.5;
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser password là mảng
    public function testUpdateUserPassArr()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "luan";
        $input['password'] = [];
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser password là kí tự đặc biệt
    public function testUpdateUserPassCharacters()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "luan";
        $input['password'] = '@#$%';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser password là đối tượng
    public function testUpdateUserPassObject()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "luan";
        $input['password'] = $bankModel;
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser password là boolen
    public function testUpdateUserPassBoolen()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "luan";
        $input['password'] = true;
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser password không có dữ liệu
    public function testUpdateUserPassNoData()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "luan";
        $input['password'] = "";
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser fullname là chuỗi
    public function testUpdateUserFullNameStr()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = 3;
        $excute = true;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser fullname là số
    public function testUpdateUserFullNameNumber()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "abc";
        $input['password'] = '12345';
        $input['fullname'] = 123;
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser fullname là số thực
    public function testUpdateUserFullNameFloat()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "abc";
        $input['password'] = '12345';
        $input['fullname'] = 12.3;
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser fullname là mảng
    public function testUpdateUserFullNameArr()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "abc";
        $input['password'] = '12345';
        $input['fullname'] = [];
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser fullname là kí tự đặc biệt
    public function testUpdateUserFullNameCharacters()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "abc";
        $input['password'] = '12345';
        $input['fullname'] = '!@#$%';
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser fullname là đối tượng
    public function testUpdateUserFullNameObject()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "abc";
        $input['password'] = '12345';
        $input['fullname'] = $bankModel;
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser fullname là boolen
    public function testUpdateUserFullNameBoolen()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "abc";
        $input['password'] = '12345';
        $input['fullname'] = true;
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser fullname không có dữ liệu
    public function testUpdateUserFullNameNoData()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "abc";
        $input['password'] = '12345';
        $input['fullname'] = "";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser Email là chuỗi
    public function testUpdateUserEmailStr()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = 3;
        $excute = true;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser Email là số
    public function testUpdateUserEmailNumber()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "abc";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = 123;
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser Email là số thực
    public function testUpdateUserEmailFloat()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "abc";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = 11.1;
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser Email là mảng
    public function testUpdateUserEmailArr()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "abc";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = [];
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser Email là kí tự đặc biệt
    public function testUpdateUserEmailCharacters()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "abc";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = '@#$!';
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser Email là đối tượng
    public function testUpdateUserEmailObject()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "abc";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = $bankModel;
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser Email là boolen
    public function testUpdateUserEmailBoolen()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "abc";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = true;
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser Email không có dữ liệu
    public function testUpdateUserEmailNoData()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "abc";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser type là chuỗi
    public function testUpdateUserTypeStr()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '3';
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser type là số
    public function testUpdateUserTypeNumber()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = 3;
        $excute = true;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser type là số thực
    public function testUpdateUserTypeFloat()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = 2.1;
        $excute = true;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser type là mảng
    public function testUpdateUserTypeArr()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = [];
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser type là kí tự đặc biệt
    public function testUpdateUserTypeCharacters()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = '@#$';
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser type là đối tượng
    public function testUpdateUserTypeObject()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = $bankModel;
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser type là boolen
    public function testUpdateUserTypeBoolen()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = true;
        $excute = true;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser type không có dữ liệu
    public function testUpdateUserTypeNoData()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = "";
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser id là chuỗi
    public function testUpdateUserIdStr()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = "aa";
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = 3;
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser id là số
    public function testUpdateUserIdNumber()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = 3;
        $excute = true;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser id là số thực
    public function testUpdateUserIdFloat()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = 3.23;
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = 3;
        $excute = true;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser id là mảng
    public function testUpdateUserIdArr()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = [];
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = 3;
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser id là kí tự đặc biệt
    public function testUpdateUserIdCharacters()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = '@#$';
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = 3;
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser id là đối tượng
    public function testUpdateUserIdObject()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $input = [];
        $input['id'] = $bankModel;
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = 3;
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser id là boolen
    public function testUpdateUserIdBoolen()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = true;
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = 3;
        $excute = true;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
    //test updateUser id không có dữ liệu
    public function testUpdateUserIdNoData()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = "";
        $input['name'] = "luan";
        $input['password'] = '12345';
        $input['fullname'] = "abc";
        $input['email'] = "luan@gmail.com";
        $input['type'] = 3;
        $excute = false;
        $actual = $userModel->updateUser($input);
        $this->assertEquals($excute, $actual);
    }
}