<?php

use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
  /* ***************************
    Start Test function InsertBank
    ***************************** */
  public function testInsertBankGood()
  {
    $bank = new BankModel();
    $input = array('user_id' => '1', 'cost' => '13');
    $actual = $bank->insertBanks($input);
    // var_dump($actual);
    // die();
    if ($actual != false) {
      return $this->assertTrue(true);
    } else {
      return $this->assertTrue(false);
    }
  }
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
  /* ***************************
    End Test function InsertBank
    ***************************** */
}
