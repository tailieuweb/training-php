<?php
require_once 'models/UserModel.php';

class RealUser implements User{
    private $user;
    public function __construct(){
        $this->user = new UserModel();
    }
    function insertUserandBank($input){
       
    }
    function updateUserandBank($input){
        
    }
	
    public function deleteUserandBank($id){
    }
}