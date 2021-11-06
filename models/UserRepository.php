<?php
require_once 'UserModel.php';
require_once 'BankModel.php';

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
    // Chưa làm Thêm, xoá, sửa

    public static function getInstance()
    {
        if (self::$_instance !== null) {
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }
}
