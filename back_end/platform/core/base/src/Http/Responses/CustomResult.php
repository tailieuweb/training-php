<?php

namespace Botble\Base\Http\Responses;

class CustomResult
{
    protected $isSuccess = false;
    protected $data = NULL;
    protected $error = false;
    protected static $_instance;
    // Construct
    function __construct()
    {
        $this->isSuccess = false;
        $this->data = 'Well, some thing wrong !!';
        $this->error = true;
    }
    // Set Data
    public function setData($data){
        $this->isSuccess = true;
        $this->data = $data;
        $this->error = false;
        return $this->toResponse();
    }
    // Set Error
    public function setError($error){
        $this->isSuccess = false;
        $this->data = NULL;
        $this->error = $error;
        return $this->toResponse();
    }
    // To response
    private function toResponse(){
        $response = [
            'isSuccess' => $this->isSuccess,
            'data' => $this->data,
            'error' => $this->error
        ];
        return $response;
    }

    // Get Instance
    public static function getInstance()
    {
        if (self::$_instance !== null) {
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }
}
