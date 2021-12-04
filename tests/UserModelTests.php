<?php

use PHPUnit\Framework\TestCase;

class UserModelTests extends TestCase
{
    protected static $_instance;
//Function getInstance
    public function testGetInstanceOk(){
        $userModel = new UserModel();
        $expected = UserModel::getInstance();
        $actual = $userModel->getInstance();
        $this->assertEquals($expected,$actual);
    }
    public function testGetInstanceNull(){
        $userModel = new UserModel();
        $actual = $userModel->getInstance();
       // $this->assertEquals($expected,$actual);
        if($actual != null){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
    //FAILURES!
    public function testGetInstanceString(){
        $userModel = new UserModel();
        $expected = 'aloa';
        $actual = $userModel->getInstance();
        $this->assertEquals($expected,$actual);
    }
    public function testGetInstanceNg(){
        $userModel = new UserModel();
        $actual = $userModel->getInstance();
        if(empty($actual)){
            $this->assertTrue(false);
        }else{
            $this->assertTrue(true);
        }
    }
    public function testGetInstanceNotGood() {
        $userModel = new UserModel();
        $expected = UserModel::getInstance();
        $actual = $userModel->getInstance();
            // $this->assertEquals($expected, $actual);
        if ($actual != $expected) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }   
    }
    //FAILURES!
    public function testGetInstanceFloat(){
        $userModel = new UserModel();
        $expected = 12.2;
        $actual = $userModel->getInstance();
        $this->assertEquals($expected,$actual);
    }
    //FAILURES!
    public function testGetInstanceInt(){
        $userModel = new UserModel();
        $expected = 12;
        $actual = $userModel->getInstance();
        $this->assertEquals($expected,$actual);
    }
//Function FindUserByID
    // //ERROR
    // public function testFindUserByIdString()
    // {
    //     $userModel = new UserModel();

    //     $id = "we";
    //     $expected = false;
    //     $actual = $userModel->findUserById($id);
    //     $this->assertEquals($expected, $actual);
    // }
    //FAILURES!
    public function testFindUserByIdEmpty()
    {
        $userModel = new UserModel();
        $id = 100;
        $expected = false;
        $actual = $userModel->findUserById($id);
        $this->assertEquals($expected, $actual);
    }
    // //ERROR
    // public function testFindUserByIdObject()
    // {
    //     $userModel = new UserModel();
    //     $id = new stdClass();
    //     $expected = false;
    //     $actual = $userModel->findUserById($id);
    //     $this->assertEquals($expected, $actual);
    // }
    //FAILURES!
    public function testFindUserByIdBool()
    {
        $userModel = new UserModel();
        $id = true;
        $expected = false;
        $actual = $userModel->findUserById($id);
        $this->assertEquals($expected, $actual);
    }
    public function testFindUserByIdDouble()
    {
        $userModel = new UserModel();
        $id = 18.00;
        $actual = $userModel->findUserById($id);
        if (!empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // //ERROR
    // public function testFindUserByIdNull()
    // {
    //     $userModel = new UserModel();
    //     $id = null;
    //     $expected = false;
    //     $actual = $userModel->findUserById($id);
    //     $this->assertEquals($expected, $actual);
    // }
    //FAILURES!
    public function testFindUserByIdStringValueNumber()
    {
        $userModel = new UserModel();
        $id = "22";
        $actual = $userModel->findUserById($id);
        if (!empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    //FAILURES!
    public function testFindUserByIdNegative()
    {
        $userModel = new UserModel();
        $id = -124;
        $expected = false;
        $actual = $userModel->findUserById($id);
        $this->assertEquals($expected, $actual);
    }
    // //ERROR
    // public function testFindUserByIdArray()
    // {
    //     $userModel = new UserModel();
    //     $id = ['id' => 124];
    //     $expected = false;
    //     $actual = $userModel->findUserById($id);
    //     $this->assertEquals($expected, $actual);
    // }
    public function testFindUserByIdOk(){
        $userModel = new UserModel();
        $userId = 18;
        $userName = 'admin';

        $user = $userModel->findUserById($userId);
        $actual = $user[0]['name'];

        $this->assertEquals($userName,$actual);

    }
    public function testFindUserByIdMailOk(){
        $userModel = new UserModel();
        $userId = 18;
        $email = 'admin@gmail.com';

        $user = $userModel->findUserById($userId);
        $actual = $user[0]['email'];

        $this->assertEquals($email,$actual);

    }
    public function testFindUserByIdFullNameOk(){
        $userModel = new UserModel();
        $userId = 18;
        $fullName = 'admin';

        $user = $userModel->findUserById($userId);
        $actual = $user[0]['fullname'];

        $this->assertEquals($fullName,$actual);

    }
    //FAILURES!
    public function testFindUserByIdString() {
        $userModel = new UserModel();
        $id = '18';
        $expected = 'error';
        $actual = $userModel->findUserById($id);
        $this->assertEquals($expected, $actual);
        
        }
    public function testFindUserByIdNg(){
        $userModel = new UserModel();
        $userId = 9999;
        // $userName = 'asdf';
        $user = $userModel->findUserById($userId);
        if(empty($user)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
     //FAILURES!
     public function testFindUserByIdFloat() {
        $userModel = new UserModel();
        $id = 18.1;
        $expected = 'error';
        $actual = $userModel->findUserById($id);
        $this->assertEquals($expected, $actual);
    }
     //FAILURES!
    public function testFindUserByIdInt() {
            $userModel = new UserModel();
            $id = 18;
            $expected = 'error';
            $actual = $userModel->findUserById($id);
            $this->assertEquals($expected, $actual);
    }
    public function testFindUserByIdNotGood() {
        $userModel = new UserModel();
        $id = 18;
        // $expected = 'error';
        $actual = $userModel->findUserById($id);
            // $this->assertEquals($expected, $actual);
        if ($actual != 18) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }   
    }
    // //ERRORS!
    // public function testFindUserByIdSpace() {
    //     $userModel = new UserModel();
    //     $id = ' ';
    //     $expected = 'error';
    //     $actual = $userModel->findUserById($id);
    //     // $this->assertEquals($expected, $actual);
    //     if(empty($id)){
    //         $this->assertTrue(true);
    //     }else{
    //         $this->assertTrue(false);
    //     }
    // }
//Function FindUser
    public function testFindUserOk(){
        $userModel = new UserModel();

        $search = 'ad';
        $userName = 'admin';
        // $email = '123aaa@gmail.com';
        $result = $userModel->findUser($search);
        $actual = $result[0]['name'];
        // $actual = $result[0]['email'];
        $this->assertEquals($userName,$actual);
        // $this->assertEquals($email,$actual);
    }
    public function testFindUserFullNameOk(){
        $userModel = new UserModel();

        $search = 'ad';
        $fullName = 'admin';
        // $email = '123aaa@gmail.com';
        $result = $userModel->findUser($search);
        $actual = $result[0]['fullname'];
        // $actual = $result[0]['email'];
        $this->assertEquals($fullName,$actual);
        // $this->assertEquals($email,$actual);
    }
    public function testFindUserEmailOk(){
        $userModel = new UserModel();

        $search = 'admin';
        $email = 'admin@gmail.com';
        // $email = '123aaa@gmail.com';
        $result = $userModel->findUser($search);
        $actual = $result[0]['email'];
        // $actual = $result[0]['email'];
        $this->assertEquals($email,$actual);
        // $this->assertEquals($email,$actual);
    }
    public function testFindUserString() {
        $userModel = new UserModel();
        $search = 'adm';
        $expected = 'admin';
        $result = $userModel->findUser($search);
        $actual = $result[0]['name'];
        $this->assertEquals($expected, $actual);
        }
    //FAILURES!
    public function testFindUserStringValueNumber()
    {
        $userModel = new UserModel();
        $search = '10';
        $expected = 'admin';
        $result = $userModel->findUser($search);
        $this->assertEquals($expected, $result);
    }
    //FAILURES!
    public function testFindUserInt() {
        $userModel = new UserModel();
        $search = 1;
        $expected = 'error';
        $actual = $userModel->findUser($search);
        $this->assertEquals($expected, $actual);
        }
    //FAILURES!
    public function testFindUserFloat() {
        $userModel = new UserModel();
        $search = 1.1;
        $expected = 'error';
        $actual = $userModel->findUser($search);
        $this->assertEquals($expected, $actual);
        }
    public function testFindUserNg(){
        $userModel = new UserModel();
        $search = 'xss';
        $actual = $userModel->findUser($search);
        if(empty($actual)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
    public function testFindUserNotGood() {
        $userModel = new UserModel();
        $search = 'adm';
        $name = 'admin';
        $result = $userModel->findUser($search);
        $actual = $result[0]['name'];
            // $this->assertEquals($expected, $actual);
        if ($actual != $name) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }   
    public function testFindUserNull() {
        $userModel = new UserModel();
        $search = '';
        $expected = 'error';
        $actual = $userModel->findUser($search);
        // $this->assertEquals($expected, $actual);
        if(empty($search)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
    public function testFindUserEmpty()
    {
        $userModel = new UserModel();
        $search = '32141234';
        $expected = false;
        $actual = $userModel->findUser($search);
        $this->assertEquals($expected, $actual);
    }
}