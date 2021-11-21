<?php

namespace SmartWeb\Models;
include "db.php";
class Product
{
    #[InjectConstructor(DB::class)]
    public function __construct(protected DB $db)
    {
        $this->db =  $db;
    }
}



