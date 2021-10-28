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
    // public function testFindUser(){
    //     $user = new UserModel();
    //     $keys = "a";

    //     // $expected = "LE VAN LAM";
    //     $actual = $user->findUser($keys);

    //     // var_dump($actual);die();
    // }

    /**
     * Test function findUserById
     */
    public function testAuth(){
        $user = new UserModel();
        $name = "Le LAM";
        $pass = "123456";

        // $expected = "LE VAN LAM";
        $actual = $user->auth($name, $pass);

        if($name == $actual[0]['name'] && $pass == $actual[0]['password']){
            return $this->assertTrue(true); 
        }
        else{
            return $this->assertTrue(false); 
        }

        // var_dump($actual);die();
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