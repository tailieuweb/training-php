<?php
require_once 'models/UserModel.php';
class FatoryPattem{
    public function make($model){
        if ($model == 'user'){
            return new UserModel();
        }else if ($model == 'bank');
    }
}
