<?php

use PHPUnit\Framework\TestCase;

require_once('./models/UserModel.php');
require_once('./models/FactoryPattern.php');
require_once('./models/BankModel.php');
require_once('./repositories/UserRepository.php');

class Hung_UserRepositoryTest extends TestCase
{
    //----------------------------------get Bank account
    /**
     * Test case Okie
     */

    public function testGetBankAccountsOk()
    {
        $userRepo = UserRepository::getInstance();
        $input = ["keyword" => '2'];
        $actual = $userRepo->getBankAccounts($input);

        $expected = [
            [
                "id" =>  "2", "name" =>  "user2", "fullname" => "Nobody",
                "email" =>  "user2@mail.com", "type" => "admin", "password" => "d41d8cd98f00b204e9800998ecf8427e",
                "updated_at" =>  "2021-10-16 12:46:24pm", "version" => "7", "bank_id" => "3", "cost" =>  "222000"
            ]
        ];

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Okie
     * Parameter is array consist of key "keyword", but its value does not exist in database
     */

    public function testGetBankAccountsOk_ReturnEmptyArray()
    {
        $userRepo = UserRepository::getInstance();
        $input = ["keyword" => '21231'];
        $actual = $userRepo->getBankAccounts($input);

        $expected = [];

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case not gOod
     * Parameter is array consist of key "keyword", but its value does not exist in database
     */

    public function testGetBankAccountsNG_InvalidArray()
    {
        $userRepo = UserRepository::getInstance();
        $input = ["test" => '2'];
        $actual = $userRepo->getBankAccounts($input);

        $expected = [
            [
                "id" =>  "1", "name" =>  "user1", "fullname" => "Chá»‹ Tester",
                "email" =>  "user1@mail.com", "type" => "admin", "password" => "d41d8cd98f00b204e9800998ecf8427e",
                "updated_at" =>  "2021-10-16 12:59:31pm", "version" => "3", "bank_id" => "10", "cost" =>  "111000"
            ],
            [
                "id" =>  "2", "name" =>  "user2", "fullname" => "Nobody",
                "email" =>  "user2@mail.com", "type" => "admin", "password" => "d41d8cd98f00b204e9800998ecf8427e",
                "updated_at" =>  "2021-10-16 12:46:24pm", "version" => "7", "bank_id" => "3", "cost" =>  "222000"
            ],
            [
                "id" =>  "3", "name" =>  "user3", "fullname" => "Tráº§n Giáº£ TrÃ¢n",
                "email" =>  "user3@mail.com", "type" => "admin", "password" => "d41d8cd98f00b204e9800998ecf8427e",
                "updated_at" =>  "2021-10-16 01:04:15pm", "version" => "2", "bank_id" => "9", "cost" =>  "333000"
            ],
            [
                "id" =>  "4", "name" =>  "user4", "fullname" => "user4",
                "email" =>  "user4@mail.com", "type" => "admin", "password" => "3f02ebe3d7929b091e3d8ccfde2f3bc6",
                "updated_at" =>  "2021-10-14 03:45:17pm", "version" => "4", "bank_id" => "11", "cost" =>  "444000"
            ],
            [
                "id" =>  "5", "name" =>  "user5", "fullname" => "Anh Dev",
                "email" =>  "user5@mail.com", "type" => "admin", "password" => "0a791842f52a0acfbb3a783378c066b8",
                "updated_at" =>  "2021-10-14 01:18:51pm", "version" => "18", "bank_id" => "6", "cost" =>  "555000"
            ],
            [
                "id" =>  "6", "name" =>  "user6", "fullname" => "user6",
                "email" =>  "user6@mail.com", "type" => "user", "password" => "affec3b64cf90492377a8114c86fc093",
                "updated_at" =>  "2021-10-29 12:11:36am", "version" => "0", "bank_id" => "19", "cost" =>  "666000"
            ],
        ];

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Okie
     * Parameter is array consist of key "keyword", its value is integer
     */

    public function testGetBankAccountsOk_ArrayWithIntegerValue()
    {
        $userRepo = UserRepository::getInstance();
        $input = ["keyword" => 2];
        $actual = $userRepo->getBankAccounts($input);

        $expected = [
            [
                "id" =>  "2", "name" =>  "user2", "fullname" => "Nobody",
                "email" =>  "user2@mail.com", "type" => "admin", "password" => "d41d8cd98f00b204e9800998ecf8427e",
                "updated_at" =>  "2021-10-16 12:46:24pm", "version" => "7", "bank_id" => "3", "cost" =>  "222000"
            ]
        ];

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Okie
     * Parameter is array consist of key "keyword", its value is integer
     */

    public function testGetBankAccountsOk_ArrayWithIntegerValueNotExist()
    {
        $userRepo = UserRepository::getInstance();
        $input = ["keyword" => 22222];
        $actual = $userRepo->getBankAccounts($input);

        $expected = [];

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Okie
     * Parameter is array consist of key "keyword", its value is float
     */

    public function testGetBankAccountsOk_ArrayWithFloatPointNumber()
    {
        $userRepo = UserRepository::getInstance();
        $input = ["keyword" => 2.696];
        $actual = $userRepo->getBankAccounts($input);

        $expected = [];

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Okie
     * Parameter is array consist of key "keyword", its value is numeric string
     */

    public function testGetBankAccountsOk_ArrayWithNumericString()
    {
        $userRepo = UserRepository::getInstance();
        $input = ["keyword" => '2'];
        $actual = $userRepo->getBankAccounts($input);

        $expected = [
            [
                "id" =>  "2", "name" =>  "user2", "fullname" => "Nobody",
                "email" =>  "user2@mail.com", "type" => "admin", "password" => "d41d8cd98f00b204e9800998ecf8427e",
                "updated_at" =>  "2021-10-16 12:46:24pm", "version" => "7", "bank_id" => "3", "cost" =>  "222000"
            ]
        ];

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case not good
     * Parameter is array consist of key "keyword", its value is numeric string, but not exist in database
     */

    public function testGetBankAccountsNG_ArrayWithNumericStringNotExist()
    {
        $userRepo = UserRepository::getInstance();
        $input = ["keyword" => '22222'];
        $actual = $userRepo->getBankAccounts($input);

        $expected = [];

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case not good
     * Parameter is array consist of key "keyword", its value is special string, except %
     */

    public function testGetBankAccountsNG_ArrayWithSpecialString()
    {
        $userRepo = UserRepository::getInstance();
        $input = ["keyword" => '/'];
        $actual = $userRepo->getBankAccounts($input);

        $expected = [];

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case not good
     * Parameter is array consist of key "keyword", its value is  %
     */

    public function testGetBankAccountsNG_ArrayWithPercentCharacter()
    {
        $userRepo = UserRepository::getInstance();
        $input = ["keyword" => '%'];
        $actual = $userRepo->getBankAccounts($input);

        $expected = [
            [
                "id" =>  "1", "name" =>  "user1", "fullname" => "Chá»‹ Tester",
                "email" =>  "user1@mail.com", "type" => "admin", "password" => "d41d8cd98f00b204e9800998ecf8427e",
                "updated_at" =>  "2021-10-16 12:59:31pm", "version" => "3", "bank_id" => "10", "cost" =>  "111000"
            ],
            [
                "id" =>  "2", "name" =>  "user2", "fullname" => "Nobody",
                "email" =>  "user2@mail.com", "type" => "admin", "password" => "d41d8cd98f00b204e9800998ecf8427e",
                "updated_at" =>  "2021-10-16 12:46:24pm", "version" => "7", "bank_id" => "3", "cost" =>  "222000"
            ],
            [
                "id" =>  "3", "name" =>  "user3", "fullname" => "Tráº§n Giáº£ TrÃ¢n",
                "email" =>  "user3@mail.com", "type" => "admin", "password" => "d41d8cd98f00b204e9800998ecf8427e",
                "updated_at" =>  "2021-10-16 01:04:15pm", "version" => "2", "bank_id" => "9", "cost" =>  "333000"
            ],
            [
                "id" =>  "4", "name" =>  "user4", "fullname" => "user4",
                "email" =>  "user4@mail.com", "type" => "admin", "password" => "3f02ebe3d7929b091e3d8ccfde2f3bc6",
                "updated_at" =>  "2021-10-14 03:45:17pm", "version" => "4", "bank_id" => "11", "cost" =>  "444000"
            ],
            [
                "id" =>  "5", "name" =>  "user5", "fullname" => "Anh Dev",
                "email" =>  "user5@mail.com", "type" => "admin", "password" => "0a791842f52a0acfbb3a783378c066b8",
                "updated_at" =>  "2021-10-14 01:18:51pm", "version" => "18", "bank_id" => "6", "cost" =>  "555000"
            ],
            [
                "id" =>  "6", "name" =>  "user6", "fullname" => "user6",
                "email" =>  "user6@mail.com", "type" => "user", "password" => "affec3b64cf90492377a8114c86fc093",
                "updated_at" =>  "2021-10-29 12:11:36am", "version" => "0", "bank_id" => "19", "cost" =>  "666000"
            ],
        ];

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case not good
     * Parameter is array consist of key "keyword", its value is  _
     */

    public function testGetBankAccountsNG_ArrayWithUnderscoreCharacter()
    {
        $userRepo = UserRepository::getInstance();
        $input = ["keyword" => '_'];
        $actual = $userRepo->getBankAccounts($input);

        $expected = [
            [
                "id" =>  "1", "name" =>  "user1", "fullname" => "Chá»‹ Tester",
                "email" =>  "user1@mail.com", "type" => "admin", "password" => "d41d8cd98f00b204e9800998ecf8427e",
                "updated_at" =>  "2021-10-16 12:59:31pm", "version" => "3", "bank_id" => "10", "cost" =>  "111000"
            ],
            [
                "id" =>  "2", "name" =>  "user2", "fullname" => "Nobody",
                "email" =>  "user2@mail.com", "type" => "admin", "password" => "d41d8cd98f00b204e9800998ecf8427e",
                "updated_at" =>  "2021-10-16 12:46:24pm", "version" => "7", "bank_id" => "3", "cost" =>  "222000"
            ],
            [
                "id" =>  "3", "name" =>  "user3", "fullname" => "Tráº§n Giáº£ TrÃ¢n",
                "email" =>  "user3@mail.com", "type" => "admin", "password" => "d41d8cd98f00b204e9800998ecf8427e",
                "updated_at" =>  "2021-10-16 01:04:15pm", "version" => "2", "bank_id" => "9", "cost" =>  "333000"
            ],
            [
                "id" =>  "4", "name" =>  "user4", "fullname" => "user4",
                "email" =>  "user4@mail.com", "type" => "admin", "password" => "3f02ebe3d7929b091e3d8ccfde2f3bc6",
                "updated_at" =>  "2021-10-14 03:45:17pm", "version" => "4", "bank_id" => "11", "cost" =>  "444000"
            ],
            [
                "id" =>  "5", "name" =>  "user5", "fullname" => "Anh Dev",
                "email" =>  "user5@mail.com", "type" => "admin", "password" => "0a791842f52a0acfbb3a783378c066b8",
                "updated_at" =>  "2021-10-14 01:18:51pm", "version" => "18", "bank_id" => "6", "cost" =>  "555000"
            ],
            [
                "id" =>  "6", "name" =>  "user6", "fullname" => "user6",
                "email" =>  "user6@mail.com", "type" => "user", "password" => "affec3b64cf90492377a8114c86fc093",
                "updated_at" =>  "2021-10-29 12:11:36am", "version" => "0", "bank_id" => "19", "cost" =>  "666000"
            ],
        ];

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case not good
     * Parameter is array consist of key "keyword", its value is  array
     */

    public function testGetBankAccountsNG_ArrayWithArrayValue()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument');

        $userRepo = UserRepository::getInstance();
        $input = ["keyword" =>  ['test' => 'a']];
        $userRepo->getBankAccounts($input);
    }

    /**
     * Test case OK
     * Parameter is array consist of key "keyword", its value is an empty array
     */

    public function testGetBankAccountsNG_ArrayWithEmptyArrayValue()
    {
        $userRepo = UserRepository::getInstance();
        $input = ["keyword" =>  []];
        $actual = $userRepo->getBankAccounts($input);
        $expected = [
            [
                "id" =>  "1", "name" =>  "user1", "fullname" => "Chá»‹ Tester",
                "email" =>  "user1@mail.com", "type" => "admin", "password" => "d41d8cd98f00b204e9800998ecf8427e",
                "updated_at" =>  "2021-10-16 12:59:31pm", "version" => "3", "bank_id" => "10", "cost" =>  "111000"
            ],
            [
                "id" =>  "2", "name" =>  "user2", "fullname" => "Nobody",
                "email" =>  "user2@mail.com", "type" => "admin", "password" => "d41d8cd98f00b204e9800998ecf8427e",
                "updated_at" =>  "2021-10-16 12:46:24pm", "version" => "7", "bank_id" => "3", "cost" =>  "222000"
            ],
            [
                "id" =>  "3", "name" =>  "user3", "fullname" => "Tráº§n Giáº£ TrÃ¢n",
                "email" =>  "user3@mail.com", "type" => "admin", "password" => "d41d8cd98f00b204e9800998ecf8427e",
                "updated_at" =>  "2021-10-16 01:04:15pm", "version" => "2", "bank_id" => "9", "cost" =>  "333000"
            ],
            [
                "id" =>  "4", "name" =>  "user4", "fullname" => "user4",
                "email" =>  "user4@mail.com", "type" => "admin", "password" => "3f02ebe3d7929b091e3d8ccfde2f3bc6",
                "updated_at" =>  "2021-10-14 03:45:17pm", "version" => "4", "bank_id" => "11", "cost" =>  "444000"
            ],
            [
                "id" =>  "5", "name" =>  "user5", "fullname" => "Anh Dev",
                "email" =>  "user5@mail.com", "type" => "admin", "password" => "0a791842f52a0acfbb3a783378c066b8",
                "updated_at" =>  "2021-10-14 01:18:51pm", "version" => "18", "bank_id" => "6", "cost" =>  "555000"
            ],
            [
                "id" =>  "6", "name" =>  "user6", "fullname" => "user6",
                "email" =>  "user6@mail.com", "type" => "user", "password" => "affec3b64cf90492377a8114c86fc093",
                "updated_at" =>  "2021-10-29 12:11:36am", "version" => "0", "bank_id" => "19", "cost" =>  "666000"
            ],
        ];

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case not good
     * Parameter is array consist of key "keyword", its value is an object
     */

    public function testGetBankAccountsNG_ArrayWithObjectValue()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument');

        $userRepo = UserRepository::getInstance();
        $input = ["keyword" =>  new stdClass];
        $userRepo->getBankAccounts($input);
    }

    /**
     * Test case not good
     * Parameter is array consist of key "keyword", its value is null
     */

    public function testGetBankAccountsNG_ArrayWithNullValue()
    {
        $userRepo = UserRepository::getInstance();
        $input = ["keyword" =>  null];
        $actual = $userRepo->getBankAccounts($input);
        $expected = [
            [
                "id" =>  "1", "name" =>  "user1", "fullname" => "Chá»‹ Tester",
                "email" =>  "user1@mail.com", "type" => "admin", "password" => "d41d8cd98f00b204e9800998ecf8427e",
                "updated_at" =>  "2021-10-16 12:59:31pm", "version" => "3", "bank_id" => "10", "cost" =>  "111000"
            ],
            [
                "id" =>  "2", "name" =>  "user2", "fullname" => "Nobody",
                "email" =>  "user2@mail.com", "type" => "admin", "password" => "d41d8cd98f00b204e9800998ecf8427e",
                "updated_at" =>  "2021-10-16 12:46:24pm", "version" => "7", "bank_id" => "3", "cost" =>  "222000"
            ],
            [
                "id" =>  "3", "name" =>  "user3", "fullname" => "Tráº§n Giáº£ TrÃ¢n",
                "email" =>  "user3@mail.com", "type" => "admin", "password" => "d41d8cd98f00b204e9800998ecf8427e",
                "updated_at" =>  "2021-10-16 01:04:15pm", "version" => "2", "bank_id" => "9", "cost" =>  "333000"
            ],
            [
                "id" =>  "4", "name" =>  "user4", "fullname" => "user4",
                "email" =>  "user4@mail.com", "type" => "admin", "password" => "3f02ebe3d7929b091e3d8ccfde2f3bc6",
                "updated_at" =>  "2021-10-14 03:45:17pm", "version" => "4", "bank_id" => "11", "cost" =>  "444000"
            ],
            [
                "id" =>  "5", "name" =>  "user5", "fullname" => "Anh Dev",
                "email" =>  "user5@mail.com", "type" => "admin", "password" => "0a791842f52a0acfbb3a783378c066b8",
                "updated_at" =>  "2021-10-14 01:18:51pm", "version" => "18", "bank_id" => "6", "cost" =>  "555000"
            ],
            [
                "id" =>  "6", "name" =>  "user6", "fullname" => "user6",
                "email" =>  "user6@mail.com", "type" => "user", "password" => "affec3b64cf90492377a8114c86fc093",
                "updated_at" =>  "2021-10-29 12:11:36am", "version" => "0", "bank_id" => "19", "cost" =>  "666000"
            ],
        ];

        return $this->assertEquals($expected, $actual);
    }

    /**
     * Test case not good
     * Parameter is array consist of key "keyword", its value is true
     */

    public function testGetBankAccountsNG_ArrayWithTrueValue()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument');

        $userRepo = UserRepository::getInstance();
        $input = ["keyword" =>  true];
        $userRepo->getBankAccounts($input);
    }

    /**
     * Test case not good
     * Parameter is array consist of key "keyword", its value is false
     */

    public function testGetBankAccountsNG_ArrayWithFalseValue()
    {
        $userRepo = UserRepository::getInstance();
        $input = ["keyword" =>  false];
        $actual = $userRepo->getBankAccounts($input);
        $expected = [
            [
                "id" =>  "1", "name" =>  "user1", "fullname" => "Chá»‹ Tester",
                "email" =>  "user1@mail.com", "type" => "admin", "password" => "d41d8cd98f00b204e9800998ecf8427e",
                "updated_at" =>  "2021-10-16 12:59:31pm", "version" => "3", "bank_id" => "10", "cost" =>  "111000"
            ],
            [
                "id" =>  "2", "name" =>  "user2", "fullname" => "Nobody",
                "email" =>  "user2@mail.com", "type" => "admin", "password" => "d41d8cd98f00b204e9800998ecf8427e",
                "updated_at" =>  "2021-10-16 12:46:24pm", "version" => "7", "bank_id" => "3", "cost" =>  "222000"
            ],
            [
                "id" =>  "3", "name" =>  "user3", "fullname" => "Tráº§n Giáº£ TrÃ¢n",
                "email" =>  "user3@mail.com", "type" => "admin", "password" => "d41d8cd98f00b204e9800998ecf8427e",
                "updated_at" =>  "2021-10-16 01:04:15pm", "version" => "2", "bank_id" => "9", "cost" =>  "333000"
            ],
            [
                "id" =>  "4", "name" =>  "user4", "fullname" => "user4",
                "email" =>  "user4@mail.com", "type" => "admin", "password" => "3f02ebe3d7929b091e3d8ccfde2f3bc6",
                "updated_at" =>  "2021-10-14 03:45:17pm", "version" => "4", "bank_id" => "11", "cost" =>  "444000"
            ],
            [
                "id" =>  "5", "name" =>  "user5", "fullname" => "Anh Dev",
                "email" =>  "user5@mail.com", "type" => "admin", "password" => "0a791842f52a0acfbb3a783378c066b8",
                "updated_at" =>  "2021-10-14 01:18:51pm", "version" => "18", "bank_id" => "6", "cost" =>  "555000"
            ],
            [
                "id" =>  "6", "name" =>  "user6", "fullname" => "user6",
                "email" =>  "user6@mail.com", "type" => "user", "password" => "affec3b64cf90492377a8114c86fc093",
                "updated_at" =>  "2021-10-29 12:11:36am", "version" => "0", "bank_id" => "19", "cost" =>  "666000"
            ],
        ];

        return $this->assertEquals($expected, $actual);
    }

    //----------------------------------get Instance
    /**
     * Test case Okie
     */
    public function testGetInstanceOk()
    {
        $expected = new UserRepository();

        return $this->assertEquals(UserRepository::getInstance(), $expected);
    }

    /**
     * Test case Okie
     */
    public function testGetInstanceOkWithGetInstanceMethod()
    {
        $up = new UserRepository();
        $expected = $up->getInstance();

        return $this->assertEquals(UserRepository::getInstance(), $expected);
    }

    /**
     * Test case Okie
     * Check that result is class UserRepository
     */
    public function testGetInstanceOkByComparingClass()
    {
        return $this->assertEquals(get_class(UserRepository::getInstance()), 'UserRepository');
    }

    /**
     * Test case Okie
     * Check that result is inherited from BaseModel
     */
    public function testGetInstanceOkInheritedFromBaseModel()
    {
        $up = new UserRepository();
        $actual = $up instanceof BaseModel;

        return $this->assertEquals(true, $actual);
    }

    /**
     * Test case Okie
     * Check that result is Object
     */
    public function testGetInstanceOkIsObject()
    {
        $up = new UserRepository();
        $actual = is_object($up);

        return $this->assertEquals(true, $actual);
    }
}
