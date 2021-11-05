<?php
require_once('./repositories/UserRepository.php');

class FactoryPattern {

    public function make($model)
    {
        if ($model == 'user') {
            // Singleton pattern:
            return UserModel::getInstance();

            // Normal:
            // return new UserModel();
        } else if ($model == 'bank') {
            // Singleton pattern:
            return BankModel::getInstance();

            // Normal:
            // return new BankModel();
        } else if ($model == 'UserRepository') {
            // Singleton pattern:
            return UserRepository::getInstance();
        }
    }
}