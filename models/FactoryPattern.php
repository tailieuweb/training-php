<?php
require_once 'UserModel.php';
require_once 'BankModel.php';
class FactoryPattern {

    public function make($model)
    {
        if ($model == 'user') {
            return new UserModel();
        } else if ($model == 'bank') {
            return new BankModel();
        }
    }
}
