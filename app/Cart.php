<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function getGrandTotal($cart){
        $count = 0;
        foreach($cart as $key => $value) {
            foreach($value as $key => $item) {
                $count++;
            }
        }
        return $count;
    }
}
