<?php

use SebastianBergmann\FileIterator\Factory;

require_once './models/UserModel.php';
require_once './models/RepositoryInterface.php';

class RepositoryUser implements RepositoryInterface{
    protected static $userModel;

    function __construct()
    {
        self::$userModel = UserModel::getInstance();
    }
    
    public function read() {
        return self::$userModel->getAll();
    }
    public function insert($input) {
        return self::$userModel->insertUser($input);
    }
    public function update($input) {
        return self::$userModel->updateUser($input);
    }
    public function delete($id) {
        return self::$userModel->deleteUserById($id);
    }
    public function find($id) {
        return self::$userModel->findUserById($id);
    }
    public function search($params) {
        return self::$userModel->getUsers($params);
    }
    public function auth($userName, $password) {
        return self::$userModel->auth($userName, $password);
    }
}

