<?php

use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    //_____________________________________/**Test InsertBank */___________________________________________
    /**
     * Test case Ok
     */
    public function testInsertBankOk()
    {
        $bankModel = new BankModel();

        $param = array(
            "user_id" => "1",
            "cost" => "100",
            "ver" => "2",
        );

        $actual = $bankModel->insertBank($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case:
     * Add new user with duplicate ID.
     */
    public function testInsertBankUserNgDuplicateId()
    {
        $bankModel = new BankModel();
        $existing_id = $bankModel->getID();

        $param = array(
            "user_id" => $existing_id,
            "cost" => "0",
            "ver" => "",
        );

        $bankModel->insertBank($param);
        $actual = $bankModel->getID();
        $expected = $existing_id + 1;

        print_r("\t=> The last ID before: " . $existing_id  . "\n");
        print_r("\t=> The last ID after: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case:
     * Add new user with null values
     */
    public function testInsertBankUserNgNullValues()
    {
        $bankModel = new BankModel();

        $param = array(
            "user_id" => null,
            "cost" => null,
            "ver" => null,
        );

        $actual = $bankModel->insertBank($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case:
     * Add new user with empty string values
     */
    public function testInsertBankUserNgEmptyStringValues()
    {
        $bankModel = new BankModel();

        $param = array(
            "user_id" => "",
            "cost" => "",
            "ver" => "",
        );

        $actual = $bankModel->insertBank($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case:
     * Add new user with boolean values
     */
    public function testInsertBankUserNgBooleanValues()
    {
        $bankModel = new BankModel();
        $boolean = true;

        $param = array(
            "user_id" => $boolean,
            "cost" => $boolean,
            "ver" => $boolean,
        );

        $actual = $bankModel->insertBank($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case:
     * Add new user with array values
     */
    public function testInsertBankUserNgArrayValues()
    {
        $bankModel = new BankModel();
        $arr = [1, 5, 8];

        $param = array(
            "user_id" => $arr,
            "cost" => $arr,
            "ver" => $arr,
        );

        $actual = $bankModel->insertBank($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");
        $this->assertEquals($expected, $actual);
    }
     /**
     * Test case:
     * Add new user with  object values
     */
    public function testInsertBankUserNgObjectValues()
    {
        $bankModel = new BankModel();
        $obj = new DtClass();

        $param = array(
            "user_id" => $obj,
            "cost" => $obj,
            "ver" => $obj,
        );

        $actual = $bankModel->insertBank($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");
        $this->assertEquals($expected, $actual);
    }

    //____________________________/** Test Update Bank */___________________________________________________________

     /**
     * Test case UpdatebankOk
     */
    public function testUpdateBankOk()
    {
        $bankModel = new BankModel();

        $param = array(
            "id"  => "4",
            "user_id" => "3",
            "cost" => "5",
            "ver" => "1",
        );

        $actual = $bankModel->updateBank($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case:
     * update user with null values.
     */
    public function testUpdateBankNgNullValues()
    {
        $bankModel = new BankModel();

        $param = array(
            "id"  => null,
            "user_id" => null,
            "cost" => null,
            "ver" => null,
        );

        $actual = $bankModel->updateBank($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case:
     * update user with null values.
     */
    public function testUpdateBankNgEmptyStringValues()
    {
        $bankModel = new BankModel();

        $param = array(
            "id"  => "" ,
            "user_id" => "",
            "cost" => "",
            "ver" => "",
        );

        $actual = $bankModel->updateBank($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case:
     * update user with  object values.
     */
    public function testUpdateBankNgObjectValues()
    {
        $bankModel = new BankModel();
        $obj = new DtClass();
        $param = array(
            "id"  => $obj ,
            "user_id" => $obj,
            "cost" => $obj,
            "ver" => $obj,
        );

        $actual = $bankModel->updateBank($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case:
     * update user with boolean values.
     */
    public function testUpdateBankNgBooleanValues()
    {
        $bankModel = new BankModel();
        $boolean = true;
        $param = array(
            "id"  => $boolean ,
            "user_id" => $boolean,
            "cost" => $boolean,
            "ver" => $boolean,
        );

        $actual = $bankModel->updateBank($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case:
     * update user with  array values..
     */
    public function testUpdateBankNgArrayValues()
    {
        $bankModel = new BankModel();
        $arr = [1, 2, 3, 4, 5];
        $param = array(
            "id"  => $arr ,
            "user_id" => $arr,
            "cost" => $arr,
            "ver" => $arr,
        );

        $actual = $bankModel->updateBank($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
     /**
     * Test case:
     * update user with  letter values..
     */
    public function testUpdateBankNgLetterValues()
    {
        $bankModel = new BankModel();
        $letter = 'e';
        $param = array(
            "id"  => $letter ,
            "user_id" => $letter,
            "cost" => $letter,
            "ver" => $letter,
        );

        $actual = $bankModel->updateBank($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }

}
   