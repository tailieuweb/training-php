<?php
require_once 'models/UserModel.php';
require_once 'models/BankModel.php';
require_once 'Repository/UserRepository.php';
class FactoryPattern
{
    public function make($model)
    {
        if ($model == 'user') {
            return new UserModel();
        } elseif ($model == 'bank') {
            return new BankModel();
        }elseif($model == 'Repository'){
            return new UserRepository();
        }
    }
}
