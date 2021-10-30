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


    //test func deleteUserById

    public function testDeleteUserByIdNg()
    {
        $userModel = new UserModel();
        $id = 8;
        $token_false = 'JFASJDBAJS566';
       
        $actual = $userModel->deleteUserById($id,$token_false);
       
        // $this->assertEquals($userModel->findUserById($id),$actual);
        if( $actual == NULL)
        {
            $this->assertTrue(true); 
        }
        else{
            $this->assertTrue(false); 
        }
    }

    
    //test func updateUser

    // public function testUpdateUserOk()
    // {
    //     $userModel = new UserModel();
    //     $input['id'] = 8;
    //     $input['name'] = 'phpunit_update';
        
    //     $actual = $userModel->updateUser($input['name'], $input['id']);
    //     var_dump($actual).die();
       
    // }

     
    //test func insertUser

    public function testinsertUserOk()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = 'phpunit insert';
        $input['fullname'] = "phpunit insert";
        $input['email'] = "phpunitinsert@gmail.com";
        $input['type'] = 1;
        $input['password'] = "phpunitinsert";
      
        $actual = $userModel->insertUser( $input);
        if($actual != true)
        {
            $this->assertTrue(false); 
        }
        else
        {
            $this->assertTrue(true); 
        }
        
       
    }
    //test func getUser

    public function testGetUserOk()
    {
        $userModel = new UserModel();
    
        $count_array = 6;
        $actual = $userModel->getUsers();
        
        $this->assertEquals($count_array,count($actual));
    }
    public function testGetUserbyKeyWordOk()
    {
        $userModel = new UserModel();
        $params= [];
        $params['keyword'] = 'aa';
        $count_array = 1;
        $actual = $userModel->getUsers( $params);
         
        $this->assertEquals($count_array,count($actual));
    }

     //test func getTypes

     public function testGetTypeOk()
     {
         $userModel = new UserModel();
       
         $count_array = 3;
         $actual = $userModel->getTypes();
         $this->assertEquals($count_array,count($actual));
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
    //sum am
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
    // am va duong
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
    //thuc duong
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
    //thuc am
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
        //thuc am va duong
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
        //chuoi va thuc so
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
        //chuoi va chuoi
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
}