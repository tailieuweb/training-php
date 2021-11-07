<?php

require_once("Shape.php");
require_once("ShapeDecorator.php");

class RedShapeDecorator extends ShapeDecorator
{
    protected $decoratedShape;

    function __construct(Shape $decoratedShape){
       parent::__construct($decoratedShape);
    }

    public function draw()
    {
        $this->decoratedShape->draw();
        $this->setRedBorder($this->decoratedShape);
        $this->setWidth($this->decoratedShape);
    }
    private function setRedBorder(Shape $decoratedShape){
        echo "Border Color: Red";
    }
    private function setWidth(Shape $decoratedShape){
        echo $this->decoratedShape->width() + 20;
    }
}