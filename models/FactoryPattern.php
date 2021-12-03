<?php

use function PHPUnit\Framework\isEmpty;

require_once('./repositories/UserRepository.php');

class FactoryPattern
{

    public function make($model)
    {
        if (!isset($model)) {
            throw new ArgumentCountError("Too few argument");
        }

        if ($model instanceof stdClass || is_bool($model) || is_array($model)) {
            throw new InvalidArgumentException('Invalid argument');
        }

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
        } else {
            return null;
        }
    }
}
