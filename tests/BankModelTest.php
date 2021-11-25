<?php

use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{

  // tham số truyền vào nhiều hơn 5.
  public function testInsertUser_bank_more_than_5_paramOk()
  {
    $bankModel = new BankModel();
    $input = array(
      "name" => "lav",
      "fullname" => "le anh vu",
      "sdt" => "1234",
      "email" => "lav@gmail.com",
      "stk" => "123",
      "bank" => 'test'
    );

    $expected = "Số lượng tham số truyền vào không phù hợp";
    $actual = $bankModel->insertUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // tham số truyền vào ít hơn 5.
  public function testInsertUser_bank_less_than_5_paramOk()
  {
    $bankModel = new BankModel();
    $input = array(
      "name" => "lav",
      "fullname" => "le anh vu",
      "sdt" => "1234",
      "email" => "lav@gmail.com",
    );

    $expected = "Số lượng tham số truyền vào không phù hợp";
    $actual = $bankModel->insertUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // độ dài name lớn hơn 8
  public function testInsertUser_bank_name_length_more_than_8_paramOk()
  {
    $bankModel = new BankModel();
    $input = array(
      "name" => "lavla",
      "fullname" => "le anh vu",
      "sdt" => "1234",
      "email" => "lav@gmail.com",
      "stk" => "123"
    );

    $actual = $bankModel->insertUser_bank($input);
    $expected = "Name must be between 8 and 120";
    $this->assertEquals($expected, $actual);
  }
  // độ dài name bé hơn 120
  public function testInsertUser_bank_name_length_less_than_120_paramOk()
  {
    $bankModel = new BankModel();

    // độ dài name đang 240
    $input = array(
      "name" => "lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345",
      "fullname" => "le anh vu",
      "sdt" => "1234",
      "email" => "lav@gmail.com",
      "stk" => "123"
    );

    $actual = $bankModel->insertUser_bank($input);
    $expected = "Name must be between 8 and 120";
    $this->assertEquals($expected, $actual);
  }

  // độ dài fullname lớn hơn 8
  public function testInsertUser_bank_fullname_length_more_than_8_paramOk()
  {
    $bankModel = new BankModel();
    $input = array(
      "name" => "lavla",
      "fullname" => "le vu",
      "sdt" => "1234",
      "email" => "lav@gmail.com",
      "stk" => "123"
    );

    $actual = $bankModel->insertUser_bank($input);
    $expected = "Name must be between 8 and 120";
    $this->assertEquals($expected, $actual);
  }

  // độ dài fullname bé hơn 120
  public function testInsertUser_bank_fullname_length_less_than_120_paramOk()
  {
    $bankModel = new BankModel();

    // độ dài name đang 240
    $input = array(
      "name" => "lavla",
      "fullname" => "lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345",
      "sdt" => "1234",
      "email" => "lav@gmail.com",
      "stk" => "123"
    );

    $actual = $bankModel->insertUser_bank($input);
    $expected = "Name must be between 8 and 120";
    $this->assertEquals($expected, $actual);
  }

  // email khoong hợp lệ.
  public function testInsertUserBankWithErrorEmailOk()
  {
    $bankModel = new BankModel();
    $input = array(
      "name" => "leanhvu1412",
      "fullname" => "le anh vu",
      "sdt" => "1234",
      "email" => "lav@gmail",
      "stk" => "123"
    );

    $expected = "Email is not valid";
    $actual = $bankModel->insertUser_bank($input);
    $this->assertEquals($expected, $actual);
  }
  
  // email bị rỗng.
  public function testInsertUserBankWithEmptyEmailOk()
  {
    $bankModel = new BankModel();
    $input = array(
      "name" => "leanhvu1412",
      "fullname" => "le anh vu",
      "sdt" => "1234",
      "email" => "",
      "stk" => "123"
    );

    $expected = "Email is not valid";
    $actual = $bankModel->insertUser_bank($input);
    $this->assertEquals($expected, $actual);
  }

  // stk bị rỗng.
  public function testInsertUserBankWithEmptyStkOk()
  {
    $bankModel = new BankModel();
    $input = array(
      "name" => "leanhvu1412",
      "fullname" => "le anh vu",
      "sdt" => "1234",
      "email" => "leanhvu@gmail.com",
      "stk" => ""
    );

    $expected = "Card number is not valid";
    $actual = $bankModel->insertUser_bank($input);
    $this->assertEquals($expected, $actual);
  }

  // stk không phải kiểu số.
  public function testInsertUserBankWithStkIsNotNumberOk()
  {
    $bankModel = new BankModel();
    $input = array(
      "name" => "leanhvu1412",
      "fullname" => "le anh vu",
      "sdt" => "1234",
      "email" => "leanhvu@gmail.com",
      "stk" => "123aA"
    );

    $expected = "Card number is not valid";
    $actual = $bankModel->insertUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // trùng stk.
  public function testInsertUserBankWithSameStkOk()
  {
    $bankModel = new BankModel();
    $input = array(
      "name" => "leanhvu1412",
      "fullname" => "le anh vu",
      "sdt" => "1234",
      "email" => "leanhvu@gmail.com",
      "stk" => "123"
    );

    $expected = "Card number is exists";
    $actual = $bankModel->insertUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // kiểm tra trường hợp câu truy vấn không bình thường.
  // giá trị truyền vào không bình thường.
  public function testInsertUserBankWithErrorParamsOk()
  {
    $bankModel = new BankModel();
    $input = array(
      "name" => "';######",
      "fullname" => ";;##------",
      "sdt" => "1234",
      "email" => "lav@gmail.com",
      "stk" => "12314567"
    );

    $expected = true;
    $actual = $bankModel->insertUser_bank($input);

    $this->assertEquals($expected, $actual);
  }
}
