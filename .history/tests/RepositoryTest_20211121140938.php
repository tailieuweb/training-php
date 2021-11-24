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
}