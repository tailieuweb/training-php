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
     * Test case Okie
     * Parameter is array consist of key "keyword", but its value does not exist in database
     */

    // public function testGetBankAccountsNG_InvalidArray()
    // {
    //     $userRepo = UserRepository::getInstance();
    //     $input = ["test" => '2'];
    //     $actual = $userRepo->getBankAccounts($input);

    //     $expected = [
    //         [
    //             "id" =>  "2", "name" =>  "user2", "fullname" => "Nobody",
    //             "email" =>  "user2@mail.com", "type" => "admin", "password" => "d41d8cd98f00b204e9800998ecf8427e",
    //             "updated_at" =>  "2021-10-16 12:46:24pm", "version" => "7", "bank_id" => "3", "cost" =>  "222000"
    //         ],
    //         [
    //             "id" =>  "2", "name" =>  "user2", "fullname" => "Nobody",
    //             "email" =>  "user2@mail.com", "type" => "admin", "password" => "d41d8cd98f00b204e9800998ecf8427e",
    //             "updated_at" =>  "2021-10-16 12:46:24pm", "version" => "7", "bank_id" => "3", "cost" =>  "222000"
    //         ],

    //     ];

    //     return $this->assertEquals($expected, $actual);
    // }
}
