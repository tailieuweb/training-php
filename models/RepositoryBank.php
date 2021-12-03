<?php


require_once './models/BankModel.php';
require_once './models/RepositoryInterface.php';

class RepositoryBank implements RepositoryInterface{
    protected static $bankModel;

    function __construct()
    {
        self::$bankModel = BankModel::getInstance();
    }
    
    public function read() {
        return self::$bankModel->getAll();
    }
    public function insert($input) {
        return self::$bankModel->insertBankInfo($input);
    }
    public function update($input) {
        return self::$bankModel->updateBankInfo($input);
    }
    public function delete($id) {
        return self::$bankModel->deleteBalanceById($id);
    }
    public function find($id) {
        return self::$bankModel->findBankInfoById($id);
    }
    public function search($params) {
        return self::$bankModel->getBanksInfo($params);
    }
    public function findByUserId($user_id) {
        return self::$bankModel->findBankInfoByUserID($user_id);
    }
    public function startTransaction() {
        self::$bankModel->startTransaction();
    }
    public function rollback() {
        self::$bankModel->rollback();
    }
}

