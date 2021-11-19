<?php
use SebastianBergmann\FileIterator\Factory;
require_once './models/BankModel.php';
require_once './models/repository/RepositoryInterface.php';

class RepositoryBank implements RepositoryInterface{
    protected static $bankModel;
//constructor:
    function __construct()
    {
        // $factory = new FactoryPattern();
        self::$bankModel = BankModel::getInstance();
    }
    //read
    public function read() {
        return self::$bankModel->getAll();
    }
    //insert
    public function insert($input) {
        return self::$bankModel->insertBankInfo($input);
    }
    //update
    public function update($input) {
        return self::$bankModel->updateBankInfo($input);
    }
    //delete
    public function delete($id) {
        return self::$bankModel->deleteBalanceById($id);
    }
    //find
    public function search($params)
    {
        return self::$userModel->getBanksInfo($params);
    }
   
}

