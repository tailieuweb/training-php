<?php

use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
  //*--------------------------------------------------------------
  public function testFindUserByIdWithIdIntegerOk()
  {
    $user = new UserModel();
    $expected = [
      'id' => 2,
      'name' => 'user1',
      'fullname' => 'User1',
      'email' => 'user1@gmail.com',
      'type' => 'user',
      'password' => '47bce5c74f589f4867dbd57e9ca9f808'
    ];
    $actual = $user->findUserById(2);
    $this->assertEquals($expected, $actual[0]);
  }
  //*--------------------------------------------------------------
  public function testFindUserByIdWithIdIntegerDoesNotExistNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->findUserById(-1);
    $this->assertEquals($expected, $actual);
  }
  //*--------------------------------------------------------------
  public function testFindUserByIdWithIdStringNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->findUserById("2");
    $this->assertEquals($expected, $actual);
  }
  //*--------------------------------------------------------------
  public function testFindUserByIdWithIdObjectNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->findUserById(new stdClass());
    $this->assertEquals($expected, $actual);
  }
  //*--------------------------------------------------------------
  public function testFindUserByIdWithIdArrayNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->findUserById([]);
    $this->assertEquals($expected, $actual);
  }
  //*--------------------------------------------------------------
  public function testFindUserByIdWithIdBoolNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->findUserById(true);
    $this->assertEquals($expected, $actual);
  }
  //*--------------------------------------------------------------
  public function testFindUserByIdWithIdFloatNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->findUserById(-1.1);
    $this->assertEquals($expected, $actual);
  }
  //*--------------------------------------------------------------
  public function testFindUserByIdWithIdNullNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->findUserById(null);
    $this->assertEquals($expected, $actual);
  }
  //*--------------------------------------------------------------
  public function testFindUserByIdWithoutIdNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->findUserById();
    $this->assertEquals($expected, $actual);
  }
  // auth()
  //*--------------------------------------------------------------
  public function testAuthWithUserNamePasswordStringOk()
  {
    $user = new UserModel();
    $expected = [
      'id' => 11,
      'name' => 'admin',
      'fullname' => 'admin',
      'email' => 'admin@mail.com',
      'type' => 'admin',
      'password' => '21232f297a57a5a743894a0e4a801fc3'
    ];
    $actual = $user->auth("admin", "admin");
    $this->assertEquals($expected, $actual[0]);
  }
  //*--------------------------------------------------------------
  public function testAuthWithUserNamePasswordStringDoesNotExistNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth("sgf", "345345");
    $this->assertEquals($expected, $actual);
  }
  //*--------------------------------------------------------------
  public function testAuthWithEmtpyUserNamePasswordNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth("", "");
    $this->assertEquals($expected, $actual);
  }
  //*--------------------------------------------------------------
  public function testAuthWithUserNamePasswordIntegerNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth(1, -1);
    $this->assertEquals($expected, $actual);
  }
  //*--------------------------------------------------------------
  public function testAuthWithUserNamePasswordFloatNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth(1.1, -1.1);
    $this->assertEquals($expected, $actual);
  }
  //*--------------------------------------------------------------
  public function testAuthWithUserNamePasswordArrayNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth([], ["aaaa"]);
    $this->assertEquals($expected, $actual);
  }
  //*--------------------------------------------------------------
  public function testAuthWithUserNamePasswordObjectNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth(new stdClass, new stdClass);
    $this->assertEquals($expected, $actual);
  }
  //*--------------------------------------------------------------
  public function testAuthWithUserNamePasswordNullNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth(null, null);
    $this->assertEquals($expected, $actual);
  }
  //*--------------------------------------------------------------
  public function testAuthWithUserNamePasswordBoolNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth(true, false);
    $this->assertEquals($expected, $actual);
  }
  //*--------------------------------------------------------------
  public function testAuthWithoutUserNamePasswordNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth();
    $this->assertEquals($expected, $actual);
  }
}
