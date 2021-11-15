<?php

use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{

  /**
   * Test case Okie
   */
  public function testSumOk()
  {
    $userModel = new UserModel();
    $a = 1;
    $b = 2;
    $expected = 3;
    $actual = $userModel->sumb($a, $b);
    $this->assertEquals($expected, $actual);
  }

  /**
   * Test case Not good
   */
  public function testSumNg()
  {
    $userModel = new UserModel();
    $a = 1;
    $b = 2;
    $actual = $userModel->sumb($a, $b);
    if ($actual != 3) {
      $this->assertTrue(false);
    } else {
      $this->assertTrue(true);
    }
  }

  /**
   * Test case Okie
   */
  public function testSumMinus()
  {
    $userModel = new UserModel();
    $a = -1;
    $b = -2;
    $expected = -3;
    $actual = $userModel->sumb($a, $b);
    $this->assertEquals($expected, $actual);
  }

  /**
   * Test case Okie
   */
  public function testSumMinusAndPositive()
  {
    $userModel = new UserModel();
    $a = -1;
    $b = 2;
    $expected = 1;
    $actual = $userModel->sumb($a, $b);
    $this->assertEquals($expected, $actual);
  }

  /**
   * Test case Okie
   */
  public function testSumFloat()
  {
    $userModel = new UserModel();
    $a = 1.5;
    $b = 2.1;
    $expected = 3.6;
    $actual = $userModel->sumb($a, $b);
    $this->assertEquals($expected, $actual);
  }

  /**
   * Test case Okie
   */
  public function testSumNumberAndString()
  {
    $userModel = new UserModel();
    $a = 1;
    $b = "2";
    $expected = 3;
    $actual = $userModel->sumb($a, $b);
    $this->assertEquals($expected, $actual);
  }

  /**
   * Test case Okie
   */
  public function testSumString()
  {
    $userModel = new UserModel();
    $a = "1";
    $b = "2";
    $expected = 3;
    $actual = $userModel->sumb($a, $b);
    $this->assertEquals($expected, $actual);
  }

  // * getuser function start


  // * function testGetUsers string (finish)
  public function testGetUsersString()
  {
    $userModel = new UserModel();
    $params = [];
    $params['keyword'] = 'a';
    $expected = 24;
    $arrUsers = $userModel->getUsers($params);
    $actual = count($arrUsers);
    $this->assertEquals($expected, $actual);
  }
  // * function testGetUsers null (finish)
  public function testGetUsersNull()
  {
    $userModel = new UserModel();
    $params = [];
    $params['keyword'] = null;
    $expected = 'error';
    $arrUsers = $userModel->getUsers($params);
    $actual = $arrUsers;
    $this->assertEquals($expected, $actual);
  }

  // * function testGetUsers number (finish)
  public function testGetUsersNumber()
  {
    $userModel = new UserModel();
    $params = [];
    $params['keyword'] = 1;
    $expected = 'error';
    $arrUsers = $userModel->getUsers($params);
    $actual = $arrUsers;
    $this->assertEquals($expected, $actual);
  }

  // * function testGetUsers boolean
  public function testGetUsersBoolean()
  {
    $userModel = new UserModel();
    $params = [];
    $params['keyword'] = true;
    $expected = 'error';
    $arrUsers = $userModel->getUsers($params);
    $actual = $arrUsers;
    $this->assertEquals($expected, $actual);
  }

  // * function testGetUsers array
  public function testGetUsersArray()
  {
    $userModel = new UserModel();
    $params = [];
    $params['keyword'] = ['true'];
    // $params['keyword2'] = false;
    $expected = 'error';
    $arrUsers = $userModel->getUsers($params);
    $actual = $arrUsers;
    $this->assertEquals($expected, $actual);
  }

  // * function testGetUsers empty input
  public function testGetUsersEmptyInput()
  {
    $userModel = new UserModel();
    $params = [];
    $params['keyword'] = '';
    // $params['keyword2'] = false;
    $expected = 47;
    $arrUsers = $userModel->getUsers($params);
    $actual = count($arrUsers);
    $this->assertEquals($expected, $actual);
  }
  // * getuser function end

  // todo: fuction insertUser start
  /**
   * th đầy đủ thông tin và thông tin hợp lệ
   * th input rỗng
   * th thiếu thông tin 
   * th thông tin không hợp lệ (boolean, null, array)
   * 
   */
  // * fuction insertUser input valid
  public function testInsertUserInputValid()
  {
    $userModel = new UserModel();
    $input = [];
    $input['name'] = 'thuong';
    $input['fullname'] = 'tpthuong';
    $input['email'] = 'email';
    $input['type'] = 'user';
    $input['password'] = "123";

    $expected = true;

    $actual = $userModel->insertUser($input);
    $this->assertEquals($expected, $actual);
  }

  // * fuction insertUser password had white space
  public function testInsertUserPasswordWithSpaces()
  {
    $userModel = new UserModel();
    $input = [];
    $input['name'] = 'thuong';
    $input['fullname'] = 'tpthuong';
    $input['email'] = 'email';
    $input['type'] = 'user';
    $input['password'] = "1 2 3   ";

    $expected = false;

    $actual = $userModel->insertUser($input);
    $this->assertEquals($expected, $actual);
  }

  // * fuction insertUser password is null 
  public function testInsertUserPasswordIsNull()
  {
    $userModel = new UserModel();
    $input = [];
    $input['name'] = 'thuong';
    $input['fullname'] = 'tpthuong';
    $input['email'] = 'email';
    $input['type'] = 'user';
    $input['password'] = null;

    $expected = false;

    $actual = $userModel->insertUser($input);
    $this->assertEquals($expected, $actual);
  }

  // * fuction insertUser password is boolean 
  public function testInsertUserPasswordIsBoolean()
  {
    $userModel = new UserModel();
    $input = [];
    $input['name'] = 'thuong';
    $input['fullname'] = 'tpthuong';
    $input['email'] = 'email';
    $input['type'] = 'user';
    $input['password'] = true;

    $expected = false;

    $actual = $userModel->insertUser($input);
    $this->assertEquals($expected, $actual);
  }

  // * fuction insertUser password is array 
  public function testInsertUserPasswordIsArray()
  {
    $userModel = new UserModel();
    $input = [];
    $input['name'] = 'thuong';
    $input['fullname'] = 'tpthuong';
    $input['email'] = 'email';
    $input['type'] = 'user';
    $input['password'] = [];

    $expected = false;

    $actual = $userModel->insertUser($input);
    $this->assertEquals($expected, $actual);
  }

  // * fuction insertUser password is object 
  public function testInsertUserPasswordIsObject()
  {
    $userModel = new UserModel();
    $input = [];
    $input['name'] = 'thuong';
    $input['fullname'] = 'tpthuong';
    $input['email'] = 'email';
    $input['type'] = 'user';
    $input['password'] = $userModel;

    $expected = false;

    $actual = $userModel->insertUser($input);
    $this->assertEquals($expected, $actual);
  }

  // * fuction insertUser without name (finish)
  public function testInsertUserWithoutName()
  {
    $userModel = new UserModel();
    $input = [];
    // $input['name'] = 'thuong';
    $input['fullname'] = 'withoutname';
    $input['email'] = 'email';
    $input['type'] = 'user';
    $input['password'] = '123';

    $expected = false;

    $actual = $userModel->insertUser($input);
    $this->assertEquals($expected, $actual);
  }

  // * fuction insertUser without fullname (finish)
  public function testInsertUserWithoutFullName()
  {
    $userModel = new UserModel();
    $input = [];
    $input['name'] = 'withoutfullname';
    // $input['fullname'] = 'withoutname';
    $input['email'] = 'email';
    $input['type'] = 'user';
    $input['password'] = '123';

    $expected = true;

    $actual = $userModel->insertUser($input);
    $this->assertEquals($expected, $actual);
  }

  // * fuction insertUser without email (finish)
  public function testInsertUserWithoutEmail()
  {
    $userModel = new UserModel();
    $input = [];
    $input['name'] = 'withoutemail';
    $input['fullname'] = 'withoutemail';
    // $input['email'] = 'email';
    $input['type'] = 'user';
    $input['password'] = '123';

    $expected = true;

    $actual = $userModel->insertUser($input);
    $this->assertEquals($expected, $actual);
  }

  // * fuction insertUser without type (finish)
  public function testInsertUserWithoutType()
  {
    $userModel = new UserModel();
    $input = [];
    $input['name'] = 'withouttype';
    $input['fullname'] = 'withouttype';
    $input['email'] = 'email';
    // $input['type'] = 'user';
    $input['password'] = '123';

    $expected = false;

    $actual = $userModel->insertUser($input);
    $this->assertEquals($expected, $actual);
  }

  // * fuction insertUser without type (finish)
  public function testInsertUserWithoutTypeAndEmail()
  {
    $userModel = new UserModel();
    $input = [];
    $input['name'] = 'withouttype';
    $input['fullname'] = 'withouttype';
    // $input['email'] = 'email';
    // $input['type'] = 'user';
    $input['password'] = '123';

    $expected = false;

    $actual = $userModel->insertUser($input);
    $this->assertEquals($expected, $actual);
  }

  // * fuction insertUser with input is empty (finish)
  public function testInsertUserWithInputIsEmpty()
  {
    $userModel = new UserModel();
    $input = [];

    $expected = false;

    $actual = $userModel->insertUser($input);
    $this->assertEquals($expected, $actual);
  }

  // * fuction insertUser with input is null (finish)
  public function testInsertUserWithInputIsNull()
  {
    $userModel = new UserModel();
    $input = null;

    $expected = false;

    $actual = $userModel->insertUser($input);
    $this->assertEquals($expected, $actual);
  }

  // * fuction insertUser with input is boolean (finish)
  public function testInsertUserWithInputIsBoolean()
  {
    $userModel = new UserModel();
    $input = true;

    $expected = false;

    $actual = $userModel->insertUser($input);
    $this->assertEquals($expected, $actual);
  }
  // if (!empty($input['password']) && !empty($input['name']) && !empty($input['type'])) {
  //   $password = md5($input['password']);
  //   $name = htmlspecialchars($input['name']);
  //   $fullname = htmlspecialchars($input['fullname']);
  //   $email = htmlspecialchars($input['email']);
  //   $type = htmlspecialchars($input['type']);
  // }
  // else{
  //   return 'error';
  // }
  // * fuction insertUser end

}
