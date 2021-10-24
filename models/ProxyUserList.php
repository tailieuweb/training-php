<?php
require_once 'models/UserModel.php';
require_once 'models/BankModel.php';
class ProxyUserList{
    private $userList = null;
    function __construct(){}
    function getUsers($param)
    {
        if(NULL === $this->userList){
            $this->addUserList($param);
        }
        else{

        }      
    }

    function addUserList($param){
        $userModel = new UserModel();
        $this->userList = $userModel->getUsers();
    }

}