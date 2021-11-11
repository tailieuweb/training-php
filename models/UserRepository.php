<?php
require_once 'UserModel.php';
require_once 'BankModel.php';
require_once 'Result.php';

class UserRepository
{
    protected static $_instance;
    private $userModel;
    private $bankModel;
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
     * Proxy
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
            // $insertbank = $this->bankModel->insertBank($userId, $cost);
            $insertUser = $this->userModel->insertUser($userId, $cost);
            return $insertUser;
        }
    }
    /**
     * Proxy
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
        $this->userModel->deleteUserById($id);
        $this->bankModel->deleteBankByUserId($userId);
    }
    /**
     * Proxy
     * Update  User With Bank
     */
    public function updateUserWithBank($input)
    {
        $result = ResultClass::getInstance();
        $findUser = $this->userModel->findUserById($input['id']);
        if ($findUser == false) {
            $result->setError("Không tìm thấy User");
        } else {
            $userId = $findUser['id'];
            $userUpdate = $this->userModel->updateUser($input);
            if ($userUpdate->isSuccess == false) {
                $result->setError($userUpdate->error);
            } else {
                $cost = $input['cost'];
                $bankupdate = $this->bankModel->updateBank($userId, $cost);
                if ($bankupdate == true) {
                    $result->setData("Update Bank and User Success");
                } else {
                    $result->setError("Update Bank False");
                }
            }
        }
        return $result;
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
