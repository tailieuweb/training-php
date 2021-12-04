<?php
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    //Update Bank
    //test update thanh cong
    public function testupdateBankOk()
    {
        $bank = new BankModel();
        $input = [];
        $input['id'] = 2;
        $input['user_id'] = 2;
        $input['cost'] = 111;
        $actual = $bank->updateBank($input);
        if ($actual == true) {
            return $this->assertTrue(true);
        }
        else{
            return $this->assertTrue(false);
        }
    }
    //test update id khong ton tai o database
    public function testUpdateBankIdnotexistslq()
    {
        $bank = new BankModel();
        $input = [];
        $input['id'] = 1000;
        $input['user_id'] = 3;
        $input['cost'] = 111;
        $actual = $bank->updateBank($input);
        if ($actual != true) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    //test update id khong co gia tri
    public function testUpdateBanknull()
    {
        $bank = new BankModel();
        $input = [];
        $input['id'] = null;
        $input['user_id'] = 3;
        $input['cost'] = 111;
        $actual = $bank->updateBank($input);
        if ($actual != true) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    //!test update id la chuoi
    public function testUpdateBankIDisstr()
    {
        $bank = new BankModel();
        $input = [];
        $input['id'] = "a";
        $input['user_id'] = 3;
        $input['cost'] = 111;
        $actual = $bank->updateBank($input);
        if ($actual != true) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    //test update user_id la số âm 
    public function testUpdateBankuser_IDissoam()
    {
        $bank = new BankModel();
        $input = [];
        $input['id'] = 1;
        $input['user_id'] = -1;
        $input['cost'] = 111;
        $actual = $bank->updateBank($input);
        if ($actual == false) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    //test update user_id la so 0
    public function testUpdateBankuser_IDiszero()
    {
        $bank = new BankModel();
        $input = [];
        $input['id'] = 1;
        $input['user_id'] = 0;
        $input['cost'] = 111;
        $actual = $bank->updateBank($input);
        if ($actual == false) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    //test update user_id la chuoi
    public function testUpdateBankuser_IDisstr()
    {
        $bank = new BankModel();
        $input = [];
        $input['id'] = 1;
        $input['user_id'] = "a";
        $input['cost'] = 111;
        $actual = $bank->updateBank($input);
        if ($actual == false) {
            return $this->assertTrue(false);
        }
            return $this->assertTrue(true);
    }
    //test update user_id la null
    public function testUpdateBankuser_IDisnull()
    {
        $bank = new BankModel();
        $input = [];
        $input['id'] = 1;
        $input['user_id'] = null;
        $input['cost'] = 111;
        $actual = $bank->updateBank($input);
        if ($actual == false) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    //test update user_id la double
    public function testUpdateBankuser_IDisdouble()
    {
        $bank = new BankModel();
        $input = [];
        $input['id'] = 1;
        $input['user_id'] = 2.1;
        $input['cost'] = 111;
        $actual = $bank->updateBank($input);
        if ($actual == false) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    //!test update user_id la chuoi + so
    public function testUpdateBankuser_IDisStrandInt()
    {
        $bank = new BankModel();
        $input = [];
        $input['id'] = 1;
        $input['user_id'] = "a1";
        $input['cost'] = 111;
        $actual = $bank->updateBank($input);
        if ($actual != true) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    //!test update  user_id la so + chuoi
    public function testUpdateBankuser_IDisIntandStr()
    {
        $bank = new BankModel();
        $input = [];
        $input['id'] = 1;
        $input['user_id'] = "1a";
        $input['cost'] = 111;
        $actual = $bank->updateBank($input);
        if ($actual == false) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    //test update cost la số âm 
    public function testUpdateBankCostissoam()
    {
        $bank = new BankModel();
        $input = [];
        $input['id'] = 1;
        $input['user_id'] = 1;
        $input['cost'] = -111;
        $actual = $bank->updateBank($input);
        if ($actual == false) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    // test update cose la  so 0
    public function testUpdateBankCoseiszero()
    {
        $bank = new BankModel();
        $input = [];
        $input['id'] = 1;
        $input['user_id'] = 1;
        $input['cost'] = 0;
        $actual = $bank->updateBank($input);
        if ($actual == false) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
     //test update cose la null
     public function testUpdateBankcoseisnull()
     {
         $bank = new BankModel();
         $input = [];
         $input['id'] = 1;
         $input['user_id'] = 1;
         $input['cost'] = null;
         $actual = $bank->updateBank($input);
         if ($actual == false) {
             return $this->assertTrue(true);
         }
         return $this->assertTrue(false);
     }
     //test update user_id la double
    public function testUpdateBankCoseisdouble()
    {
        $bank = new BankModel();
        $input = [];
        $input['id'] = 1;
        $input['user_id'] = 1;
        $input['cost'] = 111.1;
        $actual = $bank->updateBank($input);
        if ($actual == false) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
     //!test update Cose la chuoi + so
    public function testUpdateBankCoseisStrandInt()
    {
        $bank = new BankModel();
        $input = [];
        $input['id'] = 1;
        $input['user_id'] = 1;
        $input['cost'] = "a1";
        $actual = $bank->updateBank($input);
        if ($actual != true) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    //!test update  Cose la so + chuoi
    public function testUpdateBankCoseisIntandStr()
    {
        $bank = new BankModel();
        $input = [];
        $input['id'] = 1;
        $input['user_id'] = 1;
        $input['cost'] = "1a";
        $actual = $bank->updateBank($input);
        if ($actual == false) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    // Insert Bank
    //test insertBank thanh cong
    public function testInsertBankGood()
    {
        $bank = new BankModel();
        $input = [];
        $input['user_id'] = 1;
        $input['cost'] = 111;
        $actual = $bank->insertBank($input);
        if ($actual == true) {
            return $this->assertTrue(true);
        }
        else{
            return $this->assertTrue(false);
        }
    }
    //test insertBank user_id la số âm 
    public function testInsertBankuser_IDissoam()
    {
        $bank = new BankModel();
        $input = [];
        $input['user_id'] = -1;
        $input['cost'] = 111;
        $actual = $bank->insertBank($input);
        if ($actual == false) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    //test insertBank user_id la so 0
    public function testInsertBankuser_IDiszero()
    {
        $bank = new BankModel();
        $input = [];
        $input['user_id'] = 0;
        $input['cost'] = 111;
        $actual = $bank->insertBank($input);
        if ($actual == false) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    //!test insertBank user_id la chuoi
    public function testInsertBankuser_IDisstr()
    {
        $bank = new BankModel();
        $input = [];
        $input['user_id'] = "a";
        $input['cost'] = 111;
        $actual = $bank->insertBank($input);
        if ($actual == false) {
            return $this->assertTrue(false);
        }
            return $this->assertTrue(true);
    }
    // test insertBank user_id la null
    public function testInsertBankuser_IDisnull()
    {
        $bank = new BankModel();
        $input = [];
        $input['user_id'] = null;
        $input['cost'] = 111;
        $actual = $bank->insertBank($input);
        if ($actual == false) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    // test insertBank user_id la double
    public function testInsertBankuser_IDisdouble()
    {
        $bank = new BankModel();
        $input = [];
        $input['user_id'] = 2.1;
        $input['cost'] = 111;
        $actual = $bank->insertBank($input);
        if ($actual == false) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
  
    //!test insertBank user_id la chuoi + so
    public function testInsertBankuser_IDisStrandInt()
    {
        $bank = new BankModel();
        $input = [];
        $input['user_id'] = "a1";
        $input['cost'] = 111;
        $actual = $bank->insertBank($input);
        if ($actual != true) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    //!test insertBank  user_id la so + chuoi
    public function testInsertBankuser_IDisIntandStr()
    {
        $bank = new BankModel();
        $input = [];
        $input['user_id'] = "1a";
        $input['cost'] = 111;
        $actual = $bank->insertBank($input);
        if ($actual == false) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
       //test insertBank cost la số âm 
       public function testInsertBankCostissoam()
       {
           $bank = new BankModel();
           $input = [];
           $input['user_id'] = 1;
           $input['cost'] = -111;
           $actual = $bank->insertBank($input);
           if ($actual == false) {
               return $this->assertTrue(true);
           }
           return $this->assertTrue(false);
       }
       // test insertBank cose la  so 0
       public function testInsertBankCoseiszero()
       {
           $bank = new BankModel();
           $input = [];
           $input['user_id'] = 1 ;
           $input['cost'] = 0;
           $actual = $bank->insertBank($input);
           if ($actual == false) {
               return $this->assertTrue(true);
           }
           return $this->assertTrue(false);
       }
        //test insertBank cose la null
        public function testInsertBankcoseisnull()
        {
            $bank = new BankModel();
            $input = [];
            $input['id'] = 1;
            $input['user_id'] = 1;
            $input['cost'] = null;
            $actual = $bank->insertBank($input);
            if ($actual == false) {
                return $this->assertTrue(true);
            }
            return $this->assertTrue(false);
        }
        //test insertBank user_id la double
       public function testInsertBankCoseisdouble()
       {
           $bank = new BankModel();
           $input = [];
           $input['user_id'] = 1;
           $input['cost'] = 111.1;
           $actual = $bank->insertBank($input);
           if ($actual == false) {
               return $this->assertTrue(false);
           }
           return $this->assertTrue(true);
       }
        //!test insertBank Cose la chuoi + so
       public function testInsertBankCoseisStrandInt()
       {
           $bank = new BankModel();
           $input = [];
           $input['user_id'] = 1;
           $input['cost'] = "a1";
           $actual = $bank->insertBank($input);
           if ($actual != true) {
               return $this->assertTrue(false);
           }
           return $this->assertTrue(true);
       }
       //!test insertBank  Cose la so + chuoi
       public function testInsertBankCoseisIntandStr()
       {
           $bank = new BankModel();
           $input = [];
           $input['user_id'] = 1;
           $input['cost'] = "1a";
           $actual = $bank->insertBank($input);
           if ($actual == false) {
               return $this->assertTrue(false);
           }
           return $this->assertTrue(true);
       }
    // Test getBank
    //test get bank thanh cong
    public function testGetBanksOk()
    {
        $BankModel = new BankModel();
        $expected = '2';
        $Bank = $BankModel->getBanks();
        $this->assertEquals($expected, $Bank[0]['user_id']);
    }
    //test get bank keword la doi tuong
    public function testGetBanksObject()
    {
        $BankModel = new BankModel();
        $params['keyword'] = new stdClass();
        $expected = 'error';
        $actual = $BankModel->getBanks($params);
        $this->assertEquals($expected, $actual);
    }
    //test get bank keyword la null
    public function testGetBanksIsNull()
    {
        $BankModel = new BankModel();

        $params['keyword'] = null;

        $Bank = $BankModel->getBanks($params);

        if ($Bank == 'error') {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    //test get bank khong ton tai keyword
    public function testGetBanksNotGood()
    {
        $BankModel = new BankModel();
        $params['keyword'] = 111111;
        $Bank = $BankModel->getBanks($params);
        if ($Bank == 'error') {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    //test get bank  keyword la so am
    public function testGetBanksisSoAm()
    {
        $BankModel = new BankModel();
        $params['keyword'] = -10;
        $Bank = $BankModel->getBanks($params);
        if ($Bank == 'error') {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    //test get bank keyword la so le
    public function testGetBanksisDouble()
    {
        $BankModel = new BankModel();
        $params['keyword'] = 2.5;
        $Bank = $BankModel->getBanks($params);
        if ($Bank == 'error') {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    //test get bank keyword la ky tu dat biet
    public function testGetBanksisKitudatbiet()
    {
        $BankModel = new BankModel();
        $params['keyword'] = '(-=[!@#$$%';
        $Bank = $BankModel->getBanks($params);
        if ($Bank == 'error') {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    //test get bank keyword la kieu mang
    public function testGetBanksisArray()
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
    //tesst get bank keyword la kieu chuoi
    public function testGetBanksString()
    {
        $BankModel = new BankModel();
        $params['keyword'] = 'a';
        $expected = 'error';
        $actual = $BankModel->getBanks($params);
        $this->assertEquals($expected, $actual);
    }
    //C
    public function testGetBanksIsBoolean()
    {
        $bankModel = new BankModel();
        $params['keyword']  = true;
        $bank = $bankModel->getBanks($params);
        if ($bank == 'error') {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }

}