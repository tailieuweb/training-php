<?php
// require './models/BaseModel.php';
require 'IBankRepository.php';
class BankRepository  implements IBankRepository{  
    public function findUserByID($id){
            echo 'something';
    }
    public function getAllBank(){
        echo 'get all bank';
    }
}