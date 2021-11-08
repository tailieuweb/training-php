<?php

require_once("IModel.php");

abstract class ModelDecorator implements IModel
{
    protected $decoratedModel;

    function __construct(IModel $decoratedModel){
        $this->decoratedModel = $decoratedModel;
    }
    public function selectData($params = [])
    {
        $this->decoratedModel->selectData($params = []);
    }
    public function deleteData($id){
        $this->decoratedModel->deleteData($id);
    }
    public function insertData($inputs){
        $this->decoratedModel->insertData($inputs);
    }
    public function updateData($inputs){
        $this->decoratedModel->updateData($inputs);
    }
    public function findDataById($inputs){
        $this->decoratedModel->findDataById($inputs);
    }
}