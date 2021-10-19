<?php

class Facade{
    private $class;
    public function makeRequire($class){
        $this->class = $class;
        return require './models/' . $class . '.php';
    }
}