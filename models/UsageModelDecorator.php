<?php
require_once("IModel.php");
require_once("ModelDecorator.php");

class UsageModelDecorator extends ModelDecorator {
    protected $decoratedModel;

    function __construct(IModel $decoratedModel){
       parent::__construct($decoratedModel);

    }
    public function selectData($params = [])
    { 
        // echo "bank";
        // $result = $this->decoratedModel->selectData($params = []);
        // return $result;
        // echo "<br>";"user";
        $result = $this->selectAdiData($params = [], $this->decoratedModel);
        return $result;
        // var_dump($result2);
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

    // public function selectData($model)
    // {
    //     $this->decoratedShape->draw();
    //     $this->setRedBorder($this->decoratedShape);
    // }
    private function selectAdiData($params = [], IModel $decoratedModel){
        $result = $decoratedModel->selectData($params);
        return $result;
    }
}