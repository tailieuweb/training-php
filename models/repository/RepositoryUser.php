<?php

use SebastianBergmann\FileIterator\Factory;

require_once './models/FactoryPattern.php';
require_once './models/repository/RepositoryInterface.php';

class RepositoryUser implements RepositoryInterface{
    protected static $userModel;
//constructor:
    function __construct()
    {
        $factory = new FactoryPattern();
        self::$userModel = $factory->make('user');
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
}

