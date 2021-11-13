<?php
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    /**
     * Test case good
     */
    public function testauthOK(){
        $userModel = new UserModel();
        $user = "admin";
        $pass = "123456";

        $actual =  $userModel->auth($user,$pass);  
        
        if($actual != []){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }

    /**
     * Test case Not good
     */
    public function testauthNotOK(){
        //Test trường hợp người dùng nhập sai user & password
        $userModel = new UserModel();
        $user = "adminas";
        $pass = "123814";

        $excute = []; // kết quả mong đợi sẽ trả về mảng rỗng

        $actual =  $userModel->auth($user,$pass);  
        $this->assertEquals($excute, $actual);   
    }

    public function testauthUserPassEmpty(){
        //Test trường hợp người dùng không nhập gì cả
        $userModel = new UserModel();
        $user = "";
        $pass = "";

        $excute = []; // kết quả mong đợi sẽ trả về mảng rỗng

        $actual =  $userModel->auth($user,$pass);  
        // var_dump($actual);
        // die();
        $this->assertEquals($excute, $actual);   
    }



    /**
     * Test case good
     */
    public function testdeleteUserByIdOK(){
        $userModel = new UserModel();
        $id = 3;
        $excute = true;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($excute,$actual);
    }


    /**
     * Test case Not good
     */
    public function testdeleteUserByIdNotOK(){
        $userModel = new UserModel();
        $id = "sss";
  
        $actual = $userModel->deleteUserById($id);
        if($actual == false){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }
    public function testdeleteUserByIdEmpty(){
        $userModel = new UserModel();
        $id = null;
  
        $actual = $userModel->deleteUserById($id);
        if($actual == false){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }

    public function testdeleteUserByIdDoseNotExist(){
        $userModel = new UserModel();
        $id = 50;
        $excute = true;
        $key = $userModel->findUserById($id);
        $actual = $userModel->deleteUserById($id);

        if($key == []){
            $this->assertTrue(true);
        }
        else{           
            $this->assertEquals($excute,$actual);
        }

    }

    //Test hàm getUser khi không có dữ liệu
    public function testgetUsersNotParamOK(){
        $userModel = new UserModel();

        $actual = $userModel->getUsers();

        if($actual != null){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
      
    }

    //Test hàm getUser khi có truyền vào dữ liệu
    public function testgetUsersParamOK(){
        $userModel = new UserModel();
        $key = "a";
        $actual = $userModel->getUsers($key);

        if($actual != null){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
        
    }
    

}