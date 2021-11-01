<?php
require_once 'models/RepositoryPattern.php';
//require_once 'models/BankModel.php';
class FactoryPattern extends BaseModel{

    public function make($model) {
        if ($model == 'user') {
            return new UserModel();
        } else if ($model == 'bank') {
            return new BankModel();
        }
    }

}