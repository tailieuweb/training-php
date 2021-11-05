<?php
require_once('./models/BaseModel.php');
require_once('./models/BankModel.php');
require_once('./models/UserModel.php');

class UserRepository extends BaseModel {

    // Singleton pattern:
    public static function getInstance() {
        if (self::$_instance !== null) {
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }

    // Create user and bank
    public function create_User($input) {
        $userModel = new UserModel();
        return $userModel->insertUser($input);
    }
    
    public function create_Bank($input) {
        $bankModel = new BankModel();
        return $bankModel->insertBank($input);
    }

    // Update user and bank
    public function update_User($input) {
        $userModel = new UserModel();
        return $userModel->updateUser($input);
    }

    public function update_Bank($input) {
        $bankModel = new BankModel();
        return $bankModel->updateBank($input);
    }
    // Delete user and bank
    public function delete_User($input) {
        $userModel = new UserModel();
        return $userModel->deleteUserById($input);
    }

    public function delete_Bank($input) {
        $bankModel = new BankModel();
        return $bankModel->deleteBankById($input);
    }

    // Get the list of bank :
    public function getListBank($params = []) {
        $bankModel = new BankModel();
        return $bankModel->getBanks($params);
    }

    // Get a bank by id:
    public function getBankID($id) {
        $bankModel = new BankModel();
        return $bankModel->findBankById($id);
    }
    // Get the list of user :
    public function getListUser($params = []) {
        $userModel = new UserModel();
        return $userModel->getUsers($params);
    }

    // Get a user by id:
    public function getUserID($id) {
        $userModel = new UserModel();
        return $userModel->findUserById($id);
    }
}