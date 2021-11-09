<?php
require  "DecoratorBank.php";
class InterestRate extends DecoratorBank {
    public  function cost()
    {
        $banks = $this->bank->cost();
        foreach ($banks as &$bank) {
            $cost            = (int) $bank['soDu'];
            $bank['laiXuat'] = $cost * $this->tilephantram() + $cost;
        }
        return $banks;
    }
    public  function  tilephantram()
    {
        return 0.3;
    }
}