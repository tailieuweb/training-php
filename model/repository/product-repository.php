<?php

namespace SmartWeb;

use SmartWeb\Property;
use SmartWeb\ObjectAssembler;
use SmartWeb\Product;
use SmartWeb\Phone;

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;

class ProductRepository
{
    private static Phone $product;
    private static Property $property;

   
}
