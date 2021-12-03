<?php
require_once('./models/BaseModel.php');
require_once('./models/UserModel.php');
require_once('./models/BankModel.php');
require_once 'models/FactoryPattern.php';


class UserRepository extends BaseModel
{
    // Singleton pattern:
    public static function getInstance()
    {
        if (self::$_userRepo_instance !== null) {
            return self::$_userRepo_instance;
        }
        self::$_userRepo_instance = new self();
        return self::$_userRepo_instance;
    }

    // Create user account with amount of money:
    public function create_UserAndBankAccount($input)
    {
        if (
            !isset($input['cost']) || !isset($input['password']) || !isset($input['name'])
            || !isset($input['fullname']) || !isset($input['email']) || !isset($input['type'])
        ) {
            return  false;
        }
        if (
            gettype($input['cost']) == 'boolean' || gettype($input['password']) == 'boolean' || gettype($input['name']) == 'boolean'
            || gettype($input['fullname']) == 'boolean' || gettype($input['email']) == 'boolean' || gettype($input['type']) == 'boolean'
        ) {
            return  false;
        }
        if (
            empty($input['cost']) || empty($input['password']) || empty($input['name'])
            || empty($input['fullname']) || empty($input['email']) || empty($input['type'])
        ) {
            return  false;
        }
        $checkemail = false;
        for ($i = 0; $i < strlen($input['email']); $i++) {
            if ($input['email'][$i] == '@') {
                $checkemail = true;
            }
        }
        if (!$checkemail) {
            return  false;
        }
        $checkCost = true;
        $input['cost'] = strval($input['cost']);
        for ($i = 0; $i < strlen($input['cost']); $i++) {
            if (ord($input['cost'][$i]) < 48 || ord($input['cost'][$i]) > 57) {
                $checkCost = false;
            }
        }
        if (!$checkCost) {
            return  false;
        }

        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $bankModel = $factory->make('bank');
        $bankAccount = array(
            'user_id' => intval($userModel->getTheID()) + 1,
            'cost' => $input['cost']
        );

        $userModel->insertUser($input);
        $bankModel->insertBankInfo($bankAccount);
        return true;
    }

    // Update user account with amount of money:
    public function update_UserAndBankAccount($input)
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $bankModel = $factory->make('bank');

        $bankAccount = array(
            'id' => $input['bank_id'],
            'cost' => $input['cost']
        );

        $userModel->updateUser($input);
        $bankModel->updateBankInfo($bankAccount);
    }

    // Get the list of bank accounts:
    public function getBankAccounts($params = [])
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');

        // CODE FOR TESTING SINGLETON DESIGN PATTERN
        // $bankModel->test = 100;
        // var_dump($bankModel->test);
        // $bankModel1 = $factory->make('bank');
        // var_dump($bankModel1->test);
        // die();

        if (!empty($params['keyword'])) {
            if ($params['keyword'] instanceof stdClass || is_bool($params['keyword']) || is_array($params['keyword'])) {
                throw new InvalidArgumentException('Invalid argument');
            }
        }

        return $bankModel->getBankAccounts($params);
    }

    // Get a bank account by user id:
    public function getBankAccountByUserID($user_id)
    {
        if (empty($user_id)) {
            return  false;
        }
        if ($user_id < 0) {
            return  false;
        }
        if (gettype($user_id) != 'integer') {
            return  false;
        }
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        // $bankModel = new BankModel();
        return $bankModel->getBankAccountByUserID($user_id);
    }
}
