<?php

namespace SmartWeb\Models;
//factory
class TerrainFactory
{
    #[InjectConstructor(DB::class, Product::class)]
    public function __construct(private DB $db,  private Product $product)
    {
    }

    public function getDB(): DB
    {
        return $this->db;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }
}

use Attribute;

#[Attribute]
class InjectConstructor
{
    public function __construct()
    {
        
    }
}
//$factory = new TerrainFactory(new DBMYSQLI);
