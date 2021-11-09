<?php
$ds       = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__).$ds.'..').$ds;
require_once("{$base_dir}models{$ds}Bank.php");
abstract class DecoratorBank implements Bank {
    protected $bank;
    public function setBank(Bank  $bank)
    {
        $this->bank = $bank;
    }
    public function cost() {}
}