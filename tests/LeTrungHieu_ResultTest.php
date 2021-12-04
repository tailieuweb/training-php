<?php

use PHPUnit\Framework\TestCase;

class LeTrungHieu_ResultTest extends TestCase
{
    /**
     * Test getInstance
     */
    // Test case getInstance Good
    public function testGetInstanceGood()
    {
        $result = ResultClass::getInstance();
        $newResult = new ResultClass();
       
        $this->assertEquals($result, $newResult);
    }
    // Test case getInstance Good Multiclass Result
    public function testGetInstanceGMR()
    {
        $result1 = ResultClass::getInstance();
        $result2 = ResultClass::getInstance();
        $this->assertEquals($result1, $result2);
    }
    // Test case getInstance Not Good
    public function testGetInstanceNg()
    {
        $result = ResultClass::getInstance();

        $expected = false;
        $actual = !is_object($result) ||
        get_class($result) != 'ResultClass';

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test _construct in Result
     */
    // Test construct Ok
    public function testConstructOk(){
        $result = new ResultClass;
        $actual = $result->isSuccess == false &&
            $result->data == null &&
            $result->error == "Don't have Value";
        if ($actual == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test construct Ng
    public function testConstructNg(){
        $result = new ResultClass;
        $actual = $result->isSuccess == true ||
            $result->data != null ||
            $result->error != "Don't have Value";
        if ($actual == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test set data
     */
    // Test setData oke
    public function testSetDataOk()
    {
        $result = new ResultClass;
        $data = null;
        $result->setData($data);
        $expected = $result->isSuccess == true &&
        $result->data == $data &&
        $result->error == null;
        if ($expected == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test setData Ng
    public function testSetDataNg()
    {
        $result = new ResultClass;
        $data = "data";
        $result->setData($data);
        $expected = $result->isSuccess != true ||
            $result->data != $data ||
            $result->error != null;
        if ($expected == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test setData String
    public function testSetDataString()
    {
        $result = new ResultClass;
        $data = "data";
        $result->setData($data);
        $expected = $result->isSuccess == true &&
        $result->data == $data &&
        $result->error == null;
        if ($expected == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test setData Float
    public function testSetDataFloat()
    {
        $result = new ResultClass;
        $data = 1.23;
        $result->setData($data);
        $expected = $result->isSuccess == true &&
        $result->data == $data &&
        $result->error == null;
        if ($expected == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test setData negative
    public function testSetDataNegative()
    {
        $result = new ResultClass;
        $data = -23;
        $result->setData($data);
        $expected = $result->isSuccess == true &&
        $result->data == $data &&
        $result->error == null;
        if ($expected == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test setData null array
    public function testSetDataNullArray()
    {
        $result = new ResultClass;
        $data = [];
        $result->setData($data);
        $expected = $result->isSuccess == true &&
        $result->data == $data &&
        $result->error == null;
        if ($expected == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test setData Integer
    public function testSetDataInt()
    {
        $result = new ResultClass;
        $data = 123;
        $result->setData($data);
        $expected = $result->isSuccess == true &&
        $result->data == $data &&
        $result->error == null;
        if ($expected == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test setData Bool true
    public function testSetDataBoolTrue()
    {
        $result = new ResultClass;
        $data = true;
        $result->setData($data);
        $expected = $result->isSuccess == true &&
        $result->data == $data &&
        $result->error == null;
        if ($expected == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test setData Bool false
    public function testSetDataBoolFalse()
    {
        $result = new ResultClass;
        $data = false;
        $result->setData($data);
        $expected = $result->isSuccess == true &&
        $result->data == $data &&
        $result->error == null;
        if ($expected == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test setData Array
    public function testSetDataArray()
    {
        $result = new ResultClass;
        $data = [1,2,3];
        $result->setData($data);
        $expected = $result->isSuccess == true &&
        $result->data == $data &&
        $result->error == null;
        if ($expected == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test setData Object
    public function testSetDataObject()
    {
        $result = new ResultClass;
        $data = new UserModel;
        $result->setData($data);
        $expected = $result->isSuccess == true &&
        $result->data == $data &&
        $result->error == null;
        if ($expected == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test set Error
     */
    // Test setError oke
    public function testSetErrorOk()
    {
        $result = new ResultClass;
        $error = "not valid";
        $result->setError($error);
        $expected = $result->isSuccess == false &&
        $result->data == null &&
        $result->error == $error;

        if ($expected == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test setError ng
    public function testSetErrorNg()
    {
        $result = new ResultClass;
        $error = "not valid";
        $result->setError($error);
        $expected = $result->isSuccess == true ||
        $result->data != null ||
        $result->error != $error;

        if ($expected == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test setError Null
    public function testSetErrorNull()
    {
        $actual = new ResultClass;
        $error = null;
        $actual->setError($error);
        $expected = $actual->isSuccess == true &&
        $actual->data == null &&
        $actual->error == $error;

        if ($expected == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test setError Integer
    public function testSetErrorInt()
    {
        $actual = new ResultClass;
        $error = 123;
        $actual->setError($error);
        $expected = $actual->isSuccess == true &&
        $actual->data == null &&
        $actual->error == $error;

        if ($expected == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test setError Float
    public function testSetErrorFloat()
    {
        $actual = new ResultClass;
        $error = 1.23;
        $actual->setError($error);
        $expected = $actual->isSuccess == true &&
        $actual->data == null &&
        $actual->error == $error;

        if ($expected == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test setError Bool true
    public function testSetErrorBoolTrue()
    {
        $actual = new ResultClass;
        $error = true;
        $actual->setError($error);
        $expected = $actual->isSuccess == true &&
        $actual->data == null &&
        $actual->error == $error;

        if ($expected == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test setError Bool false
    public function testSetErrorBoolFalse()
    {
        $actual = new ResultClass;
        $error = false;
        $actual->setError($error);
        $expected = $actual->isSuccess == true &&
        $actual->data == null &&
        $actual->error == $error;

        if ($expected == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test setError Array
    public function testSetErrorArray()
    {
        $actual = new ResultClass;
        $error = [1, 2, 3];
        $actual->setError($error);
        $expected = $actual->isSuccess == true &&
        $actual->data == null &&
        $actual->error == $error;

        if ($expected == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
     // Test setError Object
     public function testSetErrorObject()
     {
         $actual = new ResultClass;
         $error = new UserModel;
         $actual->setError($error);
         $expected = $actual->isSuccess == true &&
         $actual->data == null &&
         $actual->error == $error;
 
         if ($expected == false) {
             $this->assertTrue(true);
         } else {
             $this->assertTrue(false);
         }
     }
}
