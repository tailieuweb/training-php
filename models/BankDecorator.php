<?php

require_once("OptionUser.php");

abstract class BankDecorator implements OptionUser
{
    protected $decoratedShape;

    function __construct(OptionUser $decoratedShape){
        $this->decoratedShape = $decoratedShape;
    }

    public function option()
    {
        echo "Function Option BankDecorator";
    }
}