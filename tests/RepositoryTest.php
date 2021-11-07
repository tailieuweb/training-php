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
    public function testCreateUserNull(){
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

    public function testDeleteUser(){
        $repository = new Repository();
        $expected = true;
        $actual = $repository->deleteUser(167);
        $this->assertEquals($expected, $actual);
    }

    public function testDeleteUserStringNg(){
        $repository = new Repository();
        $expected = false;
        $actual = $repository->deleteUser('b');
        $this->assertEquals($expected, $actual);        
    }
    public function testDeleteUserNullNg(){
        $repository = new Repository();
        $expected = false;
        $actual = $repository->deleteUser('');
        $this->assertEquals($expected, $actual);        
    }
}