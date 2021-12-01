<?php
require_once 'models/UserModel.php';
class FactoryPattern extends BaseModel{
  public function make($model){
    if($model == 'user'){
      return UserModel::getInstance();
    }elseif($model == 'bank'){
      //return new BankModel();
    }
  }
}