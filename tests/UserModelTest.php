<?php
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    /**
     * Hieu
     * test funtion : finUserById
     */
     #test OK
     public function testFindUserByIdOk()
     {
         $user = new UserModel();
         $userId = 2;
 
         $expected = "test2211";
         $actual = $user->findUserById($userId);
         $this->assertEquals($expected, $actual[0]['name']);
     }

     #test id float
    public function testFindUserByIdFloat()
    {
        $userModel = new UserModel();
        $id = 11.5;

        $actual = $userModel->findUserById($id);
        $expected = [];
        $this->assertEquals($expected, $actual);
    }
    #test string
    public function testFindUserByIdString()
    {
        $userModel = new UserModel();
        $id = 'asdfcxcx';

        $actual = $userModel->findUserById($id);
        $expected = [];
        $this->assertEquals($expected, $actual);
    }
    #test null
    public function testFindUserByIdNull()
    {
        $userModel = new UserModel();

        $id = null;

        $actual = $userModel->findUserById($id);
        $expected = [];
        $this->assertEquals($expected, $actual);
    }
    #test array 
    public function testFindUserByIdArray()
    {
        $userModel = new UserModel();

        $id = [
            'name', 'email'
        ];

        $actual = $userModel->findUserById($id);
        if($actual != null){
            $this->assertTrue(false);
        }
        else{
            $this->assertTrue(true);
        }
    }
    #test Object
    public function testFindUserByIdObject()
    {
        $userModel = new UserModel();

        $id = new BankModel();

        $actual = $userModel->findUserById($id);
        if($actual != null){
            $this->assertTrue(false);
        }
        else{
            $this->assertTrue(true);
        }
    }

    /**
     * Hieu
     * test funtion : findUser
     */
    #test ok
    public function testFindUsersOk()
    {
        $user = new UserModel();
        $keys = "a";
        $actual = $user->findUser($keys);
        if (empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    #Swith key
    public function testFindUserSr()
    {
        $user = new UserModel();
        $keys = "45125215sad";

        $actual = $user->findUser($keys);
        if (empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    #test float
    public function testFindUserKeyFloat()
    {
        $user = new UserModel();
        $keys = 11.4;

        $actual = $user->findUser($keys);
        if (empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    #test array
    public function testFindUserArray()
    {
        $user = new UserModel();
        $keys = [1];

        $actual = $user->findUser($keys);
        if (empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    #test null
    public function testFindUserNull()
    {
        $user = new UserModel();
        $keys = null;

        $actual = $user->findUser($keys);
        if (empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    #test number
    public function testFindUserNumber()
    {
        $user = new UserModel();
        $keys = 123;

        $actual = $user->findUser($keys);
        if (empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    #test Object
    public function testFindUserObject()
    {
        $user = new UserModel();
        $keys = new BankModel();

        $actual = $user->findUser($keys);

        if (empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    /**
     * Hieu
     * test funtion : getInstance
     */
    #test ok
    public function testGetInstance()
    {
        $user = new UserModel();
        $actual = $user->getInstance();
        if ($user == $actual) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    #test change
    public function testGetInstanceChange()
    {
        $user = new UserModel();
        $user2 = new UserModel();
        $actual = $user2->getInstance();
        if ($user == $actual) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
        
    }

    /**
     * Hieu
     * test funtion : auth
     */
    #test OK
    public function testAuthOk()
    {
        $user = new UserModel();
        $name = "test2211";
        $pass = "1111";

        $actual = $user->auth($name, $pass);

        if ($actual == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
     #test erro name
     public function testAuthNameEr()
     {
         $user = new UserModel();
         $name = "test22";
         $pass = "1111";
 
         $actual = $user->auth($name, $pass);
         $expected = false;
         $this->assertEquals($expected, $actual);
     }
     #test erro pass
    public function testAuthPassEr()
    {
        $user = new UserModel();
        $name = "test2211";
        $pass = "1234";
        $actual = $user->auth($name, $pass);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }
     #test name number
     public function testAuthNameNumber()
     {
         $user = new UserModel();
         $name = 123;
         $pass = "1111";
         $actual = $user->auth($name, $pass);
         $expected = false;
         $this->assertEquals($expected, $actual);
     }
     #test pass number
     public function testAuthPassNumber()
     {
         $user = new UserModel();
         $name = "test2211";
         $pass = 1111;
         $actual = $user->auth($name, $pass);
         $expected = false;
         $this->assertEquals($expected, $actual);
     }
     #test  name float
    public function testAuthNameFloat()
    {
        $user = new UserModel();
        $name = 12.2;
        $pass = "1111";
        $actual = $user->auth($name, $pass);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    #test  pass float
    public function testAuthPassFloat()
    {
        $user = new UserModel();
        $name = "test2211";
        $pass = 1111.2;
        $actual = $user->auth($name, $pass);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    #test name null
    public function testAuthNameNull()
    {
        $user = new UserModel();
        $name = null;
        $pass = "1111";
        $actual = $user->auth($name, $pass);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    #test pass null
    public function testAuthPassNull()
    {
        $user = new UserModel();
        $name = "test1";
        $pass = null;
        $actual = $user->auth($name, $pass);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    #test array name
    public function testAuthNameArray()
    {
        $user = new UserModel();
        $name = ['test2211'];
        $pass = '1111';
        $actual = $user->auth($name, $pass);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    #test array pass name
    public function testAuthNaPaArray()
    {
        $user = new UserModel();
        $name = ['test2211'];
        $pass = ['1111'];
        $actual = $user->auth($name, $pass);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    #test array pass
    public function testAuthPassArray()
    {
        $user = new UserModel();
        $name = 'test2211';
        $pass = ['1111'];
        $actual = $user->auth($name, $pass);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    #test with name object
    public function testAuthNameObject()
    {
        $user = new UserModel();
        $name = new BankModel();
        $pass = '1111';
        $actual = $user->auth($name, $pass);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    #test with pass object
    public function testAuthPassObject()
    {
        $user = new UserModel();
        $name = 'test2211';
        $pass = new BankModel();

        $actual = $user->auth($name, $pass);

        $expected = false;
        $this->assertEquals($expected, $actual);
    }






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
    public function testDeleteUserByidstrTF(){
        $userModel = new UserModel();
        $id = 'sdsad';
        $user =$userModel->deleteUserById($id);
        if($user != 'error'){
            $this->assertTrue(false);
        }else{
            $this->assertTrue(true);
        }
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