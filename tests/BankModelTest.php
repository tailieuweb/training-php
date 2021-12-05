<?php
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    // Test FindBankById
    /* =================== Test hàm finBankById khi có dữ liệu truyền vào ok ========================= */
    // public function testFindBankByIdOk(){
    //     $bankModel = new BankModel();
    //     $id  = 1;
    //     $expected['cost'] = 11; //Mong đợis
    //     $actual = $bankModel->findBankById($id);
    //     var_dump($actual);
    //     $this->assertEquals($expected['cost'], $actual);
    // }
    /* =================== Test hàm finBankById khi có dữ liệu truyền vào not ok ========================= */
    public function testFindBankByIdNotOk()
    {
        $bankModel = new BankModel();
        $id = 1333;
        $actual = $bankModel->findBankById($id);
        $expected = [];
        // var_dump($bank);die();
        $this->assertEquals($expected, $actual);

    }
    /* =================== Test hàm finBankById khi có dữ liệu truyền vào kiểu string ========================= */
    public function testFindBankByIdStr()
    {
        $bankModel = new BankModel();
        $id = 'aa';
        $expected = 'error';
        $actual = $bankModel->findBankById($id); //actual
        // var_dump($bank);die();

        $this->assertEquals($expected, $actual);

    }
    /* =================== Test hàm finBankById khi không có dữ liệu truyền vào  ========================= */
    public function testFindBankByIdNull()
    {
        $bankModel = new BankModel();
        $id = '';
        $expected = 'error';
        $actual = $bankModel->findBankById($id);

        $this->assertEquals($expected, $actual);

    }
    /* =================== Test hàm finBankById khi có dữ liệu truyền vào là kiểu đối tượng ========================= */
    public function testFindBankByIdObject()
    {
        $bankModel = new BankModel();
        $ob = (object) '1';
        if (is_object($ob)) {
            $ob = '';
            $bankModel->findBankById($ob);
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /* =================== Test hàm finBankById khi có dữ liệu truyền vào là kiểu ký tự ========================= */
    public function testFindBankByIdCharacters()
    {
        $bankModel = new BankModel();
        $cha = '/[0-9A-Za-z]/';
        $id = '%';
        $bankModel->findBankById($id);
        if (!preg_match($cha, $id)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /* =================== Test hàm finBankById khi có dữ liệu truyền vào là câu lệnh javascript ========================= */
    public function testFindBankByIdJavascript()
    {
        $bankModel = new BankModel();
        $id = "<script>alert('hello')</script>";
        $expected = 'error';
        $actual = $bankModel->findBankById($id); //actual
        // var_dump($bank);die();

        $this->assertEquals($expected, $actual);

    }
    /* =================== Test hàm finBankById khi có dữ liệu truyền vào là một câu lệnh sql ========================= */
    public function testFindBankByIdSqlInjectionNotOK()
    {
        $bankModel = new BankModel();
        $actual = null;

        $id = 'select * from banks';
        $actual = $bankModel->findBankById($id);
        $excute = 'error';
        $this->assertEquals($excute, $actual);
    }
    /* =================== Test hàm finbankById khi có dữ liệu truyền vào là kiểu số thực ========================= */
    public function testFindBankByIdFloatNotOK()
    {
        $bankModel = new BankModel();
        $id = 1.4;
        $actual = $bankModel->findBankById($id);
        $excute = [];
        $this->assertEquals($excute, $actual);
    }

    //Test findBank
    /* =================== Test hàm finBank khi có dữ liệu truyền vào ok ========================= */
    public function testFindBankOk()
    {
        $bankModel = new BankModel();
        $id = 1;
        $bank = $bankModel->findBank($id);
        if (empty($bank)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }

    }
    /* =================== Test hàm finBankkhi có dữ liệu truyền vào not ok ========================= */
    public function testFindBankNotOk()
    {
        $bankModel = new BankModel();
        $keyword = 6;
        $bank = $bankModel->findBank($keyword);
        $expected = [];
        // var_dump($bank);die();
        $this->assertEquals($expected, $bank);

    }
    /* =================== Test hàm finBank khi có dữ liệu truyền vào là kiểu string ========================= */
    public function testFindBankStr()
    {
        $bankModel = new BankModel();
        $keyword = 'aa';
        $expected = [];
        $actual = $bankModel->findBank($keyword); //actual
        // var_dump($bank);die();

        $this->assertEquals($expected, $actual);

    }
    /* =================== Test hàm finBank khi không có dữ liệu truyền vào ========================= */
    public function testFindBankNull()
    {
        $bankModel = new BankModel();
        $keyword = '';
        $expected = [];
        $actual = $bankModel->findBank($keyword);

        $this->assertEquals($expected, $actual);

    }
    /* =================== Test hàm finBank khi có dữ liệu truyền vào là kiểu đối tượng  ========================= */
    public function testFindBankObject()
    {
        $bankModel = new BankModel();
        $ob = (object) '1';
        if (is_object($ob)) {
            $ob = '';
            $bankModel->findBank($ob);
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /* =================== Test hàm finBank khi có dữ liệu truyền vào là ký tự đặc biệt ========================= */
    public function testFindBankCharacters()
    {
        $bankModel = new BankModel();
        $cha = '/[0-9A-Za-z]/';
        $keyword = '%';
        $bankModel->findBank($keyword);
        if (!preg_match($cha, $keyword)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /* =================== Test hàm finBank khi có dữ liệu truyền vào bằng câu lệnh javascript ========================= */
    public function testFindBankJavascript()
    {
        $bankModel = new BankModel();
        $keyword = "<script>alert('hello')</script>";
        $expected = [];
        $actual = $bankModel->findBank($keyword); //actual
        // var_dump($bank);die();

        $this->assertEquals($expected, $actual);

    }
    /* =================== Test hàm finBank khi có dữ liệu truyền vào bằng câu lệnh sql ========================= */
    public function testFindBankSqlInjectionNotOK()
    {
        $bankModel = new BankModel();
        $actual = null;

        $keyword = 'select * from banks';
        $actual = $bankModel->findBank($keyword);
        $excute = [];
        $this->assertEquals($excute, $actual);
    }
    /* =================== Test hàm finbank khi có dữ liệu truyền vào là kiểu số thực ========================= */
    public function testFindBankFloatNotOK()
    {
        $bankModel = new BankModel();
        $keyword = 1.4;
        $actual = $bankModel->findBank($keyword);
        $excute = [];
        $this->assertEquals($excute, $actual);
    }

    //Test GetBanks
    /* =================== Test hàm getBanks khi không có dữ liệu truyền vào ========================= */
    public function testgetBanksParamNull()
    {
        $bankModel = new BankModel();

        $actual = $bankModel->getBanks();

        if ($actual != null) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    /* =================== Test hàm getBank khi có dữ liệu truyền vào  OK ========================= */
    public function testgetBanksParamOK()
    {
        $bankModel = new BankModel();
        $keyword = array(
            'keyword' => '2',
        );
        $actual = $bankModel->getBanks($keyword);
        if ($actual != []) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    /* =================== Test hàm getBank khi có dữ liệu truyền vào Not OK ========================= */
    public function testgetBanksParamNotOK()
    {
        $bankModel = new BankModel();
        $keyword = array(
            'keyword' => '9',
        );
        $actual = $bankModel->getBanks($keyword);
        $excute = [];
        $this->assertEquals($excute, $actual);
    }

    /* =================== Test hàm getBank khi có dữ liệu truyền vào là kiểu số thực ========================= */
    public function testgetBanksParamIsFloatNotOK()
    {
        $bankModel = new BankModel();
        $keyword = array(
            'keyword' => 1.4,
        );
        $actual = $bankModel->getBanks($keyword);
        $excute = [];
        $this->assertEquals($excute, $actual);
    }

    /* =================== Test hàm getBank khi có dữ liệu truyền vào là Array ========================= */
    public function testgetBanksParamIsArrayNotOK()
    {
        $bankModel = new BankModel();
        $actual = null;

        $keyword = array(
            'keyword' => ['ad'],
        );
        try {
            $actual = $bankModel->getBanks($keyword);
        } catch (Throwable $e) {
            $excute = false;
        }
        $this->assertEquals($excute, $actual);
    }

    /* =================== Test hàm getBank khi có dữ liệu truyền vào là kiểu đối tượng ========================= */
    public function testgetBanksParamIsObjectNotOK()
    {
        $bankModel = new BankModel();
        $actual = null;

        $keyword = array(
            'keyword' => $bankModel,
        );
        try {
            $actual = $bankModel->getBanks($keyword);
        } catch (Throwable $e) {
            $excute = false;
        }
        $this->assertEquals($excute, $actual);
    }

    /* =================== Test hàm getBank khi có dữ liệu truyền vào là kiểu kí tự đặc biệt ========================= */
    public function testgetBanksParamIsSpecialCharactersNotOK()
    {
        $bankModel = new BankModel();
        $actual = null;

        $keyword = array(
            'keyword' => '@@$%$%',
        );
        $actual = $bankModel->getBanks($keyword);
        $excute = [];
        $this->assertEquals($excute, $actual);
    }

    /* =================== Test hàm getBank khi có dữ liệu truyền vào là câu truy vấn ========================= */
    public function testgetBanksParamIsSqlInjectionNotOK()
    {
        $bankModel = new BankModel();
        $actual = null;

        $keyword = array(
            'keyword' => 'select * from banks',
        );
        $actual = $bankModel->getBanks($keyword);
        $excute = [];
        $this->assertEquals($excute, $actual);
    }

    /* =================== Test hàm getBank khi có dữ liệu truyền vào là câu truy vấn ========================= */
    public function testgetBanksParamIsJavascriptNotOK()
    {
        $bankModel = new BankModel();
        $actual = null;

        $keyword = array(
            'keyword' => "<script>alert('hello')</script>",
        );
        $actual = $bankModel->getBanks($keyword);
        $excute = [];
        $this->assertEquals($excute, $actual);
    }
    /**
     *function testDeleteBank_Ok()
     * Author: Ngoc Thach
     */
    //test delete banks ok
    public function testDeleteBank_Ok()
    {
        $bankModel = new BankModel();
        $id = 5;

        $user = $bankModel->deleteBankById($id);
        if ($user == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    /**
     *function testDeleteBankIdString_Ok()
     * Author: Ngoc Thach
     */
    //test delete bank id String
    public function testDeleteBankIdString()
    {
        $bankModel = new BankModel();
        $id = "Thach cute";
        $expected = "error";
        $actual = $bankModel->deleteBankById($id);
        $this->assertEquals($expected, $actual);
    }
    /**
     *function testDeleteBankIdNull_Ok()
     * Author: Ngoc Thach
     */
    //test delete banks id =null
    public function testDeleteBankIdNull()
    {
        $bankModel = new BankModel();
        $id = null;
        $expected = "error";
        $actual = $bankModel->deleteBankById($id);
        $this->assertEquals($expected, $actual);
    }

    // //test delete banks id character empty
    // public function testDeleteBankCharacterEmpty()
    // {
    //     $bankModel = new BankModel();
    //      $id='';
    //     $actual = $bankModel->deleteBankById($id);
    //     $this->assertTrue(true,$actual);
    // }

    //test Delete Banks id Object
    public function testDeleteBankObject()
    {$bankModel = new BankModel();
        $id = new stdclass();
        //Execute test
        $expected = "error";
        $actual = $bankModel->deleteBankById($id);
        $this->assertEquals($expected, $actual);
    }
    /**
     *function testDeleteBankDouble_notOk()
     * Author: Ngoc Thach
     */
    //test delete banks id double
    public function testDeleteBankDouble_notOk()
    {$bankModel = new BankModel();
        $id = 1.2;
        //Execute test

        $expected = "error";
        $actual = $bankModel->deleteBankById($id);
        $this->assertEquals($expected, $actual);
    }
    /**
     *function testDeleteBank_character_Special_Ok()
     * Author: Ngoc Thach
     */
    public function testDeleteBank_character_Special_Ok()
    {
        $bankModel = new BankModel();
        $id = '#$%^$^"';
        //Execute test

        $expected = "error";
        $actual = $bankModel->deleteBankById($id);
        $this->assertEquals($expected, $actual);
    }
    /**
     *function testDeleteBankDouble_notOk()
     * Author: Ngoc Thach
     */
    //test delete banks id character empty
    public function testDeleteBankArrayList_notOk()
    {$bankModel = new BankModel();
        $id = ["Thach"];
        //Execute test

        $expected = "error";
        $actual = $bankModel->deleteBankById($id);
        $this->assertEquals($expected, $actual);
    }
    /**
     *function testDeleteBanksDouble_notOk()
     * Author: Ngoc Thach
     */
    //test delete banks id character empty
    public function testDeleteBankScript_notOk()
    {$bankModel = new BankModel();
        $id = "<script>1</script>";
        //Execute test

        $expected = "error";
        $actual = $bankModel->deleteBankById($id);
        $this->assertEquals($expected, $actual);
    }

    //Name : Le Hoai Thuong
    //Test : Ham insertbank, updatebank, getuser
    //insertbank
    public function testInsertBankOk()
    {
        $bank = new BankModel();
        $input['user_id'] = 1;
        $input['cost'] = 20;
        $actual = $bank->insertBank($input);
        if ($actual == true) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    //Test user_id la so am
    public function testInsertBankuser_idnegativenumber()
    {
        $bank = new BankModel();
        $input['user_id'] = -1;
        $input['cost'] = 11;
        $actual = $bank->insertBank($input);
        if ($actual == false) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    //test user_id = 0
    public function testInsertBankuser_idzero()
    {
        $bank = new BankModel();
        $input['user_id'] = 0;
        $input['cost'] = 20;
        $actual = $bank->insertBank($input);
        if ($actual == false) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    //test user_id la chuoi
    public function testInsertBankuser_idstring()
    {
        $bank = new BankModel();
        $input['user_id'] = "chuoi";
        $input['cost'] = 20;
        $actual = $bank->insertBank($input);
        if ($actual == false) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    //test user_id =null
    public function testInsertBankuser_idnull()
    {
        $bank = new BankModel();
        $input['user_id'] = null;
        $input['cost'] = 20;
        $actual = $bank->insertBank($input);
        if ($actual == false) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    //test user_id = double
    public function testInsertBankuser_iddouble()
    {
        $bank = new BankModel();
        $input['user_id'] = 1.1;
        $input['cost'] = 20;
        $actual = $bank->insertBank($input);
        if ($actual == false) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    //test user_id chuoi + so
    public function testInsertBankuser_idstringandint()
    {
        $bank = new BankModel();
        $input['user_id'] = "chuoi1";
        $input['cost'] = 20;
        $actual = $bank->insertBank($input);
        if ($actual != true) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    //so +chuoi
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
    //test cost la so am
    public function testInsertBankCostnegativenumber()
    {
        $bank = new BankModel();
        $input['user_id'] = 1;
        $input['cost'] = -20;
        $actual = $bank->insertBank($input);
        if ($actual == false) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }

    //test cost la so 0
    public function testInsertBankCostzero()
    {
        $bank = new BankModel();
        $input['user_id'] = 1;
        $input['cost'] = 0;
        $actual = $bank->insertBank($input);
        if ($actual == false) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    //test cost = null
    public function testInsertBankcostnull()
    {
        $bank = new BankModel();
        $input['id'] = 1;
        $input['user_id'] = 1;
        $input['cost'] = null;
        $actual = $bank->insertBank($input);
        if ($actual == false) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    //test cost = double
    public function testInsertBankCostdouble()
    {
        $bank = new BankModel();
        $input['user_id'] = 1;
        $input['cost'] = 20.1;
        $actual = $bank->insertBank($input);
        if ($actual == false) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    // test cost so+chuoi
    public function testInsertBankCoststringandint()
    {
        $bank = new BankModel();
        $input['user_id'] = 1;
        $input['cost'] = "chuoi1";
        $actual = $bank->insertBank($input);
        if ($actual != true) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    //test cost chuoi+so
    public function testInsertBankCostintandstring()
    {
        $bank = new BankModel();
        $input['user_id'] = 1;
        $input['cost'] = "1chuoi";
        $actual = $bank->insertBank($input);
        if ($actual == false) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    //test update bank
    public function testupdateBankOk()
    {
        $bank = new BankModel();
        $input['id'] = 1;
        $input['user_id'] = 1;
        $input['cost'] = 20;
        $actual = $bank->updateBank($input);
        if ($actual == true) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    //test update ton tai cua id trong database
    public function testUpdateBankidnotdatabase()
    {
        $bank = new BankModel();
        $input['id'] = 100;
        $input['user_id'] = 2;
        $input['cost'] = 20;
        $actual = $bank->updateBank($input);
        if ($actual != true) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    //test update id gia tri null
    public function testUpdateBanknull()
    {
        $bank = new BankModel();
        $input['id'] = null;
        $input['user_id'] = 2;
        $input['cost'] = 20;
        $actual = $bank->updateBank($input);
        if ($actual != true) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    //test update id la chuoi
    public function testUpdateBankidstring()
    {
        $bank = new BankModel();
        $input['id'] = "chuoi";
        $input['user_id'] = 2;
        $input['cost'] = 20;
        $actual = $bank->updateBank($input);
        if ($actual != true) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    //test update user id la so am
    public function testUpdateBankuser_idnegativenumber()
    {
        $bank = new BankModel();
        $input['id'] = 1;
        $input['user_id'] = -1;
        $input['cost'] = 20;
        $actual = $bank->updateBank($input);
        if ($actual == false) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    //test update cost la so 0
    public function testUpdateBankcostzero()
    {
        $bank = new BankModel();
        $input['id'] = 1;
        $input['user_id'] = 2;
        $input['cost'] = 0;
        $expected ='error';
        $actual = $bank->updateBank($input);
        if ($actual == false) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    //test update cost la null
    public function testUpdateBankcostnull()
    {
        $bank = new BankModel();
        $input['id'] = 1;
        $input['user_id'] = 2;
        $input['cost'] = null;
        $actual = $bank->updateBank($input);
        if ($actual == false) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    //test update cost la double
    public function testUpdateBankCostdouble()
    {
        $bank = new BankModel();
        $input['id'] = 1;
        $input['user_id'] = 2;
        $input['cost'] = 1.2;
        $actual = $bank->updateBank($input);
        if ($actual == false) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    //test update cost chuoi + so
    public function testUpdateBankcoststringandint()
    {
        $bank = new BankModel();
        $input['id'] = 1;
        $input['user_id'] = 2;
        $input['cost'] = "chuoi1";
        $actual = $bank->updateBank($input);
        if ($actual != true) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    //test update cost so+chuoi
    public function testUpdateBankCostintandstring()
    {
        $bank = new BankModel();
        $input['id'] = 1;
        $input['user_id'] = 2;
        $input['cost'] = "1chuoi";
        $actual = $bank->updateBank($input);
        if ($actual == false) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }

}
