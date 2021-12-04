<?php
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    public function testDeleteBankByIdOK()
    {
        $bankModel = new BankModel();
        $id = 1;
        $findBank = $bankModel->findBankById($id);
        if (!empty($findBank)) {
            $delete =  $bankModel->deleteBankById($id);
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testDeleteBankByIdNG()
    {
        $bankModel = new BankModel();
        $id = 11111;
        $findBank = $bankModel->findBankById($id);
        if (!empty($findBank)) {
            $delete =  $bankModel->deleteBankById($id);
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    public function testUpdateBankOK(){
        $bankModel = new BankModel();
        $bank = array(  
            'id' => 6,        
            'user_id' => '1234',
            'cost' => '12344',
            
        );         
        $expected = true;
        $actual = $bankModel->updateBank($bank);
        $this->assertEquals($actual, $expected);   
    }
    
   //
   public function testGetBanksOk()
   {
       $BankModel = new BankModel();

       $expected = '1';

       $Bank = $BankModel->getBanks();
       $this->assertEquals($expected, $Bank[1]['user_id']);
   }
   //
   public function testGetBanksNg()
   {
       $BankModel = new BankModel();

       $params['keyword'] = 99;

       $Bank = $BankModel->getBanks($params);

       if ($Bank == 'error') {
           $this->assertTrue(true);
       } else {
           $this->assertTrue(false);
       }
   }
   //
   public function testGetBanksNgAm()
   {
       $BankModel = new BankModel();

       $params['keyword'] = -9;

       $Bank = $BankModel->getBanks($params);

       if ($Bank == 'error') {
           $this->assertTrue(true);
       } else {
           $this->assertTrue(false);
       }
   }
   //
   public function testGetBanksDouble()
   {
       $BankModel = new BankModel();

       $params['keyword'] = 1.1;

       $Bank = $BankModel->getBanks($params);

       if ($Bank == 'error') {
           $this->assertTrue(true);
       } else {
           $this->assertTrue(false);
       }
   }
   //
   public function testGetBanksSpecialCharacters()
   {
       $BankModel = new BankModel();

       $params['keyword'] = '[/**//#@^%$]';

       $Bank = $BankModel->getBanks($params);

       if ($Bank == 'error') {
           $this->assertTrue(true);
       } else {
           $this->assertTrue(false);
       }
   }
   //
   public function testGetBanksIsArray()
   {
       $BankModel = new BankModel();

       $params['keyword'] = [];

       $Bank = $BankModel->getBanks($params);

       if ($Bank == 'error') {
           $this->assertTrue(true);
       } else {
           $this->assertTrue(false);
       }
   }
   //
   public function testGetBanksStr()
   {
       $BankModel = new BankModel();

       $params['keyword'] = 'abc';


       $expected = 'error';
       $actual = $BankModel->getBanks($params);

       $this->assertEquals($expected, $actual);
   }

   public function testGetBanksObject()
   {
       $BankModel = new BankModel();
       $params['keyword'] = new stdClass();
       $expected = 'error';
       $actual = $BankModel->getBanks($params);
       $this->assertEquals($expected, $actual);
   }
public function getBanks($params = [])
   {
       if (isset($params['keyword'])) {
           if (is_int($params['keyword']) == true || is_string($params['keyword']) == true) {
               $sql = 'SELECT * FROM banks WHERE user_id LIKE "%' . $params['keyword'] . '%"';
               $bank = $this->select($sql);
               if ($bank != null) {
                   return $bank;
               }
               return $bank = 'error';
           }
           return $bank = 'error';
       } else {
           $sql = 'SELECT * FROM banks';
           $bank = $this->select($sql);
       }

       return $bank;
   }
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
