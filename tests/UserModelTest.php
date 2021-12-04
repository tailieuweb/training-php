<?php
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    /*
     Hoang
      Delete usermodel
    */
    
    public function testDeleteUserByidstr(){
        $userModel = new UserModel();
        $id = 'sdsad';
        $expected = 'error';
        $actual =$userModel->deleteUserById($id);
        $this->assertEquals($expected,$actual);
    }
    public function testDeleteUserByidFloat(){
        $userModel = new UserModel();
        $id = 1.2;
        $expected = 'error';
        $actual =$userModel->deleteUserById($id);
        $this->assertEquals($expected,$actual);
    }

    public function testDeleteUserByidObject(){
        $userModel = new UserModel();
        $id = new stdClass();
        $expected = 'error';
        $actual =$userModel->deleteUserById($id);
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteUserByidArray(){
        $userModel = new UserModel();
        $id = [1,2];
        $expected = 'error';
        $actual =$userModel->deleteUserById($id);
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteUserByidNotID(){
        $userModel = new UserModel();
        $id = 99;
        $user =$userModel->deleteUserById($id);
        if($user != 'error!Không có đối tượng!!!'){
            $this->assertTrue(false);
        }else{
            $this->assertTrue(true);
        }
    }
    public function testDeleteUserByidNull(){
        $userModel = new UserModel();
        $id = null;
        $expected = 'error';
        $actual =$userModel->deleteUserById($id);
        $this->assertEquals($expected, $actual);
    }
    /*
    Update
    */
    public function testUpdateUserOk(){
        $user = new UserModel();
        $input = [];
        $input['id'] = 2;
        $input['name'] = "test2211";
        $input['email'] = "viet@gmail.com";
        $input['password'] = "d41d8cd98f00b204e9800998ecf8427e";
        $actual = $user->updateUser($input);
        if($actual == true){
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testUpdateUserIdNotExist(){
        $userModel = new UserModel();
        $input['id'] = 999;
        $input['name'] = "Test update";
        $input['email'] = "testUpdate@gmail.com";
        $input['password'] = "12345";
        $user =$userModel->updateUser($input);
        if($user != 'error!Không dc truyền đối tượng chuỗi'){
            $this->assertTrue(false);
        }else{
            $this->assertTrue(true);
        }
    }
    public function testupdateUserStr(){
        $userModel = new UserModel();
        $input['id'] = '12d';
        $user =$userModel->updateUser($input);
        if($user != 'error!Không dc truyền đối tượng chuỗi'){
            $this->assertTrue(false);
        }else{
            $this->assertTrue(true);
        }
    }
    public function testupdateUserNotIntID(){
        $userModel = new UserModel();
        $input['id'] = 1.3;
        $expected ='error!Không dc truyền đối tượng chuỗi';
        $actual =$userModel->updateUser($input);
        $this->assertEquals($expected,$actual);
    }
    public function testupdateUserObjectID(){
        $userModel = new UserModel();
        $input['id'] = new stdClass;
        $expected ="error!Không dc truyền đối tượng chuỗi";
        $actual =$userModel->updateUser($input);
        $this->assertEquals($expected,$actual);
   
    }
    public function testupdateUserArrayID(){
        $userModel = new UserModel();
        $input = [];
        $input['id'] = [1,2];
        $input['name'] = 'test2211';
        $input['email'] = 'viet@gmail.com';
        $input['password'] = "74be16979710d4c4e7c6647856088456";
        $expected ="error!Không dc truyền đối tượng chuỗi";
        $actual =$userModel->updateUser($input);
        $this->assertEquals($expected,$actual);
    }
    public function testupdateUserNull(){
        $userModel = new UserModel();
        $input['id'] =  null;
        $input['name'] = null;
        $input['email'] =null;
        $input['password'] = null;
        $expected ="error!Không dc truyền đối tượng chuỗi";
        $actual = $userModel->updateUser($input);
        $this->assertEquals($expected,$actual);
    }
    public function testupdateUserNullID(){
        $userModel = new UserModel();
        $input['id'] =  null;
        $input['name'] = 'test2211';
        $input['email'] = 'viet@gmail.com';
        $input['password'] = "74be16979710d4c4e7c6647856088456";
        $expected ="error!Không dc truyền đối tượng chuỗi";
        $actual = $userModel->updateUser($input);
        $this->assertEquals($expected,$actual);
    }
    public function testupdateUserNullname(){
        $userModel = new UserModel();
        $input['id'] =  2;
        $input['name'] = null;
        $input['email'] = 'viet@gmail.com';
        $input['password'] = "74be16979710d4c4e7c6647856088456";
        $user =$userModel->updateUser($input);
        if($user != 'error!dữ liệu sai'){
            $this->assertTrue(false);
        }else{
            $this->assertTrue(true);
        }
    }
    public function testupdateUserNullemail(){
        $userModel = new UserModel();
        $input['id'] =  2;
        $input['name'] = 'test2211';
        $input['email'] = null;
        $input['password'] = "74be16979710d4c4e7c6647856088456";
        $user =$userModel->updateUser($input);
        if($user != 'error!dữ liệu sai'){
            $this->assertTrue(false);
        }else{
            $this->assertTrue(true);
        }
    }
    public function testupdateUserNullpass(){
        $userModel = new UserModel();
        $input['id'] =  2;
        $input['name'] = 'test2211';
        $input['email'] = 'viet@gmail.com';
        $input['password'] = null;
        $user =$userModel->updateUser($input);
        if($user != 'error!dữ liệu sai'){
            $this->assertTrue(false);
        }else{
            $this->assertTrue(true);
        }
    } 
    /*
    Insert
    */
    public function testInsertUserOk(){
        $userModel = new UserModel();
        $user = array(
            'name' => 'abc',
            'email' => 'hhhhh@gmail.com',
            'password' => '123456'
        );
        $actual = $userModel->insertUser($user);
        if (!empty($actual)) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    public function testinsertUserNullname(){
        $userModel = new UserModel();
        $input['name'] = null;
        $input['password'] = 'aa';
        $input['email'] = 'aa@gmail.com';
       $expected = 'error!Không phải dữ liệu';
       $actual = $userModel->insertUser($input);
       $this->assertEquals($expected, $actual);
    }
    public function testinsertUserNullPass(){
        $userModel = new UserModel();
        $input['name'] = 'asd';
        $input['password'] = null;
        $input['email'] = 'aa@gmail.com';
        $expected = 'error!Không phải dữ liệu';
        $actual = $userModel->insertUser($input);
        $this->assertEquals($expected, $actual);
    }
    public function testinsertUserNullemail(){
        $userModel = new UserModel();
        $input['name'] = 'asd';
        $input['password'] = 'aa';
        $input['email'] = null;
        $expected = 'error!Không phải dữ liệu';
        $actual = $userModel->insertUser($input);
        $this->assertEquals($expected, $actual);
    }
    public function testInsertUserArrayName(){
        $userModel = new UserModel();
        $input['name'] = ['ha,hoang'];
        $input['password'] = 'aa';
        $input['email'] = 'aa@gmail.com';
        $expected = 'error!Không phải dữ liệu';
        $actual = $userModel->insertUser($input);
        $this->assertEquals($expected, $actual);
    }
    public function testInsertUserArrayEmail(){
        $userModel = new UserModel();
        $input['name'] = 'ha';
        $input['password'] = 'aa';
        $input['email'] = ['ha,hoang'];
        $expected = 'error!Không phải dữ liệu';
        $actual = $userModel->insertUser($input);
        $this->assertEquals($expected, $actual);
    }
    public function testInsertUserArrayPass(){
        $userModel = new UserModel();
        $input['name'] = 'as' ;
        $input['password'] = ['ha,hoang'];
        $input['email'] = 'aa@gmail.com';
        $user =$userModel->insertUser($input);
        if($user != 'error!Không phải dữ liệu'){
            $this->assertTrue(false);
        }else{
            $this->assertTrue(true);
        }
    }
    public function testInsertUserIntName(){
        $userModel = new UserModel();
        $input['name'] =  2;
        $input['password'] = 'as';
        $input['email'] = "hoangq@gmail.com";
        $expected = 'error!Không phải dữ liệu';
        $actual = $userModel->insertUser($input);
        $this->assertEquals($expected, $actual);
    }
    public function testInsertUserIntPass(){
        $userModel = new UserModel();
        $input['name'] = 'as' ;
        $input['password'] = 1;
        $input['email'] = "hoangq@gmail.com";
        $expected = 'error!Không phải dữ liệu';
        $actual = $userModel->insertUser($input);
        $this->assertEquals($expected, $actual);
    }
    public function testInsertUserIntEmail(){
        $userModel = new UserModel();
        $input['name'] =  'ss';
        $input['password'] = 'as';
        $input['email'] = 1.2;
        $expected = 'error!Không phải dữ liệu';
        $actual = $userModel->insertUser($input);
        $this->assertEquals($expected, $actual);
    }
    public function testInsertUserFloatName(){
        $userModel = new UserModel();
        $input['name'] =  2.2;
        $input['password'] = 'as';
        $input['email'] = "hoangq@gmail.com";
        $expected = 'error!Không phải dữ liệu';
        $actual = $userModel->insertUser($input);
        $this->assertEquals($expected, $actual);
    }
    public function testInsertUserFloatPass(){
        $userModel = new UserModel();
        $input['name'] = 'as' ;
        $input['password'] = 1.21;
        $input['email'] = "hoangq@gmail.com";
        $expected = 'error!Không phải dữ liệu';
        $actual = $userModel->insertUser($input);
        $this->assertEquals($expected, $actual);
    }
    public function testInsertUserFloatEmail(){
        $userModel = new UserModel();
        $input['name'] =  'ss';
        $input['password'] = 'as';
        $input['email'] = 1.22;
        $expected = 'error!Không phải dữ liệu';
        $actual = $userModel->insertUser($input);
        $this->assertEquals($expected, $actual);
    }
    public function testInsertUserObjectName(){
        $userModel = new UserModel();
        $input['name'] = new stdClass();
        $input['password'] = 'as';
        $input['email'] = "hoangq@gmail.com";
        $expected = 'error!Không phải dữ liệu';
        $actual = $userModel->insertUser($input);
        $this->assertEquals($expected, $actual);
    }
    public function testInsertUserObjectPass(){
        $userModel = new UserModel();
        $input['name'] = 'as' ;
        $input['password'] =  new stdClass();
        $input['email'] = "hoangq@gmail.com";
        $expected = 'error!Không phải dữ liệu';
        $actual = $userModel->insertUser($input);
        $this->assertEquals($expected, $actual);
    }
    public function testInsertUserObjectEmail(){
        $userModel = new UserModel();
        $input['name'] =  'ss';
        $input['password'] = 'as';
        $input['email'] =  new stdClass();
        $expected = 'error!Không phải dữ liệu';
        $actual = $userModel->insertUser($input);
        $this->assertEquals($expected, $actual);
    }
    /*
    getUsers
    */
    /* =================== Kiểm tra có bao nhiêu đối tượng trong mảng ========================= */
    public function testGetUserOk(){
        $userModel = new UserModel();
        $count_array = 5;
        $actual = $userModel->getUsers();
        if(count($actual) != $count_array){
            $this->assertTrue(false);
        }else{
            $this->assertTrue(true);
        }
    }
    /* =================== Test hàm getUser khi có dữ liệu truyền vào  OK ========================= */
    public function testgetUsersParamOk()
    {
        $userModel = new UserModel();

        $keyword = array(
            'keyword' => 'aa',
        );
        $actual = $userModel->getUsers($keyword);

        if ($actual != []) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    public function testgetUsersParamIsNullOK()
    {
        $userModel = new UserModel();
        $keyword = array(
            'keyword' => null,
        );
        $actual = $userModel->getUsers($keyword);
        if ($actual != []) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    // tim kiem voi gia tri so
    public function testgetUsersParamIsInteger()
    {
        $userModel = new UserModel();
        $keyword = array(
            'keyword' => 1,
        );
        $actual = $userModel->getUsers($keyword);
    
        if ($actual != []) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    
}