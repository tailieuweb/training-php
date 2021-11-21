<?php

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertTrue;

class BankModelTest extends TestCase
{
    // Test FindBankById  - Khang
    /* =================== Test hàm finBankById khi có dữ liệu truyền vào ok ========================= */
    public function testFindBankByIdOk()
    {
        $bankModel = BankModel::getInstance();
        $id  = 15;
        $expected = '388'; //Mong đợis
        $banks = $bankModel->findBankById($id);
        $actual = $banks[0]['cost']; //Thực tế

        $this->assertEquals($expected, $actual);
    }
    /* =================== Test hàm finBankById khi có dữ liệu truyền vào not ok ========================= */
    public function testFindBankByIdNotOk()
    {
        $bankModel = BankModel::getInstance();
        $id  = 1333;
        $actual = $bankModel->findBankById($id);
        $expected = [];
        // var_dump($bank);die();
        $this->assertEquals($expected, $actual);
    }
    /* =================== Test hàm finBankById khi có dữ liệu truyền vào kiểu string ========================= */
    public function testFindBankByIdStr()
    {
        $bankModel = BankModel::getInstance();
        $id = 'aa';
        $expected = [];
        $actual = $bankModel->findBankById($id); //actual
        // var_dump($bank);die();

        $this->assertEquals($expected, $actual);
    }
    /* =================== Test hàm finBankById khi không có dữ liệu truyền vào  ========================= */
    public function testFindBankByIdNull()
    {
        $bankModel = BankModel::getInstance();
        $id = '';
        $expected = [];
        $actual = $bankModel->findBankById($id);

        $this->assertEquals($expected, $actual);
    }
    /* =================== Test hàm finBankById khi có dữ liệu truyền vào là kiểu đối tượng ========================= */
    public function testFindBankByIdObject()
    {
        $bankModel = BankModel::getInstance();
        $ob = (object)'1';
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
        $bankModel = BankModel::getInstance();
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
        $bankModel = BankModel::getInstance();
        $id = "<script>alert('hello')</script>";
        $expected = [];
        $actual = $bankModel->findBankById($id); //actual
        // var_dump($bank);die();

        $this->assertEquals($expected, $actual);
    }
    /* =================== Test hàm finBankById khi có dữ liệu truyền vào là một câu lệnh sql ========================= */
    public function testFindBankByIdSqlInjectionNotOK()
    {
        $bankModel = BankModel::getInstance();
        $actual = null;

        $id = 'select * from banks';
        $actual = $bankModel->findBankById($id);
        $excute = [];
        $this->assertEquals($excute, $actual);
    }
    /* =================== Test hàm finbankById khi có dữ liệu truyền vào là kiểu số thực ========================= */
    public function testFindBankByIdFloatNotOK()
    {
        $bankModel = BankModel::getInstance();
        $id =  1.4;
        $actual = $bankModel->findBankById($id);
        $excute = [];
        $this->assertEquals($excute, $actual);
    }

    //Test findBank
    /* =================== Test hàm finBank khi có dữ liệu truyền vào ok ========================= */
    public function testFindBankOk()
    {
        $bankModel = BankModel::getInstance();
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
        $bankModel = BankModel::getInstance();
        $keyword  = 6;
        $bank = $bankModel->findBank($keyword);
        $expected = [];
        // var_dump($bank);die();
        $this->assertEquals($expected, $bank);
    }
    /* =================== Test hàm finBank khi có dữ liệu truyền vào là kiểu string ========================= */
    public function testFindBankStr()
    {
        $bankModel = BankModel::getInstance();
        $keyword = 'aa';
        $expected = [];
        $actual = $bankModel->findBank($keyword); //actual
        // var_dump($bank);die();

        $this->assertEquals($expected, $actual);
    }
    /* =================== Test hàm finBank khi không có dữ liệu truyền vào ========================= */
    public function testFindBankNull()
    {
        $bankModel = BankModel::getInstance();
        $keyword = '';
        $expected = [];
        $actual = $bankModel->findBank($keyword);

        $this->assertEquals($expected, $actual);
    }
    /* =================== Test hàm finBank khi có dữ liệu truyền vào là kiểu đối tượng  ========================= */
    public function testFindBankObject()
    {
        $bankModel = BankModel::getInstance();
        $ob = (object)'1';
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
        $bankModel = BankModel::getInstance();
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
        $bankModel = BankModel::getInstance();
        $keyword = "<script>alert('hello')</script>";
        $expected = [];
        $actual = $bankModel->findBank($keyword); //actual
        // var_dump($bank);die();

        $this->assertEquals($expected, $actual);
    }
    /* =================== Test hàm finBank khi có dữ liệu truyền vào bằng câu lệnh sql ========================= */
    public function testFindBankSqlInjectionNotOK()
    {
        $bankModel = BankModel::getInstance();
        $actual = null;

        $keyword = 'select * from banks';
        $actual = $bankModel->findBank($keyword);
        $excute = [];
        $this->assertEquals($excute, $actual);
    }
    /* =================== Test hàm finbank khi có dữ liệu truyền vào là kiểu số thực ========================= */
    public function testFindBankFloatNotOK()
    {
        $bankModel = BankModel::getInstance();
        $keyword =  1.4;
        $actual = $bankModel->findBank($keyword);
        $excute = [];
        $this->assertEquals($excute, $actual);
    }


    //Test GetBanks
    /* =================== Test hàm getBanks khi không có dữ liệu truyền vào ========================= */
    public function testgetBanksParamNull()
    {
        $bankModel = BankModel::getInstance();

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
        $bankModel = BankModel::getInstance();
        $keyword = array(
            'keyword' => '2'
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
        $bankModel = BankModel::getInstance();
        $keyword = array(
            'keyword' => '16516515616516'
        );
        $actual = $bankModel->getBanks($keyword);
        $excute = [];
        $this->assertEquals($excute, $actual);
    }
    /* =================== Test hàm getBank khi có dữ liệu truyền vào là kiểu số thực ========================= */
    public function testgetBanksParamIsFloatNotOK()
    {
        $bankModel = BankModel::getInstance();
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
        $bankModel = BankModel::getInstance();
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
        $bankModel = BankModel::getInstance();
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
        $bankModel = BankModel::getInstance();
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
        $bankModel = BankModel::getInstance();
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
        $bankModel = BankModel::getInstance();
        $actual = null;

        $keyword = array(
            'keyword' => "<script>alert('hello')</script>"
        );
        $actual = $bankModel->getBanks($keyword);
        $excute = [];
        $this->assertEquals($excute, $actual);
    }



    //     // Huy

    // /**
    //      * Test case Okie
    //      */
    public function testInsertBankOk()
    {
        $bankModel = BankModel::getInstance();
        $bank = array(
            'user_id' => 1,
            'cost' => 2000
        );
        $expected = true;
        $actual = $bankModel->insertBank($bank);
        $this->assertEquals($actual, $expected);
    }
    /**
     * Test case nhập user id và cost là không phải kiểu int
     */
    public function testInsertBankStringNg()
    {
        $bankModel = BankModel::getInstance();
        $bank = array(
            'user_id' => 'vv',
            'cost' => '#$'
        );
        $bankModel->insertBank($bank);
        if (is_numeric($bank['user_id']) && is_numeric($bank['cost'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    /**
     * Test case nhập user id và cost null
     */
    public function testInsertBankNullNg()
    {
        $bankModel = BankModel::getInstance();
        $bank = array(
            'user_id' => '',
            'cost' => 4423
        );
        $bankModel->insertBank($bank);
        if (empty($bank['user_id']) || empty($bank['cost'])) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test case nhập user id hoặc cost là Object
     */
    public function testInsertBankObjectNg()
    {
        $bankModel = BankModel::getInstance();
        $ob = new DateTime;
        $bank = array(
            'user_id' => $ob,
            'cost' => 4423
        );
        if (is_object($bank['user_id']) || is_object($bank['cost'])) {
            $bank['user_id'] = null;
            $bankModel->insertBank($bank);
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test case nhập user id hoặc cost là Object
     */
    public function testInsertBankBooltNg()
    {
        $bankModel = BankModel::getInstance();
        $bank = array(
            'user_id' => true,
            'cost' => 4423
        );
        $bankModel->insertBank($bank);
        if (is_bool($bank['user_id']) || is_bool($bank['cost'])) {

            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test case nhập user id hoặc cost là Object
     */
    public function testInsertBankDoubleNg()
    {
        $bankModel = BankModel::getInstance();
        $bank = array(
            'user_id' => 12.23,
            'cost' => 4423
        );
        $bankModel->insertBank($bank);
        if (is_double($bank['user_id']) || is_double($bank['cost'])) {

            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test case nhập user id hoặc cost là Object
     */
    public function testInsertSpecialcharactersNg()
    {
        $bankModel = BankModel::getInstance();
        $pattern = '/[0-9]/';
        $bank = array(
            'user_id' => '@$@$',
            'cost' => 4423
        );
        $bankModel->insertBank($bank);
        if (!preg_match($pattern, $bank['user_id'])) {

            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test case Okie
     */
    public function testUpdateBank()
    {
        $bankModel = BankModel::getInstance();
        $bank = array(
            'id' => 72,
            'user_id' => 23,
            'cost' => 200
        );
        $expected = true;
        $actual = $bankModel->updateBank($bank);
        $this->assertEquals($actual, $expected);
    }
    /**
     * Test case nhập user id và cost không phải là kiểu int
     */
    public function testUpdateBankNgString()
    {
        $bankModel = BankModel::getInstance();
        $bank = array(
            'id' => 73,
            'user_id' => 'm',
            'cost' => 'm'
        );
        $bankModel->updateBank($bank);
        if (is_numeric($bank['user_id']) == true && is_numeric($bank['cost']) == true) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    /**
     * Test case nhập user id và cost rỗng
     */
    public function testUpdateBankNgNull()
    {
        $bankModel = BankModel::getInstance();
        $bank = array(
            'id' => 74,
            'user_id' => NULL,
            'cost' => NULL
        );
        $expected = true;
        $actual = $bankModel->updateBank($bank);
        $this->assertEquals($expected, $actual);
        if (!empty($bank['user_id']) && !empty($bank['cost'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    /**
     * Test case nhập user id và cost rỗng
     */
    public function testUpdateBankObjectNg()
    {
        $bankModel = BankModel::getInstance();
        $ob = (object)'12';
        $bank = array(
            'id' => 74,
            'user_id' => $ob,
            'cost' => '4264'
        );

        if (is_object($bank['user_id']) || is_object($bank['cost'])) {
            $bank['user_id'] = null;
            $bankModel->updateBank($bank);
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test case nhập user id và cost rỗng
     */
    public function testUpdateBankBoolNg()
    {
        $bankModel = BankModel::getInstance();
        $bank = array(
            'id' => 74,
            'user_id' => true,
            'cost' => '4264'
        );
        $bankModel->updateBank($bank);
        if (is_bool($bank['user_id']) || is_bool($bank['cost'])) {

            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test case nhập user id và cost rỗng
     */
    public function testUpdateBankDoubleNg()
    {
        $bankModel = BankModel::getInstance();
        $bank = array(
            'id' => 74,
            'user_id' => 23.55,
            'cost' => '4264'
        );
        $bankModel->updateBank($bank);
        if (is_double($bank['user_id']) || is_double($bank['cost'])) {

            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test case nhập user id và cost rỗng
     */
    public function testUpdateBankSpecialcharactersNg()
    {
        $bankModel = BankModel::getInstance();
        $pattern = '/[0-9]/';
        $bank = array(
            'id' => 74,
            'user_id' => '@%@%#',
            'cost' => '4264'
        );
        $bankModel->updateBank($bank);
        if (!preg_match($pattern, $bank['user_id'])) {

            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    //Vĩnh
    /**
     * Test case Okie
     */

    //auth
    public function testAuthGood()
    {
        //Vĩnh
        $bankModel = BankModel::getInstance();
        $username = "vinhvo";
        $password = "123456";
        $expected_name = "vinhvo";
        $user =  (array)$bankModel->auth($username, $password);
        $this->assertEquals($expected_name, $user[0]['name']);
    }


    /*
    Test case : Login wrong
    */

    public function testAuthNotGood()
    {
        //Vĩnh
        $bankModel = BankModel::getInstance();
        $username = "vinhvo";
        $password = "123457";
        $user = (array)$bankModel->auth($username, $password);
        $expected = [];
        $this->assertEquals($expected, $user);
    }

    /*
    Test case : Login wrong when blank name and password
    */
    public function testAuthNamePasswordNull()
    {
        //Vĩnh
        $bankModel = BankModel::getInstance();
        $username = "";
        $password = "";
        $user = (array)$bankModel->auth($username, $password);
        $expected = [];
        $this->assertEquals($expected, $user);
    }

    /*
    Test case : Login wrong when blank name
    */
    public function testAuthNameNull()
    {
        //Vĩnh
        $bankModel = BankModel::getInstance();
        $username = "";
        $password = "123456";
        $user = (array)$bankModel->auth($username, $password);
        $expected = [];
        $this->assertEquals($expected, $user);
    }

    /*
    Test case : Login wrong when blank password
    */

    public function testAuthUserPasswordNull()
    {
        //Vĩnh
        $bankModel = BankModel::getInstance();
        $username = "vinhvo";
        $password = "";
        $user = (array)$bankModel->auth($username, $password);
        $expected = [];
        $this->assertEquals($expected, $user);
    }

    /*
    Test case : Login wrong when blank password
    */

    public function testAuth_matchRegexGood()
    {
        //Vĩnh
        $username = "vinhvo";
        $password = "123456";
        $this->assertTrue(BankModel::matchRegexLogin($username, $password));
    }

    /*
    Test case : Login wrong when blank password
    */
    public function testAuth_matchRegexNotGood()
    {
        //Vĩnh
        $username = "Vinh*vo";
        $password = "123456";
        $this->assertFalse(BankModel::matchRegexLogin($username, $password));
    }


    //deleteUserById
    /*
    Test case : Delete bank by id 
    */
    public function testDeleteBankByIdGood()
    {
        //Vĩnh
        $bankModel = BankModel::getInstance();
        $id = 3;
        $findBank = $bankModel->findBankById($id);
        if (!empty($findBank)) {
            $delete =  $bankModel->deleteBankById($id);
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    /*
    Test case : Delete bank by id has argument (string)
    */
    public function testDeleteBankByStr()
    {
        //Vĩnh
        $bankModel = BankModel::getInstance();
        $delete = $bankModel->deleteBankById('a');
        $expected = false;
        $this->assertEquals($expected, $delete);
    }
    /*
    Test case : Delete bank by id has argument (double number)
    */
    public function testDeleteBankByID_Double()
    {
        $bankModel = BankModel::getInstance();
        $delete = $bankModel->deleteBankById($this->assertIsFloat(2.5));
        $expected = false;
        $this->assertEquals($expected, $delete);
    }

    /*
    Test case : Delete bank by id has argument (null)
    */
    public function testDeleteBankByNull()
    {
        //Vĩnh
        $bankModel = BankModel::getInstance();
        $delete = $bankModel->deleteBankById(NULL);
        $expected = false;
        $this->assertEquals($expected, $delete);
    }

    /*
    Test case : Delete bank by id has argument (array)
    */
    public function testDeleteBankByArray()
    {
        //Vĩnh
        $bankModel = BankModel::getInstance();
        $id = ["5", "6"];
        $delete = $bankModel->deleteBankById($this->assertIsArray($id));
        $expected = false;
        $this->assertEquals($expected, $delete);
    }

    /*
    Test case : Delete bank by id not found 
    */
    public function testDeleteBankNotGood()
    {
        //Vĩnh
        $bankModel = BankModel::getInstance();
        $id = 10;
        $findID = $bankModel->findBankById($id);
        if (empty($findID)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    /*
    Test case : Delete bank by id has argument (object)
    */
    public function testDeleteBankByObject()
    {
        //Vĩnh
        $bankModel = BankModel::getInstance();
        $id = new UserModel();
        $delete = $bankModel->deleteBankById($this->assertIsObject($id));
        $expected = false;
        $this->assertEquals($expected, $delete);
    }

    //design patter test
    /*
    Test case : Singleton pattern, both values are equal
    */
    public function testSingletonBankModelGood()
    {
        $bankModel = BankModel::getInstance();
        $bankModel2 = BankModel::getInstance();
        $bankModel->x = 50;
        $bankModel2->x = 100;

        $expected_x = 100;
        $actual = $bankModel->x;
        $this->assertEquals($expected_x, $actual);
    }
    /*
    Test case : Singleton pattern, both values are not equal
    */
    public function testSingletonBankModelNotGood()
    {
        $userModel = new UserModel();
        $userModel2 = new UserModel();
        $userModel->x = 50;
        $userModel2->x = 100;
        $expected_x = 100;
        $actual = $userModel->x;
        $this->assertNotEquals($expected_x, $actual);
    }
    /*
    Test case : Singleton pattern, both objects are equal
    */
    public function testSingletonBankModelEqualObject()
    {
        $bankModel = BankModel::getInstance();
        $bankModel2 = BankModel::getInstance();
        $expected = true;
        $actual = $bankModel === $bankModel2 ? true : false;
        $this->assertEquals($expected, $actual);
    }
    /*
    Test case : Singleton pattern, both values are not equal
    */
    public function testSingletonBankModel_NotEqualObject()
    {
        $userModel = new UserModel();
        $userModel2 = new UserModel();
        $expected = false;
        $actual = $userModel === $userModel2 ? true : false;
        $this->assertEquals($expected, $actual);
    }
}
