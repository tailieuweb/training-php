
<?php
$singleton = new Singleton    ();
$bank = $singleton->make('bank');
$user = $singleton->make('user');
$user->print();
$bank->print();
var_dump($user);
$user->print();
$bank->print();
abstract class Base {

    const Bank = 'bank';
    const User = 'user';
    protected static $_instance;
}
class User extends Base
{
    public static function getInstance()
    {
        if (!empty(self::$_instance[self::User])){
            return self::$_instance[self::User];
        }
        self::$_instance[self::User] = new self();
        return self::$_instance[self::User];
    }
    public function print()
    {
        echo ' Lớp User';
    }
}
class Bank extends Base
{
    public static function getInstance()
    {
        if (!empty(self::$_instance[self::Bank])){
            return self::$_instance[self::Bank];
        }
        self::$_instance[self::Bank] = new self();
        return self::$_instance[self::Bank];
    }
    public function print()
    {
        echo ' Lớp Bank';
    }
}

class Singleton
{
    public function make($model) {
        // Singleton pattern:
        if ($model == 'user') {
            return User::getInstance();
        } else if ($model == 'bank') {
            return Bank::getInstance();
        }
        else{
            return null;
        }
    }
}

