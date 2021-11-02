<?php

use SebastianBergmann\FileIterator\Factory;

require_once './models/FactoryPattern.php';
require_once './models/RepositoryInterface.php';

class RepositoryUser implements RepositoryInterface{
    protected static $userModel;

    function __construct()
    {
        $factory = new FactoryPattern();
        self::$userModel = $factory->make('user');
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
}

