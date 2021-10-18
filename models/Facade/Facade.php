<?php

class Facade{
    private $class;
    public function makeRequire($class){
        $this->class = $class;
        require './models/' . $class . '.php';
        $obj = new $this->class;
        return $obj;
    }
}