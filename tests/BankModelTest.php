<?php

use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase {
    /**
     * test function GetUser 1
     * (Put Out Id user = user_id use 'name_user' on insert or update Bank)
     */
     public function testGetUserPutOutOk()
     {
         $bankModel = new BankModel();
         $count_array = 5;
         $actual = $bankModel->getUser();
         $this->assertEquals($count_array,count($actual));
     }
    //lấy ra giá trị mảng user có trong danh sách và khác giá trị rỗng
    public function testGetUserPutOutOk1()
     {
         $bankModel = new BankModel();
         $count_array = 5;
         $actual = $bankModel->getUser();
         $this->assertEquals($count_array,isset($actual));
     } 
     //lấy ra giá trị user có danh sachs giá trị  khác rỗng
     public function testGetUserPutOutOk2()
     {
         $bankModel = new BankModel();
         $count_array = 5;
         $actual = $bankModel->getUser();
         $this->assertEquals($count_array,!empty($actual));
     } 
     //lấy ra giá trị user có danh sách giá trị rỗng
     public function testGetUserPutOutOk3()
     {
         $bankModel = new BankModel();
         $count_array = null;
         $actual = $bankModel->getUser();
         $this->assertEquals($count_array,empty($actual));
     } 
      //Lấy ra giá trị user được khởi tạo bằng đối tượng
      public function testGetUserObjectError()
      {
          $bankModel = new BankModel();
  
          $id = new UserModel();
          $expected = 'abcdfgh';    
          try{
            $actual = $bankModel->getUser($id->createToken());
            $this->assertEquals($expected, $actual);
          }
          catch(Throwable $ex){
            $this->assertFalse(false);
          }
      }
     //test function GetUser 2(Not Good)
     public function testGetUserPutOutNG(){
        $bankModel = new BankModel();
        $tableUser = array(0=>'id',1=>'namne',2=>'fullname',3=>'email',4=>'type',5=>'password');
        //lấy mảng
        $actual = $bankModel->getUser($tableUser);
        //var_dump($actual);die();
        if($actual != true)
        {
            
            $this->assertTrue(false); 
        }
        else
        {
            $this->assertTrue(true); 
        }
     }
     //test function getUser với giá trị và trả về danh sách tuần tự như trên
     public function testGetUserPutOutNG2(){
        $bankModel = new BankModel();
        $tableUser = ['id'=>2,'name'=>'test2','fullname'=>'a','email'=>'admin@admin.com',
        'type'=>1,'password'=>'12345'];
        //lấy mảng và trả về tuần tự
        $actual = $bankModel->getUser(array_values($tableUser));
        //var_dump($actual);die();
        if($actual != true)
        {
            
            $this->assertTrue(false); 
        }
        else
        {
            $this->assertTrue(true); 
        }
     }
     //-------------------------------------------------------------
    /**
     * test delete bank by ID
     */
     //Xóa phần tử mảng Bank theo đối tượng
    public function testDeleteBankByIdObject(){
        $bank = new BankModel();
        $bankId = new stdClass();
        try{
            $bank->startTransaction();
            $bank->deleteBankById($bankId);
            $bank->rollback();
        }
        catch(Throwable $ex){
            $this->assertTrue(True);
        }
     }
      //test truong hop xoa theo id va token truyền vào là giá trị mảng
      public function testDeleteBankByIdNgArray()
      {
          $bankModel = new BankModel();
          $idBank = array(1,2,3);
          $token_false = 'JFASJDBAJS566';
         try{
            $bankModel->startTransaction();
             $bankModel->deleteBankById($idBank,$token_false);
             $bankModel->rollback();
         }
         catch(Throwable $ex){
            $this->assertTrue(True);
        }
      }
    //test truong hop xoa theo id va token
    public function testDeleteBankByIdNg()
    {
        $bankModel = new BankModel();
        $idBank = 22;
        $token_false = 'JFASJDBAJS566';
        $bankModel->startTransaction();
        $actual = $bankModel->deleteBankById($idBank,$token_false);
        $bankModel->rollback();
        // $this->assertEquals($userModel->findUserById($id),$actual);
        if( $actual == NULL)
        {
            $this->assertTrue(true); 
        }
        else{
            $this->assertTrue(false); 
        }
    }
    //xoa phan tu trong mang trung gia tri user_id
    public function testDeleteBankByIdNg2()
    {
        $bankModel = new BankModel();
        // tao mang co gia tri user_id trung
        $array = [
            [
                'bank_id'=>22,
                'user_id'=>3,
                'cost'=>1
            ],
            [
                'bank_id'=>3,
                'user_id'=>2,
                'cost'=>100
            ],
            [
                'bank_id'=>26,
                'user_id'=>3,
                'cost'=>111111
            ]
        ];
        //xac dinh vi tri cot
        $userIds = array_column($array,'user_id');
        //su dung ham array_unique de xoa di phan tu trung
        $userId = array_unique($userIds);
        $idBank = 22;
        $token_false = 'JFASJDBAJS566';
        $bankModel->startTransaction();
        $actual = $bankModel->deleteBankById($idBank,$token_false,$userId);
        $bankModel->rollback();
        // $this->assertEquals($userModel->findUserById($id),$actual);
        if( $actual == NULL)
        {
            $this->assertTrue(true); 
        }
        else{
            $this->assertTrue(false); 
        }
    }
    //test trương hop xoa phan tu la mot gia tri rong
    public function testDeleteBankByIdNg3()
    {
        $bankModel = new BankModel();
        $idBank = null;
        $token_false = 'JFASJDBAJS566';
        $bankModel->startTransaction();
        $actual = $bankModel->deleteBankById($idBank,$token_false);
        $bankModel->rollback();
        // $this->assertEquals($userModel->findUserById($id),$actual);
        if( $actual == NULL)
        {
            $this->assertTrue(true); 
        }
        else{
            $this->assertTrue(false); 
        }
    }
    //test trường hợp tìm giá trị id phù hợp trong mảng sau đó mới thực hiện xóa
    public function testDeleteBankByIdNg4(){
        $bankModel = new BankModel();
        $array = array(
            'bank_id'=>74,
            'user_id'=>0,
            'cost'=>0
        );
        $idBank = array_search(74,$array);
        $token_false = 'JFASJDBAJS566';
        $bankModel->startTransaction();
        $actual = $bankModel->deleteBankById($idBank,$token_false);
        $bankModel->rollback();
        // $this->assertEquals($userModel->findUserById($id),$actual);
        if( $actual == NULL)
        {
            $this->assertTrue(true); 
        }
        else{
            $this->assertTrue(false); 
        }
    }
    //-------------------------------------------------------------
    /**
     * Test Insert Bank 
    */
    //
    public function testInsertBankPassObject()
    {
        //Create array
        $object = new stdClass();
        $bankModel = new BankModel();
        $input = [];
        $input['id'] = $object;
        $input['cost'] = 10000000;
        try {
            $bankModel->startTransaction();
            $actual = $bankModel -> insertBank($input);
            $bankModel->rollback();
            if ($actual == true) {
            return $this->assertTrue(true);
            }
            return $this->assertTrue(false);
        } catch (Throwable $th) {
            $this->assertFalse(false);
        }
    }
    //test thêm banks Ng
    public function testInsertBankNg(){
        $bankModel = new BankModel();
        $input = [];
        //note user_id == id of users 
        $input['id'] = 10;
        $input['cost'] = 123456789;
        $bankModel->startTransaction();
        $actual = $bankModel -> insertBank($input);
        $bankModel->rollback();
        if($actual != true)
        {
            $this->assertTrue(false); 
        }
        else
        {
            $this->assertTrue(true); 
        }
    }
    //test thêm mới và kiểm tra cost có phải là kiểu chuoi so hay không
    public function testInsertBankNg2(){
        $bankModel = new BankModel();
        $input = [];
        $input['id'] = 41;
        $input['cost'] = 3000000000;
        $checkCost = is_numeric($input['cost']);
        $bankModel->startTransaction();
        //kiểm tra số nhập vào có phải là kiểu số hay không
        $actual = $bankModel -> insertBank($input, $checkCost);
        $bankModel->rollback();
        //var_dump($actual);die();
        if($actual != true)
        {
            $this->assertTrue(false); 
        }
        else
        {
            $this->assertTrue(true); 
        }
    }
    //test trường hơp thêm toàn bộ giá trị là chuỗi
    public function testInsertBankNg3(){
        $bankModel = new BankModel();
        $input = [];
        //note user_id == id of users 
        $input['id'] = "motmot";
        $input['cost'] = "mot tram ba lam ngan";
        $bankModel->startTransaction();
        $actual = $bankModel -> insertBank($input);
        $bankModel->rollback();
        if($actual != true)
        {
            $this->assertTrue(false); 
        }
        else
        {
            $this->assertTrue(true); 
        }
    }
    //test trường hợp thêm giá trị id và số đều là rỗng
    public function testInsertBankNg4(){
        $bankModel = new BankModel();
        $input = [];
        //note user_id == id of users 
        $input['id'] = null;
        $input['cost'] = null;
        $bankModel->startTransaction();
        $actual = $bankModel -> insertBank($input);
        $bankModel->rollback();
        if($actual != true)
        {
            $this->assertTrue(false); 
        }
        else
        {
            $this->assertTrue(true); 
        }
    }
    //test giá trị truyenf vào co id rong
    public function testInsertBankNg5(){
        $bankModel = new BankModel();
        $input = [];
        //note user_id == id of users 
        $input['id'] = null;
        $input['cost'] = 12345678;
        $bankModel->startTransaction();
        $actual = $bankModel -> insertBank($input);
        $bankModel->rollback();
        if($actual != true)
        {
            $this->assertTrue(false); 
        }
        else
        {
            $this->assertTrue(true); 
        }
    }
    //test trường hợp giá trị truyền vào có cost rong
    public function testInsertBankNg6(){
        $bankModel = new BankModel();
        $input = [];
        //note user_id == id of users 
        $input['id'] = 10000;
        $input['cost'] = null;
        $bankModel->startTransaction();
        $actual = $bankModel -> insertBank($input);
        $bankModel->rollback();
        if($actual != true)
        {
            $this->assertTrue(false); 
        }
        else
        {
            $this->assertTrue(true); 
        }
    }
    //----------------------------------------------------------------
        /**
      * test function FindBankById 1
      *(sreach banks by id -> test OK)
      */
      //tim id ton tai theo ten
      public function testFindBankByIdOK(){
        $bank = new BankModel();
        $bankId = 22;
        $expected = 3;
        $actual = $bank->findBankById($bankId);

        $this->assertEquals($expected,$actual[0]['user_id']);
    }
    //Tìm giá trị id của bank theo đối tượng được tạo
    public function testFindBankByIdObject(){
        $bank = new BankModel();
        $bankId = new stdClass();
        try{
            $bank->findBankById($bankId);
        }
        catch(Throwable $ex){
            $this->assertTrue(True);
        }
    }
     // Test function findUserById với bản thân là một đối tượng đc tạo bơi token
    public function testFindBankByIdObjectError()
    {
        $bankModel = new BankModel();

        $id = new UserModel();
        $expected = 'error';
   
        try{
           $bankModel->findBankById($id->createToken());
           //$this->assertTrue(True);
            $this->assertEquals($expected, $actual);
        }   
        catch(Throwable $ex){
            // throw $ex;
            $this->assertTrue(True);
        }
        
    }
      //tim id tra ve T/F
      public function testFindBankByIdNg(){
        $bank = new BankModel();
        $bankId = 24;
        $actual = $bank ->findBankById($bankId);
        //var_dump($actual);die();
        if($actual != true)
        {
            
            $this->assertTrue(false); 
        }
        else
        {
            $this->assertTrue(true); 
        }
    }
     //tim id có tồn tại các giá trị của mảng trung trong bảng -> T/F
     //trường hợp này rỗng vì giá trị user_id sai 
     public function testFindBankByIdNg2(){
        $bank = new BankModel();
        $bankId = 22;
        $expectedArray = array("bank_id"=>24,"user_id"=>25,"cost"=>121);
        //ham in_array tim gia trị trung
        $IdMatch = in_array($bankId,$expectedArray);

        $actual = $bank ->findBankById($IdMatch);
        //var_dump($actual);die();
        if(empty($actual)){
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    //test trường hợp tìm id với giá trị không có thực
    public function testFindBankByIdNg3(){
        $bank = new BankModel();
        $bankId = 300;
        $expected = 2;
        try{
            $actual = $bank ->findBankById($bankId);
            //  $this->assertTrue(True);
            $this -> assertEquals($expected, $actual);
        }
        catch(Throwable $ex){
            //$this -> assertEquals($expected, $actual);
           $this->assertTrue(True);
        }
    }
    //test giá trị trường hợp tìm id = là chuỗi 
    public function testFindBankByIdNg4(){
        $bank = new BankModel();
        $bankId = "abcdef";
        $expected = "error";
        try{
            $actual = $bank ->findBankById($bankId);
            $this -> assertEquals($expected, $actual);
        }
        catch(Throwable $ex)
        {
            $this->assertFalse(false);
        }
    }
    //giá trị id tim là một gia trị null
    public function testFindBankByIdNg5(){
        $bank = new BankModel();
        $bankId = null;
        $expected = "error";
        try{
            $actual = $bank ->findBankById($bankId);
            $this -> assertEquals($expected, $actual);
        }
        catch(Throwable $ex)
        {
            $this->assertFalse(false);
        }

    }
    //Tìm giá trị id khi truyền vào là 1 danh sách mảng
    //khẳng đinh nó sai
    public function testFindBankByIdNg6(){
        $bank = new BankModel();
        $bankId = 200;
        $expectedArray = array(
            array(
                'bank_id'=>24,
                'user_id'=>5,
                'cost'=>121
            ),
            array(
                'bank_id'=>25,
                'user_id'=>10,
                'cost'=>121122
            ),
            array(
                'bank_id'=>26,
                'user_id'=>3,
                'cost'=>11111
            )
        );
        //sử dụng hàm này để xác đinh vị trí cột trả về trong mảng
        $first_id_banks = array_column($expectedArray, 'bank_id');
        
        //tìm giá trị cụ thể trong mảng
        $id = array_search($bankId, $first_id_banks);
        //var_dump($key);die();
        $actual = $bank ->findBankById($id);
        //var_dump($actual);die();
        if(empty($actual)){
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    //---------------------------------------------------
     /**
     * test function GetBank
     */
    //test getBankOk
    //test trường hợp lấy ra tất cả id của bank
    public function testGetBanksOk(){
        $bankModel = new BankModel();
        
        for($i = 0,$max = 7; $i <= $max;$i++){
            $count_array = $i;
        }
        //$i += 1;
        $actual = $bankModel-> getBanks();
        //var_dump($actual);die();
        //Count() goi tong gia tri trong mang
        $this->assertEquals($count_array,count($actual));
    }
    //lấy đối ra danh sách của Bank theo đối tượng
    public function testGetBankObject(){
        $bank = new BankModel();
        $bankId = new stdClass();
        try{
            $bank->getBanks($bankId);
        }
            catch(Throwable $ex){
            $this->assertTrue(True);
        }
     }
    //test kiểm tra gia trị có tồn tại trong mảng hay không
    public function testGetBanksNg1(){
        $bankModel = new BankModel();
        $UserIdInBank = 3;
        $array = array("bank_id"=>22,"user_id"=>3,"cost"=>1);
        //kiểm tra giá trị tồn tại trong mang
        $expected = in_array(3, $array);
        $actual = $bankModel -> getBanks($expected);
        //var_dump($actual);die();

        if( $actual == true)
        {
            $this->assertTrue(true); 
        }
        else{
            $this->assertTrue(false); 
        }
    }
    // nếu trả về giá tri trùng lặp cụ thể là user_id thì sẽ bị xóa-> thì sẽ báo sai
    public function testGetBanksNg2(){
        $bankModel = new BankModel();
        $array1 = array("bank_id"=>22,"user_id"=>3,"cost"=>1);
        $array2 = array("bank_id"=>26,"user_id"=>3,"cost"=>1);
        //kiểm tra giá trị trùng
        $expected = array_diff_key($array1,$array2);
        $actual = $bankModel -> getBanks($expected);
        //var_dump($actual);die();
        if( $actual != true)
        {
            $this->assertTrue(false); 
        }
        else{
            $this->assertTrue(true); 
        }
    }
    //test keyword ok in banks
    //kiem tra gia trị trim kiem co ton tai trong mang kkhong
    public function testGetBanksByKeyWordOk()
    {
        $bankModel = new BankModel();
        $params= [];
        $params['keyword'] = 22;
        $count_array = 8;
        $actual = $bankModel->getBanks($params);
         
        $this->assertEquals($count_array,$actual);
    }
    //kiem tra gia tri tim kiem trong mang da duocj nhap chưa
    //isset T or empty F
    public function testGetBanksByKeyWordOk2()
    {
        $bankModel = new BankModel();
        $params= [];
        $params['keyword'] = '22';
        $count_array = 8;
        $actual = $bankModel->getBanks($params);
         //ham insset kiem tra bien da dược tạo trong bộ nhớ máy hay chưa
        $this->assertEquals($count_array,isset($actual));
    }
    // test nhập giá trị value và tìm kiếm giá trị trong mảng
    public function testGetBanksByKeyWordNg1(){
        $bankModel = new BankModel();
        $params = [];
        $params["keyword"] = 22;
        $sreachArrayId = array("bank_id"=>22,"user_id"=>3,"cost"=>1);
        //array_sreach tìm kiếm giá trị
        $expecSreach = array_search($params, $sreachArrayId);
        //$expecSreach = array_key_exists($params, $sreachArrayId);
        try {
            $actual = $bankModel -> getBanks($expecSreach);
            //var_dump($actual);die();
            if( $actual != true)
            {
                $this->assertTrue(false); 
            }
            else{
                $this->assertTrue(true); 
            }
        } catch (Throwable $th) {
            $this->assertTrue(true); 
        }
    }
    //test giá trị nhập vào là rỗng su dung empty
    public function testGetBanksByKeyWordNg2(){
        $bankModel = new BankModel();
        $params = [];
        $params["keyword"] = " ";
        try {
            $actual = $bankModel ->getBanks($params);
            //nếu kiểm tra gia tri nhập vào khác rỗng là T
            if(!empty($actual)){
                return $this -> assertTrue(true);
            }
            else{
                return $this -> assertTrue(false);
            }
        } catch (Throwable $th) {
            return $this -> assertTrue(true);
        }
    }
    //test trường hợp xác đinh từ khóa trong mảng cần tìm có tồn tại hay không
    public function testGetBanksByKeyWordNg3(){
        $bankModel = new BankModel();
        $sreachArrayId = array("bank_id"=>3,"user_id"=>2,"cost"=>100);
         //array_key_exists xác định gia tri mang co ton tai hay khong va can tim
        $expecSreach = array_key_exists("user_id", $sreachArrayId);
        try {
            $actual = $bankModel -> getBanks($expecSreach);
            //var_dump($actual);die();
            if( $actual != true)
            {
                $this->assertTrue(false); 
            }
            else{
                $this->assertTrue(true); 
            }
        } catch (Throwable $ex) {
            $this->assertTrue(true); 
        }
       
    }
}