<?php
require_once 'models/UserModel.php';
require_once 'models/BankModel.php';
require_once 'BaseModel.php';
$usermodel = new UserModel();
class DecoratorPattern extends BaseModel {



    public function create($input,BankModel $bankModel) {
	
        $sql = "INSERT INTO `users` (`name`,`fullname`, `email`, `type`, `password`) VALUES (" .
                "'" .$input['name'] . "', '".$input['fullname']."', '".$input['email']."', '".$input['type']."', '".md5($input['password'])."')";
         $this->insert($sql);
         
        //tính toán
        $bankModel->insertBank($input);
        
        
    }

}