<?php
//$ds       = DIRECTORY_SEPARATOR;
//$base_dir = realpath(dirname(__FILE__).$ds.'..').$ds;
//require_once("{$base_dir}models{$ds}IBank.php");
abstract class DecoratorBank implements IBank {
    protected $bank;
    public function setBank(IBank  $bank)
    {
        $this->bank = $bank;
    }
    public function cost() {}
}