<?php

use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{


  // ####################################################################
  // ###################### Hàm cập nhập bank. Hậu ######################
  // ####################################################################
  // test function findBankById
  public function testFindBankByID()
  {
    $bankModel = new BankModel();
    $bank = [
      "id" => 2,
      "name" => '123',
      "fullname" => "nameisnotstring",
      "sdt" => "4361",
      "email" => "nameisnotstring@gmail.com",
      "stk" => "22135",
    ];
    $expected = $bank['name'];
    $actual = $bankModel->findBankById(2);
    $this->assertEquals($expected, $actual[0]['name']);
  }

  public function testFindBankByID2()
  {
    $bankModel = new BankModel();

    $actual = count($bankModel->findBankById(2));
    if ($actual != 1) {
      $actual = "Không đúng";
    } else {
      $actual = "OK";
    }
    $expected = "OK";
    $this->assertEquals($expected, $actual);
  }
  public function testIDisInt()
  {
    $bank = new BankModel();
    $actual = $bank->findBankById(2);

    if (is_int((int)$actual[0]['id'])) {
      $actual = "is integer";
    } else {
      $actual = "not integer";
    }
    $expected = "is integer";
    $this->assertEquals($expected, $actual);
  }

  public function testIDisString()
  {
    $bank = new BankModel();
    $actual = $bank->findBankById(2);
    if (is_int((int)$actual[0]['id'])) {
      $actual = "not String";
    } else {
      $actual = "is String";
    }
    $expected = "not String";
    $this->assertEquals($expected, $actual);
  }
  public function testIDNull()
  {
    $bank = new BankModel();
    $actual = $bank->findBankById(2);
    if (empty($actual)) {
      $actual = "null";
    } else {
      $actual = "Not null";
    }
    $expected = "Not null";
    $this->assertEquals($expected, $actual);
  }
  public function testDataOfID()
  {
    $bankModel = new BankModel();
    $bank = [
      "id" => '2',
      "name" => '123',
      "fullname" => "nameisnotstring",
      "sdt" => "0",
      "email" => "nameisnotstring@gmail.com",
      "stk" => "22135",
      "SoDu"=>"0"
    ];
    $expected = $bank;
    $actual = $bankModel->findBankById(2);
    $this->assertEquals($expected, $actual[0]);
  }
  public function testNameBankId()
  {
    $bank = new BankModel();
    $expected = "Ok";
    $actual = $bank->findBankById(2);
    if ($actual[0]['name'] == "123") {
      $actual = "Ok";
    } else {
      $actual = "sai";
    }
    $this->assertEquals($expected, $actual);
  }
  public function testFullNameBankId()
  {
    $bank = new BankModel();
    $expected = "Ok";
    $actual = $bank->findBankById(2);
    if ($actual[0]['fullname'] == "nameisnotstring") {
      $actual = "Ok";
    } else {
      $actual = "Sai";
    }
    $this->assertEquals($expected, $actual);
  }
  public function testEmaiBankId()
  {
    $bank = new BankModel();
    $expected = "Ok";
    $actual = $bank->findBankById(2);
    if ($actual[0]['email'] == "nameisnotstring@gmail.com") {
      $actual = "Ok";
    } else {
      $actual = "Sai";
    }
    $this->assertEquals($expected, $actual);
  }
  public function testSDTBankId()
  {
    $bank = new BankModel();
    $expected = "Ok";
    $actual = $bank->findBankById(2);
    if ($actual[0]['sdt'] != "0") {
      $actual = "Sai";
    } else {
      $actual = "Ok";
    }
    $this->assertEquals($expected, $actual);
  }
  public function testSTKUserId()
  {
    $bank = new BankModel();
    $expected = "Ok";
    $actual = $bank->findBankById(2);
    if ($actual[0]['stk'] == "22135") {
      $actual = "Ok";
    } else {
      $actual = "Sai roi";
    }
    $this->assertEquals($expected, $actual);
  }

  public function testDataSDTOfBankID()
  {
    $bank = new BankModel();
    $actual = $bank->findBankById(2);
    if (is_numeric((int)$actual[0]['sdt'])) {
      $actual = "is number";
    } else {
      $actual = "not number";
    }
    $expected = "is number";
    $this->assertEquals($expected, $actual);
  }
  public function testDataSTKOfBankID()
  {
    $bank = new BankModel();
    $actual = $bank->findBankById(2);
    if (is_numeric((int)$actual[0]['stk'])) {
      $actual = "is number";
    } else {
      $actual = "not number";
    }
    $expected = "is number";
    $this->assertEquals($expected, $actual);
  }
  public function testLengthOfSDT()
  {
    $bank = new BankModel();
    $actual = $bank->findBankById(2);
    if (strlen($actual[0]['sdt']) <= 10) {
      $actual = true;
    } else {
      $actual = false;
    }
    $expected = true;
    $this->assertEquals($expected, $actual);
  }
  public function testLengthOfSTK()
  {
    $bank = new BankModel();
    $actual = $bank->findBankById(2);
    if (strlen($actual[0]['stk']) <= 15) {
      $actual = true;
    } else {
      $actual = false;
    }
    $expected = true;
    $this->assertEquals($expected, $actual);
  }
  public function testIDNotFound()
  {
    $bank = new BankModel();
    $actual = $bank->findBankById(2);
    if ($actual[0]['id'] == 11) {
      $actual = "ok";
    } else {
      $actual = "ID is not found";
    }
    $expected = "ID is not found";
    $this->assertEquals($expected, $actual);
  }


  //getBanks
  public function testgetCountUserBanks()
  {
    $userbanks = new BankModel();
    $key = ["keyword" => "123"];
    $actual[0] = $userbanks->getBanks($key);
    if (count($actual) == 1) {
      $actual = true;
    } else {
      $actual = false;
    }
    $expected = true;
    $this->assertEquals($expected, $actual);
  }

  public function testCountBanks()
  {
    $bank = new BankModel();
    $actual = $bank->getBanks();
    if (count($actual) == 1) {
      $actual = true;
    } else {
      $actual = false;
    }
    $expected = false;
    $this->assertEquals($expected, $actual);
  }
  public function testCountUserBankSpace()
  {
    $userbanks = new BankModel();
    $key = ["keyword"=>"    "];
    $actual = $userbanks->getBanks($key);
    if (count($actual) == 1) {
      $actual = true;
    } else {
      $actual = false;
    }
    $expected = false;
    $this->assertEquals($expected, $actual);
  }
  public function testCountUserBankSpecial()
  {
    $userbanks = new BankModel();
    $key = ["keyword"=>"%^^&%^^&"];
    $actual = $userbanks->getBanks($key);
    if (count($actual) == 1) {
      $actual = true;
    } else {
      $actual = false;
    }
    $expected = false;
    $this->assertEquals($expected, $actual);
  }
  public function testCountUserBankNumber()
  {
    $userbanks = new BankModel();
    $key = ["keyword"=>"45645645"];
    $actual = $userbanks->getBanks($key);
    if (count($actual) == 1) {
      $actual = true;
    } else {
      $actual = false;
    }
    $expected = false;
    $this->assertEquals($expected, $actual);
  }
  public function testCountUserBankLength()
  {
    $userbanks = new BankModel();
    $key["keyword"] =  "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
    $actual = $userbanks->getBanks($key);
    if (count($actual) == 1) {
      $actual = true;
    } else {
      $actual = false;
    }
    $expected = false;
    $this->assertEquals($expected, $actual);
  }
  public function testDataUser()
  {
    $userbanks = new BankModel();
    $bank = [
      "id" => '2',
      "name" => '123',
      "fullname" => "nameisnotstring",
      "sdt" => "0",
      "email" => "nameisnotstring@gmail.com",
      "stk" => "22135",
      'SoDu' => '0'
    ];
    $expected = $bank;
    $key["keyword"] =  "123";
    $actual =  $userbanks->getBanks($key);

    $this->assertEquals($expected, $actual[0]);
  }
  public function testDataUserName()
  {
    $userbanks = new BankModel();
    $bank = [
      "id" => 2,
      "name" => '123',
      "fullname" => "nameisnotstring",
      "sdt" => "4361",
      "email" => "nameisnotstring@gmail.com",
      "stk" => "22135",
    ];
    $expected = "123";
    $key = ["keyword"=>"123"];
    $actual =  $userbanks->getBanks($key);

    $this->assertEquals($expected, $actual[0]['name']);
  }
  public function testDataUserFullName()
  {
    $userbanks = new BankModel();
    $bank = [
      "id" => 2,
      "name" => '123',
      "fullname" => "nameisnotstring",
      "sdt" => "4361",
      "email" => "nameisnotstring@gmail.com",
      "stk" => "22135",
    ];
    $expected = "nameisnotstring";
    $key = ["keyword"=>"123"];
    $actual =  $userbanks->getBanks($key);

    $this->assertEquals($expected, $actual[0]['fullname']);
  }
  public function testDataUserSDT()
  {
    $userbanks = new BankModel();
    $bank = [
      "id" => 2,
      "name" => '123',
      "fullname" => "nameisnotstring",
      "sdt" => "0",
      "email" => "nameisnotstring@gmail.com",
      "stk" => "22135",
      'SoDu' => '0'
    ];
    $expected = "0";
    $key["keyword"] = "123";
    $actual =  $userbanks->getBanks($key);

    $this->assertEquals($expected, $actual[0]['sdt']);
  }
  public function testDataUserSTK()
  {
    $userbanks = new BankModel();
    $bank = [
      "id" => 2,
      "name" => '123',
      "fullname" => "nameisnotstring",
      "sdt" => "4361",
      "email" => "nameisnotstring@gmail.com",
      "stk" => "22135",
    ];
    $expected = "22135";
    $key["keyword"] = "123";
    $actual =  $userbanks->getBanks($key);

    $this->assertEquals($expected, $actual[0]['stk']);
  }
  public function testDataUserEmail()
  {
    $userbanks = new BankModel();
    $bank = [
      "id" => 2,
      "name" => '123',
      "fullname" => "nameisnotstring",
      "sdt" => "4361",
      "email" => "nameisnotstring@gmail.com",
      "stk" => "22135",
    ];
    $expected = "nameisnotstring@gmail.com";
    $key["keyword"] = "123";
    $actual =  $userbanks->getBanks($key);

    $this->assertEquals($expected, $actual[0]['email']);
  }
  public function testDataUserID()
  {
    $userbanks = new BankModel();
    $bank = [
      "id" => 2,
      "name" => '123',
      "fullname" => "nameisnotstring",
      "sdt" => "4361",
      "email" => "nameisnotstring@gmail.com",
      "stk" => "22135",
    ];
    $expected = $bank['id'];
    $key["keyword"] = "123";
    $actual =  $userbanks->getBanks($key);

    $this->assertEquals($expected, $actual[0]['id']);
  }
  public function testDataIsNotFound()
  {
    $userbanks = new BankModel();
    $expected = "User is not Found";
    $key["keyword"] = "23232323";
    $userbanks->getBanks($key);
    $actual[] = $userbanks;
    if (Count($actual) == 1) {
      $actual = "User is not Found";
    } else {
      $actual = "ok";
    }
    $this->assertEquals($expected, $actual);
  }

  public function testStringName()
  {
    $userbanks = new BankModel();
    $expected = "is String";
    $key["keyword"] = "123";
    $actual = $userbanks->getBanks($key);

    if (is_string($actual[0]['name'])) {
      $actual = "is String";
    } else {
      $actual = "not String";
    }
    $this->assertEquals($expected, $actual);
  }
  public function testStringEmail()
  {
    $userbanks = new BankModel();
    $expected = "is String";
    $key["keyword"] = "123";
    $actual = $userbanks->getBanks($key);

    if (is_string($actual[0]['email'])) {
      $actual = "is String";
    } else {
      $actual = "not String";
    }
    $this->assertEquals($expected, $actual);
  }
  public function testIntSTK()
  {
    $userbanks = new BankModel();
    $expected = "is Integer";
    $key["keyword"] = "123";
    $actual = $userbanks->getBanks($key);

    if (is_numeric((int)$actual[0]['stk'])) {
      $actual = "is Integer";
    } else {
      $actual = "not Integer";
    }
    $this->assertEquals($expected, $actual);
  }
  public function testIntSDT()
  {
    $userbanks = new BankModel();
    $expected = "is Integer";
    $key["keyword"] = "123";
    $actual = $userbanks->getBanks($key);

    if (is_numeric((int)$actual[0]['sdt'])) {
      $actual = "is Integer";
    } else {
      $actual = "not Integer";
    }
    $this->assertEquals($expected, $actual);
  }
  public function testIntID()
  {
    $userbanks = new BankModel();
    $expected = "is Integer";
    $key["keyword"] = "123";
    $actual = $userbanks->getBanks($key);

    if (is_numeric((int)$actual[0]['id'])) {
      $actual = "is Integer";
    } else {
      $actual = "not Integer";
    }
    $this->assertEquals($expected, $actual);
  }


  //Instance
  public function testInstance()
  {
    $bank1 = BankModel::getInstance();
    $bank2 =  BankModel::getInstance();

    $actual = false;
    if ($bank1 === $bank2) {
      $actual = true;
    }
    $expected = true;

    $this->assertEquals($expected, $actual);
  }

  public function testInstanceisOb()
  {
    $bank = BankModel::getInstance();
    if (is_object($bank)) {
      $this->assertTrue(True);
    } else {
      $this->assertTrue(false);
    }
  }
  public function testInstanceNotNull()
  {
    $bank = BankModel::getInstance();
    $actual = $bank;
    if (empty($actual)) {
      $actual = false;
    } else {
      $actual = true;
    }
    $expected = true;
    $this->assertEquals($expected, $actual);
  }
  public function testInstanceBankModel()
  {
    $bank = BankModel::getInstance();
    $actual = get_class($bank);
    $expected = BankModel::class;
    $this->assertEquals($expected, $actual);
  }
  public function testInstanceAndBankModel()
  {
    $bank = new BankModel();
    $bank3 = $bank;

    $bank2 = BankModel::getInstance();
    if ($bank !== $bank2) {
      $this->assertTrue(true);
    }
  }
}
