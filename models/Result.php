<?php
class ResultClass
{
    protected static $_instance;
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
    // Singleton Design Pattern
    public static function getInstance()
    {
        if (self::$_instance != null) {
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }
}
