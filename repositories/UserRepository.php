<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/training-php/models/UserModel.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/training-php/models/BankModel.php');

class UserRepository {

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
}