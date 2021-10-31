<?php
require_once 'models/UserModel.php';
require_once 'models/BankModel.php';
class SingletonPattern {

    public function make($model) {
        $object = Null;
        if ($model == 'user') {
            $object = UserModel::getInstance();
        } else if ($model == 'bank') {
            $object = BankModel::getInstance();
        }
        return $object;
    }
}