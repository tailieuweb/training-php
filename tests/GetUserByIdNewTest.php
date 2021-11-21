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
    public function testInsertUserAndBanksNg()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        
        //Truyền đúng id mới nhất của danh sách users
        $user = 289;
        $params = array(
            'user_id' => $user,
        );
        //Ket qua biet truoc:
        $expected = 1;
        //Ket qua mong doi:
        if(empty($params['cost']) == null) {
            $actual = $bankModel->insertUserAndBanks($params);
        }
        // var_dump($actual);die();
        if(empty($actual)) {
            $this->assertTrue(true);
        }else {
            $this->assertTrue(false);
        }
    }

    //------------------------------------------ Test Case getUserByIdNew -----------------------//
    public function testGetUserByIdNewOk()
    {
        $userModel = new BankModel();
        
        $user = $userModel->getUserByIdNew();
        $actual = $user[0]['user_id'];
        $expected = '291';
        $this->assertEquals($expected, $actual);       // var_dump($actual[0]['user_id']);die();
    }
    // Not good
    public function testGetUserByIdNewNg()
    {
        $userModel = new BankModel();
        
        $actual = $userModel->getUserByIdNew();
        // var_dump($user);die();
        // var_dump($actual);die();
        if(empty($actual[0]['MAX'])) {
            $this->assertTrue(true);
        }else {
            $this->assertTrue(false);
        }
    }
     // Not NULL
     public function testGetUserByIdNewNull()
     {
         $userModel = new BankModel();
         
         $actual = $userModel->getUserByIdNew();
         // var_dump($user);die();
         // var_dump($actual);die();
         if(!empty($actual[0]['MAX'])) {
             $this->assertTrue(false);
         }else {
             $this->assertTrue(true);
         }
     }

     
}