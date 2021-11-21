<?php

namespace SmartWeb;

include "db.php";
class Model
{
    #[InjectConstructor(DB::class)]
    public function __construct(protected DB $db)
    {
        $this->db =  $db;
    }
}
