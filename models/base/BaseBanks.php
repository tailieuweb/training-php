<?php 
require './models/BaseModel.php';
require './models/Repositories/BankRepository.php';
class BaseBanks extends BaseModel{
    // private $user_id;
    // private $cost;
    protected $banks;
    public function __construct(BankRepository $bankRepository)
    {
        $this->banks = $bankRepository;
    }
    public function getAllBanks(){
        return $this->banks->getAllBank();
    }
    // public function getUser_ID(){
    //     return $this->user_id;
    // }
    // public function getCost(){
    //     return $this->cost;
    // }
}