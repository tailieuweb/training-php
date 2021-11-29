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
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $bankModel = $factory->make('bank');

        $bankAccount = array(
            'user_id' => intval($userModel->getTheID()) + 1,
            'cost' => $input['cost']
        );

        $userModel->insertUser($input);
        $bankModel->insertBankInfo($bankAccount);
    }

    // Update user account with amount of money:
    public function update_UserAndBankAccount($input)
    {
        if(!is_array($input)) return "Params invalid";
        if(!is_numeric($input['id']) || !is_string($input['name']) || !is_string($input['fullname']) 
        || !is_string($input['email']) || !is_string($input['password']) || !is_string($input['type'])  
        || !is_numeric($input['bank_id']) || !is_numeric($input['cost'])) {
            return "Invalid value";
        }
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $bankModel = $factory->make('bank');

        $bankAccount = array(
            'id' => $input['bank_id'],
            'cost' => $input['cost']
        );

        // Display result.
        return $userModel->updateUser($input) ==  $bankModel->updateBankInfo($bankAccount);
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

        return $bankModel->getBankAccounts($params);
    }

    // Get a bank account by user id:
    public function getBankAccountByUserID($user_id)
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        // $bankModel = new BankModel();
        return $bankModel->getBankAccountByUserID($user_id);
    }
}
