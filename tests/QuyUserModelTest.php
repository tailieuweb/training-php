<?php

use PHPUnit\Framework\TestCase;

class QuyUserModelTest extends TestCase
{

    /**
     * Test case Okie
     */
    public function testGetUsersGood()
    {
        $userModel = new UserModel();
        $params['keyword']  = 'hackerasfasf';
        $expected = 'hackerasfasf';
        $user = $userModel->getUsers($params);
        $actual = $user[0]['name'];
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Not good
     */
    public function testGetUsersNg()
    {
        $userModel = new UserModel();
        $params['keyword']  = 'qhuh';
        $user = $userModel->getUsers($params);
        if (empty($user[0])) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
   
    /**
     * Test keyword là null
     */
    public function testGetUsersNull()
    {
        $userModel = new UserModel();
        $params['keyword']  = null;
        $expected = 'test2';
        $user = $userModel->getUsers($params);
        $actual = $user[0]['name'];
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test keyword bang gia tri dung hoac sai[boolean(true/false)]
     */
    public function testGetUsersBoolean()
    {
        $userModel = new UserModel();
        $params['keyword']  = true;
        $expected = "Sang111";
        $user = $userModel->getUsers($params);
        $actual = $user[0]['name'];
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test keyword bang ky tu dac biet
     */
    public function testGetUsersKyTuDb()
    {
        $userModel = new UserModel();
        $params['keyword']  = '#$$@';
        $user = $userModel->getUsers($params);
        if (empty($user[0])) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    
    /**
     * kiểm tra getInstance OK
     */
    public function testGetInstanceOk(){
        $userModel = new UserModel();
        $expected = UserModel::getInstance();
        $actual = $userModel->getInstance();
        $this->assertEquals($expected,$actual);
    }
    //kiểm tra getInstance Null
    public function testGetInstanceNull(){
        $userModel = new UserModel();
        $actual = $userModel->getInstance();
        if($actual != null){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
    //kiểm tra getInstance Chuổi
    public function testGetInstanceStr(){
        $userModel = new UserModel();
        $expected = 'abc';
        $actual = $userModel->getInstance();
        if ($actual == $expected) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }   
    }
    //kiểm tra getInstance Chuổi ký tự đặc biệt
    public function testGetInstanceStrDb(){
        $userModel = new UserModel();
        $expected = '@$#^!%$^%';
        $actual = $userModel->getInstance();
        if ($actual == $expected) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }   
    }
   //kiểm tra getInstance Not Good
    public function testGetInstanceNG() {
        $userModel = new UserModel();
        $expected = UserModel::getInstance();
        $actual = $userModel->getInstance();
        if ($actual != $expected) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }   
    }
}
