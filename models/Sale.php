<?php

require_once("OptionUser.php");
require_once("BankDecorator.php");

class Sale extends BankDecorator
{
    protected $decoratedShape;

    function __construct(OptionUser $decoratedShape){
       parent::__construct($decoratedShape);
    }

    public function option()
    {
        $this->decoratedShape->option();
    }
}