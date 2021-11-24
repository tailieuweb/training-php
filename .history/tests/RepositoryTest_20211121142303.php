<?php

use PHPUnit\Framework\TestCase;

class RepositoryTest extends TestCase
{
    /**
     * Test function getFullUser
     */
    public function testGetFullUserOk()
    {
        $repo = new Repository();

        $user_id = 2;

        $expected = "test2";
        $actual = $repo->getFullUser($user_id);
        $this->assertEquals($expected, $actual[0]['name']);
    }
    /**
     * Test function getFullUser
     * Id not exist
     */
    public function testGetFullUserIdNotExist()
    {
        $repo = new Repository();
        $user_id = 1;

        $actual = $repo->getFullUser($user_id);
        if(!empty($actual)){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }
    /**
     * Test function getFullUser
     * Id is null
     */
    public function testGetFullUserIdNull()
    {
        $repo = new Repository();
        $user_id = null;

        $actual = $repo->getFullUser($user_id);
        if(!empty($actual)){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }
    /**
     * Test function getFullUser
     * Id is string
     */
    public function testGetFullUserIdString()
    {
        $repo = new Repository();
        $user_id = '2';

        $actual = $repo->getFullUser($user_id);
        if(!empty($actual)){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }
    /**
     * Test function getFullUser
     * Id is array
     */
    public function testGetFullUserIdArray()
    {
        $repo = new Repository();
        $user_id = ['dsad'];

        $actual = $repo->getFullUser($user_id);
        if($actual == true){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }
    /**
     * Test function getFullUser
     * Id is object
     */
    public function testGetFullUserIdObject()
    {
        $repo = new Repository();
        $user_id = new stdClass();

        $actual = $repo->getFullUser($user_id);
        if($actual == true){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }

    /**
     * Test function updateFullUser
     * Test ok
     */
    public function testUpdateFullUserOk(){
        $repo = new Repository();

        $input = [];
        $input['id'] = 11;
        $input['name'] = 'User 2222';
        $input['fullname'] = "This is of user 2";
        $input['email'] = "Levanlam@gmail.com";
        $input['type'] = 1;
        $input['password'] = '12345';
        $input['cost'] = 700000;

        $actual = $repo->updateFullUser($input);
        if($actual == true){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }
    /**
     * Test function updateFullUser
     * Not input['cost']
     */
    public function testUpdateFullUserNotCost(){
        $repo = new Repository();

        $input = [];
        $input['id'] = 11;
        $input['name'] = 'User 3333';
        $input['fullname'] = "This is of user 2";
        $input['email'] = "Levanlam@gmail.com";
        $input['type'] = 1;
        $input['password'] = '12345';
        // $input['cost'] = 700000;

        $actual = $repo->updateFullUser($input);
        if($actual == true){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }
    /**
     * Test function updateFullUser
     * Id not exist
     */
    public function testUpdateFullUserIdNotExist(){
        $repo = new Repository();

        $input = [];
        $input['id'] = 99;
        $input['name'] = 'User 3333';
        $input['fullname'] = "This is of user 1";
        $input['email'] = "Levanlam@gmail.com";
        $input['type'] = 1;
        $input['password'] = '12345';
        $input['cost'] = 700000;

        $actual = $repo->updateFullUser($input);
        if($actual == true){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }
    /**
     * Test function updateFullUser
     * Id is string
     */
    public function testUpdateFullUserIdString(){
        $repo = new Repository();

        $input = [];
        $input['id'] = '22';
        $input['name'] = 'User 3333';
        $input['fullname'] = "This is of user 1";
        $input['email'] = "Levanlam@gmail.com";
        $input['type'] = 1;
        $input['password'] = '12345';
        $input['cost'] = 700000;

        $actual = $repo->updateFullUser($input);
        if($actual == true){
            $this->assertTrue(false);
        }
        else{
            $this->assertTrue(true);
        }
    }
    /**
     * Test function updateFullUser
     * Cost is string
     */
    public function testUpdateFullUserCostString(){
        $repo = new Repository();

        $input = [];
        $input['id'] = 11;
        $input['name'] = 'User 3333';
        $input['fullname'] = "This is of user 1";
        $input['email'] = "Levanlam@gmail.com";
        $input['type'] = 1;
        $input['password'] = '12345';
        $input['cost'] = '700000';

        $actual = $repo->updateFullUser($input);
        if($actual == true){
            $this->assertTrue(false);
        }
        else{
            $this->assertTrue(true);
        }
    }
    /**
     * Test function updateFullUser
     * Type is string
     */
    public function testUpdateFullUserTypeString(){
        $repo = new Repository();

        $input = [];
        $input['id'] = 11;
        $input['name'] = 'User 3333';
        $input['fullname'] = "This is of user 1";
        $input['email'] = "Levanlam@gmail.com";
        $input['type'] = '1';
        $input['password'] = '12345';
        $input['cost'] = 700000;

        $actual = $repo->updateFullUser($input);
        if($actual == true){
            $this->assertTrue(false);
        }
        else{
            $this->assertTrue(true);
        }
    }
    /**
     * Test function updateFullUser
     * Name is int
     */
    public function testUpdateFullUserNameInt(){
        $repo = new Repository();

        $input = [];
        $input['id'] = 11;
        $input['name'] = 2333;
        $input['fullname'] = "This is of user 1";
        $input['email'] = "Levanlam@gmail.com";
        $input['type'] = '1';
        $input['password'] = '12345';
        $input['cost'] = 700000;

        $actual = $repo->updateFullUser($input);
        if($actual == true){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }
    /**
     * Test function updateFullUser
     * FullName is int
     */
    public function testUpdateFullUserFullNameInt(){
        $repo = new Repository();

        $input = [];
        $input['id'] = 11;
        $input['name'] = "Lam";
        $input['fullname'] = 123412;
        $input['email'] = "Levanlam@gmail.com";
        $input['type'] = '1';
        $input['password'] = '12345';
        $input['cost'] = 700000;

        $actual = $repo->updateFullUser($input);
        if($actual == true){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }
    /**
     * Test function updateFullUser
     * Email is int
     */
    public function testUpdateFullUserEmailInt(){
        $repo = new Repository();

        $input = [];
        $input['id'] = 11;
        $input['name'] = "Lam";
        $input['fullname'] = 123412;
        $input['email'] = 1113;
        $input['type'] = '1';
        $input['password'] = '12345';
        $input['cost'] = 700000;

        $actual = $repo->updateFullUser($input);
        if($actual == true){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }
    /**
     * Test function updateFullUser
     * Pass is int
     */
    public function testUpdateFullUserPassInt(){
        $repo = new Repository();

        $input = [];
        $input['id'] = 11;
        $input['name'] = "Lam";
        $input['fullname'] = 123412;
        $input['email'] = "lam@gmail.com";
        $input['type'] = '1';
        $input['password'] = 12345;
        $input['cost'] = 700000;

        $actual = $repo->updateFullUser($input);
        if($actual == true){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }
    /**
     * Test function updateFullUser
     * Id is null
     */
    public function testUpdateFullUserIdNull(){
        $repo = new Repository();

        $input = [];
        $input['id'] = null;
        $input['name'] = "Lam";
        $input['fullname'] = 123412;
        $input['email'] = "lam@gmail.com";
        $input['type'] = '1';
        $input['password'] = 12345;
        $input['cost'] = 700000;

        $actual = $repo->updateFullUser($input);
        if($actual == true){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }
    /**
     * Test function updateFullUser
     * Name is null
     */
    public function testUpdateFullUserNameNull(){
        $repo = new Repository();

        $input = [];
        $input['id'] = 11;
        $input['name'] = null;
        $input['fullname'] = 123412;
        $input['email'] = "lam@gmail.com";
        $input['type'] = '1';
        $input['password'] = 12345;
        $input['cost'] = 700000;

        $actual = $repo->updateFullUser($input);
        if($actual == true){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }
    /**
     * Test function updateFullUser
     * Full name is null
     */
    public function testUpdateFullUserFullNameNull(){
        $repo = new Repository();

        $input = [];
        $input['id'] = 11;
        $input['name'] = "lam";
        $input['fullname'] = null;
        $input['email'] = "lam@gmail.com";
        $input['type'] = '1';
        $input['password'] = 12345;
        $input['cost'] = 700000;

        $actual = $repo->updateFullUser($input);
        if($actual == true){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }
    /**
     * Test function updateFullUser
     * Email is null
     */
    public function testUpdateFullUserEmailNull(){
        $repo = new Repository();

        $input = [];
        $input['id'] = 11;
        $input['name'] = "lam";
        $input['fullname'] = "le van lam";
        $input['email'] = null;
        $input['type'] = '1';
        $input['password'] = 12345;
        $input['cost'] = 700000;

        $actual = $repo->updateFullUser($input);
        if($actual == true){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }
    /**
     * Test function updateFullUser
     * Type is null
     */
    public function testUpdateFullUserTypeNull(){
        $repo = new Repository();

        $input = [];
        $input['id'] = 11;
        $input['name'] = "lam";
        $input['fullname'] = "le van lam";
        $input['email'] = "Lam@gmail.com";
        $input['type'] = null;
        $input['password'] = 12345;
        $input['cost'] = 700000;

        $actual = $repo->updateFullUser($input);
        if($actual == true){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }
    /**
     * Test function updateFullUser
     * Pass is null
     */
    public function testUpdateFullUserPassNull(){
        $repo = new Repository();

        $input = [];
        $input['id'] = 11;
        $input['name'] = "lam";
        $input['fullname'] = "le van lam";
        $input['email'] = "Lam@gmail.com";
        $input['type'] = 1;
        $input['password'] = null;
        $input['cost'] = 700000;

        $actual = $repo->updateFullUser($input);
        if($actual == true){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }
    /**
     * Test function updateFullUser
     * Cost is null
     */
    public function testUpdateFullUserCostNull(){
        $repo = new Repository();

        $input = [];
        $input['id'] = 11;
        $input['name'] = "lam";
        $input['fullname'] = "le van lam";
        $input['email'] = "Lam@gmail.com";
        $input['type'] = 1;
        $input['password'] = '12345';
        $input['cost'] = null;

        $actual = $repo->updateFullUser($input);
        if($actual == true){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }
    /**
     * Test function updateFullUser
     * id is array
     */
    public function testUpdateFullUserIdArray(){
        $repo = new Repository();

        $input = [];
        $input['id'] = [1,3];
        $input['name'] = "lam";
        $input['fullname'] = "le van lam";
        $input['email'] = "Lam@gmail.com";
        $input['type'] = 1;
        $input['password'] = '12345';
        $input['cost'] = 421424;

        $actual = $repo->updateFullUser($input);
        if($actual == true){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }
    /**
     * Test function updateFullUser
     * Name is array
     */
    public function testUpdateFullUserNameArray(){
        $repo = new Repository();

        $input = [];
        $input['id'] = 11;
        $input['name'] = ["lam"];
        $input['fullname'] = "le van lam";
        $input['email'] = "Lam@gmail.com";
        $input['type'] = 1;
        $input['password'] = '12345';
        $input['cost'] = 421424;

        $actual = $repo->updateFullUser($input);
        if($actual == true){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }
    /**
     * Test function updateFullUser
     * Full name is array
     */
    public function testUpdateFullUserFullNameArray(){
        $repo = new Repository();

        $input = [];
        $input['id'] = 11;
        $input['name'] = "lam";
        $input['fullname'] = ["le van lam"];
        $input['email'] = "Lam@gmail.com";
        $input['type'] = 1;
        $input['password'] = '12345';
        $input['cost'] = 421424;

        $actual = $repo->updateFullUser($input);
        if($actual == true){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }
    /**
     * Test function updateFullUser
     * Email is array
     */
    public function testUpdateFullUserEmailArray(){
        $repo = new Repository();

        $input = [];
        $input['id'] = 11;
        $input['name'] = "lam";
        $input['fullname'] = "le van lam";
        $input['email'] = ["Lam@gmail.com"];
        $input['type'] = 1;
        $input['password'] = '12345';
        $input['cost'] = 421424;

        $actual = $repo->updateFullUser($input);
        if($actual == true){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }
    /**
     * Test function updateFullUser
     * type is array
     */
    public function testUpdateFullUserTypeArray(){
        $repo = new Repository();

        $input = [];
        $input['id'] = 11;
        $input['name'] = "lam";
        $input['fullname'] = "le van lam";
        $input['email'] = "Lam@gmail.com";
        $input['type'] = [1];
        $input['password'] = '12345';
        $input['cost'] = 421424;

        $actual = $repo->updateFullUser($input);
        if($actual == true){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }
    /**
     * Test function updateFullUser
     * Password is array
     */
    public function testUpdateFullUserPassArray(){
        $repo = new Repository();

        $input = [];
        $input['id'] = 11;
        $input['name'] = "lam";
        $input['fullname'] = "le van lam";
        $input['email'] = "Lam@gmail.com";
        $input['type'] = 1;
        $input['password'] = ['12345'];
        $input['cost'] = 421424;

        $actual = $repo->updateFullUser($input);
        if($actual == true){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }
    /**
     * Test function updateFullUser
     * Cost is array
     */
    public function testUpdateFullUserCostArray(){
        $repo = new Repository();

        $input = [];
        $input['id'] = 11;
        $input['name'] = "lam";
        $input['fullname'] = "le van lam";
        $input['email'] = "Lam@gmail.com";
        $input['type'] = 1;
        $input['password'] = '12345';
        $input['cost'] = [421424];

        $actual = $repo->updateFullUser($input);
        if($actual == true){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }
}