<?php
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
   public function testFindUserByIdOk() {
      $userModel = new UserModel();
      
      $id = 2;
      $mongDoiUsername = 'test2';
      
      $user = $userModel->findUserById($id);        
      $this->assertEquals($mongDoiUsername, $user[0]['name']);    
   }
            
   public function testFindUserByIdNg() {
      $userModel = new UserModel();
      
      $id = 999999;
           
      $user = $userModel->findUserById($id);
      
      if ($user=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }     
   }
   public function testFindUserByIdNgAm() {
      $userModel = new UserModel();
      
      $id = -999999;         
      
      $user = $userModel->findUserById($id);
      
      if ($user=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }     
   }
   public function testFindUserByIdSoThuc() {
      $userModel = new UserModel();
      
      $id = 11.22;
      
      $user = $userModel->findUserById($id);
      
      if ($user=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testFindUserByIdSpecialCharacters() {
      $userModel = new UserModel();
      
      $id = '[@$]';
      
      $user = $userModel->findUserById($id);
      
      if ($user=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testFindUserByIdIsArray() {
      $userModel = new UserModel();
      
      $id = [];
      
      $user = $userModel->findUserById($id);
      
      if ($user=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testFindUserByIdStr() {
      $userModel = new UserModel();
      
      $id = 'asdf';
      
      
      $expected = 'error';
      $actual = $userModel->findUserById($id);
      
      $this->assertEquals($expected, $actual);   
   }
   
   
   public function testFindUserByIdNull() {
      $userModel = new UserModel();
      $id = null;
      $expected = 'error';
      $actual = $userModel->findUserById($id);
      $this->assertEquals($expected, $actual);   
   }
   
   public function testFindUserByIdObject() {
      $userModel = new UserModel();    
      $id = new stdClass();
      $expected = 'error';
      $actual = $userModel->findUserById($id);      
      $this->assertEquals($expected, $actual);      
   }
   public function testFindUserOk() {
      $userModel = new UserModel();
      $key = 'test2';
      $mongDoiUsername = 'test2';
      
      $user = $userModel->findUser($key);
      
      $this->assertEquals($mongDoiUsername, $user[0]['name']);
      
   }
   public function testFindUserNg() {
      $userModel = new UserModel();
      
      $key = 999999;
      
      $user = $userModel->findUser($key);
      
      if ($user=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testFindUserNgAm() {
      $userModel = new UserModel();
      
      $key = -999999;
      
      $user = $userModel->findUser($key);
      
      if ($user=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testFindUserSoThuc() {
      $userModel = new UserModel();
      
      $key = 11.22;
      
      $user = $userModel->findUser($key);
      
      if ($user=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testFindUserSpecialCharacters() {
      $userModel = new UserModel();
      
      $key = '[@$]';
      
      $user = $userModel->findUser($key);
      
      if ($user=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testFindUserIsArray() {
      $userModel = new UserModel();
      
      $key = [];
      
      $user = $userModel->findUser($key);
      
      if ($user=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testFindUserStr() {
      $userModel = new UserModel();
      
      $key = 'test7';
               
      $mongDoiUsername = 'test7';
      $user = $userModel->findUser($key);
      
      $this->assertEquals($mongDoiUsername, $user[0]['name']);   
   }
   public function testFindUserNull() {
      $userModel = new UserModel();
      
      $key = null;
               
      $user = $userModel->findUser($key);
      if ($user=='error') {
         $this->assertTrue(true);
         } else {
         $this->assertTrue(false);
         }
   }
   public function testFindUserObject() {
      $userModel = new UserModel();
      
      $key = new stdClass();
               
      $mongDoi = 'error';
      $user = $userModel->findUser($key);
      
      $this->assertEquals($mongDoi, $user);   
   }
   public function testAuthOk() {
      $userModel = new UserModel();
      $username = 'test2';
      $password = 'a';
      $mongDoiUsername = 'test2';
      
      $auth = $userModel->auth($username,$password);
      
      $this->assertEquals($mongDoiUsername, $auth[0]['name']);        
   }
   public function testAuthUserWr() {
      $userModel = new UserModel();
      $username = 'ádafsd';
      $password = 'a';
      
      $auth = $userModel->auth($username,$password);
      
      if ($auth=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }   
   public function testAuthPassWr() {
      $userModel = new UserModel();
      $username = 'test2';
      $password = 'aaaa';
      
      $auth = $userModel->auth($username,$password);
      
      if ($auth=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testAuthStr() {
      $userModel = new UserModel();
      $username = 'test2';
      $password = 'a';
      $mongDoiUsername = 'test2';
      
      $auth = $userModel->auth($username,$password);
      
      $this->assertEquals($mongDoiUsername, $auth[0]['name']);
      
   }
   public function testAuthUserNumber() {
      $userModel = new UserModel();
      $username = 111;
      $password = 'a';
      $mongDoiUsername = '111';
      
      $auth = $userModel->auth($username,$password);
      
      $this->assertEquals($mongDoiUsername, $auth[0]['name']);
      
   }
   public function testAuthPassNumber() {
      $userModel = new UserModel();
      $username = 'test7';
      $password = 111;
      $mongDoiUsername = 'test7';
      
      $auth = $userModel->auth($username,$password);
      
      $this->assertEquals($mongDoiUsername, $auth[0]['name']);
      
   }
   public function testAuthUserCharacterSpecial() {
      $userModel = new UserModel();
      $username = '[][]]';
      $password = 'asd';
      $auth = $userModel->auth($username,$password);
      if ($auth=='error') {
         $this->assertTrue(true);
         } else {
         $this->assertTrue(false);
         }        
   }
   public function testAuthPassCharacterSpecial() {
      $userModel = new UserModel();
      $username = 'test2';
      $password = '!@#$!@#$';
      $auth = $userModel->auth($username,$password);
      if ($auth=='error') {
         $this->assertTrue(true);
         } else {
         $this->assertTrue(false);
         }        
   }
   public function testAuthUserIsArray() {
      $userModel = new UserModel();
      $username = [];
      $password = 'aasd';
      
      $auth = $userModel->auth($username,$password);
      
      if ($auth=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testAuthPassIsArray() {
      $userModel = new UserModel();
      $username = 'test2';
      $password = [];
      
      $auth = $userModel->auth($username,$password);
      
      if ($auth=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }         
   public function testAuthUserNull() {
      $userModel = new UserModel();
      $username = null;
      $password = 'aaaa';
      
      $auth = $userModel->auth($username,$password);
      
      if ($auth=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testAuthPassNull() {
      $userModel = new UserModel();
      $username = 'test2';
      $password = null;
      
      $auth = $userModel->auth($username,$password);
      
      if ($auth=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   // public function testDeleteUserByIdOk() {

   //    $userModel = new UserModel();
      
   //    $id = 70;         
      
   //    $del = $userModel->deleteUserById($id);
      
   //    if ($del==true) {
   //    $this->assertTrue(true);
   //    } else {
   //    $this->assertTrue(false);
   //    }            
   // }
   public function testDeleteUserByIdNg() {
      $userModel = new UserModel();
      
      $id = 999999;
      
      $del = $userModel->deleteUserById($id);
      
      if ($del==false) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }     
      }
   public function testDeleteUserByIdNgAm() {
      $userModel = new UserModel();
      
      $id = -999999;         
      
      $user = $userModel->deleteUserById($id);
      
      if ($user==false) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }     
   }
   public function testDeleteUserByIdSoThuc() {
      $userModel = new UserModel();
      
      $id = 11.22;
      
      $user = $userModel->deleteUserById($id);
      
      if ($user==false) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testDeleteUserByIdSpecialCharacters() {
      $userModel = new UserModel();
      
      $id = '[@$]';
      
      $user = $userModel->deleteUserById($id);
      
      if ($user==false) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testDeleteUserByIdIsArray() {
      $userModel = new UserModel();
      
      $id = [];
      
      $user = $userModel->deleteUserById($id);
      
      if ($user==false) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testDeleteUserByIdStr() {
      $userModel = new UserModel();
      
      $id = 'asdf';
      
      
      $expected = false;
      $actual = $userModel->deleteUserById($id);
      
      $this->assertEquals($expected, $actual);   
   }
   
   
   public function testDeleteUserByIdNull() {
      $userModel = new UserModel();
      $id = null;
      $expected = false;
      $actual = $userModel->deleteUserById($id);
      $this->assertEquals($expected, $actual);   
   }
   
   public function testDeleteUserByIdObject() {
      $userModel = new UserModel();    
      $id = new stdClass();
      $expected = false;
      $actual = $userModel->deleteUserById($id);      
      $this->assertEquals($expected, $actual);      
   }
   public function testGetUsersOk() {
      $userModel = new UserModel();
      
      $mongDoiUsername = '1';
      
      $user = $userModel->getUsers();        
      $this->assertEquals($mongDoiUsername, $user[0]['name']);    
   }
                  
   public function testGetUsersNg() {
      $userModel = new UserModel();
      
      $params['keyword'] = 2;

      $mongDoiUsername = 'test2';
      
      $user = $userModel->getUsers($params);        
      $this->assertEquals($mongDoiUsername, $user[0]['name']);     
   }
   public function testGetUsersNgAm() {
      $userModel = new UserModel();
      
      $params['keyword'] = -999999;
        
      $user = $userModel->getUsers($params);
      
      if ($user=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }     
   }
   public function testGetUsersSoThuc() {
      $userModel = new UserModel();
      
      $params['keyword'] = 1.1;
        
      $user = $userModel->getUsers($params);
      
      if ($user=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testGetUsersSpecialCharacters() {
      $userModel = new UserModel();
      
      $params['keyword'] = '[@$]';
        
      $user = $userModel->getUsers($params);
      
      if ($user=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testGetUsersIsArray() {
      $userModel = new UserModel();
      
      $params['keyword'] = [];
      
      $user = $userModel->getUsers($params);
      
      if ($user=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testGetUsersStr() {
      $userModel = new UserModel();
      
      $params['keyword'] = 'asdf';
      
      
      $expected = 'error';
      $actual = $userModel->getUsers($params);
      
      $this->assertEquals($expected, $actual);   
   }
   
   
   public function testGetUsersNull() {
      $userModel = new UserModel();
      $params['keyword'] = null;
      $expected = '1';
      
      $user = $userModel->getUsers($params);        
      $this->assertEquals($expected, $user[0]['name']);   
   }
   
   public function testGetUsersObject() {
      $userModel = new UserModel();    
      $params['keyword'] = new stdClass();
      $expected = 'error';
      $actual = $userModel->getUsers($params);      
      $this->assertEquals($expected, $actual);      
   }
   //______________________________________/** Test InsertUser_UserModel*/_______________________________________

      /**
     * Thêm user mới vào database
     */
    public function testInsertUserOk()
    {
        $userModel = new UserModel();
        $param = array(
            "id" => "1",
            "name" => "user1",
            "fullname" => "user1",
            "email" => "user1@gmail.com",
            "password" => "user1",
        );

        $actual = $userModel->insertUser($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
     /**
     * Thêm user mới bị trùng id
     */
    public function testInsertUserNgTrungId()
    {
        $userModel = new UserModel();
        $existing_id = $userModel->getID();

        $param = array(
            "id" => "1",
            "name" => "user1",
            "fullname" => "user1",
            "email" => "user1@gmail.com",
            "password" => "user1",
        );

        $userModel->insertUser($param);
        $actual = $userModel->getID();
        $expected = $existing_id + 1;

        print_r("\t=> The last ID before: " . $existing_id  . "\n");
        print_r("\t=> The last ID after: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
     /**
     * Add new user with empty string values.
     */
    public function testInsertUserNgEmptyStringValues()
    {
        $userModel = new UserModel();
        $param = array(
            "id" => "",
            "name" => "",
            "fullname" => "",
            "email" => "",
            "password" => "",
        );

        $actual = $userModel->insertUser($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
    /**
     * thêm người dùng mới với giá trị null
     */
    public function testInsertUserNgNullValues()
    {
        $userModel = new UserModel();

        $param = array(
            "id" => null,
            "name" => null,
            "fullname" => null,
            "email" => null,
            "password" => null,
        );

        $actual = $userModel->insertUser($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
     /**
     * thêm người dùng mới với giá trị là đối tượng
     */
    public function testInsertUserNgDt()
    {
        $userModel = new UserModel();
        $obj = new stdClass();

        $param = array(
            "id" => $obj,
            "name" => $obj,
            "fullname" => $obj,
            "email" => $obj,
            "password" => $obj,
        );

        $actual = $userModel->insertUser($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
    /**
     * thêm người dùng mới với giá trị boolean
     */
    public function testInsertUserNgBooleanValues()
    {
        $userModel = new UserModel();
        $boolean = true;

        $param = array(
            "id" => $boolean,
            "name" => $boolean,
            "fullname" => $boolean,
            "email" => $boolean,
            "password" => $boolean,
        );

        $actual = $userModel->insertUser($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
    /**
     * thêm người dùng mới với giá trị là mảng
     */
    public function testInsertUserNgArrayValues()
    {
        $userModel = new UserModel();

        $arr = [1, 2, 3];

        $param = array(
            "id" => $arr,
            "name" => $arr,
            "fullname" => $arr,
            "email" => $arr,
            "password" => $arr,
        );

        $actual = $userModel->insertUser($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }

    //______________________________________/** Test Update User */____________________________________________

    /**
     * Update user with null values
     */
    public function testUpdateUserNgNullValues()
    {
        $userModel = new UserModel();

        $param = array(
            "id" => null,
            "name" => "user1_update",
            "fullname" => "user1_update",
            "email" => "user1_update@gmail.com",
            "password" => "user1_update",
        );

        $actual = $userModel->updateUser($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
    /**
     * Update user 
     */
    public function testUpdateUserOk()
    {
        $userModel = new UserModel();

        $param = array(
            "id" => "1",
            "name" => "user1_update",
            "fullname" => "user1_update",
            "email" => "user1_update@gmail.com",
            "password" => "user1_update",
        );

        $actual = $userModel->updateUser($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
    /**
     * Update user with empty string values
     */
    public function testUpdateUserNgEmptyStringValues()
    {
        $userModel = new UserModel();

        $param = array(
            "id" => "",
            "name" => "",
            "fullname" => "user1_update",
            "email" => "user1_update@gmail.com",
            "password" => "user1_update",
        );

        $actual = $userModel->updateUser($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
    /**
     * Update user with boolean values
     */
    public function testUpdateUserNgBooleanValues()
    {
        $userModel = new UserModel();
        $boolean = true;

        $param = array(
            "id" => $boolean,
            "name" =>  $boolean,
            "fullname" => "user1_update",
            "email" => "user1_update@gmail.com",
            "password" => "user1_update",
        );

        $actual = $userModel->updateUser($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
    /**
     * Update user with array values
     */
    public function testUpdateUserNgArrayValues()
    {
        $userModel = new UserModel();
        $arr = [1, 2, 3];

        $param = array(
            "id" => $arr,
            "name" =>  $arr,
            "fullname" => "user1_update",
            "email" => "user1_update@gmail.com",
            "password" => "user1_update",
        );

        $actual = $userModel->updateUser($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
    /**
     * Update user with Object values
     */
    public function testUpdateUserNgObjectValues()
    {
        $userModel = new UserModel();
        $obj = new stdClass();

        $param = array(
            "id" => $obj,
            "name" =>  $obj,
            "fullname" => "user1_update",
            "email" => "user1_update@gmail.com",
            "password" => "user1_update",
        );

        $actual = $userModel->updateUser($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }

     /**
     * Update user with letter values
     */
    public function testUpdateUserNgletterValues()
    {
        $userModel = new UserModel();
        $letter = 'a';

        $param = array(
            "id" =>   $letter,
            "name" =>   $letter,
            "fullname" => "user1_update",
            "email" => "user1_update@gmail.com",
            "password" =>   $letter,
        );

        $actual = $userModel->updateUser($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
}