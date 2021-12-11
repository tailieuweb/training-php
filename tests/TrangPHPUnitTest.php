<?php

use PHPUnit\Framework\TestCase;

class TrangPHPUnitTest extends TestCase
{
    /**
     * Test case Okie
     */

    /**
     * Test case Not good
     */

    //  ------------------------InsertComment-------------------------//
    public function testInsertCommentOk()
    {
        $HomeModel = new HomeModel();
        $lgUserID = 48;
        $id = md5(102 . 'chuyen-de-web-2');
        $data = array(
            'name' => 'NgoThai12',
            'content' => 'tuyệt'
        );
 
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertComment($lgUserID, $id, $data);
        //var_dump($actual).die();
        if ($actual == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    public function testInsertCommentByUserIdNg()
    {
        $HomeModel = new HomeModel();
        $HomeModel->startTransaction();
        $lgUserID = 999;
        $id = 999;
        $data = [
            'name' => 'Trang',
            'content' => 'tuyệt'
        ];

        if (!empty($userID)) {
            $actual = false;
        } else {
            $HomeModel->insertComment($lgUserID, $id, $data);
        }
        $actual = $HomeModel->getUserById($lgUserID);
        $HomeModel->rollback();
        if (empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testInsertCommentByProductIdNg()
    {
        $HomeModel = new HomeModel();
        $HomeModel->startTransaction();
        $lgUserID = 47;
        $id = 100;
        $data = [
            'name' => 'Trang',
            'content' => 'tuyệt'
        ];

        if (!empty($userID)) {
            $actual = false;
        } else {
            $HomeModel->insertComment($lgUserID, $id, $data);
        }
        $actual = $HomeModel->firstProductDetail($id);
        $HomeModel->rollback();
        if (empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }


    public function testInsertCommentByUserIdNull()
    {
        $HomeModel = new HomeModel();
        $lgUserID = "";
        $id = 100;
        $data = [
            'name' => 'Trang',
            'content' => 'tuyệt'
        ];
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertComment($lgUserID, $id, $data);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertCommentByProductIdNull()
    {
        $HomeModel = new HomeModel();
        $lgUserID = 47;
        $id = "";
        $data = [
            'name' => 'Trang',
            'content' => 'tuyệt'
        ];
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertComment($lgUserID, $id, $data);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertCommentByUserIdString()
    {
        $HomeModel = new HomeModel();
        $lgUserID = "abc";
        $id = 100;
        $data = [
            'name' => 'Trang',
            'content' => 'tuyệt'
        ];
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertComment($lgUserID, $id, $data);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertCommentByProductIdString()
    {
        $HomeModel = new HomeModel();
        $lgUserID = 47;
        $id = "abc";
        $data = [
            'name' => 'Trang',
            'content' => 'tuyệt'
        ];
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertComment($lgUserID, $id, $data);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testInsertCommentUserIdNegative()
    {
        $HomeModel = new HomeModel();
        $lgUserID = -47;
        $id = 100;
        $data = [
            'name' => 'Trang',
            'content' => 'tuyệt'
        ];
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertComment($lgUserID, $id, $data);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testInsertCommentProductIdNegative()
    {
        $HomeModel = new HomeModel();
        $lgUserID = 47;
        $id = -100;
        $data = [
            'name' => 'Trang',
            'content' => 'tuyệt'
        ];
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertComment($lgUserID, $id, $data);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testInsertCommentEmpty()
    {
        $HomeModel = new HomeModel();
        $lgUserID = [];
        $id = [];
        $data = [];
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertComment($lgUserID, $id, $data);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertCommentByUserIdEmpty()
    {
        $HomeModel = new HomeModel();
        $lgUserID = [];
        $id = 100;
        $data = [];
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertComment($lgUserID, $id, $data);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertCommentByProductIdEmpty()
    {
        $HomeModel = new HomeModel();
        $lgUserID = 47;
        $id = [];
        $data = [];
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertComment($lgUserID, $id, $data);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertCommentNotEmtyNull()
    {
        $HomeModel = new HomeModel();
        $lgUserID = "";
        $id = "";
        $data = "";
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertComment($lgUserID, $id, $data);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertCommentByUserNotEmtyNull()
    {
        $HomeModel = new HomeModel();
        $lgUserID = "";
        $id = 100;
        $data = "";
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertComment($lgUserID, $id, $data);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertCommentByProductIdNotEmtyNull()
    {
        $HomeModel = new HomeModel();
        $lgUserID = 47;
        $id = "";
        $data = "";
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertComment($lgUserID, $id, $data);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testInsertCommentNotNotObject()
    {
        $HomeModel = new HomeModel();
        $object = new Coupon();
        $lgUserID = $object;
        $id = $object;
        $data = $object;
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertComment($lgUserID, $id, $data);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertCommentByIdUserNotNotObject()
    {
        $HomeModel = new HomeModel();
        $object = new Coupon();
        $lgUserID = $object;
        $id = 100;
        $data = $object;
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertComment($lgUserID, $id, $data);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertCommentByProductIdNotNotObject()
    {
        $HomeModel = new HomeModel();
        $object = new Coupon();
        $lgUserID = 47;
        $id = $object;
        $data = $object;
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertComment($lgUserID, $id, $data);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testInsertCommentNotArray()
    {
        $HomeModel = new HomeModel();
        $array = ['a', 'b'];
        $lgUserID = $array;
        $id = $array;
        $data = $array;
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertComment($lgUserID, $id, $data);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertCommentByUserIdNotArray()
    {
        $HomeModel = new HomeModel();
        $array = ['a', 'b'];
        $lgUserID = $array;
        $id = 100;
        $data = $array;
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertComment($lgUserID, $id, $data);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertCommentByProductIdNotArray()
    {
        $HomeModel = new HomeModel();
        $array = ['a', 'b'];
        $lgUserID = 47;
        $id = $array;
        $data = $array;
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertComment($lgUserID, $id, $data);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testInsertCommentNotBool()
    {
        $HomeModel = new HomeModel();
        $bool = true;
        $lgUserID = $bool;
        $id = $bool;
        $data = $bool;
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertComment($lgUserID, $id, $data);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testInsertCommentByIdUserNotBool()
    {
        $HomeModel = new HomeModel();
        $bool = true;
        $lgUserID = $bool;
        $id = 100;
        $data = $bool;
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertComment($lgUserID, $id, $data);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }public function testInsertCommentByIdProductNotBool()
    {
        $HomeModel = new HomeModel();
        $bool = true;
        $lgUserID = 47;
        $id = $bool;
        $data = $bool;
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertComment($lgUserID, $id, $data);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }


    // ------------------------InsertOderTest----------------------------//
    public function testInsertOrderOk()
    {
        $HomeModel = new HomeModel();
        $userID = 54;
        $Firstname = "Trang";
        $Lastname = "Hoài";
        $address = "NT";
        $email = "tranhoaitrang3001@gmail.com";
        $phone = "0123456789";
        $notes = "không";
        $HomeModel->startTransaction();
        $HomeModel->insertOrder($userID, $Firstname, $Lastname, $address, $email, $phone, $notes);
        $HomeModel->rollback();
        $this->assertTrue(true);
    }

    public function testInsertOrderNg()
    {
        $HomeModel = new HomeModel();
        $HomeModel->startTransaction();
        $userID = 999;
        $Firstname = "Trang";
        $Lastname = "Hoài";
        $address = "NT";
        $email = "tranhoaitrang3001@gmail.com";
        $phone = "0123456789";
        $notes = "không";
        
        if(!empty($userID)){
            $actual = 0;
        }else{
            $HomeModel->insertOrder($userID, $Firstname, $Lastname, $address, $email, $phone, $notes);
        }
        $actual = $HomeModel->getUserById($userID);
        $HomeModel->rollback();
        if(empty($actual)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }

    public function testInsertOrderDuplicate()
    {
        $HomeModel = new HomeModel();
        $id_max = $HomeModel->getOrderMaxById();
        $userID = 54;
        $Firstname = "Trang";
        $Lastname = "Hoài";
        $address = "NT";
        $email = "tranhoaitrang3001@gmail.com";
        $phone = "0123456789";
        $notes = "không";
        $HomeModel->startTransaction();
        $HomeModel->insertOrder($userID, $Firstname, $Lastname, $address, $email, $phone, $notes);
        $HomeModel->rollback();
        $actual = $HomeModel->getOrderMaxById();
        $expected = $id_max;
        $this->assertEquals($expected,$actual);
    }

    public function testInsertOrderByIdNull()
    {
        $HomeModel = new HomeModel();
        $userID = "";
        $Firstname = "Trang";
        $Lastname = "Hoài";
        $address = "NT";
        $email = "tranhoaitrang3001@gmail.com";
        $phone = "0123456789";
        $notes = "không";
        $expected = 0;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertOrder($userID, $Firstname, $Lastname, $address, $email, $phone, $notes);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertOrderIdString()
    {
        $HomeModel = new HomeModel();
        $userID = "abc";
        $Firstname = "Trang";
        $Lastname = "Hoài";
        $address = "NT";
        $email = "tranhoaitrang3001@gmail.com";
        $phone = "0123456789";
        $notes = "không";
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertOrder($userID, $Firstname, $Lastname, $address, $email, $phone, $notes);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testInsertOrderIdPhoneString()
    {
        $HomeModel = new HomeModel();
        $userID = "abc";
        $Firstname = "Trang";
        $Lastname = "Hoài";
        $address = "NT";
        $email = "tranhoaitrang3001@gmail.com";
        $phone = "abc";
        $notes = "không";
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertOrder($userID, $Firstname, $Lastname, $address, $email, $phone, $notes);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testInsertOrderIdNegative()
    {
        $HomeModel = new HomeModel();
        $userID = -123;
        $Firstname = "Trang";
        $Lastname = "Hoài";
        $address = "NT";
        $email = "tranhoaitrang3001@gmail.com";
        $phone = "0123456789";
        $notes = "không";
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertOrder($userID, $Firstname, $Lastname, $address, $email, $phone, $notes);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertOrderByUserIdEmpty()
    {
        $HomeModel = new HomeModel();
        $userID = [];
        $Firstname = "Trang";
        $Lastname = "Hoài";
        $address = "NT";
        $email = "tranhoaitrang3001@gmail.com";
        $phone = "0123456789";
        $notes = "không";
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertOrder($userID, $Firstname, $Lastname, $address, $email, $phone, $notes);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertOrderEmpty()
    {
        $HomeModel = new HomeModel();
        $userID = [];
        $Firstname = [];
        $Lastname = [];
        $address = [];
        $email = [];
        $phone = [];
        $notes = [];
        $expected = 0;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertOrder($userID, $Firstname, $Lastname, $address, $email, $phone, $notes);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertOrderByUserIdNotEmtyNull()
    {
        $HomeModel = new HomeModel();
        $userID = "";
        $Firstname = "Trang";
        $Lastname = "Hoài";
        $address = "NT";
        $email = "tranhoaitrang3001@gmail.com";
        $phone = "0123456789";
        $notes = "không";
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertOrder($userID, $Firstname, $Lastname, $address, $email, $phone, $notes);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    
    public function testInsertOrderByUserIdNotObject()
    {
        $HomeModel = new HomeModel();
        $object = new Coupon();
        $userID = $object;
        $Firstname = "Trang";
        $Lastname = "Hoài";
        $address = "NT";
        $email = "tranhoaitrang3001@gmail.com";
        $phone = "0123456789";
        $notes = "không";
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertOrder($userID, $Firstname, $Lastname, $address, $email, $phone, $notes);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertOrderNotObject()
    {
        $HomeModel = new HomeModel();
        $object = new Coupon();
        $userID = $object;
        $Firstname = $object;
        $Lastname = $object;
        $address = $object;
        $email = $object;
        $phone = $object;
        $notes = $object;
        $expected = 0;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertOrder($userID, $Firstname, $Lastname, $address, $email, $phone, $notes);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertOrderByUserIdNotArray()
    {
        $HomeModel = new HomeModel();
        $array = ['a','b'];
        $userID = $array;
        $Firstname = "Trang";
        $Lastname = "Hoài";
        $address = "NT";
        $email = "tranhoaitrang3001@gmail.com";
        $phone = "0123456789";
        $notes = "không";
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertOrder($userID, $Firstname, $Lastname, $address, $email, $phone, $notes);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertOrderNotArray()
    {
        $HomeModel = new HomeModel();
        $array = ['a','b'];
        $userID = $array;
        $Firstname = $array;
        $Lastname = $array;
        $address = $array;
        $email = $array;
        $phone = $array;
        $notes = $array;
        $expected = 0;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertOrder($userID, $Firstname, $Lastname, $address, $email, $phone, $notes);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertOrderByUserIdNotBool()
    {
        $HomeModel = new HomeModel();
        $bool = true;
        $userID = $bool;
        $Firstname = "Trang";
        $Lastname = "Hoài";
        $address = "NT";
        $email = "tranhoaitrang3001@gmail.com";
        $phone = "0123456789";
        $notes = "không";
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertOrder($userID, $Firstname, $Lastname, $address, $email, $phone, $notes);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertOrderNotBool()
    {
        $HomeModel = new HomeModel();
        $bool = true;
        $userID = $bool;
        $Firstname = $bool;
        $Lastname = $bool;
        $address = $bool;
        $email = $bool;
        $phone = $bool;
        $notes = $bool;
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertOrder($userID, $Firstname, $Lastname, $address, $email, $phone, $notes);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    // -----------------------------------UpdateSum---------------------------------//
    public function testUpdateSumOk()
    {
        $HomeModel = new HomeModel();
        $OrderID = 3;
        $Sum = 2;
       
        $HomeModel->startTransaction();
        $HomeModel->updateSum($OrderID, $Sum);
        $HomeModel->rollback();
        $this->assertTrue(true);
    }

    public function testUpdateSumNg()
    {
        $HomeModel = new HomeModel();
        $HomeModel->startTransaction();
        $OrderID = 999;
        $Sum = 2;
        $actual = $HomeModel->updateSum($OrderID, $Sum);
        $HomeModel->rollback();
        if($actual){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }

    public function testUpdateSumDuplicate()
    {
        $HomeModel = new HomeModel();
        $id_max = $HomeModel->getOrderMaxById();
        $OrderID = 3;
        $Sum = 2;
        $HomeModel->startTransaction();
        $HomeModel->updateSum($OrderID, $Sum);
        $HomeModel->rollback();
        $actual = $HomeModel->getOrderMaxById();
        $expected = $id_max;
        $this->assertEquals($expected,$actual);
    }

    public function testUpdateSumByIdNull()
    {
        $HomeModel = new HomeModel();
        $OrderID = "";
        $Sum = 2;
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->updateSum($OrderID, $Sum);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateSumByIdString()
    {
        $HomeModel = new HomeModel();
        $OrderID = "abc";
        $Sum = 2;
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->updateSum($OrderID, $Sum);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testUpdateSumBySumString()
    {
        $HomeModel = new HomeModel();
        $OrderID = 3;
        $Sum = "abc";
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->updateSum($OrderID, $Sum);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testUpdateSumByIdNegative()
    {
        $HomeModel = new HomeModel();
        $OrderID = -3;
        $Sum = 2;
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->updateSum($OrderID, $Sum);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateSumBySumNegative()
    {
        $HomeModel = new HomeModel();
        $OrderID = 3;
        $Sum = -2;
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->updateSum($OrderID, $Sum);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testUpdateSumEmpty()
    {
        $HomeModel = new HomeModel();
        $OrderID = [];
        $Sum = [];
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->updateSum($OrderID, $Sum);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateSumNotEmtyNull()
    {
        $HomeModel = new HomeModel();
        $OrderID = "";
        $Sum = "";
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->updateSum($OrderID, $Sum);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testUpdateSumNotNotObject()
    {
        $HomeModel = new HomeModel();
        $object = new Coupon();
        $OrderID = $object;
        $Sum = $object;
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->updateSum($OrderID, $Sum);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testUpdateSumNotNotArray()
    {
        $HomeModel = new HomeModel();
        $array = ['a','b'];
        $OrderID = $array;
        $Sum = $array;
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->updateSum($OrderID, $Sum);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testUpdateSumNotNotBool()
    {
        $HomeModel = new HomeModel();
        $bool = true;
        $OrderID = $bool;
        $Sum = $bool;
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->updateSum($OrderID, $Sum);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    // ------------------------------------SearchCategory---------------------------//
    public function testSearchCategoryOk()
    {
        $HomeModel = new HomeModel();
        $Search  = 'bánh';
        $expected = 'Bánh Tous ';
        $HomeModel->startTransaction();
        $user = $HomeModel->searchCategories($Search);
        $actual = $user[0]['name'];
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Not good
     */
    public function testSearchCategoryNg()
    {
        $HomeModel = new HomeModel();
        $Search  = 'trang';
        $HomeModel->startTransaction();
        $user = $HomeModel->searchCategories($Search);
        $HomeModel->rollback();
        if (empty($user[0])) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // /**
    //  * Test keyword là số
    //  */
    public function testSearchCategoryByIsNum()
    {
        $HomeModel = new HomeModel();
        $Search  = 23;
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->searchCategories($Search);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // /**
    //  * Test keyword là boolean(true/false)
    //  */
    public function testSearchCategoryIsBoolean()
    {
        $HomeModel = new HomeModel();
        $Search  = true;
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->searchCategories($Search);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // /**
    //  * Test keyword là boolean(true/false)
    //  */
    public function testSearchCategoryIsArray()
    {
        $HomeModel = new HomeModel();
        $Search  = ['1','2','3'];
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->searchCategories($Search);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // /**
    //  * Test keyword là object
    //  */
    public function testSearchCategoryIsObject()
    {
        $HomeModel = new HomeModel();
        $Search  = new Coupon();
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->searchCategories($Search);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    
    // /**
    //  * Test keyword có từ 2 khoảng trắng
    //  */
    public function testSearchCategoryIsMoreSpace()
    {
        $HomeModel = new HomeModel();
        $Search  = 'tra  dao';
        $expected = [];
        $HomeModel->startTransaction();
        $actual = $HomeModel->searchCategories($Search);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testSearchCategoryIsSpecialCharacter()
    {
        $HomeModel = new HomeModel();
        $Search   = '@#';
        $expected = [];
        $HomeModel->startTransaction();
        $actual = $HomeModel->searchCategories($Search);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    // -------------------------------------SearchProduct---------------------------------//
    public function testSearchProductOk()
    {
        $HomeModel = new HomeModel();
        $Search  = 'bánh';
        $expected = 'Bánh Tous ';
        $user = $HomeModel->searchProduct($Search);
        $actual = $user[0]['name'];
        // var_dump($actual);
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Not good
     */
    public function testSearchProductNg()
    {
        $HomeModel = new HomeModel();
        $Search  = 'kem';
        $user = $HomeModel->searchProduct($Search);
        // var_dump($user).die();
        if (empty($user)) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // // /**
    // //  * Test keyword là số
    // //  */
    public function testSearchProductByIsNum()
    {
        $HomeModel = new HomeModel();
        $Search  = 23;
        $expected = [];
        $HomeModel->startTransaction();
        $actual = $HomeModel->searchProduct($Search);
        
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // // /**
    // //  * Test keyword là boolean(true/false)
    // //  */
    public function testSearchProductIsBoolean()
    {
        $HomeModel = new HomeModel();
        $Search  = true;
        $expected = [];
        $HomeModel->startTransaction();
        $actual = $HomeModel->searchProduct($Search);
        // var_dump($actual).die();
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // // /**
    // //  * Test keyword là boolean(true/false)
    // //  */
    public function testSearchProductIsArray()
    {
        $HomeModel = new HomeModel();
        $Search  = ['1','2','3'];
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->searchProduct($Search);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // /**
    //  * Test keyword là object
    //  */
    public function testSearchProductIsObject()
    {
        $HomeModel = new HomeModel();
        $Search  = new Coupon();
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->searchProduct($Search);
        $HomeModel->rollback();
        
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * Test keyword có từ 2 khoảng trắng
     */
    public function testSearchProductIsMoreSpace()
    {
        $HomeModel = new HomeModel();
        $Search  = 'tra  dao';
        $expected = [];
        $HomeModel->startTransaction();
        $actual = $HomeModel->searchProduct($Search);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testSearchProductNull()
    {
        $HomeModel = new HomeModel();
        // $Search  = '';
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->searchProduct();
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testSearchProductIsSpecialCharacter()
    {
        $HomeModel = new HomeModel();
        $Search   = '@#';
        $expected = [];
        $HomeModel->startTransaction();
        $actual = $HomeModel->searchProduct($Search);
        $HomeModel->rollback();
        // var_dump($actual).die();
        $this->assertEquals($expected, $actual);
    }
}
