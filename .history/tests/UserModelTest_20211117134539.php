<?php

use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase {

    /**
     * Test function findUserById
     */
    public function testFindUserByIdOk(){
        $user = new UserModel();
        $userId = 2;

        $expected = "test2";
        $actual = $user->findUserById($userId);
        $this->assertEquals($expected,$actual[0]['name']);
    }
    /**
     * Test function findUserById with id not exits
     */
    public function testFindUserByIdNg(){
        $user = new UserModel();
        $userId = 1;

        $actual = $user->findUserById($userId);
        $expected = 'error';
        $this->assertEquals($expected,$actual);
    }
    /**
     * Test function findUserById with id is string
     */
    public function testFindUserByIdStr() {
        $userModel = new UserModel();
        $id = 'asdf';

        $actual = $userModel->findUserById($id);
        $expected = 'error';
        $this->assertEquals($expected,$actual);

    }
    /**
     * Test function findUserById with id null
     */
    public function testFindUserByIdNull() {
        $userModel = new UserModel();

        $id = null;

        $actual = $userModel->findUserById($id);
        $expected = 'error';
        $this->assertEquals($expected,$actual);

    }
    /**
     * Test function findUserById with id is array
     */
    public function testFindUserByIdArray() {
        $userModel = new UserModel();

        $id = [
            'name','email'
        ];

        $actual = $userModel->findUserById($id[0]);
        // $this->assertEquals($expected, $actual);
        $expected = 'error';
        $this->assertEquals($expected,$actual);

    }
    /**
     * Test function findUserById with id is object
     */
    public function testFindUserByIdObject() {
        $userModel = new UserModel();

        $id = new BankModel();

        $actual = $userModel->findUserById($id->createToken());
        // $this->assertEquals($expected, $actual);
        $expected = 'error';
        $this->assertEquals($expected,$actual);
    }

    /**
     * Test function findUser
     */
    public function testFindUsersOk(){
        $user = new UserModel();
        $keys = "a";
        // $expected = "LE VAN LAM";
        $actual = $user->findUser($keys);
        //  var_dump($actual);die();
        if(empty($actual)){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }
    /**
     * Test function findUser with key not exits
     */
    public function testFindUserNg(){
        $user = new UserModel();
        $keys = "45125215sad";

        $actual = $user->findUser($keys);
        $expected = 'error';
        $this->assertEquals($expected,$actual);
    }
    /**
     * Test function findUser with key is array
     */
    public function testFindUserArray(){
        $user = new UserModel();
        $keys = [1];

        $actual = $user->findUser($keys[0]);
        $expected = 'error';
        $this->assertEquals($expected,$actual);
    }
    /**
     * Test function findUser with key is null
     */
    public function testFindUserNull(){
        $user = new UserModel();
        $keys = null;

        $actual = $user->findUser($keys);
        $expected = 'error';
        $this->assertEquals($expected,$actual);
    }
    /**
     * Test function findUser with key is number
     */
    public function testFindUserNumber(){
        $user = new UserModel();
        $keys = 123;

        $actual = $user->findUser($keys);
        $expected = 'error';
        $this->assertEquals($expected,$actual);
    }
    /**
     * Test function findUser with key is object
     */
    public function testFindUserObject(){
        $user = new UserModel();
        $keys = new BankModel();

        $actual = $user->findUser($keys->createToken());

        $expected = 'error';
        $this->assertEquals($expected,$actual);
    }

    /**
     * Test function auth is right
     */
    public function testAuthOk(){
        $user = new UserModel();
        $name = "Le LAM 22";
        $pass = "11111";

        // $expected = "LE VAN LAM";
        $actual = $user->auth($name, $pass);

        if($actual == true){
            $this->assertTrue(true); 
        }
        else{
            $this->assertTrue(false); 
        }
    }
    /**
     * Test function auth with name worng
     */
    public function testAuthNameNg(){
        $user = new UserModel();
        $name = "Le LAM 11";
        $pass = "11111";

        $actual = $user->auth($name, $pass);
        $expected = true;
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function auth with password worng
     */
    public function testAuthPassNg(){
        $user = new UserModel();
        $name = "Le LAM 22";
        $pass = "111119999";

        // $expected = "LE VAN LAM";
        $actual = $user->auth($name, $pass);
        // var_dump(md5($pass));die();
        $expected = true;
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function auth with name is number
     */
    public function testAuthNameNumber(){
        $user = new UserModel();
        $name = 123;
        $pass = "111119999";

        // $expected = "LE VAN LAM";
        $actual = $user->auth($name, $pass);
        // var_dump(md5($pass));die();
        $expected = true;
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function auth with password is number
     */
    public function testAuthPassNumberOk(){
        $user = new UserModel();
        $name = "Le LAM 22";
        $pass = 11111;

        // $expected = "LE VAN LAM";
        $actual = $user->auth($name, $pass);
        $expected = true;
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function auth with password is number
     */
    public function testAuthPassNumberNg(){
        $user = new UserModel();
        $name = "Le LAM 22";
        $pass = 11999;

        // $expected = "LE VAN LAM";
        $actual = $user->auth($name, $pass);
        $expected = true;
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function auth with name is null
     */
    public function testAuthNameNull(){
        $user = new UserModel();
        $name = null;
        $pass = "11111";

        // $expected = "LE VAN LAM";
        $actual = $user->auth($name, $pass);
        // var_dump(md5($pass));die();
        $expected = true;
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function auth with pass is null
     */
    public function testAuthPassNull(){
        $user = new UserModel();
        $name = "Le LAM 22";
        $pass = null;

        $actual = $user->auth($name, $pass);
        $expected = true;
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function auth with name is array
     */
    public function testAuthNameArray(){
        $user = new UserModel();
        $name = ['Le Lam 22'];
        $pass = '2222';

        $actual = $user->auth($name[0], $pass);

        $expected = true;
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function auth with pass is array
     */
    public function testAuthPassArray(){
        $user = new UserModel();
        $name = 'Le Lam 22';
        $pass = ['1111', '22222'];

        $actual = $user->auth($name, $pass[1]);

        $expected = true;
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function auth with name is object
     */
    public function testAuthNameObject(){
        $user = new UserModel();
        $name = new BankModel();
        $pass = '2222';

        $actual = $user->auth($name->createToken(), $pass);
        $expected = true;
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function auth with pass is array
     */
    public function testAuthPassObject(){
        $user = new UserModel();
        $name = 'Le Lam 22';
        $pass = new BankModel();

        $actual = $user->auth($name, $pass->createToken());

        $expected = true;
        $this->assertEquals($expected, $actual);
    }


    /**
     * Test function create token
     */
    public function testCreateTokenOk(){
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
    public function testUpdateUserOk(){
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

}