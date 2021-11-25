<?php
use PHPUnit\Framework\TestCase;

class MinhSang_UserModelTest extends TestCase
{

    /**
     * Test case Okie
     */
    public function testSumOk()
    {
       $userModel = new UserModel();
       $a = -1;
       $b = -1;
       $expected = -2;

       $actual = $userModel->sumb($a,$b);

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

        $actual = $userModel->sumb($a,$b);

        if ($actual != 3) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }


    /**
     * Test case Not good
     */
    public function testStr()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 'a';

        $expected = 'error';
        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    public function testCongSoAm()
    {
        $userModel = new UserModel();
        $a = -10;
        $b = -8;

        $expected = '-18';
        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Not good
     */
    public function testchuoi()
    {
        $userModel = new UserModel();
        $a = 'Hello';
        $b = 'word';

        $expected = 'Helloword';
        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    //test findUserByID
    public function testFindUserById(){
        $userModel = new UserModel();
        $userId = 2;
        $userName = 'test2';

        $user = $userModel ->findUserById($userId);
        $actual = $user[0]['name'];

        $this->assertEquals($userName, $actual);
    }

    
    
    // Test  testinsertUserOk 
    public function testInsertUserOK()
    {
        $userModel = new UserModel();
        $input = [];
        $input['name'] = 'Sang';
        $input['password'] = "12345";
        $input['fullname'] = "TM Sang";
        $input['email'] = "sang@gmail.com";
        $input['type'] = 0;
        
      
        $actual = $userModel->insertUser( $input);
        if($actual != true)
        {
            $this->assertTrue(false); 
        }
        else
        {
            $this->assertTrue(true); 
        }
    }

    public function testInsertUserIdNg()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = -999991;
        $input['name'] = 'Sang111';
        $input['password'] = "12345";
        $input['fullname'] = "TM Sang";
        $input['email'] = "sang@gmail.com";
        $input['type'] = 0;
        
      
        $actual = $userModel->insertUser( $input);
        if($actual != true)
        {
            $this->assertTrue(false); 
        }
        else
        {
            $this->assertTrue(true); 
        }
    }

    

    //Test testInsertUserWithId
   
    // Test  testInsertUserWidthIdNull
    public function testInsertUserWidthIdNull()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = null;
        $input['name'] = "Deep123";
        $input['password'] = "1234";
        $input['fullname'] = "Minh Sang";
        $input['email'] = "sang@gmail.com";
        $input['type'] = 0;
        
        $actual = $userModel->insertUser( $input);
        if($actual != true)
        {
            $this->assertTrue(false); 
        }
        else
        {
            $this->assertTrue(true); 
        }
    }

    // Test  testInsertUserWidthIdNull
    public function testInsertUserNull()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = null;
        $input['name'] = null;
        $input['password'] = null;
        $input['fullname'] = null;
        $input['email'] = null;
        $input['type'] = null;
        
        $actual = $userModel->insertUser( $input);
        if($actual != true)
        {
            $this->assertTrue(false); 
        }
        else
        {
            $this->assertTrue(true); 
        }
    }

    public function testInsertUserWidthKey()
    {
        $userModel = new UserModel();
        $input = [];
        $input['id'] = "***";
        $input['name'] = 111;
        $input['password'] = "1234";
        $input['fullname'] =  001;
        $input['email'] = "sang@gmail.com";
        $input['type'] = 0;
        
        $actual = $userModel->insertUser( $input);
        if($actual != true)
        {
            $this->assertTrue(false); 
        }
        else
        {
            $this->assertTrue(true); 
        }
    }

}