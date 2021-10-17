<?php
abstract class Base {

    protected static $_instance;
}
class User extends Base {
    public static function getInstance()
    {
        parent::$_instance = null; 
        if(self::$_instance !== null){
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }
    public function print(){

        echo 'Đây là lớp user <br>';

    }
    

}
class Bank extends Base {
    public static function getInstance()
    {
        parent::$_instance = null;
        if(self::$_instance !== null){
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }
    public function print(){

        echo 'Đây là lớp bank';

    }

}
class Factory {
    public function make($model){
        
        // if($model != 'user' || $mode != 'bank'){
        //     return null;
        // }

        if($model == 'user'){

        return User::getInstance();

        } else if($model == 'bank'){

            return Bank::getInstance();

        } else {

            return null;
            
        }
    }

}
$factory = new Factory();
$bank = $factory->make('bank');
$user = $factory->make('user');
$user->print();
