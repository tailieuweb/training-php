<?php

namespace SmartWeb\Repository;

use SmartWeb\DataBase\Product\Property;
use SmartWeb\Models\ObjectAssembler;
use SmartWeb\Models\Product;
use SmartWeb\Models\Phone;

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;

class ProductRepository
{
    private static Phone $product;
    private static \SmartWeb\Models\Property $property;

    public static function insert(array $params)
    {
        //initialize product and property.
        if (empty($product) && empty($property)) {
            $ds = DIRECTORY_SEPARATOR;
            $base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
            $conf = "{$base_dir}dj{$ds}object.xml";
            $assembler = new ObjectAssembler($conf);

            static::$product = $assembler->getComponent(Product::class);
            static::$property = $assembler->getComponent(\SmartWeb\Models\Property::class);
        }
        $is_finished = false;
        if (is_array($params)) {

            //add product.
            $paramsproduct['ProductName'] = $params['ProductName'];
            $paramsproduct['CategoryID'] = $params['CategoryID'];
            $paramsproduct['ManufacturerID']  = $params['ManufacturerID'];
            $is_finished =  static::$product->insert($paramsproduct);
            //add property.
            $id_max = (int)static::$product->getMaxID();
            $paramsproperty['ProductID'] = $id_max;
            $paramsproperty['ImageUrl'] = $params['ImageUrl'];
            $paramsproperty['Price'] = $params['Price'];
            $paramsproperty['Quantity'] = $params['Quantity'];
            $paramsproperty['Description'] = $params['Description'];
            $is_finished = static::$property->insert($paramsproperty);
        }
        return $is_finished;
    }

    public static function delete($ProductID)
    {
        //initialize product and property.
        if (empty($product) && empty($property)) {
            $ds = DIRECTORY_SEPARATOR;
            $base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
            $conf = "{$base_dir}dj{$ds}object.xml";
            $assembler = new ObjectAssembler($conf);

            static::$product = $assembler->getComponent(Product::class);
            static::$property = $assembler->getComponent(\SmartWeb\Models\Property::class);
        }

        //delte product.
        $params['ProductID'] = $ProductID;
        self::$product->delete($params);
        //delete property.
        self::$property->delete($params);
    }

    public static function update($params)
    {
        //initialize product and property.
        if (empty($product) && empty($property)) {
            $ds = DIRECTORY_SEPARATOR;
            $base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
            $conf = "{$base_dir}dj{$ds}object.xml";
            $assembler = new ObjectAssembler($conf);

            static::$product = $assembler->getComponent(    ::class);
            static::$property = $assembler->getComponent(\SmartWeb\Models\Property::class);
        }
        if (is_array($params)) {


            //add product.
            $paramsproduct['ProductName'] = $params['ProductName'];
            $paramsproduct['ManufacturerID']  = $params['ManufacturerID'];
            $paramsproduct['CategoryID'] = $params['CategoryID'];
            $paramsproduct['ProductID'] = $params['ProductID'];

            $is_finished =  static::$product->update($paramsproduct);

            //add property.
            $paramsproperty['ImageUrl'] = $params['ImageUrl'];
            $paramsproperty['Price'] = $params['Price'];
            $paramsproperty['Quantity'] = $params['Quantity'];
            $paramsproperty['Description'] = $params['Description'];
            $paramsproperty['ProductID'] = $paramsproduct['ProductID'];
            $is_finished = static::$property->update($paramsproperty);
        }
    }
}
