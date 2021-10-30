<?php

use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase {

    /**
     * Test function findUserById
     */
    public function testFindUserById(){
        $user = new UserModel();
        $userId = 26;

        $expected = "LE VAN LAM";
        $actual = $user->findUserById($userId);

        $this->assertEquals($expected,$actual[0]['name']);
    }
    /**
     * Test function findUserById
     */
    public function testFindUserByIdNg(){
        $user = new UserModel();
        $userId = 1;

        $actual = $user->findUserById($userId);

        // var_dump($actual);die();
        if(empty($actual)){
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
        // $this->assertEquals($expected,$actual[0]['name']);
    }
    /**
     * Test function findUser
     */
    public function testFindUser(){
        $user = new UserModel();
        $keys = "a";
        // $expected = "LE VAN LAM";
        $actual = $user->findUser($keys);

        if(!empty($actual)){
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
        // var_dump($actual);die();
    }

    /**
     * Test function findUserById
     */
    public function testAuth(){
        $user = new UserModel();
        $name = "Le LAM";
        $pass = "12345";

        // $expected = "LE VAN LAM";
        $actual = $user->auth($name, $pass);

        if($name == $actual[0]['name'] && $pass == $actual[0]['password']){
            return $this->assertTrue(true); 
        }
        else{
            return $this->assertTrue(false); 
        }
    }

    /**
     * Test function create token
     */
    public function testCreateToken(){
        $user = new UserModel();
        $name = "Le LAM";
        $pass = "12345";

        // $expected = "LE VAN LAM";
        $actual = $user->createToken();
        if($actual == ''){
            return $this->assertTrue(true);
        }
        else{
            return $this->assertTrue(false);
        }
    }
    /**
     * Test function get instance
     */
    public function testGetInstance(){
        $user = new UserModel();
        $actual = $user->getInstance();

        if($user == $actual){
            return $this->assertTrue(true); 
        }
        return $this->assertTrue(false); 
    }
    public function testGetInstanceChange(){
        $user = new UserModel();
        //Create user 2
        $user2 = new UserModel();
        $input = [];
        $input['id'] = 11;
        $input['name'] = "Test update";
        $input['fullname'] = "Test update change";
        $input['email'] = "testUpdate@gmail.com";
        $input['type'] = 3;
        $input['password'] = "12345";
        $update = $user->updateUser($input);
        
        $actual = $user2->getInstance();
        if($user == $actual){
            return $this->assertTrue(true); 
        }
        return $this->assertTrue(false); 
        // var_dump($user);die();
    }

    /**
     * Test get type user right
     */
    public function testUpdateUser(){
        $user = new UserModel();
        $input = [];
        $input['id'] = 11;
        $input['name'] = "Test update";
        $input['fullname'] = "Test update ok";
        $input['email'] = "testUpdate@gmail.com";
        $input['type'] = 3;
        $input['password'] = "12345";
        $actual = $user->updateUser($input);

        // var_dump($actual);die();
        if($actual == true){
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    /**
     * Test get type user wrong
     */
    public function testUpdateUserNg(){
        $user = new UserModel();
        $input = [];
        $input['id'] = 1;//id user not exits
        $input['name'] = "Test update";
        $input['fullname'] = "Test update wrong";
        $input['email'] = "testUpdate@gmail.com";
        $input['type'] = 3;
        $input['password'] = "12345";
        $actual = $user->updateUser($input);

        // var_dump($actual);die();
        if($actual == true){
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }







    /**
     * Eg: Test function Sum a, b
     * Test characters
     */
    public function testSumOk()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 2;
        $expected = 3;

        $actual = $userModel->sumb($a,$b);
        $this->assertEquals($expected,$actual);
    }
    public function testSumDuong()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 2;
        $actual = $userModel->sumb($a,$b);

      if($actual != 3)
      {
          $this->assertTrue(false); 
      }
      else
      {
          $this->assertTrue(true); 
      }
    }
    public function testSumAm()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = -2;
        $actual = $userModel->sumb($a,$b);

      if($actual != -3)
      {
          $this->assertTrue(false); 
      }
      else
      {
          $this->assertTrue(true); 
      }
      
    }
    public function testSumAmAndDuong()
    {
          $userModel = new UserModel();
          $a = -1;
          $b = 2;
          $actual = $userModel->sumb($a,$b);
  
        if($actual != 1)
        {
            $this->assertTrue(false); 
        }
        else
        {
            $this->assertTrue(true); 
        }
    }
    public function testSumThucDuong()
    {
          $userModel = new UserModel();
          $a = 1.5;
          $b = 1.5;
          $actual = $userModel->sumb($a,$b);
  
        if($actual != 3)
        {
            $this->assertTrue(false); 
        }
        else
        {
            $this->assertTrue(true); 
        }
        
    }
    public function testSumThucAm()
    {
        $userModel = new UserModel();
        $a = -1.5;
        $b = -1.5;
        $actual = $userModel->sumb($a,$b);

        if($actual != -3)
        {
            $this->assertTrue(false); 
        }
        else
        {
            $this->assertTrue(true); 
        }
    }
    public function testSumThucAmAndDuong()
    {
        $userModel = new UserModel();
        $a = -1.5;
        $b = 1.5;
        $actual = $userModel->sumb($a,$b);

        if($actual != 0)
        {
            $this->assertTrue(false); 
        }
        else
        {
            $this->assertTrue(true); 
        }
    }
    
    public function testSumChuoiAndSo()
    {
        $userModel = new UserModel();
        $a = 'a';
        $b = 1.5;
        $actual = $userModel->sumb($a,$b);

        if($actual != 'error')
        {
            $this->assertTrue(false); 
        }
        else
        {
            $this->assertTrue(true); 
        }
    }
    public function testSumChuoiAndChuoi()
    {
        $userModel = new UserModel();
        $a = 'a';
        $b = 'a';
        $actual = $userModel->sumb($a,$b);

        if($actual != 'error')
        {
            $this->assertTrue(false); 
        }
        else
        {
            $this->assertTrue(true); 
        }
    }
    /**
     * Check string
     */
    public function testCheckString(){
        $userModel = new UserModel();
        $str = "jksfhsalfsa";
        $check = $userModel->checkString($str);
        if($check == true){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }
    public function testCheckStringF(){
        $userModel = new UserModel();
        $str = "jksfhsa%lfsa";
        $check = $userModel->checkString($str);
        if($check == true){
            $this->assertTrue(false);
        }
        else{
            $this->assertTrue(true);
        }
    }
    public function testCheckStringNg(){
        $userModel = new UserModel();
        $str = 2;
        $check = $userModel->checkString($str);
        if($check == true){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }
}