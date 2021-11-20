<?php
use PHPUnit\Framework\TestCase;

class GetUserByIdNewTest extends TestCase
{
    // Function insertUser : thêm người dùng.
    /**
     * Test case Ok
     */
    public function testInsertUserAndBanksOk()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        
        //Truyền đúng id mới nhất của danh sách users
        $user = 212;
        $params = array(
            'user_id' => $user,
        );
        //Ket qua biet truoc:
        $expected = 1;
        //Ket qua mong doi:
        $actual = $bankModel->insertUserAndBanks($params);
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
    }
     /**
     * Test case Not Good
     */
    public function testInsertUserAndBanksNg()
    {
        $bankModel = new BankModel();
        
       
        $params = array(
            'user_id' => 2000,
            'cost' => 0,
        );
        //Ket qua biet truoc:
        $expected = 0;
        //Ket qua mong doi:
        if(!empty($params['cost'])) {
            $actual = $bankModel->insertUserAndBanks($params);
        }
        
        //var_dump($actual);die();
        if(!empty($actual)){
            $this->assertTrue(false);
        }else{
            $this->assertTrue(true);
        }
    }
   /**
     * Add user with database null
     * Test case Not Insert null
     */
    
    public function testInsertUserAndBanksIsNull()
    {
        $bankModel = new BankModel();
        
        
        $params = array(
            'user_id' => Null,
            'cost' => 0,
        );
        //Ket qua biet truoc:
        $expected = 1;
        //Ket qua mong doi:
        if($params['user_id'] == null) {
            $actual = 1;
        }else {
            $actual = $bankModel->insertUserAndBanks($params);
        }
        //var_dump($actual);die();
        $this->assertEquals($expected, $actual);
    }
     
    /**
     * Test case user Not EmtyString
     */
    public function testInsertUserAndBanksIsEmptyString()
    {
        $bankModel = new BankModel();
        
        
        $params = array(
            'user_id' => '',
            'cost' => 0,
        );
        //Ket qua biet truoc:
        $expected = 1;
        //Ket qua mong doi:
        if($params['user_id'] == '') {
            $actual = 1;
        }else {
            $actual = $bankModel->insertUserAndBanks($params);
        }
        //var_dump($actual);die();
        $this->assertEquals($expected, $actual);
    }
     /**
     * Test case user with database not object value:
     */
    public function testInsertUserAndBanksIsObject()
    {
        $bankModel = new BankModel();
        
        $obj = new UserModel();
        $params = array(
            'user_id' => $obj,
            'cost' => 0,
        );
        //Ket qua biet truoc:
        $expected = 1;
        //Ket qua mong doi:
        if($params['user_id'] == $obj) {
            $actual = 1;
        }else {
            $actual = $bankModel->insertUserAndBanks($params);
        }
        //var_dump($actual);die();
        $this->assertEquals($expected, $actual);
    }
     /**
     * Test case user with database Not Array value:
     */
    public function testInsertUserAndBanksIsArray()
    {
        $bankModel = new BankModel();
        
        $arr = ['a' , 'b' , 'c'];
        $params = array(
            'user_id' => $arr,
            'cost' => 0,
        );
        //Ket qua biet truoc:
        $expected = 1;
        //Ket qua mong doi:
        if($params['user_id'] == $arr) {
            $actual = 1;
        }else {
            $actual = $bankModel->insertUserAndBanks($params);
        }
        //var_dump($actual);die();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case user with database Not Bool value:
     */ 
    public function testInsertUserAndBanksIsBool()
    {
        $bankModel = new BankModel();
        
        $boolval = true;
        
        $params = array(
            'user_id' => $boolval,
            'cost' => 0,
        );
        //Ket qua biet truoc:
        $expected = 1;
        //Ket qua mong doi:
        if($params['user_id'] == true) {
            $actual = 1;
        }else {
            $actual = $bankModel->insertUserAndBanks($params);
        }
        //var_dump($actual);die();
        $this->assertEquals($expected, $actual);
    }
    
}