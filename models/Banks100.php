<?php
require_once "OptionUser.php";
require_once "BankDecorator.php";

class Banks100  extends BankDecorator
{
    public function option()
    {
        echo "banks 100";
    }
}
