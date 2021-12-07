<?php

use phpDocumentor\Reflection\Types\Null_;

require 'models/UserModel.php';
require 'models/BankModel.php';
class FactoryPattern
{

    public function make($model)
    {
        $object = Null;

        if (is_numeric($model) || is_object($model) || is_array($model) || $model == '' || $model == null || is_bool($model)) {
            return null;
        } else if ($model == 'user') {
            $object = new UserModel();
        } else if ($model == 'bank') {
            $object = new BankModel();
        }
        return $object;
    }
}
