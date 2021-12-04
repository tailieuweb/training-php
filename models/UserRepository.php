<?php
require_once 'UserModel.php';
require_once 'BankModel.php';
require_once 'Result.php';

class UserRepository extends BaseModel
{
    protected static $_instance;
    public $userModel;
    public $bankModel;
    //constructor
    public function __construct()
    {
        $this->userModel = UserModel::getInstance();
        $this->bankModel = BankModel::getInstance();
    }

    /**
     * Get User by id with bank corresponding 
     */
    public function findById($id)
    {
        $result = NULL;
        $user = $this->userModel->findUserById($id);
        if ($user) {
            $result = $user;
            $userId = $user['id'];
            $bank = $this->bankModel->getBankByUserId($userId);
            if ($bank) {
                $result['cost'] = $bank['cost'];
            }
        }
        return $result;
    }

    /**
     * Insert User
     */
    public function insertUser($input)
    {
        $insertUser = $this->userModel->insertUser($input);
        if ($insertUser == false) {
            return false;
        } else {
            $user = $this->userModel->findUserByEmail($input['email']);
            $userId = $user['id'];
            $cost = 1000;
            $insertbank = $this->bankModel->insertBank($userId, $cost);
            return $insertbank;
        }
    }
    /**
     * Get  All User Or User By Keyword
     */
    public function getUsersWithBank($params = [])
    {

        $getUsers = $this->userModel->getUsers($params);
        $listUserResult = [];
        foreach ($getUsers as $user) {
            $temp = $user;
            $userId = $user['id'];
            $getbank = $this->bankModel->getBankByUserId($userId);
            if ($getbank == false)
                $temp['cost'] = null;
            else {
                $temp['cost'] = $getbank['cost'];
            }
            array_push($listUserResult, $temp);
        }
        return $listUserResult;
    }
    /**
     * Delete User
     */
    public function deleteUser($id)
    {
        $findUser = $this->userModel->findUserById($id);
        if ($findUser == false) {
            return false;
        }
        $userId = $findUser['id'];
        $deleteUser = $this->userModel->deleteUserById($id);
        $deleteBank = $this->bankModel->deleteBankByUserId($userId);
        return $deleteUser && $deleteBank;
    }
    /**
     * Update  User With Bank
     */
    public function updateUserWithBank($input)
    {
        $result = ResultClass::getInstance();
        $userUpdate = $this->userModel->updateUser($input);
        if ($userUpdate->isSuccess == false) {
            $result->setError($userUpdate->error);
        } else {
            $findUser = $this->userModel->findUserById($input['id']);
            $userId = $findUser['id'];
            $cost = $input['cost'];
            $bankupdate = $this->bankModel->updateBank($userId, $cost);
            if ($bankupdate == true) {
                $result->setData("Update Bank and User Success");
            } else {
                $result->setError("Update Bank False");
            }
        }
        return $result;
    }
    /**
     * Insert User With Id
     */
    public function insertUserWithId($input)
    {
        if (!is_array($input)) {
            return false;
        }
        $insertUser = $this->userModel->insertUserWithId(
            $input['id'],
            $input['name'],
            $input['fullname'],
            $input['email'],
            $input['type'],
            $input['password']
        );
        if ($insertUser == false) {
            return false;
        } else {
            $userId = $input['id'];
            $cost = 1000;
            $insertbank = $this->bankModel->insertBank($userId, $cost);
            return $insertbank;
        }
    }
    public static function getInstance()
    {
        if (self::$_instance !== null) {
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }
}