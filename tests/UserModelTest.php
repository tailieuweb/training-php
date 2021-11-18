<?php

use phpDocumentor\Reflection\Types\Null_;
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    /**
     * Testcase findUser
     */    
    public function testFindUserOk() {
        $userModel = new UserModel();
        $id = 1;      
        $user = $userModel->findUser($id);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }

    }
    
    /**
     * test findUser truyền vào dữ liệu là Null
     */
    public function testFindUserNull() {

        $userModel = new UserModel();
        $keyword = 4;
        $expected = [];
        $actual = $userModel->findUser($keyword);

        $this->assertEquals($expected, $actual);

    }
    /**
     * test findUser truyền vào dữ liệu là String
     */
    public function testFindUserStr() {

        $userModel = new UserModel();  
        $keyword = 'aa';
        $expected = [];

        $actual = $userModel->findUser($keyword);       
        $this->assertEquals($expected, $actual);

    }
    /**
     * test findUser truyền vào dữ liệu là Object
     */
    public function testFindUserObject() {

        $userModel = new UserModel();
        $ob = (object)'25';  

        if(is_object($ob)){          
            $ob = '';
            $userModel->findUser($ob);
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }   
    }
    /**
     * test findUser truyền vào dữ liệu là ký tự đặc biệt
     */
    public function testFindUserSpecialCharacters()
    {
        $userModel = new UserModel();
        $parttern = '/[0-9A-Za-z]/';
        $keyword = '@@@';     
        $userModel->findUser($keyword);
        if(!preg_match($parttern, $keyword)){          
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }   
    }

    public function testFindUserFloatNotOK()
     {
         $userModel = new UserModel();
         $keyword =  0.1;
         $actual = $userModel->findUser($keyword);
         $excute = [];
         $this->assertEquals($excute, $actual);
     }
    /**
     * testUpdateUser 
     */

    public function testUpdateUserOk(){
        $userModel = new UserModel();
        $user = array(  
            'id' => 25,        
            'name' => 'user3',
            'fullname' => 'User3',
            'email' => 'user@gmail.com',
            'type' => 'user',
            'password' => md5('user3')
        );         
        $expected = true;
        $actual = $userModel->updateUser($user);
        $this->assertEquals($actual, $expected);   
    }
    /**
     * test updateUser truyền vào dữ liệu là Null
     */
    public function testUpdateUserNull(){
        $userModel = new UserModel();
        $user = array(
            'id' => '25',        
            'name' => '',
            'fullname' => '',
            'type' => '',
            'email' => '',
            'password' => md5('')
        );
        $expected = true;
        $actual = $userModel->updateUser($user);
        $this->assertEquals($expected,$actual); 
        if(!empty($user['name']) && !empty($user['fullname']) && !empty($user['type']) && !empty($user['email']) && !empty($user['password'])){            
            $this->assertTrue(false);
        }else{
            $this->assertTrue(true);
        }   
    }
    /**
     * test updateUser truyền vào dữ liệu là String
     */
    public function testUpdateUserString(){
        $userModel = new UserModel();
        $user = array(
            'id' => '25',        
            'name' => 'a',
            'fullname' => 'b',
            'type' => 'c',
            'email' => 'asd',
            'password' => md5('avc')
        );
        $expected = true;
        $actual = $userModel->updateUser($user);
        $this->assertEquals($expected,$actual); 
        if(is_numeric($user['name']) == true && is_numeric($user['fullname']) == true && is_numeric($user['type']) == true && is_numeric($user['email']) == true && is_numeric($user['password']) == true){            
            $this->assertTrue(false);
        }else{
            $this->assertTrue(true);
        }   
    }
    /**
     * test updateUser truyền vào dữ liệu là Object
     */
    public function testUpdateUserObject(){
        $userModel = new UserModel();
        $ob = (object)'23';
        $user = array(     
            'id' => '25',                
            'name' => $ob,
            'fullname' => 'user3',
            'email' => 'user@gmail.com',
            'type' => 'user',
            'password' => md5('user3')
        );   
        if(is_object($user['name']) || is_object($user['fullname']) || is_object($user['email']) || is_object($user['type']) || is_object($user['password'])){  
            $user['name'] = null;
            $userModel->updateUser($user);
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }   
    }
    /**
     * test updateUser truyền vào dữ liệu bool 
     */
    public function testUpdateUserBool(){
        $userModel = new UserModel();
        $user = array(
            'id' => 74,
            'name' => true,
            'fullname' =>false,
            'email' => 'user@gmail.com',
            'type' => 'user',
            'password' => md5('user3')
        );
        $userModel->updateUser($user);
        if(is_bool($user['name']) || is_bool($user['fullname']) || is_bool($user['email']) || is_bool($user['type']) || is_bool($user['password'])){  
            
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }   
    }
    /**
     * test updateUser truyền vào dữ liệu là số thực
     */
    public function testUpdateUserFloatNg(){
        $userModel = new UserModel();
        $user = array(
            'id' => 25,
            'name' => 2.5,
            'fullname' =>'user3',
            'email' => 'user@gmail.com',
            'type' => 'user',
            'password' => md5('user3')
        );
        $userModel->updateUser($user);
        if(is_float($user['name']) || is_float($user['fullname']) || is_float($user['email']) || is_float($user['type']) || is_float($user['password'])){  
            
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }   
    }
    /**
     * test updateUser truyền vào dữ liệu là ký tự đặc biệt
     */
    public function testUpdateUserSpecialCharactersNg(){
        $userModel = new UserModel();
        $pattern = '/[0-9A-Za-z]/';
        $user = array(
            'id' => 25,
            'name' => "@#$",
            'fullname' =>'user3',
            'email' => 'user@gmail.com',
            'type' => 'user',
            'password' => md5('user3')
        );
        $userModel->updateUser($user);
        if(!preg_match($pattern, $user['name'])){  
            
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }   
    }
}