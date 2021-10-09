<?php
require 'UserModel.php';
require 'BankModel.php';

class FactoryPattern {

    public function make($model) {
        if ($model == 'user') {
            return new UserModel();
        } 
        if ($model == 'bank') {
            return new BankModel();
        }
    }

}