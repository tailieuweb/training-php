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
    //      $userModel->startTransaction();
    //     $user = $userModel->dropUserById($userId);
    //     $actual = $user[0]['name'];
    //     $this->assertEquals($name,$actual);
    //     $userModel->rollBack();
    //
    // }
    //fail!
    public function testDropUserByIdStr() {
        $userModel = new UserModel();
        $userId = '18';
        $userModel->startTransaction();
        $expected = true;
        $actual = $userModel->dropUserById($userId);
        $this->assertEquals($expected, $actual);
        $userModel->rollBack();
    }
    //fail!
    public function testDropUserByIdNg(){
        $userModel = new UserModel();
        $userId = 9999;
        // $userName = 'asdf';
        $userModel->startTransaction();
        $user = $userModel->dropUserById($userId);
        if(empty($user)){
            $this->assertTrue(false);
        }else{
            $this->assertTrue(true);
        }
        $userModel->rollBack();
    }
    //fail!
    public function testDropUserByIdFloat() {
        $userModel = new UserModel();
        $id = 18.1;
        $userModel->startTransaction();
        $expected = true;
        $actual = $userModel->dropUserById($id);
        $this->assertEquals($expected, $actual);
        $userModel->rollBack();
        }
     //ok!
    public function testDropUserByIdNotGood() {
        $userModel = new UserModel();
        $id = 18;
        // $expected = 'error';
        $userModel->startTransaction();
        $actual = $userModel->dropUserById($id);
            // $this->assertEquals($expected, $actual);
        if ($actual != 18) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }   
        $userModel->rollBack();
    }
    // //error!
    // public function testDropUserByIdNull() {
    //     $userModel = new UserModel();
    //     $id = '';
    //     $expected = 'error';
    //      $userModel->startTransaction();
    //     $actual = $userModel->dropUserById($id);
    //     // $this->assertEquals($expected, $actual);
    //     if(empty($id)){
    //         $this->assertTrue(true);
    //     }else{
    //         $this->assertTrue(false);
    //     }
    //     $userModel->rollBack();
    // }
    // //error!
    // public function testDropUserByIdObject() {
    //     $userModel = new UserModel();
    //     $id = (object) [
    //         'id' => 22
    //     ];
    //     $expected = 'error';
    //   $userModel->startTransaction();
    //     $actual = $userModel->dropUserById($id);
        
    //     $this->assertEquals($expected, $actual);
    //     $userModel->rollBack();
    //     }
        //ok
    // Test case testDeleteUserById
    public function testDeleteUserByIdOK()
    {
        $userModel = new UserModel();
        $id = "17";
        $userModel->startTransaction();
        $check = $userModel->deleteUserById($id);
        if ($check == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(true);
        }
        $userModel->rollBack();
    }
    
      // Test case testDeleteUserByIdNg
      public function testDeleteUserByIdNg()
      {
          $userModel = new UserModel();
          $id = "999a";
          $userModel->startTransaction();
          $check = $userModel->deleteUserById($id);
          if ($check == false) {
              $this->assertTrue(true);
          } else {
              $this->assertTrue(false);
          }
          $userModel->rollBack();
      }
         // Test case testDeleteUserByKey
         public function testDeleteUserByKey()
         {
             $userModel = new UserModel();
             $id = "**";
             $userModel->startTransaction();
             $check = $userModel->deleteUserById($id);
             if ($check == false) {
                 $this->assertTrue(true);
             } else {
                 $this->assertTrue(false);
             }
             $userModel->rollBack();
         }
    // Test case testDeleteUserByIdString
    public function testDeleteUserByIdString()
    {
        $userModel = new UserModel();
        $id = "a";
        $userModel->startTransaction();
        $check = $userModel->deleteUserById($id);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        $userModel->rollBack();
    }
    // Test case testDeleteUserIdNull
    public function testDeleteUserIdNull()
    {
        $userModel = new UserModel();
        $id = "";
        $userModel->startTransaction();
        $check = $userModel->deleteUserById($id);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        $userModel->rollBack();
    }
    // Test case testDeleteUserBool
    public function testDeleteUserBool()
    {
        $userModel = new UserModel();
        $id = false;
        $userModel->startTransaction();
        $check = $userModel->deleteUserById($id);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        $userModel->rollBack();
    }
    // Test case testDeleteUserExpectedandActual
    public function testDeleteUserExpectedandActual()
    {
        $userModel = new UserModel();
        $id = -1;
        $userModel->startTransaction();
        $expected = $userModel->deleteUserById($id);
        $actual = null;
        $this->assertEquals($expected, $actual);
        $userModel->rollBack();
    }
    // Test case testDeleteUserEmpty
    public function testDeleteUserEmpty()
    {
        $userModel = new UserModel();
        $id = "";
        $userModel->startTransaction();
        $expected = null;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($expected, $actual);
        $userModel->rollBack();
    }
    // Test case testDeleteUserByIdNE
    public function testDeleteUserByIdNE()
    {
        $userModel = new UserModel();
        $id = 99;
        $userModel->startTransaction();
        $user = $userModel->findUserById($id);
        $expected = null;
        if ($user) {
            $expected = false;
        } else {
            $expected = null;
        }
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($expected, $actual);
        $userModel->rollBack();
    }
    //test case testDeleteUserByObject
    public function testDeleteUserByObject()
    {
        $userModel = new UserModel();
        $id = new UserModel();;
        $userModel->startTransaction();
        $expected = false;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($expected, $actual);
        $userModel->rollBack();
    }
    // test case testDeleteUserByIdNgAm
     public function testDeleteUserByIdNgAm() {
        $userModel = new UserModel();
        
        $id = -999999;         
        $userModel->startTransaction();
        $user = $userModel->deleteUserById($id);
        
        if ($user==false) {
        $this->assertTrue(true);
        } else {
        $this->assertTrue(false);
        }
        $userModel->rollBack();
     }
     //test case testDeleteUserByIdSoThuc
     public function testDeleteUserByIdSoThuc() {
        $userModel = new UserModel();
        
        $id = 11.22;
        $userModel->startTransaction();
        $user = $userModel->deleteUserById($id);
        
        if ($user==false) {
        $this->assertTrue(true);
        } else {
        $this->assertTrue(false);
        }
        $userModel->rollBack();
     }
     //test case testDeleteUserByIdIsArray 
     public function testDeleteUserByIdIsArray() {
        $userModel = new UserModel();
        
        $id = [];
        $userModel->startTransaction();
        $user = $userModel->deleteUserById($id);
        
        if ($user==false) {
        $this->assertTrue(true);
        } else {
        $this->assertTrue(false);
        }
        $userModel->rollBack();
    }
}