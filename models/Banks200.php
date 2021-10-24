<?php

require_once("OptionUser.php");
require_once("BankDecorator.php");

class Banks200 implements OptionUser
{
    public function option()
    {
        echo "Bank 200";
    }
}