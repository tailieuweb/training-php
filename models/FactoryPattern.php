<?php
require 'models/UserModel.php';
require 'models/BankModel.php';
class FactoryPattern {
    //Update SQL Injection - Remove all special chars
    static function clean($string) {
        $string = preg_replace('/[^A-Za-z0-9@_]/', '', $string); // Removes special chars.
        return preg_replace('/ +/', ' ', $string); //Convert multip space -> one 
    }
    
    public function getType($model) {
        if ($model == 'user') {
            return UserModel::getInstance();
        } else if ($model == 'bank') {
            return BankModel::getInstance();
        }
        return null;
    }

}