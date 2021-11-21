<?php

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertTrue;

class BankModelTest extends TestCase
{
    // Test FindBankById  - Khang
    /* =================== Test hàm finBankById khi có dữ liệu truyền vào ok ========================= */
    public function testFindBankByIdOk()
    {
        $bankModel = new BankModel();
        $id  = 15;
        $expected = '388'; //Mong đợis
        $banks = $bankModel->findBankById($id);
        $actual = $banks[0]['cost']; //Thực tế

        $this->assertEquals($expected, $actual);
    }
    /* =================== Test hàm finBankById khi có dữ liệu truyền vào not ok ========================= */
    public function testFindBankByIdNotOk()
    {
        $bankModel = new BankModel();
        $id  = 1333;
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
        $expected = [];
        $actual = $bankModel->findBankById($id); //actual
        // var_dump($bank);die();

        $this->assertEquals($expected, $actual);
    }
    /* =================== Test hàm finBankById khi không có dữ liệu truyền vào  ========================= */
    public function testFindBankByIdNull()
    {
        $bankModel = new BankModel();
        $id = '';
        $expected = [];
        $actual = $bankModel->findBankById($id);

        $this->assertEquals($expected, $actual);
    }
    /* =================== Test hàm finBankById khi có dữ liệu truyền vào là kiểu đối tượng ========================= */
    public function testFindBankByIdObject()
    {
        $bankModel = new BankModel();
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
        $expected = [];
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
        $excute = [];
        $this->assertEquals($excute, $actual);
    }
    /* =================== Test hàm finbankById khi có dữ liệu truyền vào là kiểu số thực ========================= */
    public function testFindBankByIdFloatNotOK()
    {
        $bankModel = new BankModel();
        $id =  1.4;
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
        $keyword  = 6;
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
        $keyword =  1.4;
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
        $bankModel = new BankModel();
        $keyword = array(
            'keyword' => '9'
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
        public function testInsertBankOk(){
            $bankModel = new BankModel();
            $bank = array(
                'user_id' => 1,
                'cost' => 2000
            );
            $expected = true; 
            $actual = $bankModel->insertBank($bank);
            $this->assertEquals($actual,$expected);   
        }
         /**
         * Test case nhập user id và cost là không phải kiểu int
         */
        public function testInsertBankStringNg(){
            $bankModel = new BankModel();
            $bank = array(
                'user_id' => 'vv',
                'cost' => '#$'
            ); 
             $bankModel->insertBank($bank);
            if(is_numeric($bank['user_id']) && is_numeric($bank['cost'])){          
                $this->assertTrue(false);
            }else{
                $this->assertTrue(true);
            }   
        }
        /**
         * Test case nhập user id và cost null
         */
        public function testInsertBankNullNg(){
            $bankModel = new BankModel();
            $bank = array(
                'user_id' => '',
                'cost' => 4423
            ); 
             $bankModel->insertBank($bank);
            if(empty($bank['user_id']) || empty($bank['cost'])){          
                $this->assertTrue(true);
            }else{
                $this->assertTrue(false);
            }   
        }
        /**
         * Test case nhập user id hoặc cost là Object
         */
        public function testInsertBankObjectNg(){
            $bankModel = new BankModel();
            $ob = new DateTime;
            $bank = array(
                'user_id' => $ob,
                'cost' => 4423
            );        
            if(is_object($bank['user_id']) || is_object($bank['cost'])){          
                $bank['user_id'] = null;
                $bankModel->insertBank($bank);
                $this->assertTrue(true);
            }else{
                $this->assertTrue(false);
            }   
        }

        /**
         * Test case nhập user id hoặc cost là Object
         */
        public function testInsertBankBooltNg(){
            $bankModel = new BankModel();
            $bank = array(
                'user_id' => true,
                'cost' => 4423
            );        
               $bankModel->insertBank($bank);
            if(is_bool($bank['user_id']) || is_bool($bank['cost'])){          

                $this->assertTrue(true);
            }else{
                $this->assertTrue(false);
            }   
        }

        /**
         * Test case nhập user id hoặc cost là Object
         */
        public function testInsertBankDoubleNg(){
            $bankModel = new BankModel();
            $bank = array(
                'user_id' => 12.23,
                'cost' => 4423
            );        
               $bankModel->insertBank($bank);
            if(is_double($bank['user_id']) || is_double($bank['cost'])){          

                $this->assertTrue(true);
            }else{
                $this->assertTrue(false);
            }   
        }

        /**
         * Test case nhập user id hoặc cost là Object
         */
        public function testInsertSpecialcharactersNg(){
            $bankModel = new BankModel();
            $pattern = '/[0-9]/';
            $bank = array(
                'user_id' => '@$@$',
                'cost' => 4423
            );        
               $bankModel->insertBank($bank);
            if(!preg_match($pattern, $bank['user_id'])){          

                $this->assertTrue(true);
            }else{
                $this->assertTrue(false);
            }   
        }

         /**
         * Test case Okie
         */
        public function testUpdateBank(){
            $bankModel = new BankModel();
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
        public function testUpdateBankNgString(){
            $bankModel = new BankModel();
            $bank = array(
                'id' => 73,
                'user_id' => 'm',
                'cost' => 'm'
            );
            $bankModel->updateBank($bank);
            if(is_numeric($bank['user_id']) == true && is_numeric($bank['cost']) == true){           
                $this->assertTrue(false);
            }else{
                $this->assertTrue(true);
            }   
        }
         /**
         * Test case nhập user id và cost rỗng
         */
        public function testUpdateBankNgNull(){
            $bankModel = new BankModel();
            $bank = array(
                'id' => 74,
                'user_id' => NULL,
                'cost' => NULL
            );
            $expected = true;
            $actual = $bankModel->updateBank($bank);
            $this->assertEquals($expected,$actual); 
            if(!empty($bank['user_id']) && !empty($bank['cost'])){           
                $this->assertTrue(false);
            }else{
                $this->assertTrue(true);
            }   
        }

        /**
         * Test case nhập user id và cost rỗng
         */
        public function testUpdateBankObjectNg(){
            $bankModel = new BankModel();
            $ob = (object)'12';
            $bank = array(
                'id' => 74,
                'user_id' => $ob,
                'cost' => '4264'
            );

            if(is_object($bank['user_id']) || is_object($bank['cost'])){  
                $bank['user_id'] = null;
                $bankModel->updateBank($bank);
                $this->assertTrue(true);
            }else{
                $this->assertTrue(false);
            }   
        }

        /**
         * Test case nhập user id và cost rỗng
         */
        public function testUpdateBankBoolNg(){
            $bankModel = new BankModel();
            $bank = array(
                'id' => 74,
                'user_id' => true,
                'cost' => '4264'
            );
            $bankModel->updateBank($bank);
            if(is_bool($bank['user_id']) || is_bool($bank['cost'])){  

                $this->assertTrue(true);
            }else{
                $this->assertTrue(false);
            }   
        }

        /**
         * Test case nhập user id và cost rỗng
         */
        public function testUpdateBankDoubleNg(){
            $bankModel = new BankModel();
            $bank = array(
                'id' => 74,
                'user_id' => 23.55,
                'cost' => '4264'
            );
            $bankModel->updateBank($bank);
            if(is_double($bank['user_id']) || is_double($bank['cost'])){  

                $this->assertTrue(true);
            }else{
                $this->assertTrue(false);
            }   
        }

        /**
         * Test case nhập user id và cost rỗng
         */
        public function testUpdateBankSpecialcharactersNg(){
            $bankModel = new BankModel();
            $pattern = '/[0-9]/';
            $bank = array(
                'id' => 74,
                'user_id' => '@%@%#',
                'cost' => '4264'
            );
            $bankModel->updateBank($bank);
            if(!preg_match($pattern, $bank['user_id'])){  

                $this->assertTrue(true);
            }else{
                $this->assertTrue(false);
            }   
        }
}
