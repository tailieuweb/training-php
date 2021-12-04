<?php

require_once("Shape.php");

abstract class ShapeDecorator implements Shape
{
    protected $decoratedShape;

    function __construct(Shape $decoratedShape){
        $this->decoratedShape = $decoratedShape;
    }

    public function draw()
    {
        echo "Shape: Rectangle";
    }
}