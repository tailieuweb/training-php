<?php
require  "DecoratorBank.php";
class LaiSuat extends DecoratorBank {
    public  function cost()
    {
        $banks = $this->bank->cost();
        foreach ($banks as &$bank) {
            $cost            = (int) $bank['SoDu'];
            $bank['LaiXuat'] = $cost * $this->tilephantram() + $cost;
        }
        return $banks;
    }
    public  function  tilephantram()
    {
        return 0.3;
    }
}
