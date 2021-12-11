<?php
use PHPUnit\Framework\TestCase;

class TranNgocTam_TestCase extends TestCase
{
    /**
     * Test case Okie
     */
    public function testLoginOk() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = 'NgocTam24';
        $HomeModel->startTransaction();
        $actual = $HomeModel->login('NgocTam24' , '23032001');
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual[0]['username']);
        
    }
     /**
     * Test case Not good
     */
    public function testLoginNg() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $HomeModel->startTransaction();
        $actual = $HomeModel->login('NgocTam24' , '11111');
        //print_r($actual);
        $HomeModel->rollback();
        if (empty($actual)) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // Test Null 
    public function testLoginIsNull(){
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = 'Not Null';
        $HomeModel->startTransaction();
        $actual = $HomeModel->login(null , null);
        //print_r($actual);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
        
    }
    // Test Empty:
    public function testLoginIsEmpty() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = 'Not Empty';
        $HomeModel->startTransaction();
        $actual = $HomeModel->login("" , "");
        //print_r($actual);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test Array:
    public function testLoginIsArray() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = 'Not Array';
        $arr = array(
            'tam',
            'tran'
        );
        $HomeModel->startTransaction();
        $actual = $HomeModel->login($arr , $arr);
        //print_r($actual);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test Object:
    public function testLoginIsObject() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = 'Not Object';
        $obj = new HomeModel();
        $HomeModel->startTransaction();
        $actual = $HomeModel->login($obj , $obj);
        //print_r($actual);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test Boolean:
    public function testLoginIsBoolean() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = 'Not Boolean';
        $HomeModel->startTransaction();
        $actual = $HomeModel->login(true , true);
        //print_r($actual);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test Number:
    public function testLoginIsNumber() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = 'Not Number';
        $HomeModel->startTransaction();
        $actual = $HomeModel->login(331 , "23032001");
        //print_r($actual);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    // ------------- Function CouponByID -------------- // ? 10 test case
    // Test Coupon Ok:
    public function testCouponByIdOk() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = '3Y6LM8VA';
        $HomeModel->startTransaction();
        $actual = $HomeModel->getCouponByID(51);
        //print_r($actual); die();
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual[0]['zipcode']);
    }
    // Test Coupon Not good:
    public function testCouponByIdNg() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $HomeModel->startTransaction();
        $actual = $HomeModel->getCouponByID(1000);
        //print_r($actual); die();
        //$HomeModel->rollback();
        if(empty($actual)) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // Test Coupon ID so thực:
    public function testCouponByIdDowble() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = [];
        $HomeModel->startTransaction();
        $actual = $HomeModel->getCouponByID(9.7);
        //print_r($actual); die();
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test Coupon ID Negative:
    public function testCouponByIdNegative() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = [];
        $HomeModel->startTransaction();
        $actual = $HomeModel->getCouponByID(-51);
        //print_r($actual); die();
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test Coupon Empty:
    public function testCouponByIdNotEmpty() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = "Not Empty";
        $HomeModel->startTransaction();
        $actual = $HomeModel->getCouponByID('');
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test Coupon ID tring:
    public function testCouponByIdNotString() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = [];
        $HomeModel->startTransaction();
        $actual = $HomeModel->getCouponByID('tam');
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test Coupon ID Null:
    public function testCouponByIdNotNull() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = "Not Empty";
        $HomeModel->startTransaction();
        $actual = $HomeModel->getCouponByID(NULL);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test Coupon ID Array:
    public function testCouponByIdNotArray() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = "Not Array";
        $HomeModel->startTransaction();
        $actual = $HomeModel->getCouponByID(['a','b']);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test Coupon ID Object:
    public function testCouponByIdNotObject() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = "Not Object";
        $obj = new HomeModel();
        $HomeModel->startTransaction();
        $actual = $HomeModel->getCouponByID($obj);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test Coupon ID Boolean:
    public function testCouponByIdNotBoolean() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = "Not Boolean";
        
        $HomeModel->startTransaction();
        $actual = $HomeModel->getCouponByID(true);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    // ---------------------- FUNCTION CHECK MAIL --------------- // ?? 8 Test case
    // Test check mail Ok
    public function testCheckMailOk() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = 'Tam23032001';
        $HomeModel->startTransaction();
        $actual = $HomeModel->checkMail("pemesi4727@simdpi.com");
        //print_r($actual); die();
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual[0]['username']);
    }
    // Test check mail Not good
    public function testCheckMailNg() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $HomeModel->startTransaction();
        $actual = $HomeModel->checkMail("pemesi472dsad7@simdpi.com");
        //print_r($actual); die();
        $HomeModel->rollback();
        if(empty($actual)) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // Test check mail Not good
    public function testCheckMailEmpty() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = "Not Empty";
        $HomeModel->startTransaction();
        $actual = $HomeModel->checkMail('');
        //print_r($actual); die();
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test check mail Not Null
    public function testCheckMailNull() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = "Not Empty";
        $HomeModel->startTransaction();
        $actual = $HomeModel->checkMail(NULL);
        //print_r($actual); die();
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test check mail Email field is number
    public function testCheckMailNumeric() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = "The field you entered is wrong";
        $HomeModel->startTransaction();
        $actual = $HomeModel->checkMail(10);
        //print_r($actual); die();
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test check mail Email field is array
    public function testCheckMailArray() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = "The field you entered is wrong";
        $HomeModel->startTransaction();
        $actual = $HomeModel->checkMail(['a','b']);
        //print_r($actual); die();
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test check mail Email field is object
    public function testCheckMailObject() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $obj = new HomeModel();
        $expected = "The field you entered is wrong";
        $HomeModel->startTransaction();
        $actual = $HomeModel->checkMail($obj);
        //print_r($actual); die();
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test check mail Email field is boolean
    public function testCheckMailBoolean() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = "The field you entered is wrong";
        $HomeModel->startTransaction();
        $actual = $HomeModel->checkMail(true);
        //print_r($actual); die();
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    // ---------------------- FUNCTION UPDATE PASSWORD --------------- // ?? 8 Test case
    // Test Update Ok:
    public function testUpdatePasswordOk() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $HomeModel->startTransaction();
        $update = $HomeModel->UpdatePassword("111111", "pemesi4727@simdpi.com");

        $expected = "Tam23032001";
        
        $actual = $HomeModel->login("Tam23032001","111111");
        //print_r($actual); die();
        $HomeModel->rollback();

        $this->assertEquals($expected, $actual[0]['username']);
    }
    // Test Update Not Good:
    public function testUpdatePasswordNg() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $HomeModel->startTransaction();
        $actual = $HomeModel->UpdatePassword("1", "pemesi4727d@simdpi.com");
        //print_r($actual); die();
        $HomeModel->rollback();
        if($actual == 1) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // Test Update Not Empty:
    public function testUpdatePasswordEmpty() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = "name is empty";
        $HomeModel->startTransaction();
        $actual = $HomeModel->UpdatePassword("", "");
        //print_r($actual); die();
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test Update Not NULL:
    public function testUpdatePasswordNull() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = "name is empty";
        $HomeModel->startTransaction();
        $actual = $HomeModel->UpdatePassword(null, null);
        //print_r($actual); die();
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test Update Not Numeric:
    public function testUpdatePasswordNumeric() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = "Enter the wrong field name";
        $HomeModel->startTransaction();
        $actual = $HomeModel->UpdatePassword("11111", 100);
        //print_r($actual); die();
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test Update Not Array:
    public function testUpdatePasswordArray() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = "Enter the wrong field name";
        $HomeModel->startTransaction();
        $actual = $HomeModel->UpdatePassword(['a','b'], ['a','b']);
        //print_r($actual); die();
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test Update Not Object:
    public function testUpdatePasswordObject() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $obj = new HomeModel();
        $expected = "Enter the wrong field name";
        $HomeModel->startTransaction();
        $actual = $HomeModel->UpdatePassword(['a','b'], $obj);
        //print_r($actual); die();
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test Update Not Boolean:
    public function testUpdatePasswordBoolean() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $obj = new HomeModel();
        $expected = "Enter the wrong field name";
        $HomeModel->startTransaction();
        $actual = $HomeModel->UpdatePassword(true, true);
        //print_r($actual); die();
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    // ---------------------- FUNCTION CHECK OLD PASSWORD --------------- // ?? 9 Test case
    // Test Update Ok:
    public function testCheckOldPasswordOk() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = "Tam23032001";
        $HomeModel->startTransaction();
        $actual = $HomeModel->checkOldPassword("Tam23032001", "111111");
        //print_r($actual); die();
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual[0]['username']);
    }
    // Test Update Not Good:
    public function testCheckOldPasswordNg() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $HomeModel->startTransaction();
        $actual = $HomeModel->checkOldPassword("Tam", "111111");
        //print_r($actual); die();
        $HomeModel->rollback();
        if(empty($actual)) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // Test Update Ok:
    public function testCheckOldPasswordEmpty() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = "name is empty";
        $HomeModel->startTransaction();
        $actual = $HomeModel->checkOldPassword("Tam23032001", "");
        //print_r($actual); die();
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    //Test Check password null:
    public function testCheckOldPasswordNull() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = "name is empty";
        $HomeModel->startTransaction();
        $actual = $HomeModel->checkOldPassword("Tam23032001", NULL);
        //print_r($actual); die();
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    //Test Check password array:
    public function testCheckOldPasswordArray() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = "enter the wrong field";
        $HomeModel->startTransaction();
        $actual = $HomeModel->checkOldPassword("Tam23032001", ['a','b']);
        //print_r($actual); die();
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    //Test Check password object:
    public function testCheckOldPasswordOject() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $obj = new HomeModel();
        $expected = "enter the wrong field";
        $HomeModel->startTransaction();
        $actual = $HomeModel->checkOldPassword("Tam23032001", $obj);
        //print_r($actual); die();
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    //Test Check password bool:
    public function testCheckOldPasswordBoolean() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = "enter the wrong field";
        $HomeModel->startTransaction();
        $actual = $HomeModel->checkOldPassword("Tam23032001", true);
        //print_r($actual); die();
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    //Test Check password number:
    public function testCheckOldPasswordNumeric() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = "enter the wrong field";
        $HomeModel->startTransaction();
        $actual = $HomeModel->checkOldPassword(1000, "111111");
        //print_r($actual); die();
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    //Test Check password double:
    public function testCheckOldPasswordDouble() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = "enter the wrong field";
        $HomeModel->startTransaction();
        $actual = $HomeModel->checkOldPassword(9.999999, "111111");
        //print_r($actual); die();
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    //Test Check MoreSpace:
    public function testCheckOldPasswordMoreSpace() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = [];
        $HomeModel->startTransaction();
        $actual = $HomeModel->checkOldPassword("Tam23032001", "   111111");
        //print_r($actual); die();
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
}