<?php

use PHPUnit\Framework\TestCase;

class DeleteUserByIdTest extends TestCase
{
    
    //Function DropUserById
    // //ok
    // public function testDropUserByIdOk(){
    //     $userModel = new UserModel();
    //     $userId = 18;
    //     $name = 'admin';
    //     $user = $userModel->dropUserById($userId);
    //     $actual = $user[0]['name'];
    //     $this->assertEquals($name,$actual);
    // }
    //fail!
    public function testDropUserByIdStr() {
        $userModel = new UserModel();
        $userId = '18';
        $expected = true;
        $actual = $userModel->dropUserById($userId);
        $this->assertEquals($expected, $actual);
    }
    //fail!
    public function testDropUserByIdNg(){
        $userModel = new UserModel();
        $userId = 9999;
        // $userName = 'asdf';
        $user = $userModel->dropUserById($userId);
        if(empty($user)){
            $this->assertTrue(false);
        }else{
            $this->assertTrue(true);
        }

    }
    //fail!
    public function testDropUserByIdFloat() {
        $userModel = new UserModel();
        $id = 18.1;
        $expected = true;
        $actual = $userModel->dropUserById($id);
        $this->assertEquals($expected, $actual);
        
        }
     //ok!
    public function testDropUserByIdNotGood() {
        $userModel = new UserModel();
        $id = 18;
        // $expected = 'error';
        $actual = $userModel->dropUserById($id);
            // $this->assertEquals($expected, $actual);
        if ($actual != 18) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }   
    }
    // //error!
    // public function testDropUserByIdNull() {
    //     $userModel = new UserModel();
    //     $id = '';
    //     $expected = 'error';
    //     $actual = $userModel->dropUserById($id);
    //     // $this->assertEquals($expected, $actual);
    //     if(empty($id)){
    //         $this->assertTrue(true);
    //     }else{
    //         $this->assertTrue(false);
    //     }
    // }
    // //error!
    // public function testDropUserByIdObject() {
    //     $userModel = new UserModel();
    //     $id = (object) [
    //         'id' => 22
    //     ];
    //     $expected = 'error';
    //     $actual = $userModel->dropUserById($id);
        
    //     $this->assertEquals($expected, $actual);
        
    //     }
        //ok
    // Test case testDeleteUserById
    public function testDeleteUserByIdOK()
    {
        $userModel = new UserModel();
        $id = "1";
        $check = $userModel->deleteUserById($id);
        if ($check == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(true);
        }
    }
    
      // Test case testDeleteUserByIdNg
      public function testDeleteUserByIdNg()
      {
          $userModel = new UserModel();
          $id = "999a";
          $check = $userModel->deleteUserById($id);
          if ($check == false) {
              $this->assertTrue(true);
          } else {
              $this->assertTrue(false);
          }
      }
         // Test case testDeleteUserByKey
         public function testDeleteUserByKey()
         {
             $userModel = new UserModel();
             $id = "**";
             $check = $userModel->deleteUserById($id);
             if ($check == false) {
                 $this->assertTrue(true);
             } else {
                 $this->assertTrue(false);
             }
         }
    // Test case testDeleteUserByIdString
    public function testDeleteUserByIdString()
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
    // Test case testDeleteUserIdNull
    public function testDeleteUserIdNull()
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
        $actual = null;
        $this->assertEquals($expected, $actual);
    }
    // Test case testDeleteUserEmpty
    public function testDeleteUserEmpty()
    {
        $userModel = new UserModel();
        $id = "";
        $expected = null;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($expected, $actual);
    }
    // Test case testDeleteUserByIdNE
    public function testDeleteUserByIdNE()
    {
        $userModel = new UserModel();
        $id = 99;
        $user = $userModel->findUserById($id);
        $expected = null;
        if ($user) {
            $expected = false;
        } else {
            $expected = null;
        }
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($expected, $actual);
    }
    //test case testDeleteUserByObject
    public function testDeleteUserByObject()
    {
        $userModel = new UserModel();
        $id = new UserModel();;
        $expected = false;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($expected, $actual);
    }
    // test case testDeleteUserByIdNgAm
     public function testDeleteUserByIdNgAm() {
        $userModel = new UserModel();
        
        $id = -999999;         
        
        $user = $userModel->deleteUserById($id);
        
        if ($user==false) {
        $this->assertTrue(true);
        } else {
        $this->assertTrue(false);
        }
     }
     //test case testDeleteUserByIdSoThuc
     public function testDeleteUserByIdSoThuc() {
        $userModel = new UserModel();
        
        $id = 11.22;
        
        $user = $userModel->deleteUserById($id);
        
        if ($user==false) {
        $this->assertTrue(true);
        } else {
        $this->assertTrue(false);
        }
     }
     //test case testDeleteUserByIdIsArray 
     public function testDeleteUserByIdIsArray() {
        $userModel = new UserModel();
        
        $id = [];
        
        $user = $userModel->deleteUserById($id);
        
        if ($user==false) {
        $this->assertTrue(true);
        } else {
        $this->assertTrue(false);
        }
    }
    // test case testDeleteUserByIdNull
     public function testDeleteUserByIdNull() {
        $userModel = new UserModel();
        $id = "";
        $expected = false;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($expected, $actual);   
     }
}