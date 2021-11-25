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

       $actual = $userModel->sumb($a,$b);

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

        $actual = $userModel->sumb($a,$b);

        if ($actual != 3) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    //Test Auth nhap dung user,pass
    public function testAuthOK()
    {
        $userModel = new UserModel();
        $userName = 'test1';
        $userPassword = '123456';

        $user = $userModel->auth($userName);
        
        $actual = $user[1]['passsword'];
        $this->assertEquals($userPassword, $actual);
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