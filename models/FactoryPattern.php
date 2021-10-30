<?php
require_once 'UserModel.php';
require_once 'BankModel.php';
require_once 'Repository.php';
class FactoryPattern {

    public function make($model) {
        if ($model == 'user') {
            return UserModel::getInstance();
        } else if ($model == 'bank') {
            return BankModel::getInstance();
        }
        else if ($model == 'repository'){
            return Repository::getInstance();
        }
    }
}