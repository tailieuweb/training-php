<?php
use PHPUnit\Framework\TestCase;

class FindUserByIdNewTest extends TestCase
{
    /**
     * Test case Okie
     */
    public function testFindUserByIdNewOk()
    {
       //khai báo model:
       $UserModel = new UserModel();
       $UserModel->startTransaction();
       //Truyên tham số : 
       $id = 54;
       $expected = "Thái Ngô";
       $actual = $UserModel->findUserByIdNew($id);
       $UserModel->rollback();
       //var_dump($actual);
       //assertEquals
       $this->assertEquals($expected , $actual[0]['name']);
    }
     /**
     * Test case Ng
     */
    public function testFindUserByIdNewNg()
    {
       //khai báo model:
       $UserModel = new UserModel();
       $UserModel->startTransaction();
       //id khong ton tai
       $id = 100;
       $actual = $UserModel->findUserByIdNew($id);
       $UserModel->rollback();
       //var_dump($actual);
       //Neu ket qua mong doi khong ton tai
       if(empty($actual)) {
           return $this->assertTrue(true);
       }
       return $this->assertTrue(false);
    }
      /**
     * Test case String
     */
    public function testFindUserByIdNewIsString()
    {
       //khai báo model:
       $UserModel = new UserModel();
       $UserModel->startTransaction();
       //id la mot chuoi bat ky:
       $id = "chuoi";

       $expected = [];
       $actual = $UserModel->findUserByIdNew($id);
       $UserModel->rollback();

       $this->assertEquals($expected , $actual);
       
    }
     /**
     * Test case Array
     */
    public function testFindUserByIdNewIsArray()
    {
       //khai báo model:
       $UserModel = new UserModel();
       //id la mot chuoi bat ky:
       $UserModel->startTransaction();
       $id = [
            'name' , 'email' , 'fullname' , 'type'
       ];

       $expected = [];
       $actual = $UserModel->findUserByIdNew($id[0]);
        //var_dump($actual);die();
        $UserModel->rollback();
       $this->assertEquals($expected , $actual);
       
    }
      /**
     * Test case Null
     */
    public function testFindUserByIdNewIsNull()
    {
       //khai báo model:
       $UserModel = new UserModel();
       $UserModel->startTransaction();
       //id la mot chuoi bat ky:
       $id = null;
       //Result da biet:
       $expected = [];
       $actual = $UserModel->findUserByIdNew($id);
       $UserModel->rollback();
        //var_dump($actual);die();
       $this->assertEquals($expected , $actual);
    }
     /**
     * Test case Object
     */
    public function testFindUserByIdNewIsObject()
    {
       //khai báo model:
       $UserModel = new UserModel();
       $UserModel->startTransaction();
       //id la mot chuoi bat ky:
       $id = BankModel::class;
       //var_dump($id);
       //Result da biet:
       $expected = [];
       $actual = $UserModel->findUserByIdNew($id);
       $UserModel->rollback();
       //var_dump($actual);die();
       $this->assertEquals($expected , $actual);
    }
     /**
     * Test case Double
     */
    public function testFindUserByIdNewIsDouble()
    {
       //khai báo model:
       $UserModel = new UserModel();
       $UserModel->startTransaction();
       //id la mot chuoi bat ky:
       $id = 9.5;
       //Result da biet:
       $expected = [];
       $actual = $UserModel->findUserByIdNew($id);
       $UserModel->rollback();
        //var_dump($actual);die();
       $this->assertEquals($expected , $actual);
    }
    /**
     * Test case Double
     */
    public function  testFindUserByIdNewIsBool()
    {
       //khai báo model:
       $UserModel = new UserModel();
      
       //id la mot chuoi bat ky:
       
       $id = true;
       //Result da biet:
       $expected = false;
       $actual = $UserModel->findUserByIdNew($id);
       //var_dump($actual);die();
       
       if(empty($actual)) {
            $this->assertTrue(true);
       }
       else  {
            $this->assertTrue(false);
       }
    }
     /**
     * Test case Negative
     */
    public function  testFindUserByIdNewIsNegative()
    {
       //khai báo model:
       $UserModel = new UserModel();
       //id la mot so am:
       $UserModel->startTransaction();
       $id = -35;
       //Result da biet:
       $expected = [];
       $actual = $UserModel->findUserByIdNew($id);
       $UserModel->rollback();
       //var_dump($actual);die();
       $this->assertEquals($expected , $actual);
    }
     /**
     * Test case Characters
     */
    public function  testFindUserByIdNewIsCharacters()
    {
       //khai báo model:
       $UserModel = new UserModel();
       //id la mot ky tu dat biet:
       $UserModel->startTransaction();
       $id = '#';
       //Result da biet:
       $expected = [];
       $actual = $UserModel->findUserByIdNew($id);
       $UserModel->rollback();
       //var_dump($actual);die();
       $this->assertEquals($expected , $actual);
    }

    /**
     * Test case NegativeDouble
     */
    public function  testFindUserByIdNewIsNegativeDouble()
    {
        $UserModel = new UserModel();
        
        $UserModel->startTransaction();
        $id = -9.7;
        //Result da biet:
        $expected = [];
        $actual = $UserModel->findUserByIdNew($id);
        $UserModel->rollback();
        //var_dump($actual);die();
        $this->assertEquals($expected , $actual);
    }
}