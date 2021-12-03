<?php
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{

 /*Test  insert nhập sai Bank Not OK*/
     public function testInsertBankNG()
    {
     
    $bankModel = new BankModel();
    $actual = null;
     $bank = array(
        'user_id' => '6',
        'cost' => '123',
    );
    try {
      $actual = $bankModel->insertBanks('abcdefgh',   $bankModel);
   } catch (Throwable $e) {
     $excute = false;
    }
     $this->assertEquals($excute, $actual);
}
/*Test insert bank truyền vào chuỗi*/
    public function testInsertBankStringNotOK()
     {
   
   $bankModel = new BankModel();
   $actual = null;
   $bank = array(
        'user_id' => '6',
        'cost' => '123',
   );
   try {
    $actual = $bankModel->insertBank('abcdefgh',   $bankModel);
   } catch (Throwable $e) {
   $excute = false;
  }
    $this->assertEquals($excute, $actual);
  }
   /*Test insert bank truyền vào số nguyên*/
   public function testInsertBankIntegerNG()
   {
     
     $bankModel = new BankModel();
     $actual = null;
     $bank = array(
        'user_id' => '1',
        'cost' => '123',
     );
     try {
        $actual = $bankModel->insertBank(111,   $bankModel);
     } catch (Throwable $e) {
         $excute = false;
     }
     $this->assertEquals($excute, $actual);
   }
   /*Test insert bank truyền vào số nguyên*/
   public function testInsertBankRealnumberNG()
   {
    
     $bankModel = new BankModel();
     $actual = null;
     $bank = array(
        'user_id' => '1',
        'cost' => '123',
     );
     try {
        $actual = $bankModel->insertBank(12.2,   $bankModel);
     } catch (Throwable $e) {
         $excute = false;
     }
     $this->assertEquals($excute, $actual);
   }





       /*Test  insert user nhập đúng OK*/
    //    public function testInsertBankOk(){
    //     $bankModel = new BankModel();
    
    //     $bank = array(
           
    //         'user_id' => '1',
    //         'cost' => '1111',
    //     );
    //     $excute = true;
    //     $actual = $bankModel->insertUser($bank, $bankModel);
    //     $this->assertEquals($excute, $actual); 
    // }
    // public function testInsertBankOK(){
    //     $bankModel = new BankModel();
    //     $bankUserid ='1';
    //     $bankCost = '1111';
    //     $bank = $bankModel->insertBank($bankUserid);
       
    //     $actual = $bank[1]['cost'];
    //     $this->assertEquals($bankCost, $actual);
    // }
}
