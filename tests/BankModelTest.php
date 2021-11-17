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
         $count_array = 6;
         $actual = $bankModel->getUser();
         $this->assertEquals($count_array,count($actual));
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
    /**
     * test delete bank by ID
     */
    //test truong hop xoa theo id va token
    public function testDeleteBankByIdNg()
    {
        $bankModel = new BankModel();
        $idBank = 22;
        $token_false = 'JFASJDBAJS566';
       
        $actual = $bankModel->deleteBankById($idBank,$token_false);
       
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
       
        $actual = $bankModel->deleteBankById($idBank,$token_false,$userId);
       
        // $this->assertEquals($userModel->findUserById($id),$actual);
        if( $actual == NULL)
        {
            $this->assertTrue(true); 
        }
        else{
            $this->assertTrue(false); 
        }
    }
    /**
     * Test Insert Bank 
    */
    //test thêm banks Ng
    public function testInsertBankNg(){
        $bankModel = new BankModel();
        $input = [];
        //note user_id == id of users 
        $input['id'] = 10;
        $input['cost'] = 123456789;
        $actual = $bankModel -> insertBank($input);
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
    // public function testInsertBankNg2(){
    //     $bankModel = new BankModel();
    //     $input = [];
    //     $input['id'] = 41;
    //     $input['cost'] = 3000000000;
    //     $checkCost = is_numeric($input['cost']);
    //     //kiểm tra số nhập vào có phải là kiểu số hay không
    //      $actual = $bankModel -> insertBank($input, $checkCost);
    //     //var_dump($actual);die();
    //     if($actual != true)
    //     {
    //         $this->assertTrue(false); 
    //     }
    //     else
    //     {
    //         $this->assertTrue(true); 
    //     }
    // }
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
      //tim id tra ve T/F
      public function testFindBankByIdNg(){
        $bank = new BankModel();
        $bankId = 22;
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
     public function testFindBankByIdNg2(){
        $bank = new BankModel();
        $bankId = 22;
        $expectedArray = array(0=>'24',1=>'25',3=>'121');
        //ham in_array tim gia trị trung
        $IdMatch = in_array($bankId,$expectedArray);

        $actual = $bank ->findBankById($IdMatch);
        //var_dump($actual);die();
        if(empty($actual)){
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
     /**
     * test function GetBank
     */
    //test getBankOk
    //test trường hợp lấy ra tất cả id của bank
    public function testGetBanksOk(){
        $bankModel = new BankModel();
        
        for($i = 0,$max = 8; $i <= $max;$i++){
            $count_array = $i;
        }
        //$i += 1;
        $actual = $bankModel-> getBanks();
        //var_dump($actual);die();
        //Count() goi tong gia tri trong mang
        $this->assertEquals($count_array,count($actual));
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
    // public function testGetBanksByKeyWordOk2()
    // {
    //     $bankModel = new BankModel();
    //     $params= [];
    //     $params['keyword'] = '123';
    //     $count_array = 8;
    //     $actual = $bankModel->getBanks($params);
    //      //ham insset kiem tra bien da dược tạo trong bộ nhớ máy hay chưa
    //     $this->assertEquals($count_array,isset($actual));
    // }
    // test nhập giá trị value và tìm kiếm giá trị trong mảng
    public function testGetBanksByKeyWordNg1(){
        $bankModel = new BankModel();
        $params = [];
        $params["keyword"] = 22;
        $sreachArrayId = array("bank_id"=>22,"user_id"=>3,"cost"=>1);
        //array_sreach tìm kiếm giá trị
        $expecSreach = array_search($params, $sreachArrayId);
        //$expecSreach = array_key_exists($params, $sreachArrayId);
        $actual = $bankModel -> getBanks($expecSreach);
        //var_dump($actual);die();
        if( $actual != true)
        {
            $this->assertTrue(false); 
        }
        else{
            $this->assertTrue(true); 
        }
    }
    //test giá trị nhập vào là rỗng su dung empty
    public function testGetBanksByKeyWordNg2(){
        $bankModel = new BankModel();
        $params = [];
        $params["keyword"] = "";
        $actual = $bankModel ->getBanks($params);
        //nếu kiểm tra gia tri nhập vào khác rỗng là T
        if(!empty($actual)){
            return $this -> assertTrue(true);
        }
        else{
            return $this -> assertTrue(false);
        }
    }
    //test trường hợp xác đinh từ khóa trong mảng cần tìm có tồn tại hay không
    public function testGetBanksByKeyWordNg3(){
        $bankModel = new BankModel();
        $sreachArrayId = array("bank_id"=>3,"user_id"=>2,"cost"=>100);
        //array_key_exists xác định gia tri mang co ton tai hay khong va can tim
        $expecSreach = array_key_exists("user_id", $sreachArrayId);
        $actual = $bankModel -> getBanks($expecSreach);
        //var_dump($actual);die();
        if( $actual != true)
        {
            $this->assertTrue(false); 
        }
        else{
            $this->assertTrue(true); 
        }
    }
}