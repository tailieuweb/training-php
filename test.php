<?php
abstract class Base
{
    const BANK = 'bank';
    const  USER = 'user';
    protected static $_instance = [];
}
class User extends Base
{
    public static function getInstance()
    {
        if (!empty(self::$_instance[self::USER])) {
            return self::$_instance[self::USER];
        }
        self::$_instance[self::USER] = new self();
        return self::$_instance[self::USER];
    }
    public function print()
    {
        echo 'Đây là lớp user';
    }
}
class Bank extends Base
{
    public static function getInstance()
    {
        if (!empty(self::$_instance[self::BANK])) {
            return self::$_instance[self::BANK];
        }
        self::$_instance[self::BANK] = new self();
        return  self::$_instance[self::BANK];
    }
    public function print()
    {
        echo 'Đây là lớp bank';
    }
}
class Singleton
{
    public function make($model)
    {
        if ($model == 'user') {
            return User::getInstance();
        } else if ($model == 'bank') {
            return Bank::getInstance();
        } else {
            return null;
        }
    }
}
$factory = new Singleton    ();
$bank = $factory->make('bank');
$user = $factory->make('user');
$user->print();
$bank->print();
var_dump($user);
$user->print();
$bank->print();
