<?php
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{ 

    /**
     * Test case Okie
     */
    // public function testSumOk()
    // {
    //    $userModel = new UserModel();
    //    $a = 1;
    //    $b = 2;
    //    $expected = 3;

    //    $actual = $userModel->sumb($a,$b);

    //    $this->assertEquals($expected, $actual);
    // }

    // /**
    //  * Test case Not good
    //  */
    // public function testSumNg()
    // {
    //     $userModel = new UserModel();
    //     $a = 1;
    //     $b = 2;

    //     $actual = $userModel->sumb($a,$b);

    //     if ($actual != 3) {
    //         $this->assertTrue(false);
    //     } else {
    //         $this->assertTrue(true);
    //     }
    // }
     
       
    //Test Auth nhap sai user,pass
    public function testAuthNG()
    { 
        $userModel = new UserModel();
        $user = "mrluongdz";
        $pass = "luongvo1247";

        $excute = []; 

        $actual =  $userModel->auth($user, $pass);
        $this->assertEquals($excute, $actual);
    }
    //Test Auth nhap vào ki tu dac biet
    public function testAuthkitudacbietNG()
    {
        $userModel = new UserModel();
        $user = '+_+';
        $pass =  '_+_';
        $expected = [];
        $actual = $userModel->auth($user, $pass);
        $this->assertEquals($expected, $actual);
    }
    //Xoa đúng id
    public function testDeleteUserByIdOK()
    {
        $userModel = new UserModel();
        $id =1;
        $excute = true;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($excute, $actual);
    }
    //Xoa sai id
    public function testDeleteUserByIdNG()
    {
        $userModel = new UserModel();
        $id = '1,1';

        $actual = $userModel->deleteUserById($id);
        if ($actual == false) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    //xoa id khong co ở data
    public function testDeleteUserByIdShowNG()
    {
        $userModel = new UserModel();
        $id = 1000;
        $excute = true;
        $key = $userModel->findUserById($id);
        $actual = $userModel->deleteUserById($id);

        if ($key == []) {
            $this->assertTrue(true);
        } else {
            $this->assertEquals($excute, $actual);
        }
    }
      //TEST OF FUNCTION findUserById
      public function testFindUserByIdWithOK()
      {
          $userModel = new UserModel();
          $expected = [
              "id" => '10',
              "name" => "nguyen minh tien",
              "fullname" => "Nguyen minh tien",
              "email" => "nguyenminhtien1808@gmail.com",
              "type" => "admin",
              "password" => "81dc9bdb52d04dc20036dbd8313ed055",
          ];
          $actual = $userModel->findUserById(10);
          $this->assertEquals($expected, $actual[0]);
      }
      //
      public function testFindUserByIdWithNullId()
      {
          $userModel = new UserModel();
          $expected = false;
          $actual = $userModel->findUserById(null);
          $this->assertEquals($expected, $actual);
      }
      //
      public function testFindUserByIdWithNoData()
      {
          $userModel = new UserModel();
          $expected = [];
          $actual = $userModel->findUserById(0);
          $this->assertEquals($expected, $actual);
      }
      //
      public function testFindUserByStringNumberId()
      {
          $userModel = new UserModel();
          $expected = false;
          $actual = $userModel->findUserById("1");
          $this->assertEquals($expected, $actual);
      }
      //
      public function testFindUserByStringId()
      {
          $userModel = new UserModel();
          $expected = false;
          $actual = $userModel->findUserById("abcd");
          $this->assertEquals($expected, $actual);
      }
      //
      public function testFindUserBySpecialKeyId()
      {
          $userModel = new UserModel();
          $expected = false;
          $actual = $userModel->findUserById("/**//#@^%$");
          $this->assertEquals($expected, $actual);
      }
      //
      public function testFindUserByArrayId()
      {
          $userModel = new UserModel();
          $expected = false;
          $actual = $userModel->findUserById([]);
          $this->assertEquals($expected, $actual);
      }
      //
      public function testFindUserByObjectId()
      {
          $userModel = new UserModel();
          $expected = false;
          $key = new stdClass;
          $actual = $userModel->findUserById($key);
          $this->assertEquals($expected, $actual);
      }
      //
      public function testFindUserByBooleanId()
      {
          $userModel = new UserModel();
          $expected = false;
          $key = true;
          $actual = $userModel->findUserById($key);
          $this->assertEquals($expected, $actual);
      }
      //
      public function testFindUserByDoubleId()
      {
          $userModel = new UserModel();
          $expected = false;
          $key = 1.345;
          $actual = $userModel->findUserById($key);
          $this->assertEquals($expected, $actual);
      }
  
      //TEST OF FUNCTION findUser
      public function testFindUserByNameWithOK()
      {
          $userModel = new UserModel();
          $expected = [
              "id" => 10,
              "name" => "nguyen minh tien",
              "fullname" => "Nguyen minh tien",
              "email" => "nguyenminhtien1808@gmail.com",
              "type" => "admin",
              "password" => "81dc9bdb52d04dc20036dbd8313ed055",
          ];
          $keyword = "nguyen minh tien";
          $actual = $userModel->findUser($keyword);
          $this->assertEquals($expected, $actual[0]);
      }
      //
      public function testFindUserByEmailWithOK()
      {
          $userModel = new UserModel();
          $expected = [
              "id" => 11,
              "name" => "nguyen minh tien",
              "fullname" => "nguyen minh tien",
              "email" => "nguyenminhtien18081@gmail.com",
              "type" => "admin",
              "password" => "81dc9bdb52d04dc20036dbd8313ed055",
          ];
          $keyword = "nguyenminhtien18081@gmail.com";
          $actual = $userModel->findUser($keyword);
          $this->assertEquals($expected, $actual[0]);
      }
      //
      public function testFindUserWithNullKey()
      {
          $userModel = new UserModel();
          $expected = false;
          $keyword = null;
          $actual = $userModel->findUser($keyword);
          $this->assertEquals($expected, $actual);
      }
      //
      public function testFindUserBySpecialKey()
      {
          $userModel = new UserModel();
          $expected = [];
          $actual = $userModel->findUser("/**//#@^%$");
          $this->assertEquals($expected, $actual);
      }
      //
      public function testFindUserWithNoData()
      {
          $userModel = new UserModel();
          $expected = [];
          $keyword = "sdf";
          $actual = $userModel->findUser($keyword);
          $this->assertEquals($expected, $actual);
      }
      //
      public function testFindUserNumberKey()
      {
          $userModel = new UserModel();
          $expected = false;
          $keyword = 113;
          $actual = $userModel->findUser($keyword);
          $this->assertEquals($expected, $actual);
      }
      //
      public function testFindUserByArrayKey()
      {
          $userModel = new UserModel();
          $expected = false;
          $keyword = [];
          $actual = $userModel->findUserById($keyword);
          $this->assertEquals($expected, $actual);
      }
      //
      public function testFindUserByObjectKey()
      {
          $userModel = new UserModel();
          $expected = false;
          $key = new stdClass;
          $actual = $userModel->findUser($key);
          $this->assertEquals($expected, $actual);
      }
      //
      public function testFindUserByBooleanKey()
      {
          $userModel = new UserModel();
          $expected = false;
          $key = true;
          $actual = $userModel->findUser($key);
          $this->assertEquals($expected, $actual);
      }
      //
      public function testFindUserByDoubleKey()
      {
          $userModel = new UserModel();
          $expected = false;
          $key = 1.11;
          $actual = $userModel->findUser($key);
          $this->assertEquals($expected, $actual);
      }
      public function testUpdateUserOK(){
        $userModel = new UserModel();
        $user = array(  
            'id' => 4,        
            'name' => 'dangduyhuy',
            'fullname' => 'DangDuyHuy',
            'email' => 'duyhuy@gmail.com',
            'type' => 'admin',
            'password' => md5('dangduyhuy')
        );         
        $expected = true;
        $actual = $userModel->updateUser($user);
        $this->assertEquals($actual, $expected);   
    }
    public function testUpdateUserNGNull(){
        $userModel = new UserModel();
        $user = array(
            'id' => '',        
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
    public function testUpdateUserSpecialCharactersNg(){
        $userModel = new UserModel();
        $pattern = '/[0-9A-Za-z]/';
        $user = array(
            'id' => 5,
            'name' => "@#$",
            'fullname' =>'DangDuyHuy',
            'email' => 'duyhuy@gmail.com',
            'type' => 'admin',
            'password' => md5('user3')
        );
        $userModel->updateUser($user);
        if(!preg_match($pattern, $user['name'])){  
            
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }   
    }
    public function testUpdateUserFloatNg(){
        $userModel = new UserModel();
        $user = array(
            'id' => 5,
            'name' => 2.5,
            'fullname' =>'DangDuyHuy',
            'email' => 'duyhuy@gmail.com',
            'type' => 'admin',
            'password' => md5('user3')
        );
        $userModel->updateUser($user);
        if(is_float($user['name']) || is_float($user['fullname']) || is_float($user['email']) || is_float($user['type']) || is_float($user['password'])){  
            
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }   
    }
    public function testUpdateUserBool(){
        $userModel = new UserModel();
        $user = array(
            'id' => 74,
            'name' => true,
            'fullname' =>false,
            'email' => 'duyhuy@gmail.com',
            'type' => 'admin',
            'password' => md5('user3')
        );
        $userModel->updateUser($user);
        if(is_bool($user['name']) || is_bool($user['fullname']) || is_bool($user['email']) || is_bool($user['type']) || is_bool($user['password'])){  
            
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }   
    }
}
