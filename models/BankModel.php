<?php 
require_once 'BaseModel.php';
class BankModel extends BaseModel {
    public function getAll() {
        $sql = 'SELECT * FROM banks';
        $user = $this->select($sql);
        return $user;
    }

    // Singleton pattern:
    public static function getInstance() {
        if (self::$bankInstance !== null) {
            return self::$bankInstance;
        }
        self::$bankInstance = new self();
        return self::$bankInstance;
    }
}