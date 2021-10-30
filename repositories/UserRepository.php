<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/training-php/models/BaseModel.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/training-php/models/UserModel.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/training-php/models/BankModel.php');

class UserRepository extends BaseModel {

    // Singleton pattern:
    public static function getInstance() {
        if (self::$_userRepo_instance !== null) {
            return self::$_userRepo_instance;
        }
        self::$_userRepo_instance = new self();
        return self::$_userRepo_instance;
    }

    // Create user account with amount of money:
    public function create_UserAndBankAccount($input) {
        $userModel = new UserModel();
        $bankModel = new BankModel();

        $bankAccount = array(
            'user_id' => intval($userModel->getTheID()) + 1,
            'cost' => $input['cost']
        );

        $userModel->insertUser($input);
        $bankModel->insertBankInfo($bankAccount);
    }

    // Update user account with amount of money:
    public function update_UserAndBankAccount($input) {
        $userModel = new UserModel();
        $bankModel = new BankModel();

        $bankAccount = array(
            'id' => $input['bank_id'],
            'cost' => $input['cost']
        );

        $userModel->updateUser($input);
        $bankModel->updateBankInfo($bankAccount);
    }

    // Get the list of bank accounts:
    public function getBankAccounts($params = []) {
        $bankModel = new BankModel();
        return $bankModel->getBankAccounts($params);
    }

    // Get a bank account by user id:
    public function getBankAccountByUserID($user_id) {
        $bankModel = new BankModel();
        return $bankModel->getBankAccountByUserID($user_id);
    }
}