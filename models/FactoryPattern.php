<?php
require_once 'models/UserModel.php';
require_once 'models/BankModel.php';

class FactoryPattern {
  public function make($model){
    if($model == 'user'){
      //return new user models
      return new UserModel();
    }
    elseif($model == 'bank'){
      //return new bank models
      return new BankModel();
    }
  }
}