<?php

namespace SmartWeb\Controller;

use SmartWeb\Models\ObjectAssembler;
use SmartWeb\Models\Manufacture;

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
include_once("{$base_dir}include{$ds}function.php");

class ManufactureController
{
    private Manufacture $manu;
    public function __construct(string $conf)
    {
        $assembler = new ObjectAssembler($conf);
        $this->manu = $assembler->getComponent(Manufacture::class);
    }
    public function display_manu()
    {
        //initialize
        $result = $this->manu->getManu();

        $select = <<< Select
            <select name="ManufacturerID" id="ManufacturerID">
            <option value="">Selected one</option>
        Select;
        foreach ($result as $key => $value) {
            $select .= <<< Select
            <option value="{$value['ManufacturerID']}">{$value['ManufacturerName']}</option>
            Select;
        }
        $select .= <<< Select
        </select>
        Select;
        return $select;
    }

    public function delete()
    {
    }
}
