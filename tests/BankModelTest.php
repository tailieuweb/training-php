<?php

use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
  /* ***************************
    ?Start Test function InsertBank
    ***************************** */
  public function testInsertBankGood()
  {
    $bank = new BankModel();
    $bank->startTransaction();

    $input = array('user_id' => '1', 'cost' => '13');
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    $bank->rollback();
    if ($actual != false) {
      return $this->assertTrue(true);
    } else {
      return $this->assertTrue(false);
    }
  }
  /* 
  ******** 
  ?Test Id 
  *********** */
  public function testInsertBankWithIdNull()
  {
    $bank = new BankModel();
    $input = array('user_id' => '', 'cost' => '13');
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    if ($actual != false) {
      return $this->assertTrue(false);
    } else {
      return $this->assertTrue(true);
    }
  }
  public function testInsertBankWithIdString()
  {
    $bank = new BankModel();
    $input = array('user_id' => 'hai', 'cost' => '13');
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    if ($actual != false) {
      return $this->assertTrue(false);
    } else {
      return $this->assertTrue(true);
    }
  }
  public function testInsertBankWithIdDifferenceFormat()
  {
    $bank = new BankModel();
    $input = array('user_id' => 'AH$', 'cost' => 'hai% tram@');
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    if ($actual != false) {
      return $this->assertTrue(false);
    } else {
      return $this->assertTrue(true);
    }
  }
  public function testInsertBankWithIdInt()
  {
    $bank = new BankModel();
    $bank->startTransaction();
    $input = array('user_id' => 1, 'cost' => '200');
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    $bank->rollback();
    if ($actual != false) {
      return $this->assertTrue(true);
    } else {
      return $this->assertTrue(false);
    }
  }
  public function testInsertBankWithIdDouble()
  {
    $bank = new BankModel();
    $input = array('user_id' => 6.3, 'cost' => '200');
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    if ($actual != false) {
      return $this->assertTrue(false);
    } else {
      return $this->assertTrue(true);
    }
  }
  public function testInsertBankWithIdTrueFalse()
  {
    $bank = new BankModel();
    $input = array('user_id' => true, 'cost' => '200');
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    if ($actual != false) {
      return $this->assertTrue(false);
    } else {
      return $this->assertTrue(true);
    }
  }
  public function testInsertBankWithIdSpecialSign()
  {
    $bank = new BankModel();
    $input = array('user_id' => '!1@', 'cost' => '200');
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    if ($actual != false) {
      return $this->assertTrue(false);
    } else {
      return $this->assertTrue(true);
    }
  }
  public function testInsertBankWithIdSameId()
  {
    $bank = new BankModel();
    $input = array('user_id' => 6, 'cost' => '200');
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    if ($actual != false) {
      return $this->assertTrue(false);
    } else {
      return $this->assertTrue(true);
    }
  }
  public function testInsertBankWithUpperCaseId()
  {
    $bank = new BankModel();
    $input = array('user_id' => 'MOT', 'cost' => '200');
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    if ($actual != false) {
      return $this->assertTrue(false);
    } else {
      return $this->assertTrue(true);
    }
  }
  public function testInsertBankWithOverMaxLengthId()
  {
    $bank = new BankModel();
    $input = array('user_id' => 12345678912345678, 'cost' => '200');
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    if ($actual != false) {
      return $this->assertTrue(false);
    } else {
      return $this->assertTrue(true);
    }
  }
  public function testInsertBankWithEqualMaxLengthId()
  {
    $bank = new BankModel();
    $bank->startTransaction();
    $input = array('user_id' => 1234567891, 'cost' => '200');
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    $bank->rollback();
    if ($actual != false) {
      return $this->assertTrue(true);
    } else {
      return $this->assertTrue(false);
    }
  }
  public function testInsertBankWithObjectId()
  {
    $bank = new BankModel();
    $bankObject = new BankModel();
    $bankObject->listbank = array('abc', 'telecom');
    $input = array('user_id' => $bankObject, 'cost' => '200');
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    if ($actual != false) {
      return $this->assertTrue(false);
    } else {
      return $this->assertTrue(true);
    }
  }
  public function testInsertBankWithOtherLanguageId()
  {
    $bank = new BankModel();
    $input = array('user_id' => 'สวัสดี', 'cost' => '200');
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    if ($actual != false) {
      return $this->assertTrue(false);
    } else {
      return $this->assertTrue(true);
    }
  }
  public function testInsertBankWithHTMLTagId()
  {
    $bank = new BankModel();
    $input = array('user_id' => '<b>Hello</b>', 'cost' => '200');
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    if ($actual != false) {
      return $this->assertTrue(false);
    } else {
      return $this->assertTrue(true);
    }
  }
  public function testInsertBankWithJavascriptTagId()
  {
    $bank = new BankModel();
    $input = array('user_id' => '<script>alert("HI")</script>', 'cost' => '200');
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    if ($actual != false) {
      return $this->assertTrue(false);
    } else {
      return $this->assertTrue(true);
    }
  }
  public function testInsertBankWithLowerCaseId()
  {
    $bank = new BankModel();
    $input = array('user_id' => 'hai', 'cost' => '200');
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    if ($actual != false) {
      return $this->assertTrue(false);
    } else {
      return $this->assertTrue(true);
    }
  }
  public function testInsertBankWithNegativeId()
  {
    $bank = new BankModel();
    $input = array('user_id' => '-2', 'cost' => '200');
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    if ($actual != false) {
      return $this->assertTrue(false);
    } else {
      return $this->assertTrue(true);
    }
  }
  public function testInsertBankWithPositiveId()
  {
    $bank = new BankModel();
    $input = array('user_id' => '2', 'cost' => '200');
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    if ($actual != false) {
      return $this->assertTrue(false);
    } else {
      return $this->assertTrue(true);
    }
  }
  /*
   ******** 
   ?Test Cost 
   *********** */
  public function testInsertBankWithCostNull()
  {
    $bank = new BankModel();
    $input = array('user_id' => '', 'cost' => '13');
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    if ($actual != false) {
      return $this->assertTrue(false);
    } else {
      return $this->assertTrue(true);
    }
  }
  public function testInsertBankWithCostString()
  {
    $bank = new BankModel();
    $input = array('user_id' => '2', 'cost' => 'hai tram');
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    if ($actual != false) {
      return $this->assertTrue(false);
    } else {
      return $this->assertTrue(true);
    }
  }
  public function testInsertBankWithCostDifferenceFormat()
  {
    $bank = new BankModel();
    $input = array('user_id' => '2', 'cost' => 'hai% tram@');
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    if ($actual != false) {
      return $this->assertTrue(false);
    } else {
      return $this->assertTrue(true);
    }
  }
  public function testInsertBankWithCostInteger()
  {
    $bank = new BankModel();
    $bank->startTransaction();
    $input = array('user_id' => '1', 'cost' => 100);
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    $bank->rollback();
    if ($actual != false) {
      return $this->assertTrue(true);
    } else {
      return $this->assertTrue(false);
    }
  }
  public function testInsertBankWithCostDouble()
  {
    $bank = new BankModel();
    $bank->startTransaction();
    $input = array('user_id' => '1', 'cost' => 100.56);
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    $bank->rollback();
    if ($actual != false) {
      return $this->assertTrue(true);
    } else {
      return $this->assertTrue(false);
    }
  }
  public function testInsertBankWithCostTrueFalse()
  {
    $bank = new BankModel();
    $input = array('user_id' => '47', 'cost' => true);
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    if ($actual != false) {
      return $this->assertTrue(false);
    } else {
      return $this->assertTrue(true);
    }
  }
  public function testInsertBankWithCostSpecialSign()
  {
    $bank = new BankModel();
    $input = array('user_id' => '47', 'cost' => '!100@$');
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    if ($actual != false) {
      return $this->assertTrue(false);
    } else {
      return $this->assertTrue(true);
    }
  }
  public function testInsertBankWithObjectCost()
  {
    $bank = new BankModel();
    $bankOject = new BankModel();
    $bankOject->listbank = array('abc', 'telecom');
    $input = array('user_id' => '1', 'cost' => $bankOject);
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    if ($actual != false) {
      return $this->assertTrue(false);
    } else {
      return $this->assertTrue(true);
    }
  }
  public function testInsertBankWithOtherLanguageCost()
  {
    $bank = new BankModel();
    $input = array('user_id' => '6', 'cost' => 'สวัสดี');
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    if ($actual != false) {
      return $this->assertTrue(false);
    } else {
      return $this->assertTrue(true);
    }
  }
  public function testInsertBankWithHTMLTagCost()
  {
    $bank = new BankModel();
    $input = array('user_id' => '6', 'cost' => '<b>Hello</b>');
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    if ($actual != false) {
      return $this->assertTrue(false);
    } else {
      return $this->assertTrue(true);
    }
  }
  public function testInsertBankWithJavascriptTagCost()
  {
    $bank = new BankModel();
    $input = array('user_id' => '6', 'cost' => '<script>alert("HI")</script>');
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    if ($actual != false) {
      return $this->assertTrue(false);
    } else {
      return $this->assertTrue(true);
    }
  }
  public function testInsertBankWithUpperCaseCost()
  {
    $bank = new BankModel();
    $input = array('user_id' => '6', 'cost' => 'HAI TRAM');
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    if ($actual != false) {
      return $this->assertTrue(false);
    } else {
      return $this->assertTrue(true);
    }
  }
  public function testInsertBankWithLowerCaseCost()
  {
    $bank = new BankModel();
    $input = array('user_id' => '6', 'cost' => 'hai tram');
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    if ($actual != false) {
      return $this->assertTrue(false);
    } else {
      return $this->assertTrue(true);
    }
  }
  public function testInsertBankWithNegativeCost()
  {
    $bank = new BankModel();
    $input = array('user_id' => '6', 'cost' => '-200');
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    if ($actual != false) {
      return $this->assertTrue(false);
    } else {
      return $this->assertTrue(true);
    }
  }
  public function testInsertBankWithPositiveCost()
  {
    $bank = new BankModel();
    $input = array('user_id' => '6', 'cost' => '200');
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    if ($actual != false) {
      return $this->assertTrue(false);
    } else {
      return $this->assertTrue(true);
    }
  }
  /* ***************************
    ?End Test function InsertBank
    ***************************** */
}
