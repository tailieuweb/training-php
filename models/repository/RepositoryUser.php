<?php
use SebastianBergmann\FileIterator\Factory;

require_once './models/repository/RepositoryInterface.php';
require_once './models/UserModel.php';

class RepositoryUser implements RepositoryInterface{
    protected static $userModel;
//constructor:
    function __construct()
    {
        // $factory = new FactoryPattern();
        self::$userModel = UserModel::getInstance();
    }
    //read
    public function read() {
        return self::$userModel->getAll();
    }
    //insert
    public function insert($input) {
        return self::$userModel->insertUser($input);
    }
    //update
    public function update($input) {
        return self::$userModel->updateUser($input);
    }
    //delete
    public function delete($id) {
        return self::$userModel->deleteUserById($id);
    }
    //find
    public function search($params)
    {
        return self::$userModel->getUsers($params);
    }
    //auth
    public  function auth($userName,$password)
    {
    return self::$userModel->auth($userName,$password);
    }
}

