<?php
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{


        /*Test  insert bank nhập đúng OK*/
        public function testInsertBankOK()
        {
            $bankModel = new BankModel();
            
            $bank = array(
                'user_id' => '1',
                'cost' => '11',
            );
            $excute = true;
    
            $actual = $bankModel->insertBank($bank, $bankModel);
            $this->assertEquals($excute, $actual);
        }
 /*Test  insert nhập sai Bank Not OK*/
     public function testInsertBankNotOK()
    {
     
    $bankModel = new BankModel();
    $actual = null;
     $bank = array(
        'user_id' => '1',
            'cost' => '11',
    );
    try {
      $actual = $bankModel->insertBanks('abcdefgh',$bankModel);
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
    'user_id' => '1',
    'cost' => '11',
   );
   try {
    $actual = $bankModel->insertBank('abcdefgh',$bankModel);
   } catch (Throwable $e) {
   $excute = false;
  }
    $this->assertEquals($excute, $actual);
  }
   /*Test insert bank truyền vào số nguyên*/
   public function testInsertBankIntegerNotOK()
   {
     
     $bankModel = new BankModel();
     $actual = null;
     $bank = array(
        'user_id' => '1',
            'cost' => '11',
     );
     try {
        $actual = $bankModel->insertBank(111,$bankModel);
     } catch (Throwable $e) {
         $excute = false;
     }
     $this->assertEquals($excute, $actual);
   }
   /*Test insert bank truyền vào số nguyên*/
   public function testInsertBankRealnumberNotOK()
   {
    
     $bankModel = new BankModel();
     $actual = null;
     $bank = array(
        'user_id' => '1',
            'cost' => '11',
     );
     try {
        $actual = $bankModel->insertBank(12.2,$bankModel);
     } catch (Throwable $e) {
         $excute = false;
     }
     $this->assertEquals($excute, $actual);
   }


          

}
