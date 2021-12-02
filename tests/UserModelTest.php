<?php

use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{ 

    //TEST OF FUNCTION findUserById
    public function testFindUserByIdWithOK()
    {
        $userModel = new UserModel();
        $expected = [
            "id" => 9,
            "name" => "nguyen minh tien",
            "fullname" => "Nguyen minh tien",
            "email" => "nguyenminhtien1808@gmail.com",
            "type" => "admin",
            "password" => "202cb962ac59075b964b07152d234b70",
        ];
        $actual = $userModel->findUserById(9);
        $this->assertEquals($expected, $actual[0]);
    }
    public function testFindUserByIdWithNullId()
    {
        $userModel = new UserModel();
        $expected = false;
        $actual = $userModel->findUserById(null);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindUserByIdWithNoData()
    {
        $userModel = new UserModel();
        $expected = [];
        $actual = $userModel->findUserById(0);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindUserByStringNumberId()
    {
        $userModel = new UserModel();
        $expected = false;
        $actual = $userModel->findUserById("1");
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindUserByStringId()
    {
        $userModel = new UserModel();
        $expected = false;
        $actual = $userModel->findUserById("abcd");
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindUserBySpecialKeyId()
    {
        $userModel = new UserModel();
        $expected = false;
        $actual = $userModel->findUserById("/**//#@^%$");
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindUserByArrayId()
    {
        $userModel = new UserModel();
        $expected = false;
        $actual = $userModel->findUserById([]);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindUserByObjectId()
    {
        $userModel = new UserModel();
        $expected = false;
        $key = new stdClass;
        $actual = $userModel->findUserById($key);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindUserByBooleanId()
    {
        $userModel = new UserModel();
        $expected = false;
        $key = true;
        $actual = $userModel->findUserById($key);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindUserByDoubleId()
    {
        $userModel = new UserModel();
        $expected = false;
        $key = 1.345;
        $actual = $userModel->findUserById($key);
        $this->assertEquals($expected, $actual);
    }

    //TEST OF FUNCTION findUser
    public function testFindUserByNameWithOK()
    {
        $userModel = new UserModel();
        $expected = [
            "id" => 9,
            "name" => "nguyen minh tien",
            "fullname" => "Nguyen minh tien",
            "email" => "nguyenminhtien1808@gmail.com",
            "type" => "admin",
            "password" => "202cb962ac59075b964b07152d234b70",
        ];
        $keyword = "nguyen minh tien";
        $actual = $userModel->findUser($keyword);
        $this->assertEquals($expected, $actual[0]);
    }
    //
    public function testFindUserByEmailWithOK()
    {
        $userModel = new UserModel();
        $expected = [
            "id" => 10,
            "name" => "nguyen minh tien",
            "fullname" => "nguyen minh tien",
            "email" => "nguyenminhtien18081@gmail.com",
            "type" => "admin",
            "password" => "202cb962ac59075b964b07152d234b70",
        ];
        $keyword = "nguyenminhtien18081@gmail.com";
        $actual = $userModel->findUser($keyword);
        $this->assertEquals($expected, $actual[0]);
    }
    //
    public function testFindUserWithNullKey()
    {
        $userModel = new UserModel();
        $expected = false;
        $keyword = null;
        $actual = $userModel->findUser($keyword);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindUserBySpecialKey()
    {
        $userModel = new UserModel();
        $expected = [];
        $actual = $userModel->findUser("/**//#@^%$");
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindUserWithNoData()
    {
        $userModel = new UserModel();
        $expected = [];
        $keyword = "sdf";
        $actual = $userModel->findUser($keyword);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindUserNumberKey()
    {
        $userModel = new UserModel();
        $expected = false;
        $keyword = 113;
        $actual = $userModel->findUser($keyword);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindUserByArrayKey()
    {
        $userModel = new UserModel();
        $expected = false;
        $keyword = [];
        $actual = $userModel->findUserById($keyword);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindUserByObjectKey()
    {
        $userModel = new UserModel();
        $expected = false;
        $key = new stdClass;
        $actual = $userModel->findUser($key);
        $this->assertEquals($expected, $actual);
    }
    public function testFindUserByBooleanKey()
    {
        $userModel = new UserModel();
        $expected = false;
        $key = true;
        $actual = $userModel->findUser($key);
        $this->assertEquals($expected, $actual);
    }
    public function testFindUserByDoubleKey()
    {
        $userModel = new UserModel();
        $expected = false;
        $key = 1.11;
        $actual = $userModel->findUser($key);
        $this->assertEquals($expected, $actual);
    }
     
       
    //Test Auth nhap sai user,pass
    public function testAuthNG()
    { 
        $userModel = new UserModel();
        $user = "mrluongdz";
        $pass = "luongvo1247";

        $excute = []; 

        $actual =  $userModel->auth($user, $pass);
        $this->assertEquals($excute, $actual);
    }
    //Test Auth nhap vào ki tu dac biet
    public function testAuthkitudacbietNG()
    {
        $userModel = new UserModel();
        $user = '+_+';
        $pass =  '_+_';
        $expected = [];
        $actual = $userModel->auth($user, $pass);
        $this->assertEquals($expected, $actual);
    }
    //Xoa đúng id
    public function testDeleteUserByIdOK()
    {
        $userModel = new UserModel();
        $id =1;
        $excute = true;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($excute, $actual);
    }
    //Xoa sai id
    public function testDeleteUserByIdNG()
    {
        $userModel = new UserModel();
        $id = '1,1';

        $actual = $userModel->deleteUserById($id);
        if ($actual == false) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    //xoa id khong co ở data
    public function testDeleteUserByIdShowNG()
    {
        $userModel = new UserModel();
        $id = 1000;
        $excute = true;
        $key = $userModel->findUserById($id);
        $actual = $userModel->deleteUserById($id);

        if ($key == []) {
            $this->assertTrue(true);
        } else {
            $this->assertEquals($excute, $actual);
        }
    }
}

}

