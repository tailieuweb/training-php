<?php
require_once 'Repository/repository.php';

use PhpParser\Node\Expr\BinaryOp\Equal;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertTrue;

class RepositoryTest extends TestCase{
    /*
        test create user OK
    */
    public function testCreateUser(){
        $repository = new Repository();
        $user = array(
            'name' => 'a',
            'fullname' => 'nguyen van a',
            'email' => 'a@gmail.com',
            'type' => 'user',
            'password' => 'mmmm'
        );
        $expected = true;
       $actual = $repository->createUser($user);
       $this->assertEquals($expected, $actual);
    }
    
    /*
        test create user NOT GOOD
    */
    public function testCreateUserNullNg(){
        $repository = new Repository();
        $user = array(
            'name' => '',
            'fullname' => 'nguyen van a',
            'email' => 'a@gmail.com',
            'type' => 'user',
            'password' => 'mmmm'
        );
        $repository->createUser($user);
       if(empty($user['name']) || empty($user['fullname']) || empty($user['email']) || empty($user['type']) || empty($user['password'])){
           $this->assertTrue(true);
       }else{
            $this->assertTrue(false);
       }
    }
    /*
        test create user NOT GOOD
    */
    public function testCreateUserTypeNg(){
        $repository = new Repository();
        $user = array(
            'name' => 'a',
            'fullname' => 'nguyen van a',
            'email' => 'a@gmail.com',
            'type' => 'abc',
            'password' => 'mmmm'
        );
        $repository->createUser($user);
       if($user['type'] != 'user' || $user['type'] != 'admin' || $user['type'] != 'guest'){
           $this->assertTrue(true);
       }else{
            $this->assertTrue(false);
       }
    }

    /*
        test create user NOT GOOD
    */
    public function testCreateUserEmailNg(){
        $repository = new Repository();
        $user = array(
            'name' => 'a',
            'fullname' => 'nguyen van a',
            'email' => 'a@gmail.com',
            'type' => 'admin',
            'password' => 'mmmm'
        );
        $repository->createUser($user);
        if (preg_match ("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $user['email'])) {
           $this->assertTrue(true);
       }else{
            $this->assertTrue(false);
       }
    }

    /*
        test create user NOT GOOD
    */
    public function testCreateUserObjectNg(){
        $repository = new Repository();
        $ob = (object)'12';
        $user = array(
            'name' => $ob,
            'fullname' => 'nguyen van a',
            'email' => 'a@gmail.com',
            'type' => 'admin',
            'password' => 'mmmm'
        );
         
        if(is_object($user['name'])){
            $user['name'] = null;
             $repository->createUser($user);
            $this->assertTrue(true);      
        }else{         
           $this->assertTrue(false);
        }     
    }
    /*
        test create user NOT GOOD
    */
    public function testCreateUserArrayNg(){
        $repository = new Repository();
        $arr = array();
        $user = array(
            'name' => $arr,
            'fullname' => 'nguyen van a',
            'email' => 'a@gmail.com',
            'type' => 'abc',
            'password' => 'mmmm'
        );
       if(is_array($user['name']) || is_array($user['fullname']) || is_array($user['email']) || is_array($user['type']) || is_array($user['password'])){
        $user['name'] = "abc";
           $repository->createUser($user);
           $this->assertTrue(true);
       }else{
            $this->assertTrue(false);
       }
    }
    /*
        test create user NOT GOOD
    */
    public function testCreateUserSpecialcharactersNg(){
        $repository = new Repository();
        $pattern = '/[A-Za-z0-9]/';
        $user = array(
            'name' => '@%#',
            'fullname' => 'nguyen van a',
            'email' => 'a@gmail.com',
            'type' => 'abc',
            'password' => 'mmmm'
        );
        $repository->createUser($user);
       if(!preg_match($pattern, $user['name'])){
           $this->assertTrue(true);
       }else{
            $this->assertTrue(false);
       }
    }

     /*
        test create user NOT GOOD
    */
    public function testCreateUserBoolNg(){
        $repository = new Repository();
        $user = array(
            'name' => false,
            'fullname' => 'nguyen van a',
            'email' => 'a@gmail.com',
            'type' => 'abc',
            'password' => 'mmmm'
        );
        $repository->createUser($user);
       if(is_bool($user['name']) || is_bool($user['fullname']) || is_bool($user['email']) || is_bool($user['type'])|| is_bool($user['password'])){
           $this->assertTrue(true);
       }else{
            $this->assertTrue(false);
       }
    }
     /*
    test create user NOT GOOD
    */
    public function testCreateUserNumberNg(){
        $repository = new Repository();
        $user = array(
            'name' => 123,
            'fullname' => 'nguyen van a',
            'email' => 'a@gmail.com',
            'type' => 'abc',
            'password' => 'mmmm'
        );
        $repository->createUser($user);;
       if(is_numeric($user['name']) || is_numeric($user['fullname']) || is_numeric($user['email']) || is_numeric($user['type'])|| is_numeric($user['password'])){
           $this->assertTrue(true);
       }else{
            $this->assertTrue(false);
       }
    }

    
}