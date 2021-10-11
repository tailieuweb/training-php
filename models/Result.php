<?php
class ResultClass
{
    public $isSuccess, $data, $error;
    public function __construct()
    {
        $this->isSuccess = false;
        $this->data = null;
        $this->error = "Don't have Value";
    }
    // Set Data
    public function setData($data)
    {
        $this->isSuccess = true;
        $this->data = $data;
        $this->error = null;
    }
    // Set Error
    public function setError($error)
    {
        $this->isSuccess = false;
        $this->data = null;
        $this->error = $error;
    }
}
