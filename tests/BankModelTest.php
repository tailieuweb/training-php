<?php

use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{

  // ####################################################################
  // ###################### Hàm Thêm một bank mới. ######################
  // ####################################################################

  // 1. Tham số hàm là một số nguyên.
  public function testInsertUserBankWithParamIsIntegerNumberNg()
  {
    $bankModel = new BankModel();
    $input = 1;

    $expected = "Parameter is not array";
    $actual = $bankModel->insertUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // 2. Tham số hàm là giá trị NULL.
  public function testInsertUserBankWithParamIsNullValueNg()
  {
    $bankModel = new BankModel();
    $input = NULL;

    $expected = "Parameter is not array";
    $actual = $bankModel->insertUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // 3. Tham số hàm là một chuỗi.
  public function testInsertUserBankWithParamIsStringNg()
  {
    $bankModel = new BankModel();
    $input = "hello";

    $expected = "Parameter is not array";
    $actual = $bankModel->insertUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // 4. không có tham số nào truyền vào.
  public function testInsertUserBankWithoutParamNg()
  {
    $bankModel = new BankModel();

    $expected = "Input empty";
    $actual = $bankModel->insertUser_bank();

    $this->assertEquals($expected, $actual);
  }

  // 5. Tham số hàm nhiều hơn 5.
  public function testInsertUserBankMoreThan5ParamNg()
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

    $expected = "Number of input parameter is not accord";
    $actual = $bankModel->insertUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // 6. Tham số hàm ít hơn 5.
  public function testInsertUserBankLessThan5ParamNg()
  {
    $bankModel = new BankModel();
    $input = array(
      "name" => "thamsoithon5",
      "fullname" => "thamsoithon5",
      "sdt" => "1234",
      "email" => "thamsoithon5@gmail.com",
    );

    $expected = "Number of input parameter is not accord";
    $actual = $bankModel->insertUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // 7. key name trong array không phù hợp
  public function testInsertUserBankWithKeyNameNg()
  {
    $bankModel = new BankModel();
    $input = array(
      "namê" => "keynameinarraynotaccord",
      "fullname" => "keynameinarraynotaccord",
      "sdt" => "0",
      "email" => "thamsonhieuhon5@gmail.com",
      "stk" => "1234",
    );

    $expected = "Key value is not match";
    $actual = $bankModel->insertUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // 8. name không phải là kiểu chuỗi.
  public function testInsertUserBankWithNameValueIsNotStringNg()
  {
    $bankModel = new BankModel();
    $input = array(
      "name" => 123,
      "fullname" => "nameisnotstring",
      "sdt" => "0",
      "email" => "nameisnotstring@gmail.com",
      "stk" => "1234",
    );

    $expected = "Name value is not string";
    $actual = $bankModel->insertUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // 9. độ dài name bé hơn 6
  public function testInsertUserBankNameValueWithLengthMoreThan6ParamNg()
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
    $expected = "Name must start with letter and must be between 6 and 120 characters";
    $this->assertEquals($expected, $actual);
  }

  // 10. độ dài name lớn hơn 120
  public function testInsertUserBankNameValueWithLengthLessThan120ParamNg()
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
    $expected = "Name must start with letter and must be between 6 and 120 characters";
    $this->assertEquals($expected, $actual);
  }

  // 11. name bắt đầu phải là một ký tự.
  public function testInsertUserBankWithNameValueMustStartWithLetterNg()
  {
    $bankModel = new BankModel();
    $input = array(
      "name" => "123leanhvu",
      "fullname" => "namemuststartwithletter",
      "sdt" => "0",
      "email" => "namemuststartwithletter@gmail.com",
      "stk" => "1234",
    );

    $expected = "Name must start with letter and must be between 6 and 120 characters";
    $actual = $bankModel->insertUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // 12. fullname không phải là một string.
  public function testInsertUserBankWithFullnameValueIsNotStringNg()
  {
    $bankModel = new BankModel();
    $input = array(
      "name" => "fullnameisnotstring",
      "fullname" => 1234,
      "sdt" => "0",
      "email" => "fullnameisnotstring@gmail.com",
      "stk" => "1234",
    );

    $expected = "Fullname value is not string";
    $actual = $bankModel->insertUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // 13. độ dài fullname bé hơn 6
  public function testInsertUserBankFullnameValueWithLengthMoreThan6ParamNg()
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
    $expected = "Fullname must be between 6 and 120";
    $this->assertEquals($expected, $actual);
  }

  // 14. độ dài fullname lớn hơn 120
  public function testInsertUserBankFullnameValueWithLengthLessThan120ParamNg()
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
    $expected = "Fullname must be between 6 and 120";
    $this->assertEquals($expected, $actual);
  }

  // 15. email không hợp lệ.
  public function testInsertUserBankWithEmailNg()
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

  // 16. email bị rỗng.
  public function testInsertUserBankWithEmptyEmailNg()
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

  // 17. stk bị rỗng.
  public function testInsertUserBankWithEmptyStkNg()
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

  // 18. stk không phải kiểu số.
  public function testInsertUserBankWithStkIsNotNumberNg()
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

  // 19. sdt bị rỗng.
  public function testInsertUserBankWithEmptySdtNg()
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

  // 20. sdt không phải kiểu số.
  public function testInsertUserBankWithSdtIsNotNumberNg()
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

  // 21. trùng stk.
  // tiên quyết: trong database phải có giá trị stk = 141211515 trước khi chạy test này.
  public function testInsertUserBankWithSameStkNg()
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

  // 22. kiểm tra trường hợp câu truy vấn không bình thường.
  // giá trị truyền vào không bình thường (Truyền vào câu SQL gây lỗi).
  // lưu ý: khi chạy xong dữ liệu sẽ được lưu lại, nên nếu chạy testdox hoặc coverage lần nữa phải hồi phục dữ liệu về trạng thái ban đầu.
  public function testInsertUserBankWithSqlInjectionParamNg()
  {
    $bankModel = new BankModel();
    $input = array(
      "name" => "abcdA01",
      "fullname" => "';######",
      "sdt" => "1234",
      "email" => "truonghoptruyvanbinhthuong@gmail.com",
      "stk" => "911233"
    );

    $expected = true;
    $actual = $bankModel->insertUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // 23. Toàn bộ giá trị truyền vào hoàn toàn đúng.
  // lưu ý: khi chạy xong dữ liệu sẽ được lưu lại, nên nếu chạy testdox hoặc coverage lần nữa phải hồi phục dữ liệu về trạng thái ban đầu.
  public function testInsertUserBankWithCorrectParamOk()
  {
    $bankModel = new BankModel();
    $input = array(
      "name" => "truonghoptruyvanbinhthuong",
      "fullname" => "truong hop truy van binh thuong",
      "sdt" => "1234",
      "email" => "truonghoptruyvanbinhthuong@gmail.com",
      "stk" => "1412"
    );

    $expected = true;
    $actual = $bankModel->insertUser_bank($input);

    $this->assertEquals($expected, $actual);
  }


  // ####################################################################
  // ###################### Hàm cập nhập bank. ##########################
  // ####################################################################

  // 1. Tham số hàm là một số nguyên.
  public function testUpdateUserBankWithParamIsIntegerNumberNg()
  {
    $bankModel = new BankModel();
    $input = 1;

    $expected = "Parameter is not array";
    $actual = $bankModel->updateUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // 2. Tham số hàm là giá trị NULL.
  public function testUpdateUserBankWithParamIsNullValueNg()
  {
    $bankModel = new BankModel();
    $input = NULL;

    $expected = "Parameter is not array";
    $actual = $bankModel->updateUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // 3. Tham số hàm là một chuỗi.
  public function testUpdateUserBankWithParamIsStringNg()
  {
    $bankModel = new BankModel();
    $input = "hello";

    $expected = "Parameter is not array";
    $actual = $bankModel->updateUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // 4. không có tham số nào truyền vào.
  public function testUpdateUserBankWithoutParamNg()
  {
    $bankModel = new BankModel();

    $expected = "Input empty";
    $actual = $bankModel->updateUser_bank();

    $this->assertEquals($expected, $actual);
  }

  // 5. Tham số hàm nhiều hơn 6.
  public function testUpdateUserBankMoreThan5ParamNg()
  {
    $bankModel = new BankModel();
    $input = array(
      "id" => "1",
      "name" => "thamsonhieuhon6",
      "fullname" => "thamsonhieuhon6",
      "sdt" => "0",
      "email" => "thamsonhieuhon6@gmail.com",
      "stk" => "1234",
      "bank" => 'test'
    );

    $expected = "Number of input parameter is not accord";
    $actual = $bankModel->updateUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // 6. Tham số hàm ít hơn 6.
  public function testUpdateUserBankLessThan5ParamNg()
  {
    $bankModel = new BankModel();
    $input = array(
      "name" => "thamsoithon6",
      "fullname" => "thamsoithon6",
      "sdt" => "1234",
      "email" => "thamsoithon6@gmail.com",
    );

    $expected = "Number of input parameter is not accord";
    $actual = $bankModel->updateUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // 7. key name trong array không phù hợp
  public function testUpdateUserBankWithKeyNameNg()
  {
    $bankModel = new BankModel();
    $input = array(
      "id" => "1",
      "namê" => "keynameinarraynotaccord",
      "fullname" => "keynameinarraynotaccord",
      "sdt" => "0",
      "email" => "thamsonhieuhon5@gmail.com",
      "stk" => "1234",
    );

    $expected = "Key value is not match";
    $actual = $bankModel->updateUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // 8. name không phải là kiểu chuỗi.
  public function testUpdateUserBankWithNameValueIsNotStringNg()
  {
    $bankModel = new BankModel();
    $input = array(
      "id" => "1",
      "name" => 123,
      "fullname" => "nameisnotstring",
      "sdt" => "0",
      "email" => "nameisnotstring@gmail.com",
      "stk" => "1234",
    );

    $expected = "Name value is not string";
    $actual = $bankModel->updateUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // 9. độ dài name bé hơn 6
  public function testUpdateUserBankNameValueWithLengthMoreThan6ParamNg()
  {
    $bankModel = new BankModel();
    $input = array(
      "id" => "1",
      "name" => "ddbh8",
      "fullname" => "dodainamebehon8",
      "sdt" => "1234",
      "email" => "lav@gmail.com",
      "stk" => "123"
    );

    $actual = $bankModel->updateUser_bank($input);
    $expected = "Name must start with letter and must be between 6 and 120 characters";
    $this->assertEquals($expected, $actual);
  }

  // 10. độ dài name lớn hơn 120
  public function testUpdateUserBankNameValueWithLengthLessThan120ParamNg()
  {
    $bankModel = new BankModel();

    // độ dài name đang 240
    $input = array(
      "id" => "1",
      "name" => "lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345",
      "fullname" => "dodainamelonhon120",
      "sdt" => "1234",
      "email" => "lav@gmail.com",
      "stk" => "123"
    );

    $actual = $bankModel->updateUser_bank($input);
    $expected = "Name must start with letter and must be between 6 and 120 characters";
    $this->assertEquals($expected, $actual);
  }

  // 11. name bắt đầu phải là một ký tự.
  public function testUpdateUserBankWithNameValueMustStartWithLetterNg()
  {
    $bankModel = new BankModel();
    $input = array(
      "id" => "1",
      "name" => "123leanhvu",
      "fullname" => "namemuststartwithletter",
      "sdt" => "0",
      "email" => "namemuststartwithletter@gmail.com",
      "stk" => "1234",
    );

    $expected = "Name must start with letter and must be between 6 and 120 characters";
    $actual = $bankModel->updateUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // 12. fullname không phải là một string.
  public function testUpdateUserBankWithFullnameValueIsNotStringNg()
  {
    $bankModel = new BankModel();
    $input = array(
      "id" => "1",
      "name" => "fullnameisnotstring",
      "fullname" => 1234,
      "sdt" => "0",
      "email" => "fullnameisnotstring@gmail.com",
      "stk" => "1234",
    );

    $expected = "Fullname value is not string";
    $actual = $bankModel->updateUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // 13. độ dài fullname bé hơn 6
  public function testUpdateUserBankFullnameValueWithLengthMoreThan6ParamNg()
  {
    $bankModel = new BankModel();
    $input = array(
      "id" => "1",
      "name" => "dodaifullnamebehon8",
      "fullname" => "ddbh8",
      "sdt" => "1234",
      "email" => "lav@gmail.com",
      "stk" => "123"
    );

    $actual = $bankModel->updateUser_bank($input);
    $expected = "Fullname must be between 6 and 120";
    $this->assertEquals($expected, $actual);
  }

  // 14. độ dài fullname lớn hơn 120
  public function testUpdateUserBankFullnameValueWithLengthLessThan120ParamNg()
  {
    $bankModel = new BankModel();

    // độ dài name đang 240
    $input = array(
      "id" => "1",
      "name" => "dodaifullnamelonhon8",
      "fullname" => "lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345lavla12345",
      "sdt" => "1234",
      "email" => "lav@gmail.com",
      "stk" => "123"
    );

    $actual = $bankModel->updateUser_bank($input);
    $expected = "Fullname must be between 6 and 120";
    $this->assertEquals($expected, $actual);
  }

  // 15. email không hợp lệ.
  public function testUpdateUserBankWithEmailNg()
  {
    $bankModel = new BankModel();
    $input = array(
      "id" => "1",
      "name" => "emailkhonghople",
      "fullname" => "email khong hop le",
      "sdt" => "1234",
      "email" => "lav@gmail",
      "stk" => "123"
    );

    $expected = "Email is not valid";
    $actual = $bankModel->updateUser_bank($input);
    $this->assertEquals($expected, $actual);
  }

  // 16. email bị rỗng.
  public function testUpdateUserBankWithEmptyEmailNg()
  {
    $bankModel = new BankModel();
    $input = array(
      "id" => "1",
      "name" => "emailbirong",
      "fullname" => "email bi rong",
      "sdt" => "1234",
      "email" => "",
      "stk" => "123"
    );

    $expected = "Email is not valid";
    $actual = $bankModel->updateUser_bank($input);
    $this->assertEquals($expected, $actual);
  }

  // 17. stk bị rỗng.
  public function testUpdateUserBankWithEmptyStkNg()
  {
    $bankModel = new BankModel();
    $input = array(
      "id" => "1",
      "name" => "stkbirong",
      "fullname" => "so tai khoan bi rong",
      "sdt" => "1234",
      "email" => "leanhvu@gmail.com",
      "stk" => ""
    );

    $expected = "Card number is not valid";
    $actual = $bankModel->updateUser_bank($input);
    $this->assertEquals($expected, $actual);
  }

  // 18. stk không phải kiểu số.
  public function testUpdateUserBankWithStkIsNotNumberNg()
  {
    $bankModel = new BankModel();
    $input = array(
      "id" => "1",
      "name" => "stkkhongphaikieuso",
      "fullname" => "stk khong phai kieu so",
      "sdt" => "1234",
      "email" => "leanhvu@gmail.com",
      "stk" => "123aA"
    );

    $expected = "Card number is not valid";
    $actual = $bankModel->updateUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // 19. sdt bị rỗng.
  public function testUpdateUserBankWithEmptySdtNg()
  {
    $bankModel = new BankModel();
    $input = array(
      "id" => "1",
      "name" => "stkbirong",
      "fullname" => "so tai khoan bi rong",
      "sdt" => "",
      "email" => "leanhvu@gmail.com",
      "stk" => "0333121111"
    );

    $expected = "Phone number is not valid";
    $actual = $bankModel->updateUser_bank($input);
    $this->assertEquals($expected, $actual);
  }

  // 20. sdt không phải kiểu số.
  public function testUpdateUserBankWithSdtIsNotNumberNg()
  {
    $bankModel = new BankModel();
    $input = array(
      "id" => "1",
      "name" => "stkkhongphaikieuso",
      "fullname" => "stk khong phai kieu so",
      "sdt" => "14A1",
      "email" => "leanhvu@gmail.com",
      "stk" => "0333121111"
    );

    $expected = "Phone number is not valid";
    $actual = $bankModel->updateUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // 21. trùng stk.
  // tiên quyết: trong database phải có giá trị stk = 22135 trước khi chạy test này.
  public function testUpdateUserBankWithSameStkNg()
  {
    $bankModel = new BankModel();
    $input = array(
      "id" => "1",
      "name" => "trungsotaikhoan",
      "fullname" => "trung so tai khoan",
      "sdt" => "1234",
      "email" => "leanhvu@gmail.com",
      "stk" => "22135"
    );

    $expected = "Card number is exists";
    $actual = $bankModel->updateUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // 22. kiểm tra trường hợp câu truy vấn không bình thường.
  // giá trị truyền vào không bình thường (Truyền vào câu SQL gây lỗi).
  // lưu ý: khi chạy xong dữ liệu sẽ được lưu lại, nên nếu chạy testdox hoặc coverage lần nữa phải hồi phục dữ liệu về trạng thái ban đầu.
  public function testUpdateUserBankWithSqlInjectionParamNg()
  {
    $bankModel = new BankModel();
    $input = array(
      "id" => "1",
      "name" => "abcdA01",
      "fullname" => "';######",
      "sdt" => "1234",
      "email" => "truonghoptruyvanbinhthuong@gmail.com",
      "stk" => "9112331" // them so 1 vao cuoi cung
    );

    $expected = true;
    $actual = $bankModel->updateUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // 23. Toàn bộ giá trị truyền vào hoàn toàn đúng.
  // lưu ý: khi chạy xong dữ liệu sẽ được lưu lại, nên nếu chạy testdox hoặc coverage lần nữa phải hồi phục dữ liệu về trạng thái ban đầu.
  public function testUpdateUserBankWithCorrectParamOk()
  {
    $bankModel = new BankModel();
    $input = array(
      "id" => "1",
      "name" => "truonghoptruyvanbinhthuong",
      "fullname" => "truong hop truy van binh thuong",
      "sdt" => "1234",
      "email" => "truonghoptruyvanbinhthuong@gmail.com",
      "stk" => "14121" // them so 1 vao cuoi cung
    );

    $expected = true;
    $actual = $bankModel->updateUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // id không phải là số nguyên.
  public function testUpdateUserBankWithIdIsNotIntegerNg()
  {
    $bankModel = new BankModel();
    $input = array(
      "id" => "1.1",
      "name" => "truonghoptruyvanbinhthuong",
      "fullname" => "truong hop truy van binh thuong",
      "sdt" => "1234",
      "email" => "truonghoptruyvanbinhthuong@gmail.com",
      "stk" => "14121" // them so 1 vao cuoi cung
    );

    $expected = "Id must integer value";
    $actual = $bankModel->updateUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // id phải là kiểu số.
  public function testUpdateUserBankWithIdIsNotNumberNg()
  {
    $bankModel = new BankModel();
    $input = array(
      "id" => "1.1ha",
      "name" => "truonghoptruyvanbinhthuong",
      "fullname" => "truong hop truy van binh thuong",
      "sdt" => "1234",
      "email" => "truonghoptruyvanbinhthuong@gmail.com",
      "stk" => "14121" // them so 1 vao cuoi cung
    );

    $expected = "Id value is not number";
    $actual = $bankModel->updateUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // id là một số nguyên dương.
  public function testUpdateUserBankWithIdIsNegativeNg()
  {
    $bankModel = new BankModel();
    $input = array(
      "id" => "-1",
      "name" => "truonghoptruyvanbinhthuong",
      "fullname" => "truong hop truy van binh thuong",
      "sdt" => "1234",
      "email" => "truonghoptruyvanbinhthuong@gmail.com",
      "stk" => "14121" // them so 1 vao cuoi cung
    );

    $expected = "Id value is negative";
    $actual = $bankModel->updateUser_bank($input);

    $this->assertEquals($expected, $actual);
  }

  // id không tìm thấy.
  public function testUpdateUserBankWithIdNotFoundNg()
  {
    $bankModel = new BankModel();
    $input = array(
      "id" => "9999999999999999",
      "name" => "truonghoptruyvanbinhthuong",
      "fullname" => "truong hop truy van binh thuong",
      "sdt" => "1234",
      "email" => "truonghoptruyvanbinhthuong@gmail.com",
      "stk" => "14121" // them so 1 vao cuoi cung
    );

    $expected = "Not found bank to update";
    $actual = $bankModel->updateUser_bank($input);

    $this->assertEquals($expected, $actual);
  }
}
