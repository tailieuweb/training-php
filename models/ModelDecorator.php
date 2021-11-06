<?php

require_once("IModel.php");

abstract class ModelDecorator extends IModel
{
    protected $decoratedModel;

    function __construct(IModel $decoratedModel){
        $this->decoratedModel = $decoratedModel;
    }
    public function select($params = [], IModel $decoratedModel)
    {
        $this->decoratedModel->select();
    }
    public function delete($id){
        $this->decoratedModel->delete();
    }
    public function insert($datas, IModel $decoratedModel){

    }
    // private function setRedBorder(Shape $decoratedShape){
    //     echo "Border Color: Red";
    // }
}