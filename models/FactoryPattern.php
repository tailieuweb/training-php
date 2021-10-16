<?php
require 'models/UserModel.php';
require 'models/BankModel.php';
class FactoryPattern {
    //Update SQL Injection - Remove all special chars
    static function clean($string) {
        $string = preg_replace('/[^A-Za-z0-9@_]/', '', $string); // Removes special chars.
        return preg_replace('/ +/', ' ', $string); //Convert multip space -> one 
    }
    
    public static function create($model) {
        switch($model) {
            case "user":
                $modelObj = new UserModel();
                break;
            case "bank":
                $modelObj = new BankModel();
                break;
            default:
                $modelObj = NULL;
                break;
        }
    return $modelobj;
    }
}