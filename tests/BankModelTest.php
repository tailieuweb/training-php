<?php

use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    /**
     * Test case  findBankById OK
     */
    public function testFindBankByIdOk()
    {
        $bankModel = new BankModel();
        $bankId = 2;
        $cost = 11;

        $bank = $bankModel->findBankById($bankId);
        $actual = $bank[0]['cost'];

        $this->assertEquals($cost, $actual);
    }

    /**
     * Test case findUserById Not good
     */
    public function testFindBankByIdNg()
    {
        $bankModel = new BankModel();
        $bankId = 9999;
        $expected = null;

        $bank = $bankModel->findBankById($bankId);

        if (empty($bank)) {
            $this->assertTrue(true);
        } else {
            $this->assertFalse(false);
        }
    }

    /**
     * Test case findUserById String
     */
    public function testFindBankByIdStr()
    {
        $bankModel = new BankModel();

        $id = 'abc';


        $expected = 'error';
        $actual = $bankModel->findBankById($id);

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case findUserById Null
     */
    public function testFindBankByIdNull()
    {
        $bankModel = new BankModel();
        $id = '';
        $expected = 'error';
        $actual = $bankModel->findBankById($id);

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case findUserById Object
     */
    public function testFindBankByIdObject()
    {
        $bankModel = new BankModel();

        $id = new stdClass();
        $expected = 'error';
        $actual = $bankModel->findBankById($id);

        $this->assertEquals($expected, $actual);
    }
    //---------------------------------------------------
    /**
     * test function GetBank
     */
    //test getBankOk
    //test trường hợp lấy ra tất cả id của bank
    public function testGetBanksOk(){
        $bankModel = new BankModel();
        
        for($i = 0,$max = 4; $i <= $max;$i++){
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
        $array = array("id"=>22,"user_id"=>3,"cost"=>1);
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
        $array1 = array("id"=>22,"user_id"=>3,"cost"=>1);
        $array2 = array("id"=>26,"user_id"=>3,"cost"=>1);
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
        $sreachArrayId = array("id"=>22,"user_id"=>3,"cost"=>1);
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
        $sreachArrayId = array("id"=>3,"user_id"=>2,"cost"=>100);
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
    //---------------------------------------------------
    /**
     * Test function UpdateBanks
     */
    /*updateBankNG1 */
    public function testUpdateBankNG1()
    {
        $bankModel = new BankModel();
        // $idbank = 3;

        $input = [];
        $input['id'] = 3;
        //note user_id == id of users 
        $input['user_id'] = 2;
        $input['cost'] = 123456789;
        $actual = $bankModel->updateBank($input);
        if ($actual != true) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    /*updateBankNG2 */
    public function testUpdateBankNG2()
    {
        $bankModel = new BankModel();
        $input = array("id" => 1, "user_id" => 1, "cost" => 2222);
        $input["user_id"] = 654321;

        $actual = $bankModel->updateBank($input);
        if ($actual != true) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    /*updateBankNG3 */
    /*cost co phai la so hay khong*/
    public function testUpdateBankNG3()
    {
        $bankModel = new BankModel();
        $input = array("id" => 2, "user_id" => 1, "cost" => 11111);
        $input["cost"] = 654321;
        $checkCost = is_numeric($input['cost']);

        $actual = $bankModel->updateBank($input, $checkCost);
        if ($actual != true) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    /*updateBankNG4 */
    /*Cap nhat gia tri vao mot mang vs vi tri tu chon  */
    public function testUpdateBankNG4()
    {
        $bankModel = new BankModel();
        $input = array("id" => 19, "user_id" => 40, "cost" => 11111);
        $input["cost"] = 654321;
        $valueFill = array_fill(3, 1, $input["cost"]);

        $actual = $bankModel->updateBank($input, $valueFill);
        if ($actual != true) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    /*updateNG5*/
    /*cập nhật gái trị id thành giá trị rỗng */
    public function testUpdateBankNG5() {
        $bank = new BankModel();
        $input = [];
        $input['id'] = null;
        $input['user_id'] = 2;
        $input['cost'] = 544;
        $actual = $bank->updateBank($input);

        // var_dump($actual);die();
        if ($actual == true) {
            return $this->assertFalse(true);
        }
        return $this->assertFalse(false);
		  
	}
    /*cập nhật userId có giá trị rỗng */

    public function testUpdateBankNG6() {
        $bank = new BankModel();
        $input = [];
        $input['id'] = 3 ;
        $input['user_id'] = null ;
        $input['cost'] = 88888;
        $actual = $bank->updateBank($input);

        // var_dump($actual);die();
        if ($actual == true) {
            return $this->assertFalse(true);
        }
        return $this->assertFalse(false);
		  
	}
    /*cập nhật giá trị cost null */
    public function testUpdateBankNG7() {
        $bank = new BankModel();
        $input = [];
        $input['id'] = 3 ;
        $input['user_id'] = 2 ;
        $input['cost'] = null;
        $actual = $bank->updateBank($input);

        // var_dump($actual);die();
        if ($actual == true) {
            return $this->assertFalse(true);
        }
        return $this->assertFalse(false);
		  
	}
    /*cả 3 đều rỗng */
    public function testUpdateBankNG8() {
        $bank = new BankModel();
        $input = [];
        $input['id'] = null ;
        $input['user_id'] = null ;
        $input['cost'] = null;
        $actual = $bank->updateBank($input);

        // var_dump($actual);die();
        if ($actual == true) {
            return $this->assertFalse(true);
        }
        return $this->assertFalse(false);
		  
	}
    /*câp nhật vs giá trị mảng truyền vào là chuỗi */
    public function testUpdateBankNG9() {
        $bank = new BankModel();
        $input = [];
        $input['id'] = 'null' ;
        $input['user_id'] = 'null' ;
        $input['cost'] = 'null';
        $actual = $bank->updateBank($input);

        // var_dump($actual);die();
        if ($actual == true) {
            return $this->assertFalse(true);
        }
        return $this->assertFalse(false);
		  
	}
}
