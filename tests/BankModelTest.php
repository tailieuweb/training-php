<?php

use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{

  // 1. tham số truyền vào nhiều hơn 5.
  public function test_insert_user_bank_more_than_5_param_ng()
  {
    $bankModel = new BankModel();
    $input = array(
      "name" => "thamsonhieuhon5",
      "fullname" => "thamsonhieuhon5",
      "sdt" => "0",
      "email" => "thamsonhieuhon5@gmail.com",
      "stk" => "1234",
      "bank" => 'test'
    );

    $expected = "Số lượng tham số truyền vào không phù hợp";
    $actual = $bankModel->insertUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // 2. tham số truyền vào ít hơn 5.
  public function test_insert_user_bank_bank_less_than_5_param_ng()
  {
    $bankModel = new BankModel();
    $input = array(
      "name" => "thamsoithon5",
      "fullname" => "thamsoithon5",
      "sdt" => "1234",
      "email" => "thamsoithon5@gmail.com",
    );

    $expected = "Số lượng tham số truyền vào không phù hợp";
    $actual = $bankModel->insertUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // 3. độ dài name be hơn 8
  public function test_insert_user_bank_bank_name_length_more_than_8_param_ng()
  {
    $bankModel = new BankModel();
    $input = array(
      "name" => "ddbh8",
      "fullname" => "dodainamebehon8",
      "sdt" => "1234",
      "email" => "lav@gmail.com",
      "stk" => "123"
    );

    $actual = $bankModel->insertUser_bank($input);
    $expected = "Name must be between 8 and 120";
    $this->assertEquals($expected, $actual);
  }

  // 4. độ dài name lon hơn 120
  public function test_insert_user_bank_bank_name_length_less_than_120_param_ng()
  {
    $bankModel = new BankModel();

    // độ dài name đang 240
    $input = array(
      "name" => "lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345",
      "fullname" => "dodainamelonhon120",
      "sdt" => "1234",
      "email" => "lav@gmail.com",
      "stk" => "123"
    );

    $actual = $bankModel->insertUser_bank($input);
    $expected = "Name must be between 8 and 120";
    $this->assertEquals($expected, $actual);
  }

  // 5. độ dài fullname be hơn 8
  public function test_insert_user_bank_bank_fullname_length_more_than_8_param_ng()
  {
    $bankModel = new BankModel();
    $input = array(
      "name" => "dodaifullnamebehon8",
      "fullname" => "ddbh8",
      "sdt" => "1234",
      "email" => "lav@gmail.com",
      "stk" => "123"
    );

    $actual = $bankModel->insertUser_bank($input);
    $expected = "Fullname must be between 8 and 120";
    $this->assertEquals($expected, $actual);
  }

  // 6. độ dài fullname lon hơn 120
  public function test_insert_user_bank_bank_fullname_length_less_than_120_param_ng()
  {
    $bankModel = new BankModel();

    // độ dài name đang 240
    $input = array(
      "name" => "dodaifullnamelonhon8",
      "fullname" => "lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345",
      "sdt" => "1234",
      "email" => "lav@gmail.com",
      "stk" => "123"
    );

    $actual = $bankModel->insertUser_bank($input);
    $expected = "Fullname must be between 8 and 120";
    $this->assertEquals($expected, $actual);
  }

  // 7. email không hợp lệ.
  public function test_insert_user_bank_bank_with_error_email_ng()
  {
    $bankModel = new BankModel();
    $input = array(
      "name" => "emailkhonghople",
      "fullname" => "email khong hop le",
      "sdt" => "1234",
      "email" => "lav@gmail",
      "stk" => "123"
    );

    $expected = "Email is not valid";
    $actual = $bankModel->insertUser_bank($input);
    $this->assertEquals($expected, $actual);
  }

  // 8. email bị rỗng.
  public function test_insert_user_bank_bank_with_empty_email_ng()
  {
    $bankModel = new BankModel();
    $input = array(
      "name" => "emailbirong",
      "fullname" => "email bi rong",
      "sdt" => "1234",
      "email" => "",
      "stk" => "123"
    );

    $expected = "Email is not valid";
    $actual = $bankModel->insertUser_bank($input);
    $this->assertEquals($expected, $actual);
  }

  // 9. stk bị rỗng.
  public function test_insert_user_bank_bank_with_empty_stk_ng()
  {
    $bankModel = new BankModel();
    $input = array(
      "name" => "stkbirong",
      "fullname" => "so tai khoan bi rong",
      "sdt" => "1234",
      "email" => "leanhvu@gmail.com",
      "stk" => ""
    );

    $expected = "Card number is not valid";
    $actual = $bankModel->insertUser_bank($input);
    $this->assertEquals($expected, $actual);
  }

  // 10. stk không phải kiểu số.
  public function test_insert_user_bank_bank_with_stk_is_not_number_ng()
  {
    $bankModel = new BankModel();
    $input = array(
      "name" => "stkkhongphaikieuso",
      "fullname" => "stk khong phai kieu so",
      "sdt" => "1234",
      "email" => "leanhvu@gmail.com",
      "stk" => "123aA"
    );

    $expected = "Card number is not valid";
    $actual = $bankModel->insertUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // 11. sdt bị rỗng.
  public function test_insert_user_bank_bank_with_empty_sdt_ng()
  {
    $bankModel = new BankModel();
    $input = array(
      "name" => "stkbirong",
      "fullname" => "so tai khoan bi rong",
      "sdt" => "",
      "email" => "leanhvu@gmail.com",
      "stk" => "0333121111"
    );

    $expected = "Phone number is not valid";
    $actual = $bankModel->insertUser_bank($input);
    $this->assertEquals($expected, $actual);
  }

  // 12. sdt không phải kiểu số.
  public function test_insert_user_bank_bank_with_sdt_is_not_number_ng()
  {
    $bankModel = new BankModel();
    $input = array(
      "name" => "stkkhongphaikieuso",
      "fullname" => "stk khong phai kieu so",
      "sdt" => "14A1",
      "email" => "leanhvu@gmail.com",
      "stk" => "0333121111"
    );

    $expected = "Phone number is not valid";
    $actual = $bankModel->insertUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // 13. trùng stk.
  // tiên quyết: trong database phải có giá trị stk = 141211515 trước khi chạy test này.
  public function test_insert_user_bank_bank_with_same_stk_ng()
  {
    $bankModel = new BankModel();
    $input = array(
      "name" => "trungsotaikhoan",
      "fullname" => "trung so tai khoan",
      "sdt" => "1234",
      "email" => "leanhvu@gmail.com",
      "stk" => "141211515"
    );

    $expected = "Card number is exists";
    $actual = $bankModel->insertUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // 15. kiểm tra trường hợp câu truy vấn không bình thường.
  // giá trị truyền vào không bình thường (Truyền vào câu truy vấn.).
  // lưu ý: khi chạy xong dữ liệu sẽ được lưu lại, nên nếu chạy testdox hoặc coverage lần nữa phải hồi phục dữ liệu về trạng thái ban đầu.
  public function test_insert_user_bank_bank_with_sql_injection_params_ng()
  {
    $bankModel = new BankModel();
    $input = array(
      "name" => "';######",
      "fullname" => ";;##------",
      "sdt" => "1234",
      "email" => "truonghoptruyvanbinhthuong@gmail.com",
      "stk" => "1412314"
    );

    $expected = true;
    $actual = $bankModel->insertUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // 15. giá trị truyền vào hoàn toàn đúng.
  // lưu ý: khi chạy xong dữ liệu sẽ được lưu lại, nên nếu chạy testdox hoặc coverage lần nữa phải hồi phục dữ liệu về trạng thái ban đầu.
  public function test_insert_user_bank_bank_with_correct_params_ok()
  {
    $bankModel = new BankModel();
    $input = array(
      "name" => "truonghoptruyvanbinhthuong",
      "fullname" => "truong hop truy van binh thuong",
      "sdt" => "1234",
      "email" => "truonghoptruyvanbinhthuong@gmail.com",
      "stk" => "14111412"
    );

    $expected = true;
    $actual = $bankModel->insertUser_bank($input);

    $this->assertEquals($expected, $actual);
  }
}
