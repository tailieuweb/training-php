<?php
abstract class BaseModel
{
    private static $_instance = null;

    public function __construct()
    {
    }

    static function get()
    {
        return self::$_instance;
    }
    static function  set($_instance)
    {
        self::$_instance = $_instance;
    }
}

class User extends BaseModel
{
    public function __construct()
    {
    }
    public static function getInstance()
    {

        if (parent::get()  !== null) {
            return parent::get();
        }
        parent::set(new self());
        return parent::get();
    }
    public function print()
    {
        return "instance user\n";
    }
}

class Bank extends BaseModel
{
    public static function getInstance()
    {
        if (parent::get()  !== null) {
            return parent::get();
        }
        parent::set(new self());
        return parent::get();
    }
    public function print()
    {
        return "instance bank vl";
    }
    public function print2()
    {
        return "instance bank vl";
    }
}

class Factory
{
    public function make($model)
    {
        if ($model == 'user') {
            return User::getInstance();
        } elseif ($model == 'bank') {
            return Bank::getInstance();
        }
    }
}


$fac = new Factory();

$u = $fac->make('user');
$b = $fac->make('bank');


echo $u->print();
echo $b->print();
